@extends('layouts.dashboard')
@php ( $title='Πανεπιστήμια Erasmus+' )
@php ( $description='Διαχείριση')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <div class='col-md-12'>
    {{ Form::model( $university, array('action' => 'UniversityController@update')) }}

        {{ Form::hidden('id', $university->id) }}

        {{ Form::label('Όνομα πανεπιστημίου') }}
        {{ Form::text('name',null,array('class' => 'form-control')) }}

        {{ Form::label('Μέγιστος αριθμός εισακτέων') }}
        {{ Form::number('cap',null,array('class' => 'form-control')) }}

        {{ Form::label('Γλώσσα') }}
        {{ Form::select('lang_id',$languages,$university->lang_id,array('class' => 'form-control')) }}
        <br>
        {!! Form::checkbox('active') !!}
        {!! Form::label('active','Ενεργό πανεπιστήμιο') !!}

        <hr>
      {{ Form::submit('Ενημέρωση εγγραφής',array('class' => 'btn btn-primary')) }}

      <!-- /.box-body -->
    </form>
</div>
  </div>
</div>
@endsection
