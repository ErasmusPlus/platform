@extends('layouts.dashboard')
@php ( $title='Στοιχεία φοιτητή' )
@php ( $description='')
@section('content')

<?php
  $stdata = EGuard::getApiDetails();
?>

<div class='row'>

<!-- /.box -->
<div class='col-md-6'>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{EGuard::user()->fullname}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tr>
                  <td>AEM</td>
                  <td>{{EGuard::user()->id}}</td>
                </tr>
                <tr>
                  <td>Ιδρυματικό Email</td>
                  <td>{{EGuard::user()->email}}</td>
                </tr>
                <tr>
                  <td>Εξάμηνο</td>
                  <td>{{$stdata->curr_semester}}</td>
                </tr>
                <tr>
                  <td>Όνομα</td>
                  <td>{{EGuard::user()->firstname}}</td>
                </tr>
                <tr>
                  <td>Επώνυμο</td>
                  <td>{{EGuard::user()->lastname}}</td>
                </tr>
                <tr>
                  <td>Εκπαίδευση</td>
                  <td>{{EGuard::user()->education}}</td>
                </tr>
                <tr>
                  <td>Τύπος</td>
                  <td>{{EGuard::user()->type}}</td>
                </tr>



                    <tr>
                      <td>Αριθμός Τμήματος</td>
                      <td>{{$stdata->depID}}</td>
                    </tr>
                    <tr>
                      <td>Περιγραφή Τμήματος</td>
                      <td>{{$stdata->depname}}</td>
                    </tr>
                    <tr>
                      <td>ECTS</td>
                      <td>{{$stdata->ects_passed_total}}</td>
                    </tr>
                    <tr>
                      <td>Σύνολο περασμένων μαθημάτων</td>
                      <td>{{$stdata->cources_passed_num}}</td>
                    </tr>
                    <tr>
                      <td>Μέσος Όρος</td>
                      <td>{{$stdata->Avg}}</td>
                    </tr>


                  </table>

                </div>
                <!-- /.box-body -->
              </div>
            </div>

        <div class='col-md-6'>
          @if(EGuard::isEligible())
          <h4 style="margin-top:200px;"><center>Έχετε την δυνατότητα να αιτηθείτε συμμετοχή στο πρόγραμμα Erasmus</center></h4>
          @else
          <h4 style="margin-top:200px;"><center>Δεν έχετε την δυνατότητα να αιτηθείτε συμμετοχή στο πρόγραμμα Erasmus</center></h4>
          @endif

                </div>
</div><!-- /.row -->

  @endsection
