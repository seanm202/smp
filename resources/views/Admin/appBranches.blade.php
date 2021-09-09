<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/Admin/appBranches.css') }}" />


    </head>
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
<div class="viewBranches">
     @if(count($branchDetails)==0)
     <h3 style="color:blue;">No active branches.</h3>
     @endif
    @if(count($branchDetails)>0)
<table id="branches">
<tr>
<th>Id</th>
<th>Branch Name</th>
<th>Branchhead name</th>
<th>Branchhead photo</th>
<th>Email Id</th>
<th>Address</th>
<th>Branch Id</th>
<th>Status</th>
<th>Contact Number</th>
</tr>
@foreach($branchDetails as $branch)
<tr>
<td>{{$branch->id}}</td>
<td>{{$branch->branchName}}</td>
<td>{{$branch->name}}</td>
<td><img src="{{asset('storage/'.$branch->image)}}" alt="Image" /></td>
<td>{{$branch->mailId}}</td>
<td>{{$branch->address}}</td>
<td>{{$branch->branchId}}</td>
<td>{{$branch->branchStatus}}</td>
<td>{{$branch->cnumber}}</td>
</tr>
@endforeach
</tabe>
@endif
</div>

    </body>
</html>
