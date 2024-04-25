@extends('layouts.app')
@section('content')
    <div class="innerPageBanner ">
        <div class="centrizedDiv">
            <h1 class="">Our Services</h1>
        </div>
    </div>
    <!-- MSIl describe -->
    @foreach ($service_details as $item)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading text-center">{{ Str::ucfirst($item->title) }}</h4>
        </div>
        <div class="short-descrive mb-5">
            <div class="container">
                @foreach ($item->servicedetails as $data)
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{ asset($data->images) }}" alt="" class="short-descrive-left w-100"
                                style="width: 40% !important" />
                        </div>
                        <div class="col-md-7 mt-3">

                            <div>
                                {!! $data->description !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
@endsection
