@extends('layouts.dashboard')
@php ( $title='Πανεπιστήμια Erasmus' )
@php ( $description='Διαχείριση Ιδρυμάτων Erasmus')

@section('content')
<div class='row'>
  <div class="container-fluid">
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))

          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
          @endif
        @endforeach
      </div> <!-- end .flash-message -->
      <div style="margin-bottom:0px" class="panel panel-default">

        <div class="panel-heading">
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-xs-3">
            <a class="btn btn-primary" href="{{route('admin.university.new')}}" role="button"><i class="fa fa-plus"></i> Νέα εγγραφή</a>
            </div>
            <div class="col-xs-6">

            </div>


            <div class="col-xs-3">
              <div class="pull-right">
              <a class="btn btn-primary" href="{{route('admin.university.jsonget')}}" role="button"><i class='fa fa-refresh'></i></a>
              </div>
            </div>
          </div>
            </div>
          <div style="padding:0px!important" class="panel-body">

        <div class="table-responsive">
            <table class="table table-condensed table-striped table-hover">
                    <tbody><tr>
                      <th></th>
                      <th>Όνομα</th>
                      <th>Τμήμα</th>
					  <th>Γλώσσα</th>
                      <th>Ενεργό</th>
                      <th>Εισακτέοι</th>
                      <th>Ημ/νία</th>
                      <th width="160px">Ενέργειες</th>
                    </tr>

                    @foreach($universities as $university)
                    <tr>
                      <td>{{$university->id}}</td>
                      <td>{{$university->name}}</td>
                      <td>{{$university->tmhma}}</td>
					  <td>					  
						
					 @if( isset($languages[$university->lang_id]) )
					  {{ $languages[$university->lang_id] }} 
					  @endif
				
					  </td>
                      <td><span class="label label-success">NAI</span></td>
                      <td>{{$university->cap}}</td>
                      <td>{{$university->updated_at->format('d/m/Y H:i:s')}}</td>
                      <td>
                        <a href="{{route('admin.university.edit',$university->id)}}" class="btn btn-primary btn-xs" role="button">Επεξεργασία</a>
                        <a href="{{route('admin.university.delete',$university->id)}}" class="btn btn-danger btn-xs" role="button">Διαγραφή</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody></table>
                  <div style="padding-top:5px;padding-bottom:0px" class="panel-footer">
                      <div style='padding-left:10px;padding-right:5px;padding-bottom:0px' class="row">
                         <div class="pull-left">
                             <h5>Σελίδα {!! $universities->currentPage() !!} ({!!  $universities->count()!!} από {!! $universities->total()!!} εγγραφές)</h5>
                         </div>

                         <div class="pull-right" style="">
                           {!! $universities->appends(Request::only('search'))->links() !!}
                         </div>
                       </div>
                   </div>



  </div>
</div>
@endsection
