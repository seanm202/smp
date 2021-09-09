<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use PDF;
use DB;
use Auth;

class CertifcateController extends Controller
{

      /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
//View  certificates
public function viewMark()
{
  $userId=auth()->user()->id;
  $studentQuery = DB::table('students')
      ->where('studentId',$userId)
      ->where('cMStatus','1')
      ->get();
      if(count($studentQuery)=='1')
      {
  $studentDetails = DB::table('students')
      ->where('studentId',$userId)
      ->get();
$subjectmarks=DB::table('subjecttotal')
    ->where('studentId',$userId)
    ->get();
$coursemarks=DB::table('coursetotal')
    ->where('studentId',$userId)
    ->get();
    return view('Student/markSheetCertificate',['students' => $studentDetails,'subjectmarks'=>$subjectmarks,'coursemarks' =>$coursemarks]);
  }
  else {
    return back()->with('warning','Your Mark Sheet Certificate is not yet issued.');
  }
}

public function viewPro()
{
  $userId=auth()->user()->id;
  $studentQuery = DB::table('students')
      ->where('studentId',$userId)
      ->where('cPStatus','1')
      ->get();
      if(count($studentQuery)=='1')
      {
    $studentDetails = DB::table('students')
        ->where('studentId',$userId)
        ->get();
      return view('Student/provisionalCertificate',['students' => $studentDetails]);
    }
    else {
        return back()->with('warning','Your Provisional Certificate is not yet issued.');
    }
}


//Download  certificates
  public function generateProPDF()
{
    $data = [
        'title' => 'Welcome to ItSolutionStuff.com',
        'date' => date('m/d/Y')
    ];

$userId=auth()->user()->id;
$certificateAllowed = DB::table('students')
    ->select('cPStatus')
    ->where('studentId',$userId)
    ->get();

    if ($certificateAllowed->count() == 1) {
    if($certificateAllowed->count()==1)
    {
    $pdf = PDF::loadView('Student/downProvisionalSheetCertificate', $data);

    return $pdf->download('ProvisionalCertificate.pdf');
  }
  else {

    return back()->with('warning','Your certificate is not yet generated!');
  }}
  else {
    return back()->with('error','Please login again!');
  }
}


public function generateMarkPDF()
{
  $data = [
      'title' => 'Welcome to ItSolutionStuff.com',
      'date' => date('m/d/Y')
  ];

$userId=auth()->user()->id;
$certificateAllowed = DB::table('students')
  ->select('cMStatus')
  ->where('studentId',$userId)
  ->get();
if ($certificateAllowed->count() == 1) {
  if($certificateAllowed->count()==1)
  {
  $pdf = PDF::loadView('Student/downMarkSheetCertificate', $data);

  return $pdf->download('MarkSheetCertificate.pdf');
}
else {
  return back()->with('warning','Your certificate is not yet generated!');
}}
else {
  return back()->with('error','Please login again!');
}

}
}
