<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/Branch/examManagement.css') }}" />
        <!-- Styles -->

        <style>
        #students {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        #students td, #students th {
          border: 1px solid #ddd;
          padding: 8px;
        }

        #students tr:nth-child(even){background-color: #f2f2f2;}

        #students tr:hover {background-color: #ddd;}

        #students th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #04AA6D;
          color: white;
        }

        .buttonCalc {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

.buttonCourse{
background-color: #4CAF50; /* Green */
border: none;
color: white;
padding: 15px 32px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
}

        .buttonImage {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}


        .buttonAdd {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}


        .buttonStudent {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

.buttonFile{
background-color: #4CAF50; /* Green */
border: none;
color: white;
padding: 15px 32px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
}
        </style>


    </head>
    <body>
      <h3><a href="dashboard">Go back to dashboard</a></h3>

        @if($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif
    <div id="app">
        @include('flash-message')


        @yield('content')
    </div>


    <!-- Scripts -->
    <script src="/js/app.js"></script>
      <h2>Exam Management</h2>
      <h3>Choose the Student :</h3>
      <table id="students">
        <tr>
        <th>Roll Number</th>
        <th>Registration Number</th>
        <th>Student Name</th>
        <th>Select</th>
      </tr>
      @foreach($students as $student)
      {{Form::open(array('route' => 'getCourses'))}}
      <tr>
        <td>{{$student->rollNumber}}</td>
        <td>{{$student->rgdNumber}}</td>
        <td>{{$student->name}}</td>
      <td>{{Form::hidden('studentId',$student->studentId)}}
      {{Form::submit('Select',array('class' =>'buttonStudent'))}}
      {{Form::close()}}</td>
    </tr>
      @endforeach
      </table>

        @if(isset($courses))
      <h3>Choose the course :</h3>
      <div class="selectCourse">
      {{Form::open(array('route' => 'getSubjects'))}}
      {{Form::select('courseId',$courses)}}
      {{Form::submit('Submit',array('class' =>'buttonCourse'))}}
      {{Form::close()}}</div>
      @endif

      @if(isset($subjects))
        <hr>

    <div id="app">
        @include('flash-message')


        @yield('content')
    </div>


    <!-- Scripts -->
    <script src="/js/app.js"></script>
        <table id="students">
        <tr>
            <th>Subject Name</th>
            <th>Total Mark</th>
            <th>Secured Mark</th>
            <th>Update</th>
         </tr>
        @foreach($subjects as $subject)
            <tr>
         {{ Form::open(array('route' => 'addSubjectMark')) }}
            <td>{{$subject->subjectName}}</td>
            <td>{{Form::label($subject->subjectTotal)}}</td>
            <td>{{Form::number('subjectSecuredMark',$subject->subjectSecuredMark)}}</td>
            {{Form::hidden('subjectId',$subject->subjectId)}}
            {{Form::hidden('studentId',$studentId)}}
            {{Form::hidden('courseId',$courseID)}}
            <td>{{ Form::submit('Submit',array('class' =>'buttonAdd'))}}</td>
          {{ Form::close()}}
        </tr>
      @endforeach
      </table>
<!-- Image Upload-->

    <div class="imageUpload">
        {{Form::open(array('route' => 'addStudentPhoto','method' => 'put','files' => 'true','enctype'=>'multipart/form-data'))}}
      {{Form::token()}}
      {{Form::hidden('studentId',$studentId)}}
      {{Form::label('image', 'Add Image')}}<br>
      {{Form::file('image',array('class' =>'buttonFile'))}}<br><br>
      {{Form::submit('Upload',array('class' =>'buttonImage'))}}<br>
            {{ Form::close() }}
            </div>
<!-- Image Upload-->
        <div class="calculateTotal">
          <h3>To calculate or update total marks for this course, press the submit button below</h3>
      <p>{{ Form::open(array('route' => 'calcCourseTotal')) }}
          {{Form::hidden('courseId',$courseID)}}
          {{Form::hidden('studentId',$studentId)}}
          {{ Form::submit('Calculate',array('class' =>'buttonCalc'))}}
        {{ Form::close()}}</p>
    @endif
  </div>
    </body>
</html>
