@extends('layouts.dashboard')
@php ( $title='Κατάταξη' )
@php ( $description='Λίστα αποτελέσμάτων κατάταξης υποψηφίων')

@section('content')

<div class='row'>
  <div class='col-md-12'>
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Αποτελέσματα Κατάταξης υποψηφίων {{date('Y')}}</h3>

                  <div class="box-tools">

                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tbody><tr>
                      <th>#</th>
                      <th>Τμήμα</th>
                      <th>ΑΕΜ</th>
                      <th>Όνοματεπώνυμο</th>
                      <th>Μόρια</th>
                      <th>Πανεπιστήμιο Κατάταξης</th>
                    </tr>

                    @forelse($ranks as $rank)
                    <tr>
                      <td>{{$rank->app_id}}</td>
                      <td>{{$rank->application->depID}} / {{$rank->application->depname}}</td>
                      <td>{{$rank->application->spec_aem}}</td>
                      <td>{{$rank->application->surname_el}} {{$rank->application->name_el}}</td>
                      <td>{{$rank->pts}}</td>
                      @if($rank->assigned-1 < 0)
                      <td> - </td>
                      @else
                      <td>{{$universities[$rank->assigned-1]->name}}</td>
                      @endif
                    </tr>
                    @empty
                    <tr>
                      <td colspan=4>Δεν έχει γίνει κατάταξη για το έτος {{date('Y')}}</td>
                    </tr>
                    @endforelse
                  </tbody></table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->



  </div>
</div>



@endsection
