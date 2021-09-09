<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AuthorizeController extends Controller
{
    //To make a person an admin
    public function makeAdmin(Request $request)
    {
      $userId=$request->input('id');
      $userName=$request->input('name');

    $affected = DB::table('users')
              ->where('id', $userId)
              ->where('name',$userName)
              ->update(['role' => 'admin']);


    $adminId = DB::table('admins')
                ->max('adminId');
    $adminId=$adminId+1;

     DB::table('admins')->insert([
         'adminId' => $adminId,
        'name' =>$userName
        ]);

    /*Search for duplicate and delete*/
             /* $duplicated = DB::table('subjects')
                                  ->select('subjectId')
                                  ->where('subjectName',$subjectName)
                                  ->first();

              foreach ($duplicated as $duplicate) {
                  $subjectId=$duplicate->subjectId;
                  DB::table('subjects')->where('subjectId', '!=', $subjectId)->where('subjectName',$subjectName)->delete();
              }*/

              /*Search for duplicate and delete*/
              return back()->with('success','Profile updated.');
    }
    ///To make a person admin of a branch
    public function makeBranchAdmin(Request $request)
    {
      $userId=$request->input('id');
      $userName=$request->input('name');

    $affected = DB::table('users')
              ->where('id', $userId)
              ->where('name',$userName)
              ->update(['role' => 'branch']);

    $branchId = DB::table('branches')
                ->max('branchId');
    $branchId=$branchId+1;

     DB::table('branches')->insert([
         'branchId' => $branchId,
        'name' =>$userName
        ]);

    /*Search for duplicate and delete*/
             /* $duplicated = DB::table('subjects')
                                  ->select('subjectId')
                                  ->where('subjectName',$subjectName)
                                  ->first();

              foreach ($duplicated as $duplicate) {
                  $subjectId=$duplicate->subjectId;
                  DB::table('subjects')->where('subjectId', '!=', $subjectId)->where('subjectName',$subjectName)->delete();
              }*/

              /*Search for duplicate and delete*/
              return back()->with('success','Profile updated.');
    }

    //To admit students
    public function admitStudent(Request $request)
    {
      $status=$request->input('status');
      $userId=$request->input('id');
      $userName=$request->input('name');

    $affected = DB::table('students')
              ->where('studentId', $userId)
              ->where('name',$userName)
              ->update(['status' => $status]);


    if($status=='Continue')
    {
      return back()->with('success','Student status changed to Continued.');
    }
    elseif($status=='Discontinue')
    {
        return back()->with('warning','Student status changed to Discontinued.');
    }
    elseif($status=='Completed')
    {
        return back()->with('warning','Student status changed to Completed.');
    }
    elseif($status=='Terminate')
    {
        return back()->with('warning','Student status changed to Terminated.');
    }
    return back()->with('success','Record Updated.');
    }
    //Provide Provisional Certificate
    public function provideProvisionalCertificate(Request $request)
    {
      $userId=$request->input('id');
      $userName=$request->input('name');

    $affected = DB::table('students')
              ->where('studentId', $userId)
              ->where('name',$userName)
              ->update(['cPStatus' => '1']);

              return back()->with('success','Certificate Issued.');
    }

    //Provide MarkSheet Certificate
    public function provideMarkSheetCertificate(Request $request)
    {
      $userId=$request->input('id');
      $userName=$request->input('name');

    $affected = DB::table('students')
              ->where('id', $userId)
              ->where('name',$userName)
              ->update(['cMStatus' => '1']);
              return back()->with('success','Certificate Issued.');
    }

    //Get new students details
    public function makeAuthorizeStudent()
    {
      $students=DB::table('students')
            ->where('studentId','>','1')
            ->get();

      /*  if(count($students)==0)
        {
          return back()->with('info','No new students in the list.');
        }*/
    return view("Admin.makeAuthorize",['students' =>$students]);
    }
    
    public function deleteStudent(Request $request)
    {
      $studentId=$request->input('studentId');
      $courseId=$request->input('courseId');
DB::table('students')->where('studentId', '=', $studentId)->where('courseId', '=', $courseId)->delete();
      
    return back()->with('error','The selected student is deleted.');
    }
}
