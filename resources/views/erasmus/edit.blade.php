@extends('layouts.dashboard')
@php ( $title='Επεξεργασία Αίτησης' )
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

			  {!! Form::open(array('action' => ('ApplicationController@updateapplication') , 'files' => true)) !!}
                <!-- text input -->
				{{ Form::hidden('id', $application->id) }}
				
				

                <div class='col-md-12'>
             
              <div class="row">
                  <div class="col-md-6">
        					{!! Form::label('surname_en','Surname (όπως αναγράφεται στο διαβατήριό σας)') !!}
        					{!! Form::text('surname_en',$application-> surname_en , ['class' => 'form-control']) !!}
        				</div>
                <div class="col-md-6">
        					{!! Form::label('name_en','Name') !!}
        					{!! Form::text('name_en',$application-> name_en, ['class' => 'form-control']) !!}
        				</div>
              </div>

              <div class="row">
                  <div class="col-md-4">
        					{!! Form::label('fathersname','Όνομα πατρός/Father\'s Name') !!}
        					{!! Form::text('fathersname',$application-> fathersname, ['class' => 'form-control']) !!}
        				</div>
                <div class="col-md-4">
        					{!! Form::label('mothersname','Όνομα μητρός/Mother\'s Name') !!}
        					{!! Form::text('mothersname',$application-> mothersname, ['class' => 'form-control']) !!}
        				</div>
                <div class="col-md-1">
                  {!! Form::label('age','Ηλικία/Age') !!}
                  {!! Form::number('age',$application-> age, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::label('idno','Αριθμός Δελτίου Ταυτότητας/I.D. No') !!}
                  {!! Form::text('idno',$application-> idno, ['class' => 'form-control']) !!}
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
        					{!! Form::label('iddate','Ημ/νία έκδοσης ταυτότητας') !!}
        					{!! Form::text('iddate',$application-> iddate, ['class' => 'form-control']) !!}
        				</div>
                <div class="col-md-4">
                  {!! Form::label('idloc','Αρχή Έκδοσης ταυτότητας') !!}
                  {!! Form::text('idloc',$application-> idloc, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-4">
                  {!! Form::label('amka','ΑΜΚΑ') !!}
                  {!! Form::text('amka',$application-> amka, ['class' => 'form-control']) !!}
                </div>
              </div>
              <div class="row">
                  <div class="col-md-4">
        					{!! Form::label('birthplace','Τόπος Γεννήσεως/Place of Birth') !!}
        					{!! Form::text('birthplace',$application-> birthplace, ['class' => 'form-control']) !!}
        				</div>
                <div class="col-md-3">
        					{!! Form::label('birthdate','Ημερομηνία γεννήσεως/Birth of Birth') !!}
        					{!! Form::text('birthdate',$application-> birthdate, ['class' => 'form-control']) !!}
        				</div>
                <div class="col-md-2">
                  {!! Form::label('prefecture','Νομός/Prefecture:') !!}
                  {!! Form::text('prefecture',$application-> prefecture, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::label('citizenship','Υπηκοότητα/Citizenship:') !!}
                  {!! Form::text('citizenship',$application-> citizenship, ['class' => 'form-control']) !!}
                </div>
              </div>

              <div class="row">
                <h5><b>Διεύθυνση κατοικίας</b></h5>
                  <div class="col-md-3">

                  {!! Form::label('address_el','Οδός') !!}
                  {!! Form::text('address_el',$application-> address_el, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-1">
                  {!! Form::label('nο_el','Αριθμός') !!}
                  {!! Form::number('nο_el',$application-> no_el, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-2">
                  {!! Form::label('city_el','Πόλη') !!}
                  {!! Form::text('city_el',$application-> city_el, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-1">
                  {!! Form::label('tk','TK') !!}
                  {!! Form::number('tk',$application-> tk, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::label('address_en','Address (με λατινικούς χαρακτήρες)') !!}
                  {!! Form::text('address_en',$application-> address_en, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-2">
                  {!! Form::label('city_en','City') !!}
                  {!! Form::text('city_en',$application-> city_en, ['class' => 'form-control']) !!}
                </div>
              <div class="row">
                  <div class="col-md-4">
        					{!! Form::label('tel','Σταθερό τηλέφωνο') !!}
        					{!! Form::text('tel',$application-> tel, ['class' => 'form-control']) !!}
        				</div>
                <div class="col-md-4">
        					{!! Form::label('mobtel','Κινητό τηλέφωνο') !!}
        					{!! Form::text('mobtel',$application-> mobtel, ['class' => 'form-control']) !!}
        				</div>
                <div class="col-md-4">
                  {!! Form::label('email','Email (απαραίτητο)') !!}
                  {!! Form::text('email',$application-> email, ['class' => 'form-control']) !!}
                </div>
              </div>

              <div class="row">
                  <div class="col-md-12">
				   <td>
  
	
           {!! Form::checkbox('publictel', 1 ,$application -> publictel == true ? 0:1)   !!}
		   {!! Form::label('publictel','Συμφωνώ να δίνεται το τηλέφωνό μου σε περίπτωση που ζητηθεί από άλλους φοιτητές ERASMUS') !!}
                    

                </div>
                  </div>
                  <div class="row">
                <div class="col-md-12">
                  {!! Form::label('insurance','Ασφαλιστικός Οργανισμός που θα καλύπτει την ιατροφαρμακευτική περίθαλψη του υποψηφίου στο εξωτερικό: ',['class'=>'pull-left', 'style'=>'padding-top:7px']) !!}
<div class="col-md-4">
                  {!! Form::text('insurance',$application-> insurance, ['class' => 'form-control']) !!}
                </div>
                </div>

              </div>
              <hr>
             
            </div>
        

             




            
            {!! Form::checkbox('l1', 1 ,$application -> l1 == true ? 0:1) !!}
            {!! Form::label('l1','Συμφωνώ να δίνεται το email μου σε περίπτωση που ζητηθεί από άλλους φοιτητές ERASMUS') !!}
            <br>
            {!! Form::checkbox('l2', 1 ,$application -> l2 == true ? 0:1) !!}
            {!! Form::label('l2','Είμαι άτομο με αναπηρίες, σύμφωνα με τον κατάλογο που χρησιμοποιεί η Ε.Μ') !!}
            <br>
            {!! Form::checkbox('l3', 1 ,$application -> l3 == true ? 0:1) !!}
            {!! Form::label('l3','Έχω συμπληρώσει το 25ο έτος της ηλικίας και το ατομικό μου εισόδημα δεν ξεπερνά τα 9.000Ε') !!}
            <br>

		   {!! Form::checkbox('l4', 1 ,$application -> l4 == true ? 0:1) !!}
            {!! Form::label('l4','Δεν έχω συμπληρώσει το 25ο έτος της ηλικίας και προέρχομαι απο οικογένεια που το οικογενειακό εισόδημα δεν υπερβαίνει τις 9.000Ε κατά το πλέον πρόσφατο οικονομικό έτος') !!}

		   <br>
            {!! Form::checkbox('l5', 1 ,$application -> l5 == true ? 0:1) !!}
            {!! Form::label('l5','Προέρχομαι απο πολύτεκνη οικογένεια (4 τέκνα και άνω τα οποία βρίσκονται σε κάποια βαθμίδα εκπαίδευσης) και το οικογενειακό και ατομικό μου εισόδημα δεν υπερβαίνει τις 22.000Ε κατά το πλέον πρόσφατο οικονομικό έτος.') !!}
            <br>
            {!! Form::checkbox('l6', 1 , $application -> l6 == true ? 0:1) !!}
            {!! Form::label('l6','Έχω ακυρώσει τη συμμετοχή μου στο Πρόγραμμα Σπουδών LLP/ERASMUS κατά τα προηγούμενα ακαδημαικά έτη') !!}

     
          

            </div>
           
              <br>
			  	<div class="row">
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
        		
        				<div class="col-md-12">
        					<input type="file" name="documents"  />
        				</div>
        			</div>



           
       
              <br>





               {!! Form::submit('Ενημέρωση αίτησης',array('class' => 'btn btn-primary')) !!}
          


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
