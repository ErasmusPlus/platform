@extends('layouts.dashboard')

@section('content')
<div class='row'>
  <div class='col-md-12'>
  <h2>Welcome {{ Auth::User()->name }}</h2>
  </div>
  <div class='col-md-6'>
   
   
    <!-- Box -->
	@foreach ($news_get as $news)
    <div class="box box-primary">
	
      <div class="box-header with-border">
	  
        <h3 class="box-title">{{ $news->title }} </h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
          <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
	  {{ $news->body }}
      </div><!-- /.box-body -->
  
	</div><!-- /.box -->
   @endforeach

</div><!-- /.row -->
@endsection
