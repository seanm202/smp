<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/Branch/studentAdmission.css') }}" />
    </head>
    <body>
      <h3><a href="dashboard">Go back to dashboard</a></h3>
        <h3><a href="logout">Logout</a></h3>
        <h3 id="addNewStudents"></h3>
        @if($errors->any())
                  {!! implode('', $errors->all('<div>:message</div>')) !!}
              @endif
    <div id="app">
        @include('flash-message')


        @yield('content')
    </div>


    <!-- Scripts -->
    <script src="/js/app.js"></script>
        <h2>Student Admission</h2>
        <h3>Student Profile</h3>
        @if(count($students)>0)
        <h3><a href="#approveApplied">Approve applied students</a></h3>
        @endif
        <div class="studAdmission">
    <div class="addStudentDirectly">
    <h3>Add students</h3>
    {{ Form::open(array('route' => 'addStudentDetails')) }}
    {{Form::label('name', 'Name:')}}
    {{Form::text('name')}}<br><br>
    {{Form::label('email', 'Email:')}}
    {{Form::text('emailId')}}<br><br>
    {{Form::label('password', 'Password:')}}
    {{Form::password('password')}}<br><br>
    {{Form::label('branch', 'Branch:')}}
    {{Form::select('branchId',$branches)}}<br><br>
    {{Form::label('fname', 'Father Name:')}}
    {{Form::text('fname')}}<br><br>
    {{Form::label('mname', 'Mother Name:')}}
    {{Form::text('mname')}}<br><br>
    {{Form::label('Address', 'Address:')}}
    {{Form::text('Address')}}<br><br>
    {{Form::label('contact', 'Contact Number:')}}
    {{Form::number('contactnumber')}}<br><br>
    {{Form::label('course', 'Course:')}}
    {{Form::select('courseId',$courses)}}<br><br>
    <hr>
    <table id="studentQualification">
      <tr>
      <th>Sl.No</th>
      <th>Qualification</th>
      <th>Board/University</th>
      <th>Full Mark</th>
      <th>Secured Mark</th>
    </tr>
    <!-- 10th marks-->
        <tr>
        <td>1</td>
        <td>10th</td>
        <td>{{Form::text('tenthboard')}}</td>
        <td>{{Form::number('tenthtotalmark')}}</td>
        <td>{{Form::number('tenthsecuredmark')}}</td>
        </tr>
        <!-- 12th marks-->
        <tr>
        <td>2</td>
        <td>12th</td>
        <td>{{Form::text('twelfththboard')}}</td>
        <td>{{Form::number('twelfththtotalmark')}}</td>
        <td>{{Form::number('twelfthsecuredmark')}}</td>
        </tr>
        <!-- 13th marks-->
        <tr>
        <td>3</td>
        <td>13th</td>
        <td>{{Form::text('thirteenthboard')}}</td>
        <td>{{Form::number('thirteenththtotalmark')}}</td>
        <td>{{Form::number('thirteenthsecuredmark')}}</td>
        </tr>
        <!-- Other marks-->
        <tr>
        <td>4</td>
        <td>Other</td>
        <td>{{Form::text('otherboard')}}</td>
        <td>{{Form::number('othertotalmark')}}</td>
        <td>{{Form::number('othersecuredmark')}}</td>
        </tr>
    </table>
    <hr>
    {{Form::submit('Submit')}}
  {{ Form::close() }}
  </div>
  
        @if(count($students)==0)
         <h3 style="color:red;">No new applicants.</h3>
          @endif
  @if(count($students)>0) 
  <div id="approveApplied" class="profileForm">
    <h3>Approve applied students</h3>
  @foreach($students as $student)
    <h3><a href="#addNewStudents">Go to top</a></h3>
    <h3 style="#AD2B0F">Token Number : {{$student->userId}}</h3>
    {{ Form::open(array('route' => 'addStudentDetails')) }}
    {{Form::label('id', 'Student Id:')}}
    {{Form::text('studentid',$student->studentId)}}<br><br>
    {{Form::label('name', 'Name:')}}
    {{Form::text('name',$student->name)}}<br><br>
    {{Form::label('email', 'Email:')}}
    {{Form::text('emailId',$student->emailId)}}<br><br>
    {{Form::label('branch', 'Branch:')}}
    {{Form::select('branchId',$branches)}}<br><br>
    {{Form::label('fname', 'Father Name:')}}
    {{Form::text('fname',$student->fname)}}<br><br>
    {{Form::label('mname', 'Mother Name:')}}
    {{Form::text('mname',$student->mname)}}<br><br>
    {{Form::label('Address', 'Address:')}}
    {{Form::text('Address',$student->Address)}}<br><br>
    {{Form::label('contact', 'Contact Number:')}}
    {{Form::number('contactnumber',$student->cnumber)}}<br><br>
    {{Form::label('course', 'Course:')}}
    {{Form::select('courseId',$courses)}}<br><br>
    <hr>
    <table id="studentQualification">
      <tr>
      <th>Sl.No</th>
      <th>Qualification</th>
      <th>Board/University</th>
      <th>Full Mark</th>
      <th>Secured Mark</th>
    </tr>
    <!-- 10th marks-->
        <tr>
        <td>1</td>
        <td>10th</td>
        <td>{{Form::text('tenthboard')}}</td>
        <td>{{Form::number('tenthtotalmark')}}</td>
        <td>{{Form::number('tenthsecuredmark')}}</td>
        </tr>
        <!-- 12th marks-->
        <tr>
        <td>2</td>
        <td>12th</td>
        <td>{{Form::text('twelfththboard')}}</td>
        <td>{{Form::number('twelfththtotalmark')}}</td>
        <td>{{Form::number('twelfthsecuredmark')}}</td>
        </tr>
        <!-- 13th marks-->
        <tr>
        <td>3</td>
        <td>13th</td>
        <td>{{Form::text('thirteenthboard')}}</td>
        <td>{{Form::number('thirteenththtotalmark')}}</td>
        <td>{{Form::number('thirteenthsecuredmark')}}</td>
        </tr>
        <!-- Other marks-->
        <tr>
        <td>4</td>
        <td>Other</td>
        <td>{{Form::text('otherboard')}}</td>
        <td>{{Form::number('othertotalmark')}}</td>
        <td>{{Form::number('othersecuredmark')}}</td>
        </tr>
    </table>
    <hr>
    {{Form::submit('Submit')}}
  {{ Form::close() }}
<hr>
<hr>
@endforeach
</div>
@endif
<h3><a href="#addNewStudents">Go to top</a></h3>
  </div>
    </body>
</html>
