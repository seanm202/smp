<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/Admin/crudSubject.css') }}" />

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
      <h2 style="padding-left:300px;">Create/Read/Edit/Delete Subject(s)</h2>
      <div class="subject">
        <div class="addSubject">
          <h2>Add Subject(s)</h2>
          {{Form::open(array('route' => 'addSubject'))}}
          {{Form::label('courseName', 'Course Name :')}}
          {{Form::select('courseId', $courses)}}<br><br>
          {{Form::label('subjectname', 'Subject Name :')}}
          {{Form::text('subjectName')}}<br><br>
          <!--
          {{Form::label('subjectId', 'Subject Id :')}}
          {{Form::text('subjectId')}}<br><br> -->
          {{Form::label('totalMark', 'TotalMark :')}}
          {{Form::number('totalMark')}}<br><br>
          {{Form::submit('Add')}}
        {{Form::close()}}
        </div>
        <hr>
        <div class="deleteSubject">
          <h2>Delete Subject(s)</h2>
          {{Form::open(array('route' => 'deleteSubject'))}}
          {{Form::label('courseName', 'Course Name :')}}
          {{Form::select('courseId', $courses)}}<br><br>
          {{Form::label('subjectName', 'Subject Name :')}}
          {{Form::select('subjectId',$subjects)}}
          {{Form::hidden('id')}}
          {{Form::submit('Delete')}}
        {{Form::close()}}
        </div>
        </div>
    </body>
</html>
