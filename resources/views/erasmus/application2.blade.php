@extends('layouts.dashboard')
@php ( $title='Αίτηση εκδήλωσης ενδιαφέροντος υποψήφιου υπότροφου Erasmus+' )
@php ( $description='')

@section('css')
<style>
.row{
  padding-top:10px;
}

.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}



.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}

</style>
@endsection



@section('content')

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- /.box-header -->
            <div class="box-body">
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab1">Ατομικά στοιχεία υποψηφίου</a></li>
                <li><a data-toggle="tab" href="#tab2">Στοιχεία ακαδημαικής δραστηριότητας υποψηφίου</a></li>
                <li><a data-toggle="tab" href="#tab3">Δικαιολογητικά</a></li>
                <li><a data-toggle="tab" href="#tab4">Υποβολή αιτήσεως</a></li>
              </ul>
			  {!! Form::open(array('action' => ('ApplicationController@store') , 'files' => true)) !!}
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
                  {!! Form::number('age',null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::label('idno','Αριθμός Δελτίου Ταυτότητας/I.D. No') !!}
                  {!! Form::text('idno',null, ['class' => 'form-control']) !!}
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
        					{!! Form::label('iddate','Ημ/νία έκδοσης ταυτότητας') !!}
        					{!! Form::text('iddate',null, ['class' => 'form-control']) !!}
        				</div>
                <div class="col-md-4">
                  {!! Form::label('idloc','Αρχή Έκδοσης ταυτότητας') !!}
                  {!! Form::text('idloc',null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-4">
                  {!! Form::label('amka','ΑΜΚΑ') !!}
                  {!! Form::text('amka',null, ['class' => 'form-control']) !!}
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
                  {!! Form::text('address_el',null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-1">
                  {!! Form::label('nο_el','Αριθμός') !!}
                  {!! Form::number('nο_el',null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-2">
                  {!! Form::label('city_el','Πόλη') !!}
                  {!! Form::text('city_el',null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-1">
                  {!! Form::label('tk','TK') !!}
                  {!! Form::number('tk',null, ['class' => 'form-control']) !!}
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
                  {!! Form::text('insurance',null, ['class' => 'form-control']) !!}
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
                  {!! Form::label('stlevel','Επίπεδο σπουδών') !!}
                  {!! Form::text('stlevel',EGuard::user()->type , ['class' => 'form-control', 'readonly'=>'readonly']) !!}
                </div>
              </div>
              <br>
              <h5><b>Ξένες γλώσσες και επίπεδο γλωσσομάθειας:</b></h5>
              <div class="row">
                  <div class="col-md-4">
                    <div class="col-md-8">
                      {!! Form::label('lang_id1','Γλώσσα') !!}
          					  {!! Form::select('lang_id1',$languages,null, ['class' => 'form-control pull-right', 'placeholder' => "Επιλέξτε πρώτη γλώσσα"]) !!}
                    </div>
                    <div class="col-md-4">
                      {!! Form::label('langlevel1','Επίπεδο') !!}
                      {!! Form::select('langlevel1',$langlevel,null, ['class' => 'form-control pull-right']) !!}
					          </div>
        				</div>
                  <div class="col-md-4">
                    <div class="col-md-8">
                      {!! Form::label('lang_id2','Γλώσσα') !!}
          					  {!! Form::select('lang_id2',$languages,null, ['class' => 'form-control pull-right','placeholder' => "Επιλέξτε δεύτερη γλώσσα"]) !!}
					          </div>
                    <div class="col-md-4">
                      {!! Form::label('langlevel2','Επίπεδο') !!}
                      {!! Form::select('langlevel2',$langlevel,null, ['class' => 'form-control pull-right']) !!}
					          </div>
        				</div>
                  <div class="col-md-4">
                    <div class="col-md-8">
                      {!! Form::label('lang_id3','Γλώσσα') !!}
          			  {!! Form::select('lang_id3',$languages,null, ['class' => 'form-control pull-right','placeholder' => "Επιλέξτε τρίτη γλώσσα"]) !!}
					</div>
                    <div class="col-md-4">
                      {!! Form::label('langlevel3','Επίπεδο') !!}
                      {!! Form::select('langlevel3',$langlevel,null, ['class' => 'form-control pull-right']) !!}




					</div>
        				</div>



</div>





              <br>
              <h5><b>Επιθυμώ να πραγματοποιήσω μια περίοδο σπουδών σε ένα απο τα παρακάτω Πανεπιστήμια με σειρά προτεραιότητας:</b></h5>
              <div class="row">
                  <div class="col-md-4">
        					{!! Form::select('u1_id',$universities,null, ['class' => 'form-control pull-right' ,'placeholder' => 'Όνομα πανεπιστημίου']) !!}
        				</div>
                <div class="col-md-4">
                  {!! Form::text('u1_studies',null, ['class' => 'form-control pull-right' ,'placeholder' => 'Τομέας Σπουδών']) !!}
        				</div>
                <div class="col-md-2">
                  {!! Form::label('u1_semester','Χειμερινό') !!}
                  {{ Form::radio('u1_semester', '1') }}
                  {!! Form::label('u1_semester','Εαρινό') !!}
                  {{ Form::radio('u1_semester', '2') }}
                </div>
                <div class="col-md-2">
                  {!! Form::number('u1_months',null, ['min' => '3','max' => '12' , 'class' => 'form-control pull-right' ,'placeholder' => 'Μήνες']) !!}
                </div>
              </div>
              <div class="row">
                  <div class="col-md-4">
        					{!! Form::select('u2_id',$universities,null, ['class' => 'form-control pull-right' ,'placeholder' => 'Όνομα πανεπιστημίου']) !!}
        				</div>
                <div class="col-md-4">
                  {!! Form::text('u2_studies',null, ['class' => 'form-control pull-right' ,'placeholder' => 'Τομέας Σπουδών']) !!}
        				</div>
                <div class="col-md-2">
                  {!! Form::label('u2_semester','Χειμερινό') !!}
                  {{ Form::radio('u2_semester', '1') }}
                  {!! Form::label('u2_semester','Εαρινό') !!}
                  {{ Form::radio('u2_semester', '2') }}
                </div>
                <div class="col-md-2">
                  {!! Form::text('u2_months',null, ['class' => 'form-control pull-right' ,'placeholder' => 'Μήνες']) !!}
                </div>
              </div>
              <div class="row">
                  <div class="col-md-4">
        					{!! Form::select('u3_id',$universities,null, ['class' => 'form-control pull-right' ,'placeholder' => 'Όνομα πανεπιστημίου']) !!}
        				</div>
                <div class="col-md-4">
                  {!! Form::text('u3_studies',null, ['class' => 'form-control pull-right' ,'placeholder' => 'Τομέας Σπουδών']) !!}
        				</div>
                <div class="col-md-2">
                  {!! Form::label('u3_semester','Χειμερινό') !!}
                  {{ Form::radio('u3_semester', '1') }}
                  {!! Form::label('u3_semester','Εαρινό') !!}
                  {{ Form::radio('u3_semester', '2') }}
                </div>
                <div class="col-md-2">
                  {!! Form::text('u3_months',null, ['class' => 'form-control pull-right' ,'placeholder' => 'Μήνες']) !!}
                </div>
              </div>
              <h5><i>**Σημειώνεται ότι η αιτούμενη υποτροφία μπορεί να είναι διάρκειας 3 (τριών) έως 12 (δώδεκα) μηνών</i></h5>
              <hr>
            {!! Form::checkbox('l1') !!}
            {!! Form::label('l1','Συμφωνώ να δίνεται το email μου σε περίπτωση που ζητηθεί από άλλους φοιτητές ERASMUS') !!}
            <br>
            {!! Form::checkbox('l2') !!}
            {!! Form::label('l2','Είμαι άτομο με αναπηρίες, σύμφωνα με τον κατάλογο που χρησιμοποιεί η Ε.Μ') !!}
            <br>
            {!! Form::checkbox('l3') !!}
            {!! Form::label('l3','Έχω συμπληρώσει το 25ο έτος της ηλικίας και το ατομικό μου εισόδημα δεν ξεπερνά τα 9.000Ε') !!}
            <br>

		   {!! Form::checkbox('l4') !!}
            {!! Form::label('l4','Δεν έχω συμπληρώσει το 25ο έτος της ηλικίας και προέρχομαι απο οικογένεια που το οικογενειακό εισόδημα δεν υπερβαίνει τις 9.000Ε κατά το πλέον πρόσφατο οικονομικό έτος') !!}

		   <br>
            {!! Form::checkbox('l5') !!}
            {!! Form::label('l5','Προέρχομαι απο πολύτεκνη οικογένεια (4 τέκνα και άνω τα οποία βρίσκονται σε κάποια βαθμίδα εκπαίδευσης) και το οικογενειακό και ατομικό μου εισόδημα δεν υπερβαίνει τις 22.000Ε κατά το πλέον πρόσφατο οικονομικό έτος.') !!}
            <br>
            {!! Form::checkbox('l6') !!}
            {!! Form::label('l6','Έχω ακυρώσει τη συμμετοχή μου στο Πρόγραμμα Σπουδών LLP/ERASMUS κατά τα προηγούμενα ακαδημαικά έτη') !!}

            <hr>
            <a id="nexttab2" href="#tab3" class="btn btn-primary pull-right" role="button">Επόμενo</a>


            </div>
            <div id="tab3" class="tab-pane fade">
              <br>
            <h4><b>Δικαιολογητικά υποβολής αίτησης</b></h4>
              <h5>
                Για την αξιολόγηση της αιτήσεως σας απαιτούνται τα ακόλουθα πιστοποιητικά:
                <br><br>
                α) Σύντομο βιογραφικό σημείωμα
                <br>
                β) Αντίγραφα πιστοιποιητικών γλωσσομάθειας
                <br>
                γ) Οποιαδήποτε βεβαίωση/πιστοποιητικό (αντίγραφο) για απόδειξη εμπειρίας ή συμμετοχής σε συνέδρια, θερινά σχολεία, προγράμματα επιμόρφωσης
            </h5>
            <br>
            Συγκεντρώστε τα δικαιολογητικά σας σε ενα αρχείο συμπίεσης (zip) και επιλέξτε το.
        			<div class="row">
        				<div class="col-md-12">
        					<input type="file" name="documents"  />
        				</div>
        			</div>



              <a id="nexttab3" href="#tab4" class="btn btn-primary pull-right" role="button">Επόμενo</a>
            </div>

            <div id="tab4" class="tab-pane fade">
              <br>
              <h4><b>Με την υποβολή της αίτησης μου δηλώνω υπεύθυνα ότι:</b></h4>

                <h5>
                α) Δεν έχω τύχει υποτροφίας Erasmus κατά τα προηγούμενα ακαδημαικά Έτη, η οποία αθροιζόμενη με το παρόν αίτημα μετακίνησής μου να υπερβαίνει τους 12 μήνες
                <br>
                β) Όλες οι πληροφορίες που παρέχονται είναι ακριβείς.

              </h5>
                <br>




               {!! Form::submit('Υποβολή αίτησης',array('class' => 'btn btn-primary')) !!}
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
