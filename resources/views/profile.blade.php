@extends('layouts.dashboard')

@section('content')
{{ $page_title='' }}
 <!-- Profile Image -->
          <div class="box box-primary ">
            <div class="box-body box-profile">

              <img class="profile-user-img img-responsive img-circle img-center" src="https://cdn4.iconfinder.com/data/icons/business-bicolor-1/512/checklist-512.png" alt="User profile picture">

              <h3 class="profile-username text-center">{{ Auth::User()->name }}</h3>

              <p class="text-muted text-center">{{ Auth::User()->education }}</p>
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
                {{ Auth::User()->education }}
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">{{ Auth::User()->location }}</p>

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
@endsection
