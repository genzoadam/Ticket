@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/admin/tickets') }}">Ticket</a></li>
<li class="active">Tambah Tiket</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Tambah Tiket</h2>
</div>
<div class="panel-body">
{!! Form::open(['url' => route('tickets.store'),
'method' => 'post', 'files'=>'true', 'class'=>'form-horizontal']) !!}
@include('tickets._form')
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection