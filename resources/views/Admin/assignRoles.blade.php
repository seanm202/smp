<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

                <!--Styles -->
                <link rel="stylesheet" type="text/css" href="{{ asset('/css/Admin/assignRoles.css') }}" />

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
      <h2>Approve accounts</h2>
      
    @if(count($applicants)==0)
         <h3 style="color:red;">No new entry.</h3>
          @endif
           @if(count($applicants)>0)
      <div class="assignRole">
        <table id="accounts">
            <tr>
                <th>Token Number</th>
            <th>Name</th>
            <th>Email</th>
            <th>Applied for</th>
            <th>Approve as</th>
            <th>Delete</th>
            </tr>
            @foreach($applicants as $applicant)
            <tr>
            <td>{{$applicant->id}}</td>
            <td>{{$applicant->name}}</td>
            <td>{{$applicant->email}}</td>
            <td>{{$applicant->appliedAs}}</td>
            <td> {{Form::open(array('route' => 'assignRole','method'=>'post'))}}
        {{Form::label('role', 'Role :')}}
        {{Form::select('roleId',$roles)}}<br><br>
        {{Form::hidden('id',$applicant->id)}}
        {{Form::hidden('userId',$applicant->id)}}
        {{Form::hidden('userName',$applicant->name)}}
        {{Form::hidden('userEmail',$applicant->email)}}
        {{Form::submit('Accept/Assign Role', array('class' =>'button'))}}
      {{Form::close()}}</td>
      <td>{{Form::open(array('route' => 'deleteApplicant','method'=>'post','class' => 'buttonDelete'))}}
  {{Form::hidden('id',$applicant->id)}}
  {{Form::submit('Delete', array('class' =>'button'))}}
{{Form::close()}}</td>
            </tr>
            @endforeach
        </table>
      </div>
          @endif
    </body>
</html>
