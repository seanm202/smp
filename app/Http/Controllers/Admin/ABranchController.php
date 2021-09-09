<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ABranchController extends Controller
{

  //Get Branch details

      public function getBranch()
      {
        //$branchDetails=DB::table('branches')
            //  ->get();
            $branchDetails = DB::table('branches')->where('branchStatus','Applied')->get();
            $branch = DB::table('branches')->pluck('branchName','branchId')->toArray();
            $activeBranch=DB::table('branches')->where('branchStatus','Active')->pluck('branchName','branchId')->toArray();
            $reactivateBranch=DB::table('branches')->where('branchStatus','Inactive')->pluck('branchName','branchId')->toArray();
            return view('Admin.crudBranch',['branch' => $branch,'branchDetails' => $branchDetails,'activeBranch' => $activeBranch,'reactivateBranch' => $reactivateBranch]);
      }

  //Get branchhead photo

      public function saveImage(Request $request)
      {  $user_id=$request->input('branchId');
              $Imagepath = $request->file('file')->store('public/images/Admin/'.$user_id);
              $path=substr($Imagepath,7);
              $affected = DB::table('branches')
                      ->where('branchId',$user_id)
                      ->update(['image' => $path
                      ]);
                  return ('Image uploaded.');
      }


  //Get Branch details

      public function getBranchDetails()
      {
        //$branchDetails=DB::table('branches')
            //  ->get();
            $branchDetails = DB::table('branches')->where('branchStatus','Active')->get();
        return view('Admin.viewBranches',['branchActiveDetails' => $branchDetails]);
      }


////////////////////////////////////////////////////////////////////////////////


    //Create a new branch
    public function addBranch(Request $request)
    {
$validatedData = $request->validate([
       'branchName' => 'required|min:8',
       'branchemail' => 'required',
       'cnumber' => 'required',
       'branchAddress' => 'required',
       'branchheadName' => 'required',
   ],
   [
    'branchName.required'=> 'Branch name is Required',
    'branchheadName.required'=> 'Branch head name is Required',
    'cnumber.required'=> 'Contact number is Required',
    'branchemail.required'=> 'Branch email Id is Required',
    'branchAddress.required'=> 'Branch address is Required',
   ]
);


      ////////////////////////////////////////////////
      $branchName=$request->input('branchName');
      $name=$request->input('name');
      $mailId=$request->input('branchemail');
        $branchId=$request->input('branchId');
        if($request->has('password'))
        {
            $password=$request->input('password');
        }
        else
        {
            $password='12345asdf';
        }
        
        
      if($request->has('id'))
       {
           $Id=$request->input('id');
           
    $affected = DB::table('branches')
              ->where('id',$Id)
              ->update(['branchName' => $branchName,'name' => $name,
        'branchId' => $branchId,
        'cnumber' => $request->input('cnumber'),
        'mailId' => $mailId,
        'branchId' => $request->input('branchId'),
        'address' => $request->input('branchAddress'),
        'branchStatus' => "Active"
      ]);
       }
       else
       {
            DB::table('branches')->insert(['branchName' => $branchName,'name' => $name,
        'branchId' => $branchId,
        'cnumber' => $request->input('cnumber'),
        'mailId' => $mailId,
        'branchId' => $request->input('branchId'),
        'address' => $request->input('branchAddress'),
        'branchStatus' => "Active"
      ]);
      
      DB::table('users')->insert(['name' => $name,
        'mailId' => $mailId,
        'role' => 'branch',
        'appliedAs' => 'Branch',
        'password' => $password
      ]);
      
       }
      
      

      /*Search for duplicate and delete*/
      $duplicated = DB::table('branches')
                          ->select('branchId')
                          ->where('mailId',$mailId)
                          ->where('branchName',$name)
                          ->first();


          $branchId=$duplicated;
          DB::table('branches')->where('branchId', '!=', $branchId)->where('branchName',$name)->delete();


      /*Search for duplicate and delete*/

      return back()->with('success','Branch added successfully!');
      //return "Branch added";
    }
/*
Actions on branches

*/
    //Suspend Branch
    public function suspendBranch(Request $request)
    {
      $branchId=$request->input('branchId');

    $affected = DB::table('branches')
              ->where('branchId',$branchId)
              ->update(['branchStatus' => 'Inactive']);
              return back()->with('info','Branch made Inactive.');
    }

    //Reactivate Branch
    public function reactivateBranch(Request $request)
    {
      $branchId=$request->input('branchId');

    $affected = DB::table('branches')
              ->where('branchId',$branchId)
              ->update(['branchStatus' => 'Active']);
              return back()->with('success','Branch reactivated.');
    }
    //Delete Branch
    public function deleteBranch(Request $request)
    {
      $Id=$request->input('branchId');

      DB::table('branches')->where('branchId', '=',$Id )->delete();

      return back()->with('warning','Branch deleted.');
    }

}
