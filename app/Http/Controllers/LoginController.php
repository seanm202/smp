<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use DB;
class LoginController extends Controller
{
    //
    public function roleCheck()
    {
        $userRole = auth()->user()->role;
        $userId = auth()->user()->id;
        $userDetails = DB::table('users')
            ->where('id',$userId)
            ->get();
       
        if($userRole=="admin")
        {
            $email= DB::table('users')
            ->select('email')
            ->where('id',$userId)
            ->first();

          //return route('adminDashboard');
          $userDetails = DB::table('admins')
              ->where('emailId',$email->email)
              ->get();
          return view('Admin.adminDashboard',["admin"=>$userDetails]);
        }
        elseif($userRole=="branch")
        {
             $email= DB::table('users')
            ->select('email')
            ->where('id',$userId)
            ->first();
          //return route('branchDashboard');
          $userDetails = DB::table('branches')
              ->where('mailId',$email->email)
              ->get();
          return view('Branch.branchDashboard',["branchOwner"=>$userDetails]);
        }
        elseif($userRole=="student") {
             
             $email= DB::table('users')
            ->select('email')
            ->where('id',$userId)
            ->first();
          //return route('studentDashboard');
          
          $userDetails = DB::table('students')
              ->where('emailId',$email->email)
              ->get();
                
              $studentCourses = DB::table('students')
                  ->select('course')
                  ->where('studentId',$userId)
                  ->get();
          return view('Student.studentDashboard',["students"=>$userDetails,'studentCourses' =>$studentCourses]);
        }
        else
        {
          $roleAs = DB::table('roles')
              ->pluck('roleName','roleId')
              ->toArray();
              $userId = auth()->user()->id;
            return view("Guest.guestdashboard",['roles' => $roleAs,'userId' => $userId]);
        }

        }

    public function updatePassword(Request $request)
    {
      $userId = auth()->user()->id;
      DB::table('users')
    ->updateOrInsert(
        ['id' => $userId],
        ['password' => $request->input('password')]
    );
    return back()->with('success','Password updated.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
