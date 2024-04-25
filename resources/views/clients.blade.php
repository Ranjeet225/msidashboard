@extends('layouts.app')
@section('content')
<div class="services m-5">
    <div class="container">
      <div class="row">
        @foreach ($clients as $item)
        <div class="col-md-3">
          <div class="position-relative">
            <img
              src="{{$item->images}}"
              alt="road"
              class="w-100"
              height = "250px"
            />
            <div class="position-absolute meet-executive-name">
              <p class="mb-0">{!! $item->content !!}</p>
            </div>
          </div>

        </div>
        @endforeach
    </div>
  </div>
  <br>
@endsection
