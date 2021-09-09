<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


        <!--Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/Student/provisionalCertificate.css') }}" />

    </head>
    <body>
      <h2>Provisional Certificate</h2><hr>
      <div class="pCertificate">
        @foreach($students as $student)
        <div class="detdiv">
        <h3 class="details">Roll No: </h3><h3 class="ddetails">{{$student->rollNumber}}</h3></div>
          <br>
          <div class="detdiv">
        <h3 class="details">Registration No: </h3><h3 class="ddetails">{{$student->rgdNumber}}</h3></div>
          <br>
          <div class="detdiv">
        <h3 class="details">Certificate No: </h3><h3 class="ddetails">{{$student->certificateNo}}</h3></div>
        <br>
        <div class="detdiv">
        <h3 class="details">Student Name: </h3><h3 class="ddetails">{{$student->name}}</h3></div>
        <br>
        <div class="detdiv">
        <h3 class="details">Father's Name : </h3><h3 class="ddetails">{{$student->fname}}</h3></div>
        <br>
        <div class="detdiv">
        <h3 class="details">Mother's Name : </h3><h3 class="ddetails">{{$student->mname}}</h3></div>
        <br>
        <div class="detdiv">
        <h3 class="details">Course Name : </h3><h3 class="ddetails">{{$student->course}}</h3></div>
        <br>
        <div class="detdiv">
        <h3 class="details">Center ID : </h3><h3 class="ddetails">{{$student->centerId}}</h3></div>
        <br>
        <div class="detdiv">
        <h3 class="details">Duration :</h3><h3 class="ddetails"> {{$student->startDate}} - <br>{{$student->endDate}}</h3></div>
        <br>
        <div class="detdiv">
        <h3 class="details">Grade : </h3><h3 class="ddetails">{{$student->grade}}</h3></div>
      @endforeach
      </div>
      <div class="signature">
      <div class="studentSignature"><img src="#" alt="StudentSignature"/><br><h3>Student Signature</h3></div>
      <div class="principalSignature"><img src="#" alt="Principal'sSignature"/><br><h3>Principal's Signature</h3></div>
    </div>
      </div>
        @foreach($students as $student)
      <div class="certDesc">
      <p><h4>This is to certify that Mr./Mrs.{{$student->name}} has completed the course {{$student->course}} and attained the grade - {{$student->grade}} after attending class for the same at our institution during the period {{$student->startDate}} to {{$student->endDate}}.We wish him the best for his future.</h4></p>
    </div>
       @endforeach
    </body>
</html>
