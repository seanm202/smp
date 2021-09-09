<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="{{ asset('/css/Admin/makeAuthorize.css') }}" />
    </head>
    <style>
        
    .action
    {
        display:flex;
        padding:6px;
    }
        .buttonRep
        {
            background-color:#0F8AAD;
            color:white;
        }
        .buttonDel
        {
            background-color:red;
        }
        .actRead
        {
         padding-right:6px;   
        }
        .actDelete
        {
            padding-left:6px;
        }
    </style>
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
      <h2>Create/Read/Edit/Delete Student('s) details</h2>
        @foreach ($students as $student)
              <div class="eachStudent">
                <div class="thePhoto">
                  <div class="withPhoto">
              {{Form::open(array('route' => 'admitStudent'))}}
              {{Form::token()}}
              {{Form::hidden('id', $student->studentId)}}
              {{Form::hidden('name',$student->name)}}
              <table>
                <tr><td>Name :</td><td>{{$student->name}}</td></tr>
                <tr><td>Father's Name :</td><td>{{$student->fname}}</td></tr>
                <tr><td>Mother's Name :</td><td>{{$student->mname}}</td></tr>
                <tr><td>Address :</td><td>{{$student->Address}}</td></tr>
                <tr><td>Contact No. :</td><td>{{$student->cnumber}}</td></tr>
                <tr><td>Mail Id :</td><td>{{$student->emailId}}</td></tr>
                <tr><td>Name of the course :</td><td>{{$student->course}}</td></tr>
                <tr><td>Current Status :</td><td>{{$student->status}}</td></tr>
                <tr><td>Registration Number :</td><td>{{$student->rgdNumber}}</td></tr>
                <tr><td>Roll Number :</td><td>{{$student->rollNumber}}</td></tr>
              </table>
            </div>
              <div class="havingPhoto">
                <img src="{{$student->Image}}"/>
              </div>
            </div>
              <hr>
              <div class="issueButton">
              <div class="qualification">
              <table id="accounts">
                <tr>
                  <th>Qualification</th>
                  <th>Board/University</th>
                  <th>Full Mark</th>
                  <th>Secured Mark</th>
                </tr>
                <tr>
                  <td>10th</td>
                  <td>{{$student->tBUniv}}</td>
                  <td>{{$student->tTotalMark}}</td>
                  <td>{{$student->tMark}}</td>
                </tr>
                <tr>
                  <td>12th</td>
                  <td>{{$student->twBUniv}}</td>
                  <td>{{$student->twTotalMark}}</td>
                  <td>{{$student->twMark}}</td>
                </tr>
                <tr>
                  <td>13th</td>
                  <td>{{$student->thBUniv}}</td>
                  <td>{{$student->thTotalMark}}</td>
                  <td>{{$student->thMark}}</td>
                </tr>
                <tr>
                  <td>Other</td>
                  <td>{{$student->otherBUniv}}</td>
                  <td>{{$student->otherTotalMark}}</td>
                  <td>{{$student->otherMark}}</td>
                </tr>
              </table>
              {{Form::submit('Continue', array('name' => 'status','class' =>'button'))}}
              {{Form::submit('Discontinue', array('name' => 'status','class' =>'buttonDis'))}}
              {{Form::submit('Completed', array('name' => 'status','class' =>'buttonComp'))}}
              {{Form::submit('Terminate', array('name' => 'status','class' =>'buttonTerm'))}}
                    {{ Form::close() }}
                       <div class="action">
                           <div class="actRead">            
{{Form::open(array('route' => 'readReport'))}}
{{Form::hidden('studentId',$student->studentId)}}
{{Form::hidden('courseId',$student->courseId)}}
{{Form::submit('Read Report',array('name' => 'action','class' =>'buttonRep'))}}
{{Form::close()}}  </div>  <div class="actDelete">                
{{Form::open(array('route' => 'deleteStudent'))}}
{{Form::hidden('studentId',$student->studentId)}}
{{Form::hidden('courseId',$student->courseId)}}
{{Form::submit('Delete Student',array('name' => 'action','class' =>'buttonDel'))}}
{{Form::close()}}</div></div> 
                  </div>
                    <hr>
                    <div class="certificateIssue">
                    {{Form::open(array('route' => 'provideProvisionalCertificate'))}}
                    {{Form::token()}}
                    {{Form::hidden('id', $student->studentId)}}
                    {{Form::hidden('name',$student->name)}}
                    {{Form::label('provCertificate','Issue Provisional Certificate :')}}
                    {{Form::submit('Issue', array('class' =>'button'))}}
                    <hr>
                    {{ Form::close() }}
                    {{Form::open(array('route' => 'provideMarkSheetCertificate'))}}
                    {{Form::token()}}
                    {{Form::hidden('id', $student->studentId)}}
                    {{Form::hidden('name',$student->name)}}
                    {{Form::label('markCertificate','Issue Marksheet Certificate :')}}
                    {{Form::submit('Issue', array('class' =>'button'))}}
                    {{ Form::close() }}
                    <hr>
                  </div>
                </div>
      </div>
              @endforeach
    </body>
</html>
