	
<table class="table table-hover table-striped table-bordered" action="">
	<thead>
		<tr>
			<th><i class="fa fa-plane"></i> Lokasi</th>
			<th><i class="fa fa-map-marker"></i> Tujuan</th>
			<th><i class="fa fa-calendar-plus-o"></i> Pergi</th>
			<th><i class="fa fa-calendar-minus-o"></i> <label>Pulang  <input type="checkbox" name="pulang"></label></th>
			<th><i class="fa fa-user-circle"></i> Penumpang</th>
			<th><i class="fa fa-signal"></i> Kelas</th>
			<th><i class="fa fa-hand-o-right"></i> Aksi</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>					
				{!! Form::select('lokasi_id', [''=>'']+App\Lokasi::pluck('name','id')->all(), null, ['class'=>'js-selectize form-control', 'placeholder'=>'Pilih / Cari']) !!}
				{!! $errors->first('lokasi_id', '<p class="help-block">:message</p>') !!}
			</td>
			<td>
				{!! Form::select('tujuan_id', [''=>'']+App\Tujuan::pluck('name','id')->all(), null, ['class'=>'js-selectize form-control', 'placeholder'=>'Pilih / Cari']) !!}
				{!! $errors->first('tujuan_id', '<p class="help-block">:message</p>') !!}
			</td>
			<td>
				{!! Form::text('pergi', null, ['class'=>'form-control datepicker input-sm', 'placeholder'=>'Pilih Tanggal']) !!}
				{!! $errors->first('pergi', '<p class="help-block">:message</p>') !!}
			</td>
			<td>
				{!! Form::text('pulang', null, ['class'=>'form-control datepicker input-sm', 'placeholder'=>'Pilih Tanggal']) !!}
				{!! $errors->first('pulang', '<p class="help-block">:message</p>') !!}
			</td>
			<td><input type="text" name="penumpang" class="form-control input-sm"></td>
			<td>
				{!! Form::select('kelas_id', [''=>'']+App\Kelas::pluck('name','id')->all(), null, ['class'=>'js-selectize form-control', 'placeholder'=>'Pilih / Cari']) !!}
				{!! $errors->first('kelas_id', '<p class="help-block">:message</p>') !!}
			</td>
			<td>
				{!! Form::submit('Cari', ['class'=>'btn btn-primary']) !!}
			</td>
		</tr>
	</tbody>
</table>