<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/Branch/Report.css') }}" />


    </head>
    <body>
      <h3><a href="dashboard">Go back to dashboard</a></h3>
        <h3><a href="logout">Logout</a></h3>
        <div id="app">
            @include('flash-message')


            @yield('content')
        </div>
      <h2>Student Report</h2>
       @if(count($studentCourse)==0)
         <h3 style="color:red;">No new records.</h3>
          @endif
                @if(count($studentCourse)>0)
      <table>
        @foreach($studentCourse as $studentcourses)
        <tr>
          <td>Score Id </td>
            <td>{{$studentcourses->scoreId}}</td>
        </tr>
        <tr>
          <td>Student Id </td>
            <td>{{$studentcourses->studentId}}</td>
        </tr>
        <tr>
          <td>Student Name </td>
            <td>{{$studentcourses->studentName}}</td>
        </tr>
        <tr>
          <td>Course Name</td>
            <td>{{$studentcourses->courseName}}</td>
        </tr>
        <tr>
          <td>Course Id</td>
            <td>{{$studentcourses->courseId}}</td>
        </tr>
        <tr>
          <td>Maximum Mark</td>
            <td>{{$studentcourses->courseTotalMark}}</td>
        </tr>
        <tr>
          <td>Marks Achieved</td>
            <td>{{$studentcourses->courseSecuredMarks}}</td>
        </tr>
        <tr>
          <td>Generate Report</td>
            <td>
{{Form::open(array('route' => 'generateReport'))}}
{{Form::hidden('studentId',$studentcourses->studentId)}}
{{Form::hidden('status','Finished')}}
{{Form::submit('Generate')}}
{{Form::close()}}</td>
        </tr>
        @endforeach
      </table>
          @endif
    </body>
</html>
