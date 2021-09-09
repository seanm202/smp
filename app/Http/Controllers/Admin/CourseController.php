<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class CourseController extends Controller
{


    public function getCourseDetails()
    {
  $courseDetails = DB::table('courses')->pluck('courseName', 'courseId')->toArray();
  return view('Admin.crudCourse',['courses' =>  $courseDetails]);
    }
  //////////////////////////////////////////////////////////////////////////////

  public function getCourse()
  {
        $courseDetails = DB::table('courses')->pluck('courseName', 'courseId')->toArray();
    $branch = DB::table('branches')->pluck('branchName', 'branchId')->toArray();
    return view('Admin.crudCourse',['courses' =>  $courseDetails,'branches' => $branch]);


  }
      //Create a new branch

  public function addCourse(Request $request)
  {
    //////////////////Input data validation

    $validatedData = $request->validate([
           'courseName' => 'required',
           'totalMark' => 'required',
           'branchId' => 'required',
       ],
       [
        'courseName.required'=> 'Course name is Required',
        'totalMark.required'=> 'Total mark is Required',
        'branchId.required'=> 'Select a branch',
       ]
    );

    /////////////////////////////////////
    if(!empty($request->input('courseId')))
    {
      $courseId=$request->input('courseId');
    }
    else {
      $courseId = DB::table('courses')
                      ->max('courseId');
      $courseId=$courseId + 1;
    }
        $branchId=$request->input('branchId');
      $courseName=$request->input('courseName');
      $totalMark=$request->input('totalMark');
    DB::table('courses')->insert([
        'courseName' => $courseName,
        'courseId' =>  $courseId,
        'totalMark' =>  $totalMark,
        'availBranchId' =>  $branchId
    ]);


      /*Search for duplicate and delete*/
      $duplicated = DB::table('courses')
                          ->select('courseId')
                          ->where('courseName',$courseName)
                          ->first();


          $courseId=$duplicated->courseId;
          DB::table('courses')->where('courseId', '!=', $courseId)->where('courseName',$courseName)->delete();


      /*Search for duplicate and delete*/
      return back()->with('success','Course Added.');
    //  return ('Course Added.');
  }


      //Delete Branch
    public function deleteCourse(Request $request)
    {
      
      $courseId=$request->input('courseId');
      $branchId=$request->input('branchId');
      DB::table('courses')->where('courseId', '=', $courseId)->where('availBranchId', '=', $branchId)->delete();
      //return "Course deleted";

      return back()->with('warning','Course deleted.');
    }
}
