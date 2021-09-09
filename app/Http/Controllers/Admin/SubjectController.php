<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class SubjectController extends Controller
{
        //Get subject Details
        public function getSubjectDetails()
        {

        $subjectDetails = DB::table('subjects')->get();
    return view('Admin.viewSubjects',['subjects' =>$subjectDetails]);

        }
  //////////////////////////////////////////////////////////////////////////////////////////////////
        //Get subject Details
        public function getSubject()
        {

        $subjectDetails = DB::table('subjects')->pluck('subjectName', 'subjectId')->toArray();
        $courseDetails = DB::table('courses')->pluck('courseName', 'courseId')->toArray();
    return view('Admin.crudSubject',['subjects' =>$subjectDetails,'courses' =>$courseDetails]);

        }
        //Create a new branch
        public function addSubject(Request $request)
        { ///////////Input data validation//////


              $validatedData = $request->validate([
                     'courseId' => 'required',
                     'subjectName' => 'required',
                     'totalMark' => 'required',
                 ],
                 [
                  'courseName.required'=> 'Course name is Required',
                  'subjectName.required'=> 'Subject name is Required',
                  'totalMark.required'=> 'Total mark is Required',
                //  'name.min'=> 'First Name Should be Minimum of 8 Character', // custom message
                //  'branchemail.required'=> 'Your Last Name is Required' // custom message
                 ]
              );
          ///////////////////////////////////////////////
          if(!empty($request->input('subjectId')))
          {
            $subjectId=$request->input('subjectId');
          }
          else {
            $subjectId = DB::table('subjects')
                            ->max('subjectId');
            $subjectId=$subjectId + 1;
          }

          $courseId=$request->input('courseId');
          $subjectName=$request->input('subjectName');
          $totalMark=$request->input('totalMark');
        DB::table('subjects')->insert([
            'subjectName' => $subjectName,
            'subjectId' =>  $subjectId,
            'courseId' => $courseId,
            'totalMark' => $totalMark,
        ]);


              /*Search for duplicate and delete*/
              $duplicated = DB::table('subjects')
                                  ->select('subjectId')
                                  ->where('subjectName',$subjectName)
                                  ->first();

                  $subjectId=$duplicated->subjectId;
                  DB::table('subjects')->where('subjectId', '!=', $subjectId)->where('subjectName',$subjectName)->delete();

              /*Search for duplicate and delete*/

              return back()->with('success','Subject added.');
          //return "Subject added";
        }


        //Delete Branch
        public function deleteSubject(Request $request)
        {
          $subjectId=$request->input('subjectId');
          $courseId=$request->input('courseId');
          DB::table('subjects')->where('subjectId', '=', $subjectId)->where('courseId', '=', $courseId)->delete();

          //return "Subject deleted";
          return back()->with('warning','Subject deleted.');
        }
}
