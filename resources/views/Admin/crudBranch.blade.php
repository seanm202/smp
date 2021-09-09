<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/Admin/crudBranch.css') }}" />
    </head>
    <body>
      <div class="first" id="upTop">
        <h3><a href="logout" id="fl">Logout</a></h3>
        <h3><a href="/dashboard" id="fl">Go to dashboard</a></h3>
        <h3><a href="#addbranch" id="fl">Add</a></h3>
        <h3><a href="#suspendbranch" id="fl">Suspend</a></h3>
        <h3><a href="#reactivatebranch" id="fl">Reactivate</a></h3>
        <h3><a href="#deletebranch" id="fl">Delete</a></h3></div>
        @if($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif
    <div class="addBranch">
        <div class="addNBranch">
        <h3>Newly applied branches</h3>
      @foreach($branchDetails as $branchdet)
        <table>
          <tr><th>{{Form::open(array('route' => 'addBranch','method'=>'post'))}}</th></tr>
          <tr>{{Form::token()}}
            <td>Token Number :</td><td>{{$branchdet->userId}}</td></tr><br>
          <tr>
            <td>{{Form::label('owner name', 'Branch name :')}}</td><td>{{Form::text('branchName',$branchdet->branchName)}}</td></tr><br>
            <tr>
            <td>{{Form::label('owner name', 'Branch head name :')}}</td><td>{{Form::text('branchheadName',$branchdet->name)}}{{Form::hidden('id',$branchdet->id)}}</td></tr><br>
            <tr>
            <td>  {{Form::label('cnumber', 'Contact Number :')}}</td><td>{{Form::number('cnumber',$branchdet->cnumber)}}</td></tr><br>
            <tr>
            <td>{{Form::label('email', 'Branch Email Id :')}}</td><td>{{Form::email('branchemail',$branchdet->mailId)}}</td></tr><br>
            <tr>
            <td>  {{Form::label('branchId', 'BranchId :')}}</td><td>{{Form::number('branchId',$branchdet->branchId)}}</td></tr><br>
            <tr>
            <td>{{Form::label('branchAddress', 'Branch Address :')}}</td><td>{{Form::text('branchAddress',$branchdet->address)}}</td></tr><br>
          </tr></table><br>{{Form::submit('Add')}}
            {{Form::close()}}
            <div>
            {{Form::open(array('method' => 'put','route' => 'provideAdminImage','files' => 'true','enctype'=>'multipart/form-data'))}}
            {{Form::token()}}
              {{Form::file('file')}}{{Form::hidden('branchId',$branchdet->branchId)}}
              {{Form::submit('Upload')}}
            {{ Form::close() }}</div>
            @endforeach
          </div>
          <div class="addNewBranch">
          <div>
            <h3>Add branch directly</h3>
          <table>
            <tr><th>{{Form::open(array('route' => 'addBranch','method'=>'post'))}}</th></tr>
            <tr>{{Form::token()}}
              <td>{{Form::label('owner name', 'Branch name :')}}</td><td>{{Form::text('branchName')}}</td></tr><br>
              <tr>
              <td>{{Form::label('owner name', 'Branch head name :')}}</td><td>{{Form::text('branchheadName')}}{{Form::hidden('id')}}</td></tr><br>
              <tr>
              <td>  {{Form::label('cnumber', 'Contact Number :')}}</td><td>{{Form::number('cnumber')}}</td></tr><br>
              <tr>
              <td>{{Form::label('email', 'Branch Email Id :')}}</td><td>{{Form::email('branchemail')}}</td></tr><br>
            <tr>
            <td>{{Form::label('password', 'Password :')}}</td><td>{{Form::password('password')}}</td></tr><br>
              <tr>
              <td>  {{Form::label('branchId', 'BranchId :')}}</td><td>{{Form::number('branchId')}}</td></tr><br>
              <tr>
              <td>{{Form::label('branchAddress', 'Branch Address :')}}</td><td>{{Form::text('branchAddress')}}</td></tr><br>
            </tr></table><br>{{Form::submit('Add')}}
              {{Form::close()}}
            </div>
              <div>
              {{Form::open(array('method' => 'put','route' => 'provideAdminImage','files' => 'true','enctype'=>'multipart/form-data'))}}
              {{Form::token()}}
                {{Form::file('file')}}{{Form::hidden('branchId')}}
                {{Form::submit('Upload')}}
              {{ Form::close() }}</div>
            </div>
           </div>
      <hr>
    <hr>
    <div class="branchActions">
    <div id="suspendbranch">
      <h2>Suspend Branch</h2>
      {{Form::open(array('route' => 'suspendBranch'))}}{{Form::token()}}
      {{Form::select('branchId', $activeBranch)}}
      {{Form::submit('Suspend')}}
    {{Form::close()}}
    <h3><a href="#upTop">Go Up</a></h3>
    </div>
    <div class="reactivateBranch" id="reactivatebranch">
      <h2>Reactivate Branch</h2>
      {{Form::open(array('route' => 'reactivateBranch'))}}{{Form::token()}}
      {{Form::select('branchId', $reactivateBranch)}}
      {{Form::submit('Reactivate')}}
    {{Form::close()}}

    </div>
    <div class="deleteBranch" id="deletebranch">
      <h2>Delete Branch</h2>
      {{Form::open(array('route' => 'deleteBranch'))}}{{Form::token()}}
      {{Form::select('branchId', $branch)}}
      {{Form::submit('Delete')}}
    {{Form::close()}}
    </div>
    </div>
    </body>
</html>
