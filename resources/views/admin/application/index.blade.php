@extends('layouts.dashboard')
@php ( $title='Αιτήσεις' )
@php ( $description='Λίστα αιτήσεων')
@section('content')

<div class='row'>
  <div class='col-md-12'>
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tbody><tr>
                      <th>#</th>
                      <th>Τμήμα</th>
                      <th>Ονοματεπώνυμο</th>
                      <th>ΑΕΜ</th>
                      <th>Ημερομηνία</th>
                      <th width="80px">Ενέργειες</th>
                    </tr>

                    @forelse($applications as $application)
                    <tr>
                      <td>{{$application->id}}</td>
                      <td>{{$application->depname}}</td>
                      <td>{{$application->name_el}} {{$application->surname_el}}</td>
                      <td>{{$application->spec_aem}}</td>
                      <td>{{$application->created_at->format('d/m/Y H:i:s')}}</td>
                      <td>
                        <a href="{{route('erasmus.viewappid',$application->id)}}" class="btn btn-primary btn-xs btn-block" role="button">Προβολή</a>
                      </td>
                    </tr>
                    @empty
                    <tr><td colspan=4>Δεν βρέθηκαν αιτήσεις</td></tr>
                    @endforelse
                  </tbody></table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->



  </div>
</div>


@endsection
