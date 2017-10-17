@extends('layouts.dashboard')
@php ( $title='Αίτηση #'.$application->id )
@php ( $description='Λεπτομέρειες αίτησης')

@section('content')


 <div class="panel panel-info">
   {!! Form::open() !!}
		<div class="panel-body">

                <!-- text input -->

				<div class="form-group">

				<div class='col-md-6'>
				<div class="col-xs-8">

				<div class="form-group">
					{!! Form::label('Επώνυμο:') !!}
					{{$application->surname_el}} / {{$application->surname_en}}
				</div>
				<div class="form-group">
				{!! Form::label('Όνομα πατρός/Father\'s Name:') !!}
				{{$application->fathersname}}
				</div>
				<div class="form-group">
				{!! Form::label('Τόπος Γεννήσεως/Place of Birth:') !!}
				{{$application->birthplace}}
				</div>
				<div class="form-group">
				{!! Form::label('numstreet','Οδός-Αριθμός:') !!}
				{{$application->address_el}}
				{{$application->nο_el}}
				</div>
				<div class="form-group">
				{!! Form::label('postalcode','ΤΚ:') !!}
				{{$application->tk}}
				</div>
				<div class="form-group">
				{!! Form::label('tel','Τηλέφωνο:') !!}
				{{$application->tel}}
				</div>
				<div class="form-group">
				{!! Form::label('mobile','Κινητό:') !!}
				{{$application->mobtel}}
				</div>




				<div class="form-group">
				{!! Form::label('Νομός/Prefecture:') !!}
				{{$application->prefecture}}
				</div>








				</div>
				</div>

				<div class='col-md-6'>
				<div class="col-xs-8">

				<div class="form-group">
				{!! Form::label('Όνομα:') !!}
				{{$application->name_el}} / {{$application->name_en}}
				</div>

				<div class="form-group">
				{!! Form::label('Όνομα μητρός/Mother\'s Name:') !!}
				{{$application->mothersname}}
				</div>

				<div class="form-group">
				{!! Form::label('Ηλικία/Age:') !!}
				{{$application->age}}
				</div>

				<div class="form-group">
				{!! Form::label('Ημερομηνία γεννήσεως/Birth of Birth:') !!}
				{{$application->birthdate}}
				</div>

				<div class="form-group">
				{!! Form::label('Υπηκοότητα/Citizenship:') !!}
				{{$application->citizenship}}
				</div>

					<div class="form-group">
				{!! Form::label('Πόλη:') !!}
				{{$application->city_el}}
				</div>



					<div class="form-group">
				{!! Form::label('Address (με λατινικούς χαρακτήρες):') !!}
				{{$application->address_en}}
				</div>







				</div>
				</div>
        <div class="form-group">
      {!! Form::label('Ασφαλιστικός Οργανισμός που θα καλύπτει την ιατροφαρμακευτική περίθαλψη του υποψηφίου στο εξωτερικό:') !!}
      {{$application->insurance}}
      </div>
				<br></br>

				<div class="container">
				<div class="form-group">
				{!! Form::label('Συμφωνώ να δίνεται το τηλέφωνό μου σε περίπτωση που ζητηθεί από άλλους φοιτητές ERASMUS:') !!}
				{{$application->publictel}}
				</div>

				<div class="form-group">
				{!! Form::label(' 		Συμφωνώ να δίνεται το email μου σε περίπτωση που ζητηθεί από άλλους φοιτητές ERASMUS: ') !!}
				{{$application->l1== true ? 'NAI':'OXI' }}
				</div>

				<div class="form-group">
				{!! Form::label(' Είμαι άτομο με αναπηρίες, σύμφωνα με τον κατάλογο που χρησιμοποιεί η Ε.Μ: ') !!}
				{{$application->l2== true ? 'NAI':'OXI' }}
				</div>

				<div class="form-group">
				{!! Form::label(' Έχω συμπληρώσει το 25ο έτος της ηλικίας και το ατομικό μου εισόδημα δεν ξεπερνά τα 9.000Ε: ') !!}
				{{$application->l3== true ? 'NAI':'OXI' }}
				</div>


				<div class="form-group">
				<p>{!! Form::label(' Δεν έχω συμπληρώσει το 25ο έτος της ηλικίας και προέρχομαι απο οικογένεια που το οικογενειακό εισόδημα δεν υπερβαίνει τις 9.000Ε κατά το πλέον πρόσφατο οικονομικό έτος:') !!}</p>
				{{$application->l4== true ? 'NAI':'OXI' }}
				</div>


				<div class="form-group">
				{!! Form::label('Προέρχομαι απο πολύτεκνη οικογένεια (4 τέκνα και άνω τα οποία βρίσκονται σε κάποια βαθμίδα εκπαίδευσης) και το οικογενειακό και ατομικό μου εισόδημα δεν υπερβαίνει τις 22.000Ε κατά το πλέον πρόσφατο οικονομικό έτος:') !!}
				{{$application->l5== true ? 'NAI':'OXI' }}
				</div>

				<div class="form-group">
				{!! Form::label(' Έχω ακυρώσει τη συμμετοχή μου στο Πρόγραμμα Σπουδών LLP/ERASMUS κατά τα προηγούμενα ακαδημαικά έτη:') !!}
				{{$application->l6 == true ? 'NAI':'OXI' }}
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
        <td>{{$languages[$application->lang_id1]}}</td>
		<td>{{$langlevel[$application->langlevel1]}}</td>

      </tr>
      <tr>
        <td>{{$languages[$application->lang_id1]}}</td>
		<td>{{$langlevel[$application->langlevel1]}}</td>

      </tr>
      <tr>
        <td>{{$languages[$application->lang_id1]}}</td>
		<td>{{$langlevel[$application->langlevel1]}}</td>

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
        <th>Επιλογή</th>
        <th>Όνομα Πανεπιστημίου</th>
        <th>Τομέας σπουδών</th>
		<th> Εξάμηνο </th>
		<th> Μήνες </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1η</td>
        <td>{{$universities[$application->u1_id]}}</td>
		<td>{{$application->u1_studies}}</td>
		<td>{{$application->u1_semester}}</td>
		<td>{{$application->u1_months}}</td>
      </tr>
      <tr>
        <td>2η</td>
        <td>{{$universities[$application->u2_id]}}</td>
		<td>{{$application->u2_studies}}</td>
		<td>{{$application->u2_semester}}</td>
		<td>{{$application->u2_months}}</td>
      </tr>
      <tr>
        <td>3η</td>
		<td>{{$universities[$application->u3_id]}}</td>
		<td>{{$application->u3_studies}}</td>
		<td>{{$application->u3_semester}}</td>
		<td>{{$application->u3_months}}</td>
      </tr>
    </tbody>
  </table>
</div>




</div>


</div>



</div>
@if(EGuard::user()->type == 'Administrator')




@endif
@endsection
