@extends('layouts.dashboard')
@php ( $title='Χρήστες Erasmus+' )
@php ( $description='Διαχείριση Χρηστών Πλατφόρμας')

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
		{{ Form::model( $user, array('action' => 'Superadmin\UserController@update')) }}
		{{ csrf_field() }}
		{{ Form::hidden('id', $user->id) }}

	    {{ Form::label('Όνομα Χρήστη') }}
        {{ Form::text('name', $user->name, array('class' => 'form-control') ) }}

        {{ Form::label('Κωδικός χρήστη') }}
		{{ Form::password('pass', array('class' => 'form-control', 'placeholder' => 'Νέος κωδικός' )) }}
		
		<hr>
		
	
		 {{ Form::submit('Ενημέρωση εγγραφής',array('class' => 'btn btn-primary')) }}
		<a href="{{route('superadmin.users.delete',$user->id)}}" class="btn btn-danger btn-md" role="button">Διαγραφή</a>
	
	
    
	

      <!-- /.box-body -->
    </form>
	
</div>
  </div>
</div>
</div>
@endsection
