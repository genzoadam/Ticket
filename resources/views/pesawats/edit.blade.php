@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/admin/pesawats') }}">Pesawat</a></li>
<li class="active">Ubah Pesawat</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Ubah Pesawat</h2>
</div>
<div class="panel-body">
	{!! Form::model($pesawat, ['url' => route('pesawats.update', $pesawat->id), 'method'=>'put', 'class'=>'form-horizontal']) !!}
	@include('pesawats._form')
	{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection