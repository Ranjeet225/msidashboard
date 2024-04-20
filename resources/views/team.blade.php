@extends('layouts.app')
@section('content')
<div class="meet-executive mt-5 mb-3">
    <div class="container">
      <div class="meet-executive-heading mb-5">
        <h1><span>Meet The Exexutive Teams</span></h1>
      </div>
      @foreach ($teams as $key =>$item)
      {{-- first start  --}}
        @if($key % 2 == 0)
        <div class="row mb-5">
            <div class="col-md-4">
                <div class="position-relative">
                    <img src="{{asset($item->images)}}"alt="" class="w-100" />
                    <div class="position-absolute meet-executive-name">
                    <p class="mb-0">{{$item->name}}</p>
                    <p>{{$item->position}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div>
                    <p>
                    <span style="color: #051025; font-weight: 600"
                        >{{$item->name}}</span
                    >{!! $item->content !!}
                    </p>
                </div>
            </div>
        </div>
        @else
        {{-- second start  --}}
        <div class="row mb-0">
            <div class="col-md-8">
                <div>
                    <p>
                    <span style="color: #051025; font-weight: 600"
                        >{{$item->name}} </span
                    >{!! $item->content !!}
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="position-relative">
                    <img src="{{asset('frontend/assets/images/ajit.png')}}"alt="" class="w-100" />
                    <div class="position-absolute meet-executive-name">
                    <p class="mb-0">{{$item->name}} </p>
                    <p>{{$item->position}} </p>
                    </div>
                </div>
            </div>
        </div>
        @endif
      @endforeach
    </div>
  </div>
@endsection
