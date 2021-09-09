<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class AReportController extends Controller
{

          //Create a new branch
          public function viewReport(Request $request)
          {
            $userId=$request->input('id');
            $students=DB::table('students')->where('status','Finished')->get();
            return view('Admin.Report',['students'=>$students]);
          }
          
           public function readReport(Request $request)
          {
            $studentId=$request->input('studentId');
            $courseId=$request->input('courseId');
            $studentSubjectScore=DB::table('subjecttotal')
            ->where('studentId',$studentId)
            ->where('courseId',$courseId)
            ->get();
            
             $student=DB::table('students')->where('studentId',$studentId)->where('courseId',$courseId)->get();
            
            $studentCourseScore=DB::table('coursetotal')
            ->where('studentId',$studentId)
            ->where('courseId',$courseId)
            ->get();
            return view('Admin.IndividualReport',['studentscore'=>$studentSubjectScore,'studentCourseScore' => $studentCourseScore,'student' => $student]);
          }

}
