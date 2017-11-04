@extends('layouts.dashboard')
@php ( $title='Πανεπιστήμια Erasmus+' )
@php ( $description='Διαχείριση')

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
		{{ Form::open( array('action' => 'Superadmin\UserController@create')) }}
		
		{{ Form::label('Όνομα Χρήστη') }}
        {{ Form::text('name',null,array('class' => 'form-control')) }}

		{{ Form::label('email') }}
        {{ Form::text('email',null,array('class' => 'form-control' , 'type' => 'email')) }}
		
		

		
		{{ Form::label('Ιδιότητα:') }}

		{{ Form::select('role', ['Δοκιμαστικός χρήστης', 'Διαχειριστής Επιπέδου 1', 'Διαχειριστής Επιπέδου 2'],null, array('class' => 'form-control')) }}

		
        {{ Form::label('Κωδικός χρήστη') }}
        {{ Form::password('password',array('class' => 'form-control')) }}

        
		<br>
		{{ Form::submit('Προσθήκη εγγραφής',array('class' => 'btn btn-primary')) }}
		
		   </form>
</div>
  </div>
</div>
</div>
@endsection
