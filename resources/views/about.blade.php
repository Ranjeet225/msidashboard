@extends('layouts.app')
<style>
    .herosection {
      background-image: url(images/background.png);
      background-size: cover;
    }

    .banner {
      margin: 200px 0px;
    }

    .custombody {
      background: #fdbe33;
      text-align: center;
      font-size: 20px;
      color: black;
      font-weight: 500;
    }

    .testipara {
      color: white;
    }

    .dot {
      background: white;
    }

    #left-arrow {
      color: white;
    }

    #right-arrow {
      color: white;
    }
  </style>
@section('content')
  <div class="innerPageBanner ">
    <div class="centrizedDiv">
      <h1 class="">About us</h1>
    </div>
   </div>
   <!-- MSIl describe -->
   <div class="short-descrive mb-5">
    <div class="container">
        @foreach ($aboutData as $item)
        <div class="row">
          <div class="col-md-5">
            <img
              src="{{asset($item->images)}}"
              alt=""
              class="short-descrive-left w-100"
            />
          </div>
          <div class="col-md-7 mt-3">
            <div>
                {!! $item->content !!}
            </div>
          </div>
        </div>
        @endforeach
    </div>
  </div>




  <!-- tracl record -->
  <div class="track-record mb-5 mt-5">
    <div class="container">
      <div class="d-flex flex-row text-center">
        <h4 >
          We have proven track record of successfully completing
          construction of several Flyovers, Jetties, Bridges, Highways,
          Roads, Water Treatment Plants, Stadiums, Buildings, Fishing
          Harbours, Railway Station, Construction of Railway Double line
          etc.
        </h4>
      </div>
    </div>
  </div>

  <!-- Stand Quality -->
  <div class="stand-quality mt-5 mb-3">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <img src="{{asset('frontend/assets/images/Rectangle 13.png')}}"alt="" class="w-100" />
        </div>

        <div class="col-md-8">
          <div class="d-flex flex-column">
            <div class="stand-quality-heading">
              <h1>We are stand for quality</h1>
            </div>
            <div class="mt-5">
              <p style="font-size: 16px">
                We stand for quality and reliability of works, timely
                completion of projects, closest supervision of all sites,
                best project management, quick response to customer needs
                and technical support services.
              </p>
            </div>
            <div></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Meet the executive -->
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
