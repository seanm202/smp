<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!--Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/Admin/adminDashboard.css') }}" />

    </head>
    <body>
      <h2>Admin Dashboard</h2>
      @foreach($admin as $ad)
      <h3>Welcome {{$ad->name}}</h3>
      <h3>Email Id :{{$ad->emailId}}</h3>
      @endforeach
          <div id="app">
              @include('flash-message')


              @yield('content')
          </div>
          <!-- Scripts -->
          <script src="/js/app.js"></script>
        <h3><a href="logout">Logout</a></h3>
        <div class="detailsSection">
        <div class="facility">
        <h3><a href="getRoles">Assign role to the new aplicants</a></h3>
        <h3><a href="authorizeCertificate">Authorize Certificate</a></h3>
        <h3><a href="AdminReport">Check Report</a></h3>
        </div>
        <div class="crud">
        <h3><a href="AdminBranch">Add/Update branches</a></h3>
        <h3><a href="AdminCourse">Add/Update Courses</a></h3>
        <h3><a href="AdminSubject">Add/Update Subjects</a></h3>
      </div>
          <div class="Approved">
          <h3><a href="appBranches">View Branches</a></h3>
          <h3><a href="appCourses">View Courses</a></h3>
          <h3><a href="appSubjects">View Subjects</a></h3>
          </div>
          </div>
    </body>
</html>
