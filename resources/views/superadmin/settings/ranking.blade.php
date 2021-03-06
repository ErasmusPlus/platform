@extends('layouts.dashboard')
@php ( $title='Κατάταξη' )
@php ( $description='Ρυθμίσεις παραμέτρων κατάταξης')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />
@endsection

@section('js')
<script src="{{asset('js/moment.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker({
            defaultDate: '{{$appl_finaldate}}',
            format: 'DD/MM/YYYY H:mm',
        });
    });
</script>


@endsection

@section('content')

@include('flash::message')

<div class='row'>
  <div class='col-md-12'>
    <div class="panel panel-default">

     <div class="panel-body">
       {{ Form::model( $settings, array('action' => 'Superadmin\RankingController@update','onsubmit' => 'return confirm("Θέλετε σίγουρα να αποθηκεύσετε τις νέες παραμέτρους;")')) }}

      <div class='col-md-4'>
       {{Form::label('appl_finaldate', 'Τελική ημερομηνία κατάταξης:')}}




            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input name='appl_finaldate' type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                    </span>
                </div>
            </div>




     </div>
     <div class='col-md-4'>
      {{Form::label('appl_status', 'Κατάσταση υποβολής αιτήσεων:')}}
      <br>
      @if($appl_status=='open')

      {{Form::radio('appl_status', 'open', true)}}
      {{Form::label('appl_status', 'Ανοιχτές')}}
      &nbsp;
      {{Form::radio('appl_status', 'closed', false)}}
      {{Form::label('appl_status', 'Κλειστές')}}
      @else
      {{Form::radio('appl_status', 'open', false)}}
      {{Form::label('appl_status', 'Ανοιχτές')}}
      &nbsp;
      {{Form::radio('appl_status', 'closed', true)}}
      {{Form::label('appl_status', 'Κλειστές')}}
      @endif
    </div>


    <div class='col-md-4'>
      @if($platform_status=='open')
     {{Form::label('platform_status', 'Κατάσταση πλατφόρμας:')}}
     <br>
     {{Form::radio('platform_status', 'open',true)}}
     {{Form::label('platform_status', 'Είσοδος μόνο σε ακαδημαϊκούς')}}
     &nbsp;
     <br>
     {{Form::radio('platform_status', 'closed',false)}}
     {{Form::label('platform_status', 'Να επιτρέπεται η είσοδος σε όλους')}}
     @else
     {{Form::label('platform_status', 'Κατάσταση πλατφόρμας:')}}
     <br>
     {{Form::radio('platform_status', 'open',false)}}
     {{Form::label('platform_status', 'Είσοδος μόνο σε ακαδημαϊκούς')}}
     &nbsp;
     <br>
     {{Form::radio('platform_status', 'closed',true)}}
     {{Form::label('platform_status', 'Να επιτρέπεται η είσοδος σε όλους')}}

     @endif
   </div>
   <div class='col-md-12'>
   {{ Form::submit('Ενημέρωση παραμέτρων',array('class' => 'btn btn-success')) }}
 </div>
     </div>

   </div>
 </div>
</div><!-- /.row -->
@endsection
