<?php

namespace App\Http\Controllers\Branch;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AdmissionController extends Controller
{
  public function getStudentDetails()
  {

    $students = DB::table('students')->where('status','Applied')->get();
    $courses = DB::table('courses')->pluck('courseName','courseId')->toArray();
    $branches = DB::table('branches')->pluck('branchName','branchId')->toArray();
    $userId= DB::table('students')->where('status','Applied')->get();
   return view('Branch.studentAdmission',['students' => $students,'courses' => $courses,'branches' => $branches]);
  }
  //Get courses names
  public function getCoursesName()
  {

    $courses = DB::table('courses')->pluck('courseName','courseId')->toArray();

   return view('Branch.studentAdmission',['courses' => $courses]);


  }

  //Generate roll number
  public function rollNumber()
  {
    $rollNumber=DB::table('students')
                    ->max('rollNumber');
    $rollNumber=$rollNumber+1;
   return $rollNumber;


  }

    //Generate rgd number
    public function rgdNumber()
    {
      $rgdNumber=DB::table('students')
                      ->max('rgdNumber');
      $rgdNumber=$rgdNumber + 1;
       return $rgdNumber;


    }

      //Generate roll number
      public function certificateNo()
      {
      $certificateNo=DB::table('students')
                      ->max('certificateNo');
      $certificateNo=$certificateNo + 1;
       return $certificateNo;


      }


    //Add student
      public function newStudent(Request $request)
      {

      ///////////Input data validation//////


           $validatedData = $request->validate([
                  'name' => 'required',
                  'fname' => 'required',
                  'mname' => 'required',
                  'Address' => 'required',
                  'contactnumber' => 'required',
                  'courseId' => 'required',
                  'emailId' => 'required|email',
                  'branchId' => 'required',
              ],
              [
               'name.required'=> 'Student Name is Required',
               'fname.required'=> 'Name of father of studentr is Required',
               'mname.required'=> 'Name of mother of studentr is Required',
               'Address.required'=> 'Address is Required',
               'contactnumber.required'=> 'Contact number is Required',
               'courseId.required'=> 'Course should be selected.',
               'emailId.required'=> 'Email Id is Required',
               'branchId.required'=> 'Email Id is Required',
              ]
           );
       ///////////////////////////////////////////////
       if($request->has('password'))
       {
           $passwordlatest=$request->input('password');
           $password = Hash::make($passwordlatest);
           
       }
       else
       {
           $passwordlatest='abcd12345';
           $password = Hash::make($passwordlatest);
       }
       
       $email=$request->input('emailId');
        $name=$request->input('name');
       if($request->has('studentid'))
       {
           $studentid=$request->input('studentid');
       }
       else
       {
           $stid=DB::table('students')
                      ->max('studentId');
            $studentid=$stid + 1;
            
            //////////////////////////////////////////////////
            DB::table('users')->insert([
        'appliedAs' => 'Student',
        'name' =>  $name,
        'email' =>  $email,
        'role' =>  'student',
        'password' => $password
    ]);
            //////////////////////////////////////////////////
       }
      
        $courseId=$request->input('courseId');
        $email=$request->input('emailId');
        //$course=$request->input('course');
        $course=DB::table('courses')
                        ->select('courseName')
                        ->where('courseId',$courseId)
                        ->get();
        $rgdNumber=AdmissionController::rgdNumber();


        $rollNumber=AdmissionController::rollNumber();


        $certificateNo=AdmissionController::certificateNo();

       

  $affected = DB::table('students')
        ->where('studentId', $studentid)
        ->where('emailId',$email)
        ->update([
      'name' =>$name ,
      'fname' => $request->input('fname'),
      'mname' => $request->input('mname'),
      'Address' => $request->input('Address'),
      'cnumber' => $request->input('cnumber'),
      'course' => $course[0]->courseName,
      'courseId' => $courseId,
      'emailId' => $email,
      'branchId' => $request->input('branchId'),
      'rollNumber' => $rollNumber,
      'rgdNumber' => $rgdNumber,
      'status' => 'Student',
      'certificateNo' => $certificateNo
  ]);

  /*Search for duplicate and delete*/
  $duplicated = DB::table('students')
                      ->select('studentId')
                      ->where('emailId',$email)
                      ->where('courseId',$courseId)
                      ->first();

      $studentId=$duplicated;
      DB::table('students')->where('studentId', '!=', $studentId)->where('emailId',$email)->where('courseId',$courseId)->delete();


  /*Search for duplicate and delete*/
  return back()->with('success','Student Record Added.');
  //return ('Student Record Added.');
      }


}
