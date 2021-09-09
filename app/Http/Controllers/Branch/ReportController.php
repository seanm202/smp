<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ReportController extends Controller
{
    //Report Management
    public function manageReport()
    {
         $studentCourse = DB::table('coursetotal')->get();
        return view("Branch.Report",['studentCourse' => $studentCourse]);
    }
    
    //Report Management
    public function generateReport(Request $request)
    {
         $studentId = $request->input('studentId');
         $status = $request->input('status');
         $affected = DB::table('students')
        ->where('studentId', $studentid)
        ->update([
                  'status' =>$status
             ]);
        return view("Branch.Report",['studentcourse' => $studentCourse]);
    }
}
