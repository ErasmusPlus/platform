@extends('layouts.dashboard')
@php ( $title='����������� �������' )
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
                <li class="active"><a data-toggle="tab" href="#tab1">������� �������� ���������</a></li>
                <li><a data-toggle="tab" href="#tab2">�������� ����������� �������������� ���������</a></li>
                <li><a data-toggle="tab" href="#tab3">��������������</a></li>
                <li><a data-toggle="tab" href="#tab4">������� ��������</a></li>
              </ul>
			  {!! Form::open(array('action' => ('ApplicationController@store') , 'files' => true)) !!}
                <!-- text input -->

                <div class="tab-content">
                  <div id="tab1" class="tab-pane fade in active">
                <div class='col-md-12'>
             
              <div class="row">
                  <div class="col-md-6">
        					{!! Form::label('surname_en','Surname (���� ����������� ��� ���������� ���)') !!}
        					{!! Form::text('surname_en',null, ['class' => 'form-control']) !!}
        				</div>
                <div class="col-md-6">
        					{!! Form::label('name_en','Name') !!}
        					{!! Form::text('name_en',null, ['class' => 'form-control']) !!}
        				</div>
              </div>

              <div class="row">
                  <div class="col-md-4">
        					{!! Form::label('fathersname','����� ������/Father\'s Name') !!}
        					{!! Form::text('fathersname',null, ['class' => 'form-control']) !!}
        				</div>
                <div class="col-md-4">
        					{!! Form::label('mothersname','����� ������/Mother\'s Name') !!}
        					{!! Form::text('mothersname',null, ['class' => 'form-control']) !!}
        				</div>
                <div class="col-md-1">
                  {!! Form::label('age','������/Age') !!}
                  {!! Form::number('age',null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::label('idno','������� ������� ����������/I.D. No') !!}
                  {!! Form::text('idno',null, ['class' => 'form-control']) !!}
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
        					{!! Form::label('iddate','��/��� ������� ����������') !!}
        					{!! Form::text('iddate',null, ['class' => 'form-control']) !!}
        				</div>
                <div class="col-md-4">
                  {!! Form::label('idloc','���� ������� ����������') !!}
                  {!! Form::text('idloc',null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-4">
                  {!! Form::label('amka','����') !!}
                  {!! Form::text('amka',null, ['class' => 'form-control']) !!}
                </div>
              </div>
              <div class="row">
                  <div class="col-md-4">
        					{!! Form::label('birthplace','����� ���������/Place of Birth') !!}
        					{!! Form::text('birthplace',null, ['class' => 'form-control']) !!}
        				</div>
                <div class="col-md-3">
        					{!! Form::label('birthdate','���������� ���������/Birth of Birth') !!}
        					{!! Form::text('birthdate',null, ['class' => 'form-control']) !!}
        				</div>
                <div class="col-md-2">
                  {!! Form::label('prefecture','�����/Prefecture:') !!}
                  {!! Form::text('prefecture',null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::label('citizenship','����������/Citizenship:') !!}
                  {!! Form::text('citizenship',null, ['class' => 'form-control']) !!}
                </div>
              </div>

              <div class="row">
                <h5><b>��������� ���������</b></h5>
                  <div class="col-md-3">

                  {!! Form::label('address_el','����') !!}
                  {!! Form::text('address_el',null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-1">
                  {!! Form::label('n�_el','�������') !!}
                  {!! Form::number('n�_el',null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-2">
                  {!! Form::label('city_el','����') !!}
                  {!! Form::text('city_el',null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-1">
                  {!! Form::label('tk','TK') !!}
                  {!! Form::number('tk',null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-3">
                  {!! Form::label('address_en','Address (�� ���������� ����������)') !!}
                  {!! Form::text('address_en',null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-2">
                  {!! Form::label('city_en','City') !!}
                  {!! Form::text('city_en',null, ['class' => 'form-control']) !!}
                </div>
              </div>
              <div class="row">
                  <div class="col-md-4">
        					{!! Form::label('tel','������� ��������') !!}
        					{!! Form::text('tel',null, ['class' => 'form-control']) !!}
        				</div>
                <div class="col-md-4">
        					{!! Form::label('mobtel','������ ��������') !!}
        					{!! Form::text('mobtel',null, ['class' => 'form-control']) !!}
        				</div>
                <div class="col-md-4">
                  {!! Form::label('email','Email (����������)') !!}
                  {!! Form::text('email',null, ['class' => 'form-control']) !!}
                </div>
              </div>

              <div class="row">
                  <div class="col-md-12">
                    {!! Form::checkbox('publictel') !!}
                  {!! Form::label('publictel','������� �� ������� �� �������� ��� �� ��������� ��� ������� ��� ������ �������� ERASMUS') !!}

                </div>
                  </div>
                  <div class="row">
                <div class="col-md-12">
                  {!! Form::label('insurance','������������ ���������� ��� �� �������� ��� ����������������� ��������� ��� ��������� ��� ���������: ',['class'=>'pull-left', 'style'=>'padding-top:7px']) !!}
<div class="col-md-4">
                  {!! Form::text('insurance',null, ['class' => 'form-control']) !!}
                </div>
                </div>

              </div>
              <hr>
              <a id="nexttab1" href="#tab2" class="btn btn-primary pull-right" role="button">������o</a>
            </div>
            </div>
            <div id="tab2" class="tab-pane fade">
             
              <br>
              <h5><b>����� ������� ��� ������� �������������:</b></h5>
              <div class="row">
                  <div class="col-md-4">
                    <div class="col-md-8">
                      {!! Form::label('lang_id1','������') !!}
          					  {!! Form::select('lang_id1',$languages,null, ['class' => 'form-control pull-right', 'placeholder' => "�������� ����� ������"]) !!}
                    </div>
                    <div class="col-md-4">
                      {!! Form::label('langlevel1','�������') !!}
                      {!! Form::select('langlevel1',$langlevel,null, ['class' => 'form-control pull-right']) !!}
					          </div>
        				</div>
                  <div class="col-md-4">
                    <div class="col-md-8">
                      {!! Form::label('lang_id2','������') !!}
          					  {!! Form::select('lang_id2',$languages,null, ['class' => 'form-control pull-right','placeholder' => "�������� ������� ������"]) !!}
					          </div>
                    <div class="col-md-4">
                      {!! Form::label('langlevel2','�������') !!}
                      {!! Form::select('langlevel2',$langlevel,null, ['class' => 'form-control pull-right']) !!}
					          </div>
        				</div>
                  <div class="col-md-4">
                    <div class="col-md-8">
                      {!! Form::label('lang_id3','������') !!}
          			  {!! Form::select('lang_id3',$languages,null, ['class' => 'form-control pull-right','placeholder' => "�������� ����� ������"]) !!}
					</div>
                    <div class="col-md-4">
                      {!! Form::label('langlevel3','�������') !!}
                      {!! Form::select('langlevel3',$langlevel,null, ['class' => 'form-control pull-right']) !!}




					</div>
        				</div>



</div>





              <br>
              <h5><b>������� �� �������������� ��� ������� ������� �� ��� ��� �� �������� ������������ �� ����� ��������������:</b></h5>
              <div class="row">
                  <div class="col-md-4">
        					{!! Form::select('u1_id',$universities,null, ['class' => 'form-control pull-right' ,'placeholder' => '����� �������������']) !!}
        				</div>
                <div class="col-md-4">
                  {!! Form::text('u1_studies',null, ['class' => 'form-control pull-right' ,'placeholder' => '������ �������']) !!}
        				</div>
                <div class="col-md-2">
                  {!! Form::label('u1_semester','���������') !!}
                  {{ Form::radio('u1_semester', '1') }}
                  {!! Form::label('u1_semester','������') !!}
                  {{ Form::radio('u1_semester', '2') }}
                </div>
                <div class="col-md-2">
                  {!! Form::number('u1_months',null, ['min' => '3','max' => '12' , 'class' => 'form-control pull-right' ,'placeholder' => '�����']) !!}
                </div>
              </div>
              <div class="row">
                  <div class="col-md-4">
        					{!! Form::select('u2_id',$universities,null, ['class' => 'form-control pull-right' ,'placeholder' => '����� �������������']) !!}
        				</div>
                <div class="col-md-4">
                  {!! Form::text('u2_studies',null, ['class' => 'form-control pull-right' ,'placeholder' => '������ �������']) !!}
        				</div>
                <div class="col-md-2">
                  {!! Form::label('u2_semester','���������') !!}
                  {{ Form::radio('u2_semester', '1') }}
                  {!! Form::label('u2_semester','������') !!}
                  {{ Form::radio('u2_semester', '2') }}
                </div>
                <div class="col-md-2">
                  {!! Form::text('u2_months',null, ['class' => 'form-control pull-right' ,'placeholder' => '�����']) !!}
                </div>
              </div>
              <div class="row">
                  <div class="col-md-4">
        					{!! Form::select('u3_id',$universities,null, ['class' => 'form-control pull-right' ,'placeholder' => '����� �������������']) !!}
        				</div>
                <div class="col-md-4">
                  {!! Form::text('u3_studies',null, ['class' => 'form-control pull-right' ,'placeholder' => '������ �������']) !!}
        				</div>
                <div class="col-md-2">
                  {!! Form::label('u3_semester','���������') !!}
                  {{ Form::radio('u3_semester', '1') }}
                  {!! Form::label('u3_semester','������') !!}
                  {{ Form::radio('u3_semester', '2') }}
                </div>
                <div class="col-md-2">
                  {!! Form::text('u3_months',null, ['class' => 'form-control pull-right' ,'placeholder' => '�����']) !!}
                </div>
              </div>
              <h5><i>**����������� ��� � ��������� ��������� ������ �� ����� ��������� 3 (�����) ��� 12 (������) �����</i></h5>
              <hr>
            {!! Form::checkbox('l1') !!}
            {!! Form::label('l1','������� �� ������� �� email ��� �� ��������� ��� ������� ��� ������ �������� ERASMUS') !!}
            <br>
            {!! Form::checkbox('l2') !!}
            {!! Form::label('l2','����� ����� �� ���������, ������� �� ��� �������� ��� ������������ � �.�') !!}
            <br>
            {!! Form::checkbox('l3') !!}
            {!! Form::label('l3','��� ����������� �� 25� ���� ��� ������� ��� �� ������� ��� �������� ��� ������� �� 9.000�') !!}
            <br>

		   {!! Form::checkbox('l4') !!}
            {!! Form::label('l4','��� ��� ����������� �� 25� ���� ��� ������� ��� ���������� ��� ���������� ��� �� ������������ �������� ��� ���������� ��� 9.000� ���� �� ����� �������� ���������� ����') !!}

		   <br>
            {!! Form::checkbox('l5') !!}
            {!! Form::label('l5','���������� ��� ��������� ���������� (4 ����� ��� ��� �� ����� ���������� �� ������ ������� �����������) ��� �� ������������ ��� ������� ��� �������� ��� ���������� ��� 22.000� ���� �� ����� �������� ���������� ����.') !!}
            <br>
            {!! Form::checkbox('l6') !!}
            {!! Form::label('l6','��� �������� �� ��������� ��� ��� ��������� ������� LLP/ERASMUS ���� �� ����������� ���������� ���') !!}

            <hr>
            <a id="nexttab2" href="#tab3" class="btn btn-primary pull-right" role="button">������o</a>


            </div>
            <div id="tab3" class="tab-pane fade">
              <br>
            <h4><b>�������������� �������� �������</b></h4>
              <h5>
                ��� ��� ���������� ��� �������� ��� ����������� �� �������� �������������:
                <br><br>
                �) ������� ���������� ��������
                <br>
                �) ��������� ��������������� �������������
                <br>
                �) ����������� ��������/������������� (���������) ��� �������� ��������� � ���������� �� ��������, ������ �������, ����������� �����������
            </h5>
            <br>
            ������������ �� �������������� ��� �� ��� ������ ��������� (zip) ��� �������� ��.
        			<div class="row">
        				<div class="col-md-12">
        					<input type="file" name="documents"  />
        				</div>
        			</div>



              <a id="nexttab3" href="#tab4" class="btn btn-primary pull-right" role="button">������o</a>
            </div>

            <div id="tab4" class="tab-pane fade">
              <br>
              <h4><b>�� ��� ������� ��� ������� ��� ������ �������� ���:</b></h4>

                <h5>
                �) ��� ��� ����� ���������� Erasmus ���� �� ����������� ���������� ���, � ����� ����������� �� �� ����� ������ ����������� ��� �� ���������� ���� 12 �����
                <br>
                �) ���� �� ����������� ��� ���������� ����� ��������.

              </h5>
                <br>




               {!! Form::submit('������� �������',array('class' => 'btn btn-primary')) !!}
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
