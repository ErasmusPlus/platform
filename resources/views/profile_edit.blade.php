@extends('layouts.dashboard')
@php ( $title='Επεξεργασία Προφίλ Χρήστη' )

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <div class="panel panel-default">

	
        <div class="panel-body">
	{{ Form::open() }}
    

	    {{ Form::label('Περιοχή') }}
        {{ Form::text('location', array('class' => 'form-control') ) }}

        {{ Form::label('Γλώσσες') }}
		{{ Form::text('pass', array('class' => 'form-control', 'placeholder' => 'Νέος κωδικός' )) }}
		
		<hr>
		
	
		
      <!-- /.box-body -->
    </form>
	
</div>
  </div>
</div>
</div>
@endsection
