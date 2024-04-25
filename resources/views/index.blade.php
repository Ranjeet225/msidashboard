@extends('layouts.app')
@section('content')
  <!-- Hero Section -->

  @if(!empty($sliderData->images[0]->filepath))
  <div class="herosection" style="background-image: url('{{asset($sliderData->images[0]->filepath)}}');background-size: cover;">
  @else
  <div class="herosection" style="background-image: url('{{asset('frontend/assets/images/background.png')}}');background-size: cover;">
  @endif
    <div class="container">
      <div>
        <div class="row">
          <div class="col-md-6">
            <div class="banner">

                {!! $sliderData->discription ?? '' !!}
              {{-- <div><h1 style="font-weight: 600">We Are Trusted</h1></div> --}}
              {{-- <div>
                <h1 style="font-weight: 600">For Your Dream Home</h1>
              </div>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                <br />sed do eiusmod tempor incididunt ut labore
              </p> --}}
              <div class="short-descrive-left-seemore">
                <button type="button" class="btn see-more text-white">
                  See More
                </button>
              </div>
            </div>
          </div>

          <div class="col-md-6"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- we provide  -->
  <div class="weprovide mt-2">
    <div class="container">
      <div>
        <div class="row">
            @foreach ($supportData as $item)
            <div class="col-md-4 col-12">
              <div class="d-flex flex-row gap-3 justify-content-center align-items-center">
                <div>
                  <img src="{{asset($item->images)}}" alt="" />
                </div>
                <div class="d-flex flex-column expertworker">
                    {!! $item->content ?? '' !!}
                  {{-- <div><h3 style="font-weight: 600">Expert Worker</h3></div>
                  <div>
                    <p>
                      Lorem ipsum dolor sit amet elit. Phasus nec pretim
                      ornare velit non
                    </p>
                  </div> --}}
                </div>
              </div>
            </div>
            @endforeach

          {{-- <div class="col-md-4 col-12">
            <div class="qality-work flex-row gap-3">
              <div>
                <img src="{{asset('frontend/assets/images/quality.png')}}" alt="" />
              </div>
              <div class="d-flex flex-column qality">
                <div><h3 style="font-weight: 600">Quality Work</h3></div>
                <div>
                  <p>
                    Lorem ipsum dolor sit amet elit. Phasus nec pretim
                    ornare velit non
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-12">
            <div
              class="d-flex flex-row gap-3 justify-content-center align-items-center"
            >
              <div>
                <img src="{{asset('frontend/assets/images/24.png')}}" alt="" />
              </div>
              <div class="d-flex flex-column expertworker">
                <div><h3 style="font-weight: 600">24/7 Support</h3></div>
                <div>
                  <p>
                    Lorem ipsum dolor sit amet elit. Phasus nec pretim
                    ornare velit non
                  </p>
                </div>
              </div>
            </div>
          </div> --}}
        </div>
      </div>
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
                {!! \Illuminate\Support\Str::limit($item->content, 700, '...') !!}
              {{-- <div>
                <h2>Welcome to Builderz</h2>
              </div>
              <div class="short-descrive-left-btn">
                <h1 class="company_name">The M S Infraengineers Pvt</h1>
              </div> --}}
              {{-- <div class="mt-3">
                <p class="short-descrive-para">
                  A professional full service engineering and consulting firm
                  providing a diverse portfolio of services and solutions to
                  create a better environment. M S Infraengineers Pvt. Ltd.
                  was incorporated in 1976 and has offices located in Odisha,
                  India, which are supported by an experienced and talented
                  staff of more than 100 professionals.
                </p>
              </div> --}}
              <div class="short-descrive-left-seemore">
                <a href="{{route('about')}}">
                <button type="button" class="btn see-more text-white">
                  See More
                </button>
            </a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
    </div>
  </div>
  {{-- our service --}}
  <div class="short-descrive mb-5">
    <div class="container">
      <div class="row">

        <div class="col-3"></div>

        <div class="col-md-6">
          <div class="cntr" style="text-align: center">
            <div>
              <h2>Our Services</h2>
            </div>
            <div class="short-descrive-left-btn">
              <h1 class="company_name">We Provide Services</h1>
            </div>
          </div>
        </div>

        <div class="col-md-3"></div>
        @foreach ($serviceData as $item)
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
  </div>

   {{-- our project  --}}
   <div class="short-descrive mb-5">
    <div class="container">
      <div class="row">

        <div class="col-3"></div>

        <div class="col-md-6">
          <div class="cntr" style="text-align: center">
            <div class="short-descrive-left-btn">
                <h1 class="company_name">Our Projects</h1>
              </div>
          </div>
        </div>

        <div class="col-md-3"></div>
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
  </div>

  <div class="short-descrive mb-5" style="background: #fdbe33">
    <div class="container-fluid">
      <div class="row align-items-center justify-content-between">
        <div class="col-md-5">
          <h1 style="text-align: center; font-size: 100px; font-weight: 700">
            Quality
          </h1>
        </div>
        <div class="col-md-7" style="background-image: url({{asset('frontend/assets/images/99.png')}}); height: 400px"
        ></div>
      </div>
    </div>
  </div>
@endsection
