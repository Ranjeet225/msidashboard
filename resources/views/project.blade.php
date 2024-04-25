@extends('layouts.app')
@section('content')
<div class="innerPageBanner">
    <div class="centrizedDiv">
      <h1 class="">Our Projects</h1>
    </div>
  </div>

  <div class="services ">
    <div class="container">
      <div class="row">
        @foreach ($project_details as $item)
        <div class="col-md-4 ">
          <br />
          <div class="card">
            @if(!empty($item->projectdetails[0]->images))
            <img src="{{asset($item->projectdetails[0]->images)}}" class="card-img-top" alt="..." />
            @endif
            <a href="{{route('project-details',[$item->id])}}" style="text-decoration: none">
                <div class="card-body custombody">{!! $item->title !!}</div>
             </a>
          </div>
        </div>
        @endforeach
    </div>
  </div>
  <!-- Success -->
@endsection
