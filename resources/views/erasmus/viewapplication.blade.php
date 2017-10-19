@extends('layouts.dashboard')
@php ( $title='Αιτήσεις' )
@php ( $description='Οι αιτήσεις σας για το Erasmus+')

@section('content')

<div class='row'>
  <div class='col-md-12'>
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tbody><tr>
                      <th>#</th>
                      <th>Από</th>
                      <th>Πρός (1η επιλογή)</th>
                      <th>Ημερομηνία</th>
                      <th width="80px">Ενέργειες</th>
                    </tr>

                    @foreach($applications as $application)
                    <tr>
                      <td>{{$application->id}}</td>
                      <td>{{$application->depname}}</td>
                      <td>{{$universities[$application->u1_id]}}</td>
                      <td>{{$application->created_at->format('d/m/Y H:i:s')}}</td>
                      <td>
                        <a href="{{route('erasmus.viewappid',$application->id)}}" class="btn btn-primary btn-xs btn-block" role="button">Προβολή</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody></table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->



  </div>
</div>


@endsection
