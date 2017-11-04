@extends('layouts.dashboard')
@php ( $title='Αίτηση #'.$application->id )
@php ( $description='Λεπτομέρειες αίτησης')


@section('css')
<style>
.form-group{
  margin-bottom: 2px;
}
td:nth-child(2) p
{
font-weight: bold;

}
</style>
@endsection
@section('content')

 <div class="panel panel-info">
   {!! Form::open() !!}
		<div class="panel-body">
      <div class='col-md-12'>
        <div class='row'>
				<div class='col-md-6'>
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
				<div class='col-md-6'>
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
      <br>
      <div class='row'>
        <div class='col-md-12'>
          <div class="form-group">
            {!! Form::label('Ασφαλιστικός Οργανισμός που θα καλύπτει την ιατροφαρμακευτική περίθαλψη του υποψηφίου στο εξωτερικό: ') !!}
            {{$application->insurance}}
          </div>
        </div>
      </div>

    <table class="table table-condensed">
      <thead>
        <tr>
        <th></th>
        <th></th>
      </tr>
      </thead>

      <tbody>
        <tr>
          <td><p>Συμφωνώ να δίνεται το τηλέφωνό μου σε περίπτωση που ζητηθεί από άλλους φοιτητές ERASMUS</p></td>
          <td>
          @if($application->publictel == false)
            <p class=text-success>NAI</p>
          @else
            <p class=text-danger>ΟΧΙ</p>
          @endif
        </td>
        </tr>
        <tr>
          <td><p>Συμφωνώ να δίνεται το email μου σε περίπτωση που ζητηθεί από άλλους φοιτητές ERASMUS</p></td>
          <td>
          @if($application->l1 == false)
            <p class=text-success>NAI</p>
          @else
            <p class=text-danger>ΟΧΙ</p>
          @endif
        </td>
        </tr>
        <tr>
          <td><p>Είμαι άτομο με αναπηρίες, σύμφωνα με τον κατάλογο που χρησιμοποιεί η Ε.Μ</p></td>
          <td>
          @if($application->l2 == false)
            <p class=text-success>NAI</p>
          @else
            <p class=text-danger>ΟΧΙ</p>
          @endif
        </td>
        </tr>
        <tr>
          <td><p>Έχω συμπληρώσει το 25ο έτος της ηλικίας και το ατομικό μου εισόδημα δεν ξεπερνά τα 9.000Ε</p></td>
          <td>
          @if($application->l3 == false)
            <p class=text-success>NAI</p>
          @else
            <p class=text-danger>ΟΧΙ</p>
          @endif
        </td>
        </tr>
        <tr>
          <td><p>Δεν έχω συμπληρώσει το 25ο έτος της ηλικίας και προέρχομαι απο οικογένεια που το οικογενειακό εισόδημα δεν υπερβαίνει τις 9.000Ε κατά το πλέον πρόσφατο οικονομικό έτος</p></td>
          <td>
          @if($application->l4 == false)
            <p class=text-success>NAI</p>
          @else
            <p class=text-danger>ΟΧΙ</p>
          @endif
        </td>
        </tr>
        <tr>
          <td><p>Προέρχομαι απο πολύτεκνη οικογένεια (4 τέκνα και άνω τα οποία βρίσκονται σε κάποια βαθμίδα εκπαίδευσης) και το οικογενειακό και ατομικό μου εισόδημα δεν υπερβαίνει τις 22.000Ε κατά το πλέον πρόσφατο οικονομικό έτος</p></td>
          <td>
          @if($application->l5 == false)
            <p class=text-success>NAI</p>
          @else
            <p class=text-danger>ΟΧΙ</p>
          @endif
        </td>
        </tr>
        <tr>
          <td><p>Έχω ακυρώσει τη συμμετοχή μου στο Πρόγραμμα Σπουδών LLP/ERASMUS κατά τα προηγούμενα ακαδημαικά έτη</p></td>
          <td>
          @if($application->l6 == false)
            <p class=text-success>NAI</p>
          @else
            <p class=text-danger>ΟΧΙ</p>
          @endif
        </td>
        </tr>

  </tbody>
  </table>

  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Ξένη Γλώσσα</th>
        <th>Επίπεδο Γλωσσομάθειας</th>
      </tr>
    </thead>

    <tbody>
      @if($application->lang_id1)
      <tr>
          <td>{{$languages[$application->lang_id1]}}</td>
		      <td>{{$langlevel[$application->langlevel1]}}</td>
      </tr>
      @endif
      @if($application->lang_id2)
      <tr>
          <td>{{$languages[$application->lang_id2]}}</td>
		      <td>{{$langlevel[$application->langlevel2]}}</td>
      </tr>
      @endif
      @if($application->lang_id3)
      <tr>
          <td>{{$languages[$application->lang_id3]}}</td>
		      <td>{{$langlevel[$application->langlevel3]}}</td>
      </tr>
      @endif
    </tbody>
  </table>

  <table class="table table-condensed">
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
      @if($application->u1_id)
      <tr>
        <td>1η</td>
        <td>{{$universities[$application->u1_id]}}</td>
    		<td>{{$application->u1_studies}}</td>
    		<td>{{$application->u1_semester}}</td>
    		<td>{{$application->u1_months}}</td>
      </tr>
      @endif
      @if($application->u2_id)
      <tr>
        <td>2η</td>
        <td>{{$universities[$application->u2_id]}}</td>
    		<td>{{$application->u2_studies}}</td>
    		<td>{{$application->u2_semester}}</td>
    		<td>{{$application->u2_months}}</td>
      </tr>
      @endif
      @if($application->u3_id)
      <tr>
        <td>3η</td>
    		<td>{{$universities[$application->u3_id]}}</td>
    		<td>{{$application->u3_studies}}</td>
    		<td>{{$application->u3_semester}}</td>
    		<td>{{$application->u3_months}}</td>
      </tr>
      @endif
    </tbody>
  </table>




@if(EGuard::user()->type == 'Administrator')
<div class='row'>
    <div class="col-md-12">
    <a href="{{URL::to('/').'/..'.Storage::url('app/documents/'.$application->id.'.zip')}}">Μεταφόρτωση επισυναπτόμενων εγγράφων</a>
  </div>
</div>
@endif

</div>

</div>
</div>
{!! Form::close() !!}

@if(EGuard::user()->type == 'Administrator')
{!! Form::open(array('action' => ('Admin\ApplicationController@verify'))) !!}
{{Form::hidden('id', $application->id)}}
<div class='form-inline'>
{{Form::label('additional_pts', 'Επιπρόσθετα μόρια λόγω επισυναπτόμενων πιστοποιητικών: ')}}
{{Form::number('additional_pts', $application->additional_pts, ['style' => 'width:100px', 'class'=>'form-control', 'readonly' => 'readonly'])}}

@if($application->confirmed == false)
{!! Form::submit('Έγκριση αίτησης',array('class' => 'btn btn-success pull-right')) !!}

<!-- <a class="btn btn-warning" href="{{route('admin.application.edit' , $application->id)}}" role="button"><i class="fa fa-plus"></i> Επεξεργασία</a> -->

@endif

{!! Form::close() !!}

<!-- AKYROSH EGKRISHS -->
{!! Form::open(array('action' => ('Admin\ApplicationController@unverify'))) !!}
{{Form::hidden('id', $application->id)}}
<div class='form-inline'>

@if($application->confirmed == true)
{!! Form::submit('Ακύρωση εγκρισης της αίτησης',array('class' => 'btn btn-danger pull-right')) !!}
@endif

{!! Form::close() !!}


</div>
@endif
@endsection
