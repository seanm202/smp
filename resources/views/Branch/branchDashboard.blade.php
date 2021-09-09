<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/Branch/branchDashboard.css') }}" />

    </head>
    <body>
      <h2>Branch Dashboard</h2>
      <h3>Welcome</h3>
      <div id="app">
        @include('flash-message')


        @yield('content')
    </div>
        <div><h3><a href="logout">Logout</a></h3>
         


    <!-- Scripts -->
    <script src="/js/app.js"></script>
          <h3><a href="getStudentDetails">Add student</a></h3>
            <h3><a href="{{route('manageExam')}}">Manage Exam</a></h3>
              <h3><a href="genReport">Generate Report</a></h3></div>
      <div class="branchOwnerDetails">
        @foreach($branchOwner as $bow)
        <div>
        <img src="{{asset('storage/'.$bow->image)}}" alt="{{$bow->name}}" />
        </div>
      <div class="withImage" style="display:flex;"><h3>Name: {{$bow->name}}</h3> <img src="{{asset('storage/'.$bow->image)}}" alt="{{$bow->name}}" /> </div>
      <h3>Contact Number: {{$bow->cnumber}}</h3>
      <h3>Mail Id: {{$bow->mailId}}</h3>
      <h3>Branch Id: {{$bow->branchId}}</h3>
      <h3>Address: {{$bow->address}}</h3>
        @endforeach
    </div>
    <!--
    <div class="updatePassword">
      <h2>Change password</h2>
      {{Form::open(array('action' => 'LoginController@updatePassword','method'=>'post'))}}
      {{Form::label('password', 'New Password')}}
      {{Form::password('password')}}
      {{Form::submit('Update')}}
    {{Form::close()}}
  </div>
-->
    </body>
</html>
