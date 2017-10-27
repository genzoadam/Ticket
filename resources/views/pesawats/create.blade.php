@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/admin/authors') }}">Pesawat</a></li>
<li class="active">Tambah Pesawat</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Tambah Penulis</h2>
</div>
<div class="panel-body">
{!! Form::open(['url' => route('pesawats.store'),
'method' => 'post', 'class'=>'form-horizontal']) !!}
@include('pesawats._form')
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection