@extends('layouts.app')
@section('content')
<div class="innerPageBanner">
    <div class="centrizedDiv">
      <h1 class="">Services</h1>
    </div>
  </div>

  <!-- Services -->
  <div class="meet-executive-heading mb-5 mt-5">
    <h1><span>What we are providing</span></h1>
  </div>

  <div class="services ">
    <div class="container">
      <div class="row">
        @foreach ($service_details as $item)
        <div class="col-md-4">
          <br />
          <div class="card">
            @if(!empty($item->servicedetails[0]->images))
            <img src="{{asset($item->servicedetails[0]->images)}}" class="card-img-top" alt="..." />
            @endif
            <a href="{{route('service-details',[$item->id])}}" style="text-decoration: none">
                <div class="card-body custombody">{!! $item->title !!}</div>
             </a>
          </div>
        </div>
        @endforeach
    </div>
  </div>
  <!-- Success -->
  <div class="success">
    <div class="container">
      <div class="row">
        @foreach ($success as $item)
       <div class="col-md-3 d-flex">
          <div class="d-flex flex-row gap-3 justify-content-center align-items-center">
            <div>
              <img src="{{$item->images}}" alt="" />
            </div>
            <div class="d-flex flex-column expertworker">
              <div><h3 style="font-weight: 600">{{$item->number}}</h3></div>
              <div>
                <p style="color: white: !important">{{$item->title}}</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
     </div>
    </div>
  </div>
@endsection
