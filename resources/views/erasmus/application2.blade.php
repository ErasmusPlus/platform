@extends('layouts.dashboard')
@php ( $title='Αίτηση εκδήλωσης ενδιαφέροντος υποψήφιου υπότροφου Erasmus+' )
@php ( $description='')

@section('css')
<style>
.row{
  padding-top:10px;
}
</style>
@endsection



@section('content')
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab1">Ατομικά στοιχεία υποψηφίου</a></li>
                <li><a data-toggle="tab" href="#tab2">Στοιχεία ακαδημαικής δραστηριότητας υποψηφίου</a></li>
                <li><a data-toggle="tab" href="#tab3">Υποβολή αιτήσεως</a></li>
              </ul>
			  {!! Form::open() !!}
                <!-- text input -->

                <div class="tab-content">
                  <div id="tab1" class="tab-pane fade in active">
                <div class='col-md-12'>
              <div class="row">
                  <div class="col-md-6">
        					{!! Form::label('surname_el','Επώνυμο') !!}
        					{!! Form::text('surname_el',EGuard::user()->lastname, ['class' => 'form-control', 'readonly'=>'readonly']) !!}
        				</div>
                <div class="col-md-6">
        					{!! Form::label('name_el','Όνομα') !!}
        					{!! Form::text('name_el',EGuard::user()->firstname, ['class' => 'form-control', 'readonly'=>'readonly']) !!}
        				</div>
              </div>
              <div class="row">
                  <div class="col-md-6">
        					{!! Form::label('surname_en','Surname (όπως αναγράφεται στο διαβατήριό σας)') !!}
        					{!! Form::text('surname_en',null, ['class' => 'form-control']) !!}
        				</div>
                <div class="col-md-6">
        					{!! Form::label('name_en','Name') !!}
        					{!! Form::text('name_en',null, ['class' => 'form-control']) !!}
        				</div>
              </div>

              <div class="row">
                  <div class="col-md-4">
        					{!! Form::label('fathersname','Όνομα πατρός/Father\'s Name') !!}
        					{!! Form::text('fathersname',null, ['class' => 'form-control']) !!}
        				</div>
                <div class="col-md-4">
        					{!! Form::label('mothersname','Όνομα μητρός/Mother\'s Name') !!}
        					{!! Form::text('mothersname',null, ['class' => 'form-control']) !!}
        				</div>
                <div class="col-md-1">
                  {!! Form::label('age','Ηλικία/Age') !!}
                  {!! Form::text('age',null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::label('idno','Αριθμός Δελτίου Ταυτότητας/I.D. No') !!}
                  {!! Form::text('idno',null, ['class' => 'form-control']) !!}
                </div>
              </div>

              <div class="row">
                  <div class="col-md-4">
        					{!! Form::label('birthplace','Τόπος Γεννήσεως/Place of Birth') !!}
        					{!! Form::text('birthplace',null, ['class' => 'form-control']) !!}
        				</div>
                <div class="col-md-3">
        					{!! Form::label('birthdate','Ημερομηνία γεννήσεως/Birth of Birth') !!}
        					{!! Form::text('birthdate',null, ['class' => 'form-control']) !!}
        				</div>
                <div class="col-md-2">
                  {!! Form::label('prefecture','Νομός/Prefecture:') !!}
                  {!! Form::text('prefecture',null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::label('citizenship','Υπηκοότητα/Citizenship:') !!}
                  {!! Form::text('citizenship',null, ['class' => 'form-control']) !!}
                </div>
              </div>

              <div class="row">
                <h5><b>Διεύθυνση κατοικίας</b></h5>
                  <div class="col-md-3">

                  {!! Form::label('address_el','Οδός') !!}
                  {!! Form::text('birthplace',null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-1">
                  {!! Form::label('nο_el','Αριθμός') !!}
                  {!! Form::text('nο_el',null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-2">
                  {!! Form::label('city_el','Πόλη') !!}
                  {!! Form::text('city_el',null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-1">
                  {!! Form::label('city_el','TK') !!}
                  {!! Form::text('city_el',null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::label('address_en','Address (με λατινικούς χαρακτήρες)') !!}
                  {!! Form::text('address_en',null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-2">
                  {!! Form::label('city_en','City') !!}
                  {!! Form::text('city_en',null, ['class' => 'form-control']) !!}
                </div>
              </div>
              <div class="row">
                  <div class="col-md-4">
        					{!! Form::label('tel','Σταθερό τηλέφωνο') !!}
        					{!! Form::text('tel',null, ['class' => 'form-control']) !!}
        				</div>
                <div class="col-md-4">
        					{!! Form::label('mobtel','Κινητό τηλέφωνο') !!}
        					{!! Form::text('mobtel',null, ['class' => 'form-control']) !!}
        				</div>
                <div class="col-md-4">
                  {!! Form::label('email','Email (απαραίτητο)') !!}
                  {!! Form::text('email',null, ['class' => 'form-control']) !!}
                </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                    {!! Form::checkbox('publictel') !!}
                  {!! Form::label('publictel','Συμφωνώ να δίνεται το τηλέφωνό μου σε περίπτωση που ζητηθεί από άλλους φοιτητές ERASMUS') !!}

                </div>
                  </div>
                  <div class="row">
                <div class="col-md-12">
                  {!! Form::label('insurance','Ασφαλιστικός Οργανισμός που θα καλύπτει την ιατροφαρμακευτική περίθαλψη του υποψηφίου στο εξωτερικό: ',['class'=>'pull-left', 'style'=>'padding-top:7px']) !!}
<div class="col-md-4">
                  {!! Form::text('email',null, ['class' => 'form-control']) !!}
                </div>
                </div>

              </div>
              <hr>
              <a id="nexttab1" href="#tab2" class="btn btn-primary pull-right" role="button">Επόμενo</a>
            </div>
            </div>
            <div id="tab2" class="tab-pane fade">
              <div class="row">
                  <div class="col-md-6">
        					{!! Form::label('department','Τμήμα/Department') !!}
        					{!! Form::text('department',$stdata->depname, ['class' => 'form-control', 'readonly'=>'readonly']) !!}
        				</div>
                <div class="col-md-2">
        					{!! Form::label('semester','Εξάμηνο σπουδών') !!}
        					{!! Form::text('semester',$stdata->curr_semester, ['class' => 'form-control', 'readonly'=>'readonly']) !!}
        				</div>
                <div class="col-md-4">
                  {!! Form::label('email','Επίπεδο σπουδών') !!}
                  {!! Form::text('email',EGuard::user()->type , ['class' => 'form-control', 'readonly'=>'readonly']) !!}
                </div>
              </div>
              <h5>Ξένες γλώσσες και επίπεδο γλωσσομάθειας</h5>
              <div class="row">
                  <div class="col-md-6">
        					{!! Form::label('langlevel1','a)') !!}
        					{!! Form::text('langlevel1',$stdata->depname, ['class' => 'form-control pull-right', 'readonly'=>'readonly']) !!}
        				</div>
                <div class="col-md-2">
        					{!! Form::label('langlevel2','b') !!}
        					{!! Form::text('langlevel2',$stdata->curr_semester, ['class' => 'form-control', 'readonly'=>'readonly']) !!}
        				</div>
                <div class="col-md-4">
                  {!! Form::label('langlevel3','c') !!}
                  {!! Form::text('langlevel3',EGuard::user()->type , ['class' => 'form-control', 'readonly'=>'readonly']) !!}
                </div>
              </div>


            </div>
            <div id="tab3" class="tab-pane fade">



               {!! Form::submit() !!}
            </div>
				</div>
			   </div>
         {!! Form::close() !!}
              </form>

            <!-- /.box-body -->



@endsection

@section('js')
<script>
$(window).bind('hashchange', function() {
  // Javascript to enable link to tab
  var url = document.location.toString();
  if (url.match('#')) {
      $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
  }

  // Change hash for page-reload
  $('.nav-tabs a').on('shown.bs.tab', function (e) {
      window.location.hash = e.target.hash;
  })
});

var url = document.location.toString();
if (url.match('#')) {
    $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
}

// Change hash for page-reload
$('.nav-tabs a').on('shown.bs.tab', function (e) {
    window.location.hash = e.target.hash;
})

</script>
@endsection
