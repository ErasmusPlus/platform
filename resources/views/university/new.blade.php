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
    {{ Form::open( array('action' => 'UniversityController@create')) }}



        {{ Form::label('Όνομα πανεπιστημίου') }}
        {{ Form::text('name',null,array('class' => 'form-control')) }}

        {{ Form::label('Μέγιστος αριθμός εισακτέων') }}
        {{ Form::number('cap',null,array('class' => 'form-control')) }}

        {{ Form::label('Γλώσσα') }}
        {{ Form::select('lang_id',$languages,null,array('class' => 'form-control')) }}



        <br>
      {{ Form::submit('Προσθήκη εγγραφής',array('class' => 'btn btn-primary')) }}

      <!-- /.box-body -->
    </form>
</div>
  </div>
</div>
</div>
@endsection
