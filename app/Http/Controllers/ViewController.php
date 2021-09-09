<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ViewController extends Controller
{
    //View Branches
    public function viewBranch()
    {
      $branchDetails = DB::table('branches')
          ->get();
      return view('Admin.appBranches',['branchDetails' => $branchDetails]);
    }
    //View courses
    public function viewCourses()
    {
      $courseDetails = DB::table('courses')
        ->get();
      return view('Admin.appCourses',['courseDetails' => $courseDetails]);
    }

    //View subjects
    public function viewSubjects()
    {
      $subjectDetails = DB::table('subjects')
          ->get();
      return view('Admin.appSubjects',['subjectDetails' => $subjectDetails]);
    }
}
