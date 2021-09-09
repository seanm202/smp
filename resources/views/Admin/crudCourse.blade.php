<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/Admin/crudCourse.css') }}" />
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


    <!-- Scripts -->
    <script src="/js/app.js"></script>
      <h2 style="padding-left:300px;">Create/Read/Edit/Delete Course(s)</h2>
      <div class="subjectCourse">
      <div class="addCourse">
        <h2>Add Course(s)</h2>
        {{Form::open(array('route' => 'addCourse','method'=>'post'))}}
        {{Form::label('courseid', 'Course Id :')}}
        {{Form::text('courseId')}}<br><br>
        {{Form::label('course', 'Course Name :')}}
        {{Form::text('courseName')}}<br><br>
        {{Form::label('total mark', 'Total Mark :')}}
        {{Form::number('totalMark')}}<br><br>
        {{Form::label('branches mark', 'Branches available at :')}}
        {{Form::select('branchId',$branches)}}<br><br>
        {{Form::submit('Add')}}
      {{Form::close()}}
      </div>
      <hr>
      <div class="deleteCourse">
        <h2>Delete Course(s)</h2>
        {{Form::open(array('route' => 'deleteCourse'))}}
        {{Form::label('course','Select course :')}}
        {{Form::select('courseId',$courses)}}<br><br>
        {{Form::label('branch','At branch :')}}
        {{Form::select('branchId',$branches)}}
        {{Form::hidden('id')}}
        {{Form::submit('Delete')}}
      {{Form::close()}}
      </div>
    </div>
<!--
    <hr>
    <div class="updateCourse">
      <h2>Update Course(s)</h2>
      {{Form::open(array('route' => 'addCourse','method'=>'post'))}}
      {{Form::label('courseid', 'Course Id :')}}
      {{Form::select('courseId',$courses)}}<br><br>
      {{Form::label('total mark', 'Total Mark :')}}
      {{Form::number('totalMark')}}<br><br>
      {{Form::submit('Update')}}
    {{Form::close()}}
  </div>-->
    </body>
</html>
