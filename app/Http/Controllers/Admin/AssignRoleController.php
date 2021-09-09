<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class AssignRoleController extends Controller
{


        //Get subject branchDetails
          public function getRoles()
          {

          $roles = DB::table('roles')->pluck('roleName', 'roleId')->toArray();
            $applicants = DB::table('users')->where('role','applicant')->get();
/*
            if(count($applicants)==0)
            {
              return back()->with('info','No new applicants.');
            }*/
            return view('Admin/assignRoles',['roles' =>$roles,'applicants' => $applicants]);

          }
    //
    public function getRolesToChoose()
    {
$userId = auth()->user()->id;
    $roles = DB::table('roles')->pluck('roleName', 'roleId')->toArray();
return view('Guest/guestdashboard',['roles' =>$roles,'userId' => $userId]);

    }

    public function getChosenRoles(Request $request)
    {
      $userId = $request->input('applicantId');
        $roleId = $request->input('roleId');
        $roles = DB::table('roles')->select('roleName')->where('roleId', $roleId)->get();
        $affected = DB::table('users')
        ->where('id', $userId)
        ->update(['appliedAs' => $roles[0]->roleName]);
        return back()->with('success','Role submitted.');
    }

        //Create a new branch
        public function assignRole(Request $request)
        {

          $userId=$request->input('id');
          $userToken=$request->input('userId');
          $userName=$request->input('userName');
          $userEmail=$request->input('userEmail');
          $userRole=$request->input('roleId');
          $userRole=DB::table('roles')
            ->where('roleId',$userRole)
            ->pluck('roleName');
          if($userRole[0]=="Admin")
          {
              //Update role in users table
              $affected = DB::table('users')
              ->where('id', $userId)
              ->where('name',$userName)
              ->update(['role' => 'admin']);

              //Adding to admins table

              $adminId= DB::table('admins')
                          ->max('adminId');
          $adminId=$adminId + 1;

              DB::table('admins')->insert([
            'name' => $userName,
            'adminId' =>  $adminId,
            'emailId' => $userEmail,
            'userId' => $userToken
        ]);
        //////////////////////////////////////////////////////////////
        return back()->with('success','Role assigned as admin.');
            // return ('Role assigned as admin.');
          }
          elseif($userRole[0]=="Branch")
          {
              //Update role in users table
              $affected = DB::table('users')
              ->where('id', $userId)
              ->where('name',$userName)
              ->update(['role' => 'branch']);


              $branchId= DB::table('branches')
                          ->max('branchId');
          $branchId=$branchId + 1;

              DB::table('branches')->insert([
            'name' => $userName,
            'branchId' =>  $branchId,
            'branchStatus' => 'Applied',
            'mailId' => $userEmail,
            'userId' => $userToken
        ]);
        /////////////////////////////////////
          return back()->with('success','Role assigned as branch.');
           //return ('Role assigned as branch.');
          }
          elseif($userRole[0]=="Student")
          {
              //Update role in users table
              $affected = DB::table('users')
              ->where('id', $userId)
              ->where('name',$userName)
              ->update(['role' => 'student']);



              $studentId= DB::table('students')
                          ->max('studentId');
          $studentId=$studentId + 1;

              DB::table('students')->insert([
            'name' => $userName,
            'studentId' =>  $studentId,
            'emailId' => $userEmail,
            'userId' => $userToken
        ]);
        //////////////////////////////////////
        return back()->with('success','Role assigned as student.');
          //  return ('Role assigned as student.');
          }
          else
          {
          /*
           //Update role in $userRole table
              $affected = DB::table('users')
              ->where('id', $userId)
              ->where('name',$userName)
              ->update(['role' => $userRole]);

              DB::table($userRole)->insert([
            'name' => $userName,
            'roleId' =>  $userRoleId,
            'emailId' => $userEmail
        ]);*/
        return back()->with('success','Role maintained as applicant itself.');
          //return ("Role maintained as applicant itself.");
          }
          return back()->with('success','Roles alloted.');
          //return "Roles alloted";
        }
public function deleteApplicant(Request $request)
{
  $id=$request->input('id');
  DB::table('users')->where('id', '=', $id)->delete();
  //return "Course deleted";

  return back()->with('warning','Appliant removed.');
}
}
