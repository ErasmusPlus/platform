@extends('layouts.dashboard')
@php ( $title='Στοιχεία φοιτητή' )
@php ( $description='')
@section('content')
 <!-- Profile Image -->
          <div class="box box-primary ">
            <div class="box-body box-profile">
			
			
		

				<!-- 	<img class="profile-user-img img-responsive img-circle img-center" src="{{ Auth::User()->photo }}" alt="User profile picture"> -->

					
				<!-- Button UploadImage -->
						
					<button type="button" class="btn-custom btn-info btn-lg" data-toggle="modal" data-target="#myModal">Upload</button>
            	
				<!-- Button UploadImage -->	
				

				

				
			  <h3 class="profile-username text-center">{{ EGuard::user()->fullname }}</h3>

              <p class="text-muted text-center">{{ EGuard::user()->education }}</p>
            </div>


<!-- about me box -->

<div class="box box-primary">
	<div class="box-header with-border">
	<h3 class="box-title">About Me </h3>
	</div>

 <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                {{ EGuard::user()->education }}
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted"> Kozani </p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
          </div>
		  
		  				 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload image</h4>
        </div>
        <div class="modal-body">
          <p>Image path:</p>
		  {!! Form::open(array('url'=>'/upload','method'=>'POST', 'files'=>true)) !!}
		   <h6>{!! Form::file('image') !!} </h6>
        </div>
        <div class="modal-footer">
		{!! Form::submit('Upload File'); !!}
        </div>
      </div>
    </div>
  </div>
</div>

 <!-- Modal -->
		  
@endsection
