@if ($message = Session::get('success'))
<div class="alert alert-success alert-block"  data-closable>
    <!-- <button type="button" class="close" data-dismiss="alert">×</button> -->
    <h3 style="color:green;"><strong>{{ $message }}</strong></h3>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <!-- <button type="button" class="close" data-dismiss="alert">×</button> -->
    <h3 style="color:red;"><strong>{{ $message }}</strong></h3>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
  <!--   <button type="button" class="close" data-dismiss="alert">×</button>-->
    <h3 style="color:orange;"><strong>{{ $message }}</strong></h3>
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
  <!--   <button type="button" class="close" data-dismiss="alert">×</button>-->
    <h3 style="color:blue;"><strong>{{ $message }}</strong></h3>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
  <!--   <button type="button" class="close" data-dismiss="alert">×</button>-->
    Please check the form below for errors
</div>
@endif
