@extends('layouts.dashboard')
@php ( $title='������������ Erasmus+' )
@php ( $description='����������')

@section('content')

  <div class='col-md-12'>
    <div class="panel panel-default">

        <div class="panel-body">
    {{ Form::model( $user, array('action' => 'Superadmin\UserController@update')) }}
	
	
		{{ Form::hidden('id', $user->id) }}
       

        {{ Form::label('����� ������') }}
        {{ Form::text('name', $user->name ) }}

        {{ Form::label('������� ���������') }}
		{{ Form::text('pass', 'enter new password') }}

   

       
      {{ Form::submit('��������� ��������',array('class' => 'btn btn-primary')) }}

      <!-- /.box-body -->
	  </form>

</div>
</div>
</div>  

@endsection
