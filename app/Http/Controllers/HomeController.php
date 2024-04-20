<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Client;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Success;
use App\Models\Support;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $testimonialData;

    public function __construct(Testimonial $testimonial)
    {
        $this->testimonialData = $testimonial->get();
    }

    public function index()
    {
        $sliderData = Slider::with('images')->where('status','1')->first();
        $supportData = Support::get();
        $aboutData = About::take(1)->get();
        $serviceData = Service::take(9)->get();
        $testimonialData=$this->testimonialData;
        return view('index', compact('sliderData', 'supportData', 'aboutData', 'serviceData', 'testimonialData'));
    }

    public function about()
    {
        $aboutData = About::get();
        $teams = Team::get();
        $testimonialData=$this->testimonialData;
        return view('about', compact('aboutData', 'teams', 'testimonialData'));
    }

    public function service()
    {
        $service = Service::get();
        $success = Success::get();
        $testimonialData=$this->testimonialData;
        return view('service', compact('service', 'success', 'testimonialData'));
    }

    public function clients()
    {
        $clients = Client::get();
        $testimonialData=$this->testimonialData;
        return view('clients', compact('clients', 'testimonialData'));
    }

    public function teams()
    {
        $teams = Team::get();
        $testimonialData=$this->testimonialData;
        return view('team', compact('teams', 'testimonialData'));
    }
}
