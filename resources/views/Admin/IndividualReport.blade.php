<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/Admin/individualReport.css') }}" />

    </head>
    <body>
        <h3><a href="logout">Logout</a></h3>
        <h3><a href="dashboard">Go to dashboard</a></h3>
        <h3><a href="{{ url()->previous() }}">Go back</a></h3>
        <div class="studentInfo">
            @foreach($student as $stud)
            <h3>Student Id : {{$stud->studentId}}</h3>
            <h3>Student Name : {{$stud->name}}</h3>
            <h3>Center Id : {{$stud->centerId}}</h3>
            <h3>Center Address : {{$stud->centerAddress}}</h3>
            @endforeach
        </div>
        <hr>
        <hr>
        @if(count($studentCourseScore)==0)
         <h3 style="color:red;">No marks to display</h3>
          @endif
        @if(count($studentscore)>0)
        <div class="subjectMarks">
        <table id="marks">
            <tr>
                <th>Student Id</th>
                <th>Subject Name</th>
                <th>Subject Id</th>
                <th>Course Id</th>
                <th>Achieved Mark</th>
                <th>Maximum Mark</th>
            </tr>
            @foreach($studentscore as $studentscoreresult)
            <tr>
                <td>{{$studentscoreresult->studentId}}</td>
                <td>{{$studentscoreresult->subjectId}}</td>
                <td>{{$studentscoreresult->subjectName}}</td>
                <td>{{$studentscoreresult->courseId}}</td>
                <td>{{$studentscoreresult->subjectSecuredMark}}</td>
                <td>{{$studentscoreresult->subjectTotal}}</td>
            </tr>
            @endforeach
        </table></div>
        @endif
        <hr>
        <hr>
         @if(count($studentCourseScore)==0)
         <h3>No marks to display</h3>
          @endif
        @if(count($studentCourseScore)>0)
        <div class="courseTotalMark">
            <table id="marks">
                <tr>
                    <th>Student Id</th>
                    <th>Student Name</th>
                    <th>Course Id</th>
                    <th>Course Name</th>
                    <th>Mark Achieved</th>
                    <th>Maximum Mark</th>
                </tr>
                @foreach($studentCourseScore as $studentcourseresult)
                <tr>
                   <td>{{$studentcourseresult->studentId}}</td>
                   <td>{{$studentcourseresult->studentName}}</td> 
                   <td>{{$studentcourseresult->courseId}}</td> 
                   <td>{{$studentcourseresult->courseName}}</td> 
                   <td>{{$studentcourseresult->courseSecuredMarks}}</td> 
                   <td>{{$studentcourseresult->courseTotalMark}}</td>  
                </tr>
                @endforeach
            </table>
        </div>
        @endif
    </body>
</html>
