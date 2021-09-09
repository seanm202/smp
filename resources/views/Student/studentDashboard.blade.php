<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

<!--Styles -->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/Student/dashboard.css') }}" />
    </head>
    <body>
      <div class="log">
        <h3><a href="logout">Logout</a></h3>
      </div>
      <div class="studentDashboardDetails">
    
         @foreach($students as $det)
            <img src="{{asset('storage/'.$det->Image)}}" alt="Image" />
          <h3>Welcome {{$det->name}}</h3>
          @endforeach  
             </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
      <div class="All">
      <div class="start">
    <h3>Student Profile Page</h3>
    </div>
      <div id="app" style="color:red;background-color:grey;">
       @include('flash-message')


       @yield('content')
   </div>
      <hr>
      <div class="Attr">
      <div class="leftsAttributes">

      <div class="stuDownload">
        <h3><a href="viewPro">View provisional Certificate</a></h3>
        <h3><a href="viewMark">View MarkSheet Certificate</a></h3>
        <h3><a href="downloadPro">Download provisional Certificate</a></h3>
        <h3><a href="downloadMark">Download MarkSheet Certificate</a></h3>
      </div>
    </div>

      <div class="studentPofile">
        @foreach($students as $student)
            <div class="sideLine">
        <div class="vl"></div><h3 style="padding-right:200px;">Name : {{$student->name}}</h3><div class="imagePos"><img src="{{asset('storage/'.$student->Image)}}" alt="image" title="">
        </div>
        <hr>
        <br>
<div class="sideLine">
<div class="vl"></div><h3>Roll Number : {{$student->rollNumber}}</h3>
</div>
        <hr>
        <br>
<div class="sideLine">
<div class="vl"></div><h3>Registration Number : {{$student->rgdNumber}}</h3>
</div>
        <hr>
        <br>
<div class="sideLine">
<div class="vl"></div><h3>Address : {{$student->Address}}</h3>
</div>
        <hr>
        <br>

@if(isset($studentCourses))
  <div class="sideLine">
    <div class="vl"></div>
    <h3>Course(s) List : </h3>
    @foreach($studentCourses as $stuCourse)
<h3>{{$stuCourse->course}}</h3>
  @endforeach
</div>
  @endif
    @endforeach
        <hr>
      </div>
    </div>
  </div>
    </body>
</html>
