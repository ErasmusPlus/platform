@extends('layouts.dashboard')
@php ( $title='Application' )
@php ( $description='Apply for Erasmus+')

@section('content')
            <div class="box-header with-border">
			<div class='col-md-6'>
              <h3 class="box-title">Personal:</h3>
			 </div>
            <div class='col-md-6'>
              <h1 class="box-title">Education:</h1s>
			 </div>
			</div>
            <!-- /.box-header -->
            <div class="box-body">
			  {!! Form::open() !!}
                <!-- text input -->

				<div class="form-group">
				<div class='col-md-6'>
				<div class="col-xs-8">
   				<div class="form-group">
					{!! Form::label('name','Όνομα:') !!}
					{{  $appls->name }}
				</div>

				<div class="form-group">
					{!! Form::label('lastname','Επίθετο:') !!}
					{{  $appls->lname }}
				</div>
				<div class="form-group">
					{!! Form::label('idnum','Αρ. Ταυτότητας:') !!}
					{{  $appls->idnum }}
				</div>
				<div class="form-group">
				{!! Form::label('dob','Ημ. γέννησης:') !!}
				{{  $appls->dob }}
				</div>
				<div class="form-group">
				{!! Form::label('pob','Τόπος γέννησης:') !!}
				{{  $appls->pob }}
				</div>
				<div class="form-group">
				{!! Form::label('resplace','Τόπος μόνιμης κατοικίας:') !!}
				{{  $appls->resplace }}
				</div>
				<div class="form-group">
				{!! Form::label('numstreet','Οδός-Αριθμός:') !!}
				{{  $appls->numstreets }}
				</div>
				<div class="form-group">
				{!! Form::label('postalcode','ΤΚ:') !!}
				{{  $appls->postalcode }}
				</div>
				<div class="form-group">
				{!! Form::label('tel','Τηλέφωνο:') !!}
				{{  $appls->tel }}
				</div>
				<div class="form-group">
				{!! Form::label('mobile','Κινητό:') !!}
				{{  $appls->mobile }}
				</div>
				<div class="form-group">
				{!! Form::label('mail','E-mail:') !!}
				{{  $appls->mail }}
				</div>
				</div>

				</div>

				<div class='col-md-6'>
				<div class="col-xs-8">
				 <div class="form-group">
				{!! Form::label('typestudent','Τύπος φοιτητή:') !!} <br>
				{{  $appls->typestudent }}
				</div>


				 <div class="form-group">
				{!! Form::label('yearun','Έτος σπουδών:') !!}
				{{  $appls->yearun }}
				</div>
				 <div class="form-group">
				{!! Form::label('univ','Σχολή:') !!}
				{{  $appls->univ }}
				</div>
				<div class="form-group">
				{!! Form::label('dep','Τμήμα:') !!}
				{{  $appls->dep }}
				</div>
				<div class="form-group">
				{!! Form::label('country','Χώρα:') !!}
				{{  $appls->country }}
				</div>

				<br>
				<label>Διάστημα Τοποθέτησης:</label>
				<input class="form-control" placeholder="Enter ..." type="text" maxlength="30" size="4dp">

				</br>
				<label>Φορέας Τοποθέτησης:</label>
				<input class="form-control" placeholder="Enter ..." type="text" maxlength="30" size="4dp">
				<br>

				{!! Form::label('past','Προηγούμενη συμμετοχή στο Erasmus+:') !!} <br>
				 {{  $appls->past }}
                  </div>
				</br>


				</div>
				</div>
				<div class='col-md-12'>

				{!! Form::label('aboutme','Παρουσιάστε συνοπτικά τα κίνητρα/λόγους συμμετοχής σας στο πρόγραμμα:') !!} <br>
				{{  $appls->aboutme }}
				<br>
				<br>
              </form>
         <form method="get" action="getpdf">
    <button type="submit">Κενή Δήλωση PDF</button>
</form>
				</div>
			   </div>
         {!! Form::close() !!}

            <!-- /.box-body -->



@endsection
