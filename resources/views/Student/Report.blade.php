<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->



    </head>
    <body>
        <h3><a href="logout">Logout</a></h3>
        <h3><a href="dashboard">Go to dashboard</a></h3>
    <div id="app">
        @include('flash-message')


        @yield('content')
    </div>


    <!-- Scripts -->
    <script src="/js/app.js"></script>
      <h2>Student Report</h2>
      <table>
        <tr>
          <th>Name of the student </th>
          <th></th>
        </tr>
        <tr>
          <th>Student Registration Number </th>
        </tr>
          @foreach($students as $student)
        <tr>
          <td>Father's Name </td>
            <td>{{$student->fname}}</td>
        </tr>
        <tr>
          <td>Mother's Name </td>
            <td>{{$student->mname}}</td>
        </tr>
        <tr>
          <td>Center Address</td>
            <td>{{$student->centerAddress}}</td>
        </tr>
        <tr>
          <td>Center Id</td>
            <td>{{$student->centerId}}</td>
        </tr>
        <tr>
          <td>Student Address</td>
            <td>{{$student->address}}</td>
        </tr>
        <tr>
          <td>Course Name</td>
            <td>{{$student->courseName}}</td>
        </tr>
        <tr>
          <td>Registration Number</td>
            <td>{{$student->rgdNumber}}</td>
        </tr>
        <tr>
          <td>Roll Number</td>
            <td>{{$student->rollNumber}}</td>
        </tr>
        <tr>
          <td>Certificate Number</td>
            <td>{{$student->certificateNumber}}</td>
        </tr>
        <tr>
          <td>Course Status</td>
            <td>{{$student->courseStatus}}</td>
        </tr>
        <tr>
          <td><p style="background-color:blue;width=100%;"></p></td>
            <td><p style="background-color:blue;width=100%;"></p></td>
        </tr>
        @endforeach
      </table>
    </body>
</html>
