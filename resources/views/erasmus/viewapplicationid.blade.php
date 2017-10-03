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
				{{$app->fathersname}}
				</div>
				<div class="form-group">
				{!! Form::label('Τόπος Γεννήσεως/Place of Birth:') !!}
				{{$app->birthplace}}
				</div>
				<div class="form-group">
				{!! Form::label('numstreet','Οδός-Αριθμός:') !!}
				{{$app->address_el}}
				{{$app->nο_el}}
				</div>
				<div class="form-group">
				{!! Form::label('postalcode','ΤΚ:') !!}
				{{$app->tk}}
				</div>
				<div class="form-group">
				{!! Form::label('tel','Τηλέφωνο:') !!}
				{{$app->tel}}
				</div>
				<div class="form-group">
				{!! Form::label('mobile','Κινητό:') !!}
				{{$app->mobtel}}
				</div>
				
				
				
				
				<div class="form-group">
				{!! Form::label('Νομός/Prefecture:') !!}
				{{$app->prefecture}}
				</div>
				
					<div class="form-group">
				{!! Form::label('Οδός:') !!}
				</div>
				
				
					<div class="form-group">
				{!! Form::label('Συμφωνώ να δίνεται το τηλέφωνό μου σε περίπτωση που ζητηθεί από άλλους φοιτητές ERASMUS:') !!}
				{{$app->publictel}}
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
				{{$app->name_el}}
				</div>
				
				<div class="form-group">
				{!! Form::label('Name (όπως αναγράφεται στο διαβατήριό σας):') !!}
				{{$app->name_en}}
				</div>
				
				<div class="form-group">
				{!! Form::label('Όνομα μητρός/Mother\'s Name:') !!}
				{{$app->mothersname}}
				</div>
				
				<div class="form-group">
				{!! Form::label('Ηλικία/Age:') !!}
				{{$app->age}}
				</div>
								
				<div class="form-group">
				{!! Form::label('Ημερομηνία γεννήσεως/Birth of Birth:') !!}
				{{$app->birthdate}}
				</div>
				
				<div class="form-group">
				{!! Form::label('Υπηκοότητα/Citizenship:') !!}
				{{$app->citizenship}}
				</div>			
				
					<div class="form-group">
				{!! Form::label('Πόλη:') !!}
				{{$app->city_el}}
				{{$app->name_en}}
				</div>	
				
				
				
					<div class="form-group">
				{!! Form::label('Address (με λατινικούς χαρακτήρες):') !!}
				{{$app->name_el}}
				{{$app->name_en}}
				</div>	

					
				
					<div class="form-group">
				{!! Form::label('Ασφαλιστικός Οργανισμός που θα καλύπτει την ιατροφαρμακευτική περίθαλψη του υποψηφίου στο εξωτερικό:') !!}
				{{$app->insurance}}
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

				<div class="form-group">
				<div class="form-group"> {!! Form::label('Ξένες γλώσσες και επίπεδο γλωσσομάθειας:') !!}</div>
				<hr>
				
				<table>
					<tr>
						<th> Ξένη Γλώσσα </th>
						<th> Επίπεδο Γλωσσομάθειας </th>					
					</tr>
					<tr>
						<th>{{$app->lang_id1}}</th>
						<th>{{$app->langlevel1}}</th>
					</tr>
					<tr>
						<th>{{$app->lang_id2}}</th>
						<th>{{$app->langlevel2}}</th>
					</tr>
					<tr>
						<th>{{$app->lang_id3}}</th>
						<th>{{$app->langlevel3}}</th>
					</tr>
				
				</table>
				
				
				</div>	
				

			
				
</div>


</div>
  @endforeach

 
</div>

@endsection
