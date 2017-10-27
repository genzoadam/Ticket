@extends('layouts.app')
@section('content')
 <style>
  .jumbotron {
      background-color: #f4511e;
      color: #fff;
      padding: 100px 25px;
  }
  .container-fluid {
      padding: 60px 50px;
  }
  .bg-grey {
      background-color: #f6f6f6;
  }
  .logo-small {
      color: #f4511e;
      font-size: 50px;
  }
  .logo {
      color: #f4511e;
      font-size: 200px;
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
  }
  </style>
<div class="container">
<div class="row">
<div class="col-md-12">

<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title"><center><strong>Mau tour kemana hari ini ?</strong></center></h2>
</div>
<div class="panel-body">
        <ul class="nav nav-tabs" role="tablist">
        <li class="active" role="presentation">
          <a href="#pesawat" aria-controls="pesawat" role="tab" data-toggle="tab">
          <i class="fa fa-plane"></i> Pesawat
          </a>
        </li>
        <li class="presentation">
          <a href="#kereta" aria-controls="kereta" role="tab" data-toggle="tab">
          <i class="fa fa-train"></i> Kereta
          </a>
        </li>
        <li class="presentation">
          <a href="#hotel" aria-controls="hotel" role="tab" data-toggle="tab">
          <i class="fa fa-hotel"></i> Hotel
          </a>
        </li>
        </ul>
      <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="pesawat">
          {!! Form::open(['url' => route('tickets.store'),
          'method' => 'post', 'files'=>'true', 'class'=>'form-horizontal']) !!}
          @include('tamus._form')
          {!! Form::close() !!}
      </div>
      <div role="tabpanel" class="tab-pane" id="kereta">
 <h1>Coming Soon... Sabar Boss...</h1>
      </div>
      <div role="tabpanel" class="tab-pane" id="hotel">
 <h1>Coming Soon... Sabar Boss...</h1>
      </div>
      </div>
      </div>

</div>
</div>


<!-- Container (Services Section) -->
<div class="container-fluid text-center">
  <h2>SERVICES</h2>
  <h4>What we offer</h4>
  <br>
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-off logo-small"></span>
      <h4>POWERFULL</h4>
      <p>Layanan dan kinerja yang powerfull</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-heart logo-small"></span>
      <h4>LOVE</h4>
      <p>Melayani dengan cinta</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-lock logo-small"></span>
      <h4>JOB DONE</h4>
      <p>Kepuasan anda merupakan prioritas kami</p>
    </div>
  </div>
  <br><br>
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-leaf logo-small"></span>
      <h4>GREEN</h4>
      <p>Peduli dengan alam sekitar</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-certificate logo-small"></span>
      <h4>CERTIFIED</h4>
      <p>Sudah terverifikasi</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-wrench logo-small"></span>
      <h4 style="color:#303030;">HARD WORK</h4>
      <p>Kerja keras adalah jiwa kami</p>
    </div>
  </div>
</div>


</div>
</div>
</div>
@endsection
@section('scripts')
{!! $html->scripts() !!}
@endsection