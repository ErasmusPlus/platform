@extends('layouts.dashboard')
@php ( $title='Στοιχεία φοιτητή' )
@php ( $description='')

@section('css')
<style>
.row{
  padding-top:10px;
}

.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}



.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}

</style>

@section('content')
 <!-- Profile Image -->
          <div class="box box-primary ">
            <div class="box-body box-profile">
			<a href="{{route('profile.edit')}}" class="btn btn-success btn-md" role="button">Επεξεργασία</a>
			
		 <div class="row">
			
		
					<img class="profile-user-img img-responsive img-circle img-center" src="https://adminlte.io/themes/AdminLTE/dist/img/user4-128x128.jpg" alt="User profile picture">

		
		
				<!-- Button UploadImage -->
	
			
					<button type="button" class="btn btn-info btn-md center-block" data-toggle="modal" data-target="#myModal">Upload</button>
            	</div>
				<!-- Button UploadImage -->	
				


				

				
			  <h3 class="profile-username text-center">{{ EGuard::user()->fullname }}</h3>

              <p class="text-muted text-center">{{ EGuard::user()->type }}</p>
            </div>


<!-- about me box -->

<div class="box box-primary">
	<div class="box-header with-border">
	<h3 class="box-title">Σχετικά με εμένα: </h3>
	</div>

 <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                 {{EGuard::user()->education}} 
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Περιοχή </strong>

              <p class="text-muted"> -Περιοχή Χρήστη- </p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Γλώσσες </strong>

              <p>
                <span class="label label-danger">Γλώσσα 1</span>
                <span class="label label-success">Γλώσσα 2</span>
                <span class="label label-info">Γλώσσα 3</span>
              </p>

              <hr>

             
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
