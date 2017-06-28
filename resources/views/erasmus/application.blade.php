@extends('layouts.dashboard')
@php ( $title='Αίτηση' )
@php ( $description='Αίτηση για Erasmus+')

@section('content')
            <!-- /.box-header -->
            <div class="box-body">
			  {!! Form::open() !!}
                <!-- text input -->

				<div class="form-group">
				<div class='col-md-6'>
				<div class="col-xs-8">
				<div class="form-group">
					{!! Form::label('idnum','Αρ. Ταυτότητας:') !!}
					{!! Form::text('idnum',null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
				{!! Form::label('dob','Ημ. γέννησης:') !!}
				{!! Form::text('dob',null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
				{!! Form::label('pob','Τόπος γέννησης:') !!}
				{!! Form::text('pob',null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
				{!! Form::label('resplace','Τόπος μόνιμης κατοικίας:') !!}
				{!! Form::text('resplace',null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
				{!! Form::label('numstreet','Οδός-Αριθμός:') !!}
				{!! Form::text('numstreet',null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
				{!! Form::label('postalcode','ΤΚ:') !!}
				{!! Form::text('postalcode',null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
				{!! Form::label('tel','Τηλέφωνο:') !!}
				{!! Form::text('tel',null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
				{!! Form::label('mobile','Κινητό:') !!}
				{!! Form::text('mobile',null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
				{!! Form::label('mail','E-mail:') !!}
				{!! Form::text('mail',null, ['class' => 'form-control']) !!}
				</div>
				</div>

				</div>

				<div class='col-md-6'>
				<div class="col-xs-8">

				 <div class="form-group">
				{!! Form::label('univ','Σχολή:') !!}
				{!! Form::text('univ',null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
				{!! Form::label('dep','Τμήμα:') !!}
				{!! Form::text('dep',null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
				{!! Form::label('country','Χώρα:') !!}
				{!! Form::text('country',null, ['class' => 'form-control']) !!}
				</div>

				<br>
				<label>Διάστημα Τοποθέτησης:</label>
				<input class="form-control" placeholder="Enter ..." type="text" maxlength="30" size="4dp">

				</br>
				<label>Φορέας Τοποθέτησης:</label>
				<input class="form-control" placeholder="Enter ..." type="text" maxlength="30" size="4dp">
				<br>

				{!! Form::label('past','Προηγούμενη συμμετοχή στο Erasmus+:') !!} <br>
				 {{ Form::radio('past', 'yes') }} Ναι  <br>
				 {{ Form::radio('past', 'no') }} Όχι
                  </div>
				</br>


				</div>
				</div>
				<div class='col-md-12'>

				{!! Form::label('aboutme','Παρουσιάστε συνοπτικά τα κίνητρα/λόγους συμμετοχής σας στο πρόγραμμα:') !!}
				{!! Form::textarea('aboutme',null, ['class' => 'form-control']) !!}

				<input type="submit" value="submit">
				</div>
			   </div>
         {!! Form::close() !!}
              </form>
            
            <!-- /.box-body -->



@endsection
