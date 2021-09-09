<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/Admin/appCourses.css') }}" />


    </head>
    <body>
        <h3><a href="logout">Logout</a></h3>
        <h3><a href="dashboard">Go to dashboard</a></h3>
        @if($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif
    <div id="app">
        @include('flash-message')


        @yield('content')
    </div>
    <div class="courseDetails">
        @if(count($courseDetails)==0)
        <h3>No courses in the database.</h3>
        @endif
         @if(count($courseDetails)>0)
      <table id="courses">
        <tr>
          <th>Id</th>
          <th>Course Id</th>
          <th>Course Name</th>
          <th>Total Mark</th>
          <th>Branches providing the course(s)</th>
        </tr>
        @foreach($courseDetails as $course)
          <tr>
            <td>{{$course->id}}</td>
            <td>{{$course->courseId}}</td>
            <td>{{$course->courseName}}</td>
            <td>{{$course->totalMark}}</td>
            <td>{{$course->availBranchId}}</td>
          </tr>
          @endforeach
      </table>
        @endif
    </div>
    </body>
</html>
