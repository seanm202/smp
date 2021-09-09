<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/Student/markSheetCertificate.css') }}" />

    </head>
    <body>
      <h2>Marksheet Certificate</h2>
      <div class="mCertificate">
        @foreach($students as $student)
        <!--<img class="certificateImage" src="{{asset('storage/'.$student->Image)}}" /> -->
        <h3>Roll No: {{$student->rollNumber}}</h3>
          <br>
        <h3>Registratin No: {{$student->rgdNumber}}</h3>
          <br>
        <h3>Certificate No: {{$student->certificateNo}}</h3>
        <br>
        <h3>Student Name: {{$student->name}}</h3>
        <br>
        <h3>Father's Name : {{$student->fname}}</h3>
        <br>
        <h3>Mother's Name : {{$student->mname}}</h3>
        <br>
        <h3>Course Name : {{$student->course}}</h3>
        <br>
        <h3>Center Name : {{$student->centerId}}</h3>
        <br>
        <h3>Duration :</h3>
        <h3>From : {{$student->startDate}} to :{{$student->endDate}}</h3>
        <br>
        <h3>Grade : {{$student->grade}}</h3>
      @endforeach
      <hr>
      <table>
        <tr>
          <th>Subject Name</th>
          <th>Maximum Marks</th>
          <th>Secured Marks</th>
      </tr>
      @foreach($subjectmarks as $subjectmark)
          <tr>
          <td>{{$subjectmark->subjectName}}</td>
          <td>{{$subjectmark->subjectTotal}}</td>
          <td>{{$subjectmark->subjectSecuredMark}}</td>
        </tr>
        @endforeach

        @foreach($coursemarks as $coursemark)
        <tr>
          <td>Total</td><td>{{$coursemark->courseTotalMark}}</td><td>Marks obtained :{{$coursemark->courseSecuredMark}}</td>
        </tr>
        @endforeach
      </table>
      </div>
    </body>
</html>
