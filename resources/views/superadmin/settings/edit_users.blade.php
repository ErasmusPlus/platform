@extends('layouts.dashboard')
@php ( $title='Πανεπιστήμια Erasmus+' )
@php ( $description='Διαχείριση')

@section('content')

  <div class='col-md-12'>
    <div class="panel panel-default">

        <div class="panel-body">
    {{ Form::model( $user, array('action' => 'Superadmin\UserController@update')) }}
	
	
		{{ Form::hidden('id', $user->id) }}
       

        {{ Form::label('Όνομα χρήστη') }}
        {{ Form::text('name', $user->name ) }}

        {{ Form::label('Κωδικός Πρόσβασης') }}
		{{ Form::text('pass', 'enter new password') }}

   

       
      {{ Form::submit('Ενημέρωση εγγραφής',array('class' => 'btn btn-primary')) }}

      <!-- /.box-body -->
	  </form>

</div>
</div>
</div>  

@endsection
