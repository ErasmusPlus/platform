@extends('layouts.dashboard')
@php ( $title='Πανεπιστήμια Erasmus+' )
@php ( $description='Διαχείριση')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <div class='col-md-12'>
    {{ Form::open( array('action' => 'UniversityController@create')) }}



        {{ Form::label('Όνομα πανεπιστημίου') }}
        {{ Form::text('name',null,array('class' => 'form-control')) }}





        {{ Form::label('Γλώσσα') }}
        {{ Form::select('lang_id',$languages,null,array('class' => 'form-control')) }}



        <br>
      {{ Form::submit('Προσθήκη εγγραφής',array('class' => 'btn btn-primary')) }}

      <!-- /.box-body -->
    </form>
</div>
  </div>
</div>
@endsection
