<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/Admin/appSubjects.css') }}" />

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
<div class="subjectDetails">
    @if(count($subjectDetails)==0)
    <h3 style="color:red;">No subjects in the database.</h3>
    @endif
     @if(count($subjectDetails)>0)
<table id="subjects">
  <tr>
<th>Id</th>
<th>Subject Id</th>
<th>Subject Name</th>
<th>Course Id</th>
<th>Total Mark</th>
  </tr>
  @foreach($subjectDetails as $subject)
    <tr>
<td>{{$subject->id}}</td>
<td>{{$subject->subjectId}}</td>
<td>{{$subject->subjectName}}</td>
<td>{{$subject->courseId}}</td>
<td>{{$subject->totalMark}}</td>
    </tr>
    @endforeach
</table>
    @endif
</div>

    </body>
</html>
