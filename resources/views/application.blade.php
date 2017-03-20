@extends('layouts.dashboard')

{{ $page_title='Apply for Erasmus+' }}
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
              <form role="form">
                <!-- text input -->
				
				
                
				<div class="form-group">
				<div class='col-md-6'>
				<div class="col-xs-8">            
   				<label>Όνομα:</label> 
				  <input class="form-control" placeholder="Enter ..." type="text" maxlength="10" size="4">	
				<br>
				  <label>Επίθετο:</label> 
				  <input class="form-control" placeholder="Enter ..." type="text" maxlength="10" size="4dp">
                </br>
					<label>Αρ. Ταυτότητας:</label> 
				  <input class="form-control" placeholder="Enter ..." type="text" maxlength="10" size="4dp">
				
				<br>
				<label>Ημερομηνία γέννησης:</label> 
				<input class="form-control" placeholder="Enter ..." type="text" maxlength="10" size="4dp">				
				</br>
				<label>Τόπος γέννησης:</label> 
				<input class="form-control" placeholder="Enter ..." type="text" maxlength="10" size="4dp">								
				<br>
				  <label>Τόπος Μόνιμης Κατοικίας:</label> 
				  <input class="form-control" placeholder="Enter ..." type="text" maxlength="15" size="4dp">
				</br>				
				<label>Οδός-Αριθμός:</label> 
				<input class="form-control" placeholder="Enter ..." type="text" maxlength="15" size="4dp">
				<br>
				<label>TK:</label> 
				<input class="form-control" placeholder="Enter ..." type="text" maxlength="10" size="4dp">
				</br>
				<label>Τηλέφωνο:</label> 
				<input class="form-control" placeholder="Enter ..." type="text" maxlength="10" size="4dp">
				<br>
				<label>Κινητό:</label> 
				<input class="form-control" placeholder="Enter ..." type="text" maxlength="10" size="4dp">
				</br>
				<label>E-mail:</label> 
				<input class="form-control" placeholder="Enter ..." type="text" maxlength="30" size="4dp">																
				</div>
				
				</div>
				
				<div class='col-md-6'>
				<div class="col-xs-8">  
				 <label>Τύπος φοιτητή:</label>
                  <select multiple="" class="form-control" >
                    <option>Πρόπτυχιακος</option>
                    <option>Μέταπτυχιακός</option>
                    <option>Υποψήφιος Διδάκτορας</option>                  
                  </select>
				  <br>
				  <label>Έτος Σπουδών:</label> 
				  <input class="form-control" placeholder="Enter ..." type="text" maxlength="30" size="4dp">
				  </br>
				  <label>Σχολή:</label> 
				<input class="form-control" placeholder="Enter ..." type="text" maxlength="30" size="4dp">
				<br>
				 <label>Τμήμα:</label> 
				<input class="form-control" placeholder="Enter ..." type="text" maxlength="30" size="4dp">
				</br>
				<label>Χώρα:</label> 
				<input class="form-control" placeholder="Enter ..." type="text" maxlength="30" size="4dp">
				<br>
				<label>Διάστημα Τοποθέτησης:</label> 
				<input class="form-control" placeholder="Enter ..." type="text" maxlength="30" size="4dp">
				</br>
				<label>Φορέας Τοποθέτησης:</label> 
				<input class="form-control" placeholder="Enter ..." type="text" maxlength="30" size="4dp">
				<br>
				<label>Προηγούμενη συμμετοχή στο Erasmus+:</label> 
				 <div class="radio">
                    <div class='col-md-6'>
					<label>
                      <input name="optionsRadios" id="optionsRadios1" value="option1" type="radio">
                      Ναι					  
                    
					</label>
						</div>
					<label>
                     <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio">
                      Οχι
                    </label>
                  </div>
				</br>
			
				
				</div>
				</div>	
				<div class='col-md-12'>
				<br>
				 <label>Παρουσιάστε συνοπτικά τα κίνητρα/λόγους συμμετοχής σας στο πρόγραμμα:</label>
                  <textarea class="form-control" rows="7" placeholder="Enter ..."></textarea>
				</br>
				</div>
			   </div>
         
              </form>
            </div>
            <!-- /.box-body -->
          
			
				
@endsection