@extends('layouts.app')

@section('css')
<style>
body {
    background-image: url("{{asset('img/bg_root.jpg')}}");
    background-size: cover;
    background-repeat: no-repeat;
}

@media ( min-width: 768px ) {
    .grid-divider {
        position: relative;
        padding: 0;
    }
    .grid-divider>[class*='col-'] {
        position: static;
    }
    .grid-divider>[class*='col-']:nth-child(n+2):before {
        content: "";
        border-left: 1px solid #DDD;
        position: absolute;
        top: 0;
        bottom: 0;
    }
    .col-padding {
        padding: 0 15px;
    }
}
</style>
@endsection

@section('content')
<div class="container">


<div class="col-sm-8">
  <div class="col-padding">
    <h3></h3>
    <p></p>
  </div>
</div>
<div class="col-sm-4">
  <div class="col-padding">
    <h3><b>Είσοδος ως </b></h3>
    <a href="{{route('admin_login')}}" class="btn btn-primary btn-block" role="button"><i class="fa fa-user-plus" aria-hidden="true"></i> Ακαδημαϊκός</a>
    <a href="{{route('login')}}" class="btn btn-primary btn-block" role="button"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Φοιτητής</a>
	 <a href="{{route('login')}}" class="btn btn-primary btn-block" role="button"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Μεταπτυχιακός Φοιτητής</a>
 
 </div>
</div>

</div>
@endsection
