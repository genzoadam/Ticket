@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/admin/tickets') }}">Tiket</a></li>
<li class="active">Ubah Tiket</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Ubah Tiket</h2>
</div>
<div class="panel-body">
{!! Form::model($ticket, ['url' => route('tickets.update', $ticket->id),
'method' => 'put', 'class'=>'form-horizontal']) !!}
@include('tickets._form')
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection