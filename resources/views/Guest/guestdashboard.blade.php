<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

<!--Styles -->
<!--<link rel="stylesheet" type="text/css" href="{{ asset('/css/Student/dashboard.css') }}" />-->
    </head>
    <body>
<h2>Your account is not yet activated.</h2>
<h2><a href="logout">Logout</a></h2>

    <div id="app">
        @include('flash-message')


        @yield('content')
    </div>


    <!-- Scripts -->
    <script src="/js/app.js"></script>
<div class="appliedFor">
    <h2 style="color:#AD2B0F;">Token Number : {{$studentId}}</h2>
  <h3>Please select the desired role</h3>
  <p>
  {{Form::open(array('route' => 'appliedFor','method'=>'post'))}}
  {{Form::label('role', 'Role :')}}
  {{Form::select('roleId',$roles)}}
  {{Form::hidden('applicantId',$userId)}}
  {{Form::submit('Submit')}}
{{Form::close()}}
</p>
</div>

    </body>
</html>
