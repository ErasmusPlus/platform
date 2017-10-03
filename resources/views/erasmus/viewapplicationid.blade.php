@extends('layouts.dashboard')
@php ( $title='Αιτήσεις' )
@php ( $description='Οι αιτήσεις σας για το Erasmus+')

@section('content')

<div class='row'>
  <div class='col-md-12'>
              <div class="box">
                  TODO: Application details here
                </div>
  </div>
</div>



 <div class="panel panel-info">
   {!! Form::open() !!}
    @foreach($appv as $app)
     <div class="panel-heading">Αίτηση με αριθμό </div>
		<div class="panel-body">
			
                <!-- text input -->

				<div class="form-group">
				
				<div class='col-md-6'>
				<div class="col-xs-8">
				
				<div class="form-group">
					{!! Form::label('Επώνυμο:') !!}
					{{$app->surname_el}}
				</div>
				<div class="form-group">
				{!! Form::label('Surname (όπως αναγράφεται στο διαβατήριό σας):') !!}
				{{$app->surname_en}}
				</div>
				<div class="form-group">
				{!! Form::label('Όνομα πατρός/Father\'s Name:') !!}
				
				</div>
				<div class="form-group">
				{!! Form::label('Τόπος Γεννήσεως/Place of Birth:') !!}
			
				</div>
				<div class="form-group">
				{!! Form::label('numstreet','Οδός-Αριθμός:') !!}
			
				</div>
				<div class="form-group">
				{!! Form::label('postalcode','ΤΚ:') !!}
				
				</div>
				<div class="form-group">
				{!! Form::label('tel','Τηλέφωνο:') !!}
			
				</div>
				<div class="form-group">
				{!! Form::label('mobile','Κινητό:') !!}
				</div>
				
					<div class="form-group">
				{!! Form::label('Τόπος Γεννήσεως/Place of Birth:') !!}
				</div>
				
				
				<div class="form-group">
				{!! Form::label('Νομός/Prefecture:') !!}
				</div>
				
					<div class="form-group">
				{!! Form::label('Οδός:') !!}
				</div>
				
				
					<div class="form-group">
				{!! Form::label('Συμφωνώ να δίνεται το τηλέφωνό μου σε περίπτωση που ζητηθεί από άλλους φοιτητές ERASMUS:') !!}
				</div>
				

					<div class="form-group">
				{!! Form::label('Επιθυμώ να πραγματοποιήσω μια περίοδο σπουδών σε ένα απο τα παρακάτω Πανεπιστήμια με σειρά προτεραιότητας:') !!}
				</div>
				


				
				</div>
				</div>
				
				<div class='col-md-6'>
				<div class="col-xs-8">
				
				<div class="form-group">
				{!! Form::label('Όνομα:') !!}
				</div>
				
				<div class="form-group">
				{!! Form::label('Name (όπως αναγράφεται στο διαβατήριό σας):') !!}
				</div>
				
				<div class="form-group">
				{!! Form::label('Όνομα μητρός/Mother\'s Name:') !!}
				</div>
				
				<div class="form-group">
				{!! Form::label('Ηλικία/Age:') !!}
				</div>
								
				<div class="form-group">
				{!! Form::label('Ημερομηνία γεννήσεως/Birth of Birth:') !!}
				</div>
				
				<div class="form-group">
				{!! Form::label('Υπηκοότητα/Citizenship:') !!}
				</div>

				
				<div class="form-group">
				{!! Form::label('Αριθμός:') !!}
				</div>	
				
					<div class="form-group">
				{!! Form::label('Πόλη:') !!}
				</div>	
				
					<div class="form-group">
				{!! Form::label('TK:') !!}
				</div>	
				
					<div class="form-group">
				{!! Form::label('Address (με λατινικούς χαρακτήρες):') !!}
				</div>	

					<div class="form-group">
				{!! Form::label('City:') !!}
				</div>	
				
					<div class="form-group">
				{!! Form::label('Ασφαλιστικός Οργανισμός που θα καλύπτει την ιατροφαρμακευτική περίθαλψη του υποψηφίου στο εξωτερικό:') !!}
				</div>	
				
						<div class="form-group">
				{!! Form::label('Ξένες γλώσσες και επίπεδο γλωσσομάθειας:') !!}
				</div>	
				
				</div>
				</div>
	
				<div class="col-xl-10">
	
				<div class="form-group">
				{!! Form::label(' 		Συμφωνώ να δίνεται το email μου σε περίπτωση που ζητηθεί από άλλους φοιτητές ERASMUS: ') !!}
				</div>	

				<div class="form-group">
				{!! Form::label(' Είμαι άτομο με αναπηρίες, σύμφωνα με τον κατάλογο που χρησιμοποιεί η Ε.Μ: ') !!}
				</div>	
				
				<div class="form-group">
				{!! Form::label(' Έχω συμπληρώσει το 25ο έτος της ηλικίας και το ατομικό μου εισόδημα δεν ξεπερνά τα 9.000Ε: ') !!}
				</div>	
				
					
				<div class="form-group">
				{!! Form::label(' Δεν έχω συμπληρώσει το 25ο έτος της ηλικίας και προέρχομαι απο οικογένεια που το οικογενειακό εισόδημα δεν υπερβαίνει τις 9.000Ε κατά το πλέον πρόσφατο οικονομικό έτος:') !!}
				</div>	
				
					
				<div class="form-group">
				{!! Form::label('Προέρχομαι απο πολύτεκνη οικογένεια (4 τέκνα και άνω τα οποία βρίσκονται σε κάποια βαθμίδα εκπαίδευσης) και το οικογενειακό και ατομικό μου εισόδημα δεν υπερβαίνει τις 22.000Ε κατά το πλέον πρόσφατο οικονομικό έτος:') !!}
				</div>	
				
				<div class="form-group">
				{!! Form::label(' Έχω ακυρώσει τη συμμετοχή μου στο Πρόγραμμα Σπουδών LLP/ERASMUS κατά τα προηγούμενα ακαδημαικά έτη:') !!}
				</div>	
	
</div>
				

			
				
</div>


</div>
  @endforeach

 
</div>

@endsection
