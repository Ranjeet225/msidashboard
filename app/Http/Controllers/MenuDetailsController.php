<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Ideology;
use App\Models\ProjectDetails;
use App\Models\IdeologyDetails;
use App\Models\Service;
use App\MProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\ServiceDetails;

class MenuDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // service Details
    public function getServiceDetails()
    {
        $service_details = ServiceDetails::paginate(10);
        return view('admin.service_details.index', compact('service_details'));
    }
    public function createServiceDetails()
    {
        $title=Service::Select('title','id')->get();
        return view('admin.service_details.create', compact('title'));
    }
    public function storeServiceDetails(Request $request)
    {
        $data = [
            'title_id' => $request->title_id,
            'description' => $request->description,
        ];
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $imageName = time() . '_' . $images->getClientOriginalName();
            $data['images'] = 'admin/assets/service/' . $imageName;
            $images->move(public_path('admin/assets/service'), $imageName);
        }
        ServiceDetails::create($data);
        return redirect()->route('getServiceDetails')->with('success', 'Service Details added successfully.');
    }
    public function editServiceDetails($id)
    {
        $service_details = ServiceDetails::find($id);
        $title= Service::Select('title','id')->get();
        return view('admin.service_details.edit', compact('service_details','title'));
    }
    public function updateServiceDetails(Request $request, $id)
    {
        $service_details = ServiceDetails::findOrFail($id);
        $data = [
            'title_id' => $request->title_id,
            'description' => $request->description,
        ];
        if ($request->hasFile('images')) {
            $oldImagePath = public_path($service_details->image_path);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $uploadedImage = $request->file('images');
            $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
            $imagePath = 'admin/assets/service/' . $imageName;
            $uploadedImage->move(public_path('admin/assets/service'), $imageName);
            $data['images'] = $imagePath;
        }
        $service_details->update($data);
        return redirect()->route('getServiceDetails')->with('success', 'ServiceDetails updated successfully.');
    }
    public function deleteServiceDetails($id)
    {
        $service_details = ServiceDetails::find($id);
        if (!$service_details) {
            return redirect()->route('getServiceDetails')->with('error', 'ServiceDetails not found.');
        }
        $imagePath = public_path($service_details->filepath);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $deleted = $service_details->delete();
        if ($deleted) {
            return redirect()->route('getServiceDetails')->with('success', 'ServiceDetails deleted successfully.');
        } else {
            return redirect()->route('getServiceDetails')->with('error', 'Failed to delete Slider.');
        }
    }
    // project Details
    public function getProjectDetails()
    {
        $project_details = ProjectDetails::paginate(10);
        return view('admin.project_details.index', compact('project_details'));
    }
    public function createProjectDetails()
    {
        $title=Project::Select('title','id')->get();
        return view('admin.project_details.create', compact('title'));
    }
    public function storeProjectDetails(Request $request)
    {
        $data = [
            'title_id' => $request->title_id,
            'description' => $request->description,
        ];
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $imageName = time() . '_' . $images->getClientOriginalName();
            $data['images'] = 'admin/assets/project/' . $imageName;
            $images->move(public_path('admin/assets/project'), $imageName);
        }
        ProjectDetails::create($data);
        return redirect()->route('getProjectDetails')->with('success', 'Project Details added successfully.');
    }
    public function editProjectDetails($id)
    {
        $project_details = ProjectDetails::find($id);
        $title=Project::Select('title','id')->get();
        return view('admin.project_details.edit', compact('project_details','title'));
    }
    public function updateProjectDetails(Request $request, $id)
    {
        $project_details = ProjectDetails::findOrFail($id);
        $data = [
            'title_id' => $request->title_id,
            'description' => $request->description,
        ];
        if ($request->hasFile('images')) {
            $oldImagePath = public_path($project_details->image_path);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $uploadedImage = $request->file('images');
            $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
            $imagePath = 'admin/assets/project/' . $imageName;
            $uploadedImage->move(public_path('admin/assets/project'), $imageName);
            $data['images'] = $imagePath;
        }
        $project_details->update($data);
        return redirect()->route('getProjectDetails')->with('success', 'Project Details updated successfully.');
    }
    public function deleteProjectDetails($id)
    {
        $project_details = ProjectDetails::find($id);
        if (!$project_details) {
            return redirect()->route('getProjectDetails')->with('error', 'ProjectDetails not found.');
        }
        $imagePath = public_path($project_details->filepath);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $deleted = $project_details->delete();
        if ($deleted) {
            return redirect()->route('getProjectDetails')->with('success', 'ProjectDetails deleted successfully.');
        } else {
            return redirect()->route('getProjectDetails')->with('error', 'Failed to delete Slider.');
        }
    }
    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function getIdeologyDetails()
    {
        $ideology_details = IdeologyDetails::paginate(10);
        return view('admin.ideology_details.index', compact('ideology_details'));
    }
    public function createIdeologyDetails()
    {
        $title=Ideology::Select('title','id')->get();
        return view('admin.ideology_details.create', compact('title'));
    }
    public function storeIdeologyDetails(Request $request)
    {
        $data = [
            'title_id' => $request->title_id,
            'description' => $request->description,
        ];
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $imageName = time() . '_' . $images->getClientOriginalName();
            $data['images'] = 'admin/assets/ideology/' . $imageName;
            $images->move(public_path('admin/assets/ideology'), $imageName);
        }
        IdeologyDetails::create($data);
        return redirect()->route('getIdeologyDetails')->with('success', 'Ideology Details added successfully.');
    }
    public function editIdeologyDetails($id)
    {
        $ideology_details = IdeologyDetails::find($id);
        $title=Ideology::Select('title','id')->get();
        return view('admin.ideology_details.edit', compact('ideology_details','title'));
    }
    public function updateIdeologyDetails(Request $request, $id)
    {
        $ideology_details = IdeologyDetails::findOrFail($id);
        $data = [
            'title_id' => $request->title_id,
            'description' => $request->description,
        ];
        if ($request->hasFile('images')) {
            $oldImagePath = public_path($ideology_details->image_path);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $uploadedImage = $request->file('images');
            $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
            $imagePath = 'admin/assets/ideology/' . $imageName;
            $uploadedImage->move(public_path('admin/assets/project'), $imageName);
            $data['images'] = $imagePath;
        }
        $ideology_details->update($data);
        return redirect()->route('getIdeologyDetails')->with('success', 'Ideology Details updated successfully.');
    }
    public function deleteIdeologyDetails($id)
    {
        $ideology_details = IdeologyDetails::find($id);
        if (!$ideology_details) {
            return redirect()->route('getIdeologyDetails')->with('error', 'IdeologyDetails not found.');
        }
        $imagePath = public_path($ideology_details->filepath);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $deleted = $ideology_details->delete();
        if ($deleted) {
            return redirect()->route('getIdeologyDetails')->with('success', 'IdeologyDetails deleted successfully.');
        } else {
            return redirect()->route('getIdeologyDetails')->with('error', 'Failed to delete Slider.');
        }
    }
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
