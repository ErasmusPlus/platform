@extends('layouts.dashboard')
@php ( $title='Χρήστες' )
@php ( $description='Διαχείριση Χρηστών Πλατφόρμας')
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
      			<a class="btn btn-primary" href="#" role="button"><i class="fa fa-plus"></i> Νέα εγγραφή</a>
      		  </div>
      		  <div class="col-xs-6">

      		  </div>


      		  <div class="col-xs-3">
      				<div class="pull-right">
      				<a class="btn btn-primary" href="{{route('superadmin.settings.users_index')}}" role="button"><i class='fa fa-refresh'></i></a>
              </div>
      		  </div>
      		</div>
      		  </div>
          <div style="padding:0px!important" class="panel-body">

        <div class="table-responsive">
            <table class="table table-condensed table-striped table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>ΟΝΟΜΑ</th>
                        <th>EMAIL</th>
                        <th>ΙΔΙΟΤΗΤΑ</th>
                        <th>ΠΕΡΙΓΡΑΦΗ</th>
                        <th>ΤΕΛ. ΣΥΝΔΕΣΗ</th>
                        <th class="text-center">ΠΡΟΣΒΑΣΗ</th>
                        <th class="text-center">ΕΝΕΡΓΕΙΕΣ</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    <?php
                      $now =\Carbon\Carbon::now('Europe/Athens');
                      $lastseen = \Carbon\Carbon::parse($user->lastseen)->timezone('Europe/Athens');
                      $diff = $now->diffInSeconds($lastseen);
                      $ls = 0;
                      if($user->lastseen == 0) $ls =1;
                     ?>

                    @if($diff < 20 && $ls!=1)
                    <tr style="background-color: rgba(0,255,0,.2);">
                    @else
                    <tr>
                    @endif

                        <td>{{str_pad($user->id, 5, "0", STR_PAD_LEFT)}}</td>
                        <td><a href="{{route('profile',$user->id)}}">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>
                          @if($user->role == 1)
                          {{  "Δοκιμαστικός χρήστης"}}
                          @elseif($user->role == 2)
                          {{  "Διαχειριστής Επιπέδου 1"}}
                          @elseif($user->role == 3)
                          {{  "Διαχειριστής Επιπέδου 2"}}
                          @endif
                        </td>
                        <td>
                          @if($user->role == 1)
                          {{  "Χρήστης χωρίς πιστοποίηση CAS"}}
                          @elseif($user->role == 2)
                          {{  "Διαχειριστής Αιτήσεων"}}
                          @elseif($user->role == 3)
                          {{  "Διαχειριστής Συστήματος"}}
                          @endif
                        </td>


                        @if(!$ls && $diff>20)
                        <td>{{\Carbon\Carbon::parse($user->lastseen)->timezone('Europe/Athens')->format('d/m/Y H:i')}}</td>
                        @elseif(!$ls)
                        <td>ΣΕ ΣΥΝΔΕΣΗ</td>
                        @else
                        <td>ΠΟΤΕ</td>
                        @endif

                        <td>
                          <center>
                          @if($user->status != 3)
                          <span style="width:100%" class="label label-success">ΕΝΕΡΓΗ</span>
                          @else
                          <span style="width:100%" class="label label-danger">ΜΗ ΕΝΕΡΓΗ</span>
                          @endif
                        </center>
                        </td>
                        <td width="80px">

                          <a class="btn btn-default btn-xs" href="{{route('superadmin.settings.edit_users', $user->id )}}" role="button">Επεξεργασία</a>

                        </td>
                    </tr>
                    @empty
                        <tr>
                          <td colspan="7">
                          Δεν υπάρχουν εγγραφές
                        </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
            <div style="padding-top:5px;padding-bottom:0px" class="panel-footer">
                <div style='padding-left:10px;padding-right:5px;padding-bottom:0px' class="row">
                   <div class="pull-left">
                       <h5>Σελίδα {!! $users->currentPage() !!} ({!!  $users->count()!!} από {!! $users->total()!!} εγγραφές)</h5>
                   </div>

                   <div class="pull-right" style="">
                     {!! $users->appends(Request::only('search'))->links() !!}
                   </div>
                 </div>
             </div>
        </div>

    </div>

  </div>
</div><!-- /.row -->
@endsection
