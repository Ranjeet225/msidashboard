<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Client;
use App\Models\Ideology;
use App\Models\Project;
use App\Models\Service;
use App\Models\ServiceDetails;
use App\Models\Slider;
use App\Models\Success;
use App\Models\Support;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliderData = Slider::with('images')->where('status','1')->first();
        $supportData = Support::get();
        $aboutData = About::take(1)->get();
        // $serviceData = Service::take(9)->get();
        $serviceData =Service::with('servicedetails')->take(9)->get();
        $project_details =Project::with('projectdetails')->take(9)->get();
        return view('index', compact('sliderData', 'supportData', 'aboutData', 'serviceData','project_details'));
    }

    public function about()
    {
        $aboutData = About::get();
        $teams = Team::get();
        return view('about', compact('aboutData', 'teams'));
    }

    public function service()
    {
        // $service = Service::get();
        $service_details =Service::with('servicedetails')->get();
        $success = Success::get();
        return view('service', compact('service_details', 'success'));
    }

    public function project()
    {
        $project_details =Project::with('projectdetails')->get();
        return view('project', compact('project_details'));
    }

    public function ideology()
    {
        $ideology_details =Ideology::with('ideologydetails')->get();
        return view('project', compact('project_details'));
    }

    public function clients()
    {
        $clients = Client::get();
        return view('clients', compact('clients'));
    }

    public function teams()
    {
        $teams = Team::get();
        return view('team', compact('teams'));
    }

    public function ProjectDetails($id)
    {
        $project_details =Project::with('projectdetails')->where('id',$id)->get();
        return view('project-details',compact('project_details'));
    }
    public function IdeologyDetails($id)
    {
        $ideology_details =Ideology::with('ideologydetails')->where('id',$id)->get();
        return view('ideology-details',compact('ideology_details'));
    }
    public function ServiceDetails($id)
    {
        $service_details =Service::with('servicedetails')->where('id',$id)->get();
        return view('service-details',compact('service_details'));
    }
}
