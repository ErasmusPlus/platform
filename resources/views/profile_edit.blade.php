@extends('layouts.dashboard')
@php ( $title='Επεξεργασία Προφίλ Χρήστη' )

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <div class="panel panel-default">
@if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
	
        <div class="panel-body">
	{{ Form::open(array('url' => '#')) }}
    

	    {{ Form::label('Περιοχή') }}
        {{ Form::text('location', array('class' => 'form-control') ) }}

        {{ Form::label('Γλώσσες') }}
		{{ Form::text('pass', array('class' => 'form-control', 'placeholder' => 'Νέος κωδικός' )) }}
		
		<hr>
		
	
		 {{ Form::submit('Ενημέρωση Προφίλ',array('class' => 'btn btn-primary')) }}	
      <!-- /.box-body -->
    </form>
	
</div>
  </div>
</div>
</div>
@endsection
