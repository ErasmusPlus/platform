@extends('layouts.dashboard')
@php ( $title='Home' )
@php ( $description='Landing page')

@section('content')
<div class='row'>
  <div class='col-md-12'>
  <h2>Welcome {{ Auth::User()->name }}
  <!-- Button UploadImage -->

					<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Add news</button>

				<!-- Button UploadImage -->
  </h2>


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

<div class='col-md-6'>

</div>


  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add News</h4>
        </div>
        <div class="modal-body">
		{!! Form::open() !!}
				<div class="form-group">
					{!! Form::label('title','Title:') !!}
					{!! Form::text('title',null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
				{!! Form::label('body','Body:') !!}
				{!! Form::textarea('body',null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
				{!! Form::submit('Add',['class' => 'btn btn-primary form-control']) !!}
				</div>

		{!! Form::close() !!}
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>


@endsection
