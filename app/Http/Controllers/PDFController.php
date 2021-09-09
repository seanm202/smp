<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Session;
use DB;
use Auth;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generateMPDF()
    {

      $userId=auth()->user()->id;
      $userDetails = DB::table('students')
        ->where('studentId',$userId)
        ->get();
        $cMStatus=$userDetails[0]->cMStatus;
        if($cMStatus==1)
        {
    $data = [
      'title' => 'MarkSheetCertificate',
      'rgdNumber'=>$userDetails[0]->rgdNumber,
      'rollNumber' =>$userDetails[0]->rollNumber,
        'course' => $userDetails[0]->course,
        'name' => $userDetails[0]->name ,
        'fname' => $userDetails[0]->fname,
        'mname' => $userDetails[0]->mname,
        'image' => $userDetails[0]->Image,
        'centerId' => $userDetails[0]->centerId,
        'startDate' => $userDetails[0]->startDate,
        'endDate' => $userDetails[0]->endDate,
        'grade' => $userDetails[0]->grade,
        'certificateNo' => $userDetails[0]->certificateNo,
        'date' => date('m/d/Y')
    ];
    $pdf = PDF::loadView('Student.myPDF', $data);
    return $pdf->download('MarkSheetCertificate.pdf');
    }
    else
    {
      return back()->with('warning','Certificate not yet issued.');
    }
  }
  public function generatePPDF()
{

        $userId=auth()->user()->id;
        $userDetails = DB::table('students')
          ->where('studentId',$userId)
          ->get();
          $cPStatus=$userDetails[0]->cPStatus;
          if($cPStatus==1)
          {
    $data = [
      'title' => 'Provisional Certificate',
      'rgdNumber'=>$userDetails[0]->rgdNumber,
      'rollNumber' =>$userDetails[0]->rollNumber,
        'course' => $userDetails[0]->course,
        'name' => $userDetails[0]->name ,
        'fname' => $userDetails[0]->fname,
        'mname' => $userDetails[0]->mname,
        'image' => $userDetails[0]->Image,
        'centerId' => $userDetails[0]->centerId,
        'centerAddress' => $userDetails[0]->centerAddress,
        'startDate' => $userDetails[0]->startDate,
        'endDate' => $userDetails[0]->endDate,
        'grade' => $userDetails[0]->grade,
        'certificateNo' => $userDetails[0]->certificateNo,
        'date' => date('m/d/Y')
    ];
    $pdf = PDF::loadView('Student.myPDF', $data);

    return $pdf->download('ProvisionalCertificate.pdf');
  }
  else {
    return back()->with('warning','Certificate not yet issued.');
  }
    //return view('Student/myPDF');
}
}
