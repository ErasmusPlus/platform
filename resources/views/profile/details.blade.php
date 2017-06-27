@extends('layouts.dashboard')
@php ( $title='Στοιχεία φοιτητή' )
@php ( $description='')
@section('content')
<div class='row'>

<!-- /.box -->
<div class='col-md-4'>
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
                  <td>{{EGuard::user()->semester}}</td>
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
                  <td>Τμήμα</td>
                  <td>{{EGuard::user()->departmentFull}}</td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
</div><!-- /.row -->
@endsection
