<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ExamController extends Controller
{
    //Exam branchExamManagement
    public function manageExam()
    {
      $students = DB::table('students')->get();
      return view('Branch.examManagement',['students' =>$students]);
    }

    public function getCourses(Request $request)
    {
      $students = DB::table('students')->get();
      $studentId=$request->input('studentId');
      $courses = DB::table('students')->where('studentId',$studentId)->pluck('course','courseId')->toArray();
      //return view('Branch.examManagement',['courses' =>$courses]);
      return view('Branch.examManagement',['courses' =>$courses,'students' =>$students,'studentId' => $studentId]);
    }

    public function getSubjects(Request $request)
    {
      $students = DB::table('students')->get();
    $studentId=$request->input('studentId');
    $courses = DB::table('students')->where('studentId',$studentId)->pluck('course','courseId')->toArray();
      //$courses = DB::table('courses')->pluck('courseName','courseId')->toArray();
      $courseId=$request->input('courseId');
      $subjects = DB::table('subjecttotal')->where('courseId',$courseId)->get();
      //return view('Branch.examManagement',['subjects' =>$subjects,'courses' =>$courses,'studentId'=>'2']);
    return view('Branch.examManagement',['courses' =>$courses,'students' =>$students,'subjects' =>$subjects,'courseID' => $courseId,'studentId' =>'2']);
  }

        public function addSubjectMark(Request $request)
        {

                ///////////Input data validation//////


                     $validatedData = $request->validate([
                            'courseId' => 'required',
                            'subjectId' => 'required',
                            'subjectSecuredMark' => 'required',
                        ],
                        [
                         'courseId.required'=> 'Course should be selected.',
                         'subjectId.required'=> 'Subject should be selected.',
                         'subjectSecuredMark.required'=> 'Maximum mark of the subject should be entered.',
                        ]
                     );

          $courseId=$request->input('courseId');
          $subjectId=$request->input('subjectId');
          $studentId=$request->input('studentId');
          $subjectSecuredMark=$request->input('subjectSecuredMark');

          $affected = DB::table('subjecttotal')
              ->where('courseID', $courseId)
              ->where('subjectId',$subjectId)
              ->where('studentId',$studentId)
              ->update(['subjectSecuredMark' => $subjectSecuredMark]);

              $subjectDetails = DB::table('subjects')->select('subjectName')->where('subjectId',$subjectId)->get();

              DB::table('subjecttotal')
                  ->updateOrInsert(
                      ['courseId' => $courseId, 'subjectId' => $subjectId, 'subjectName' => $subjectDetails[0]->subjectName,'studentId' => $studentId],
                      ['subjectSecuredMark' => $subjectSecuredMark]
                  );

////////////////////////////////////////////////////////
/*Search for duplicate and delete*/
$duplicated = DB::table('subjecttotal')
                    ->select('id')
                    ->where('subjectId',$subjectId)
                    ->where('courseId',$courseId)
                    ->where('studentId',$studentId)
                    ->first();

    $id=$duplicated->id;
    DB::table('students')->where('id', '!=', $id)->where('emailId',$email)->where('courseId',$courseId)->delete();


/*Search for duplicate and delete*/
//////////////////////////////////////////////////////////
              $students = DB::table('students')->get();
              $subjects = DB::table('subjects')->where('courseId',$courseId)->get();
    return view('Branch.examManagement',['students' =>$students,'subjects' =>$subjects,'courseID' => $courseId,'studentId' => $studentId]);

        }

/* Image Upload*/

      
public function addStudentPhoto(Request $request)
{
   
      $user_id=$request->input('studentId');
      $Imagepath = $request->file('image')->store('public/images/Student'.'/'.$user_id);
       $path=substr($Imagepath,7);
    $affected = DB::table('students')
              ->where('studentId', $user_id)
              ->update(['Image' =>$path]);
             // return back()->with('success','Image uploaded successfully');
              return ('Image uploaded successfully');
      }
/* Image Upload*/


    public function calcCourseTotal(Request $request)
    {
      $courseId=$request->input('courseId');
      $studentId=$request->input('studentId');
      //$courseTotal = DB::table('courses')->where('courseId',$courseId)->select('totalMark')->get();
      $courseSecured = DB::table('subjecttotal')->where('courseId',$courseId)->where('studentId',$studentId)->sum('subjectSecuredMark');

$affected = DB::table('coursetotal')
              ->where('courseId', $courseId)
              ->where('studentId',$studentId)
              ->update(['courseSecuredMarks' => $courseSecured]);

              return back()->with('Total mark calculated and updated.');
        }
}
