@extends('layouts.dashboard')
@php ( $title='Κατάταξη' )
@php ( $description='Ρυθμίσεις παραμέτρων κατάταξης')
@section('content')
<div class='row'>
  <div class='col-md-12'>
    <div class="panel panel-default">

     <div class="panel-body">
       {{ Form::model( $settings, array('action' => 'Superadmin\RankingController@update')) }}

      <div class='col-md-4'>
       {{Form::label('appl_finaldate', 'Τελική ημερομηνία κατάταξης:')}}
       {{Form::date('appl_finaldate', $appl_finaldate,['class'=>'form-control'])}}

     </div>
     <div class='col-md-4'>
      {{Form::label('appl_status', 'Κατάσταση υποβολής αιτήσεων:')}}
      <br>
      {{Form::radio('appl_status', 'open', false)}}
      {{Form::label('appl_status', 'Ανοιχτές')}}
      &nbsp;
      {{Form::radio('appl_status', 'closed', false)}}
      {{Form::label('appl_status', 'Κλειστές')}}
    </div>
    <div class='col-md-4'>
     {{Form::label('platform_status', 'Κατάσταση πλατφόρμας:')}}
     <br>
     {{Form::radio('platform_status', 'open',false)}}
     {{Form::label('platform_status', 'Είσοδος μόνο σε ακαδημαϊκούς')}}
     &nbsp;
     <br>
     {{Form::radio('platform_status', 'closed',false)}}
     {{Form::label('platform_status', 'Να επιτρέπεται η είσοδος σε όλους')}}
   </div>
   <div class='col-md-12'>
   {{ Form::submit('Ενημέρωση παραμέτρων',array('class' => 'btn btn-success')) }}
 </div>
     </div>

   </div>
 </div>
</div><!-- /.row -->
@endsection
