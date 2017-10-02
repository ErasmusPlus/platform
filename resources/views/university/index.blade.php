@extends('layouts.dashboard')
@php ( $title='Πανεπιστήμια Erasmus+' )
@php ( $description='Διαχείριση')

@section('content')
<div class='row'>
  <div class='col-md-12'>
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Λίστα ιδρυμάτων Erasmus+</h3>

                  <div class="box-tools">
                    <a href="{{route('admin.university.new')}}" class="btn btn-primary btn-sm" role="button">Προσθήκη εγγραφής</a>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tbody><tr>
                      <th></th>
                      <th>Όνομα</th>
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
                      <td>{{$languages[$university->lang_id]}}</td>
                      <td><span class="label label-success">NAI</span></td>
                      <td>{{$university->cap}}</td>
                      <td>{{$university->updated_at}}</td>
                      <td>
                        <a href="{{route('admin.university.edit',$university->id)}}" class="btn btn-primary btn-xs" role="button">Επεξεργασία</a>
                        <a href="{{route('admin.university.delete',$university->id)}}" class="btn btn-danger btn-xs" role="button">Διαγραφή</a>
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
