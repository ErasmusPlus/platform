@extends('layouts.dashboard')
@php ( $title='ECTS' )
@php ( $description='View ECTS')
@section('content')
<div class='row'>
{{$stdata->ects_passed_total}}

</div><!-- /.row -->
@endsection
