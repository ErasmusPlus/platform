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

				<br></br>

				<div class="container">
				<div class="form-group">
				{!! Form::label('Συμφωνώ να δίνεται το τηλέφωνό μου σε περίπτωση που ζητηθεί από άλλους φοιτητές ERASMUS:') !!}
				{{$app->publictel}}
				</div>

				<div class="form-group">
				{!! Form::label(' 		Συμφωνώ να δίνεται το email μου σε περίπτωση που ζητηθεί από άλλους φοιτητές ERASMUS: ') !!}
				{{$app->l1== true ? 'NAI':'OXI' }}
				</div>

				<div class="form-group">
				{!! Form::label(' Είμαι άτομο με αναπηρίες, σύμφωνα με τον κατάλογο που χρησιμοποιεί η Ε.Μ: ') !!}
				{{$app->l2== true ? 'NAI':'OXI' }}
				</div>

				<div class="form-group">
				{!! Form::label(' Έχω συμπληρώσει το 25ο έτος της ηλικίας και το ατομικό μου εισόδημα δεν ξεπερνά τα 9.000Ε: ') !!}
				{{$app->l3== true ? 'NAI':'OXI' }}
				</div>


				<div class="form-group">
				<p>{!! Form::label(' Δεν έχω συμπληρώσει το 25ο έτος της ηλικίας και προέρχομαι απο οικογένεια που το οικογενειακό εισόδημα δεν υπερβαίνει τις 9.000Ε κατά το πλέον πρόσφατο οικονομικό έτος:') !!}</p>
				{{$app->l4== true ? 'NAI':'OXI' }}
				</div>


				<div class="form-group">
				{!! Form::label('Προέρχομαι απο πολύτεκνη οικογένεια (4 τέκνα και άνω τα οποία βρίσκονται σε κάποια βαθμίδα εκπαίδευσης) και το οικογενειακό και ατομικό μου εισόδημα δεν υπερβαίνει τις 22.000Ε κατά το πλέον πρόσφατο οικονομικό έτος:') !!}
				{{$app->l5== true ? 'NAI':'OXI' }}
				</div>

				<div class="form-group">
				{!! Form::label(' Έχω ακυρώσει τη συμμετοχή μου στο Πρόγραμμα Σπουδών LLP/ERASMUS κατά τα προηγούμενα ακαδημαικά έτη:') !!}
				{{$app->l6 == true ? 'NAI':'OXI' }}
				</div>

				</div>



				<div class="container">
  <h2>Ξένες γλώσσες και επίπεδο γλωσσομάθειας</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Ξένη Γλώσσα</th>
        <th>Επίπεδο Γλωσσομάθειας</th>

      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$languages[$app->lang_id1]}}</td>
		<td>{{$langlevel[$app->langlevel1]}}</td>

      </tr>
      <tr>
        <td>{{$languages[$app->lang_id1]}}</td>
		<td>{{$langlevel[$app->langlevel1]}}</td>

      </tr>
      <tr>
        <td>{{$languages[$app->lang_id1]}}</td>
		<td>{{$langlevel[$app->langlevel1]}}</td>

      </tr>
    </tbody>
  </table>
</div>


<div class="container">
  <h2>Πανεπιστήμια:</h2>
  <table class="table">
	<col width="250">
	<col width="250">
    <thead>
      <tr>
        <th>Όνομα Πανεπιστημίου</th>
        <th>Τομέας σπουδών</th>
		<th> Εξάμηνο </th>
		<th> Μήνες </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$universities[$app->u1_id]}}</td>
		<td>{{$app->u1_studies}}</td>
		<td>{{$app->u1_semester}}</td>
		<td>{{$app->u1_months}}</td>
      </tr>
      <tr>
        <td>{{$universities[$app->u2_id]}}</td>
		<td>{{$app->u2_studies}}</td>
		<td>{{$app->u2_semester}}</td>
		<td>{{$app->u2_months}}</td>
      </tr>
      <tr>
		<td>{{$universities[$app->u3_id]}}</td>
		<td>{{$app->u3_studies}}</td>
		<td>{{$app->u3_semester}}</td>
		<td>{{$app->u3_months}}</td>
      </tr>
    </tbody>
  </table>
</div>




</div>


</div>



</div>

@endsection
