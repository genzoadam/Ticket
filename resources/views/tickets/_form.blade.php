<div class="form-group {!! $errors->has('lokasi_id') ? 'has-error' : '' !!}">
	{!! Form::label('lokasi_id', 'Lokasi', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('lokasi_id', [''=>'']+App\Lokasi::pluck('name','id')->all(), null, ['class'=>'js-selectize form-control', 'placeholder'=>'Pilih Lokasi']) !!}
		{!! $errors->first('lokasi_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group {!! $errors->has('tujuan_id') ? 'has-error' : '' !!}">
	{!! Form::label('tujuan_id', 'Tujuan', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('tujuan_id', [''=>'']+App\Tujuan::pluck('name','id')->all(), null, ['class'=>'js-selectize form-control', 'placeholder'=>'Pilih Tujuan']) !!}
		{!! $errors->first('tujuan_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group {!! $errors->has('pesawat_id') ? 'has-error' : '' !!}">
	{!! Form::label('pesawat_id', 'Pesawat', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('pesawat_id', [''=>'']+App\Pesawat::pluck('name','id')->all(), null, ['class'=>'js-selectize form-control', 'placeholder'=>'Pilih pesawat']) !!}
		{!! $errors->first('pesawat_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group {!! $errors->has('kelas_id') ? 'has-error' : '' !!}">
	{!! Form::label('kelas_id', 'Kelas', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('kelas_id', [''=>'']+App\Kelas::pluck('name','id')->all(), null, ['class'=>'js-selectize form-control', 'placeholder'=>'Pilih Kelas']) !!}
		{!! $errors->first('kelas_id', '<p class="help-block">:message</p>') !!}
	</div>
</div><div class="form-group{{ $errors->has('fasilitas') ? ' has-error' : '' }}">
	{!! Form::label('fasilitas', 'Fasilitas', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('fasilitas', null, ['class'=>'form-control']) !!}
		{!! $errors->first('fasilitas', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }}">
	{!! Form::label('harga', 'Harga', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('harga', null, ['class'=>'form-control']) !!}
		{!! $errors->first('harga', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>