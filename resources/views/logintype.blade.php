@extends('layouts.app')

@section('css')
<style>
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
  <div class="page-header">
    <h3></h3>
</div>
<div class="row grid-divider">
<div class="col-sm-8">
  <div class="col-padding">
    <h3></h3>
    <p>[[ERASMUS LOGO]]</p>
  </div>
</div>
<div class="col-sm-4">
  <div class="col-padding">
    <h3>Είσοδος ως: </h3>
    <a href="{{route('admin_login')}}" class="btn btn-info btn-block" role="button">Ακαδημαϊκός</a>
    <a href="{{route('login')}}" class="btn btn-info btn-block" role="button">Φοιτητής</a>
  </div>
</div>
</div>
</div>
@endsection
