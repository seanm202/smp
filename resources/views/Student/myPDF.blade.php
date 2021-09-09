<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
</head>
<body>
    <p>{{$title}}</p>
    <p>{{ $date }}</p>
  
    <p>{{ $name }}</p>
    <p>{{ $rgdNumber }}</p>
    <p>{{ $rollNumber }}</p>
    <p>{{ $course }}</p>
    <p>{{ $fname }}</p>
    <p>{{ $mname }}</p>
    <p>{{ $image }}</p>
    <p>{{ $centerId }}</p>
    @if(isset($centerAddress))
    <p>Center Address : {{ $centerAddress }}</p>
    @endif<p>{{ $startDate }}</p>
    <p>{{ $endDate }}</p>
    <p>{{ $grade }}</p>
    <p>{{ $certificateNo }}</p>
</body>
</html
