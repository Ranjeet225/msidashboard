<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Slider;
use App\Models\Image;
use App\Models\Support;
use App\Models\About;
use App\Models\Carrier;
use App\Models\Service;
use App\Models\Project;
use App\Models\Client;
use App\Models\Gallery;
use App\Models\Success;
use App\Models\Team;
use App\Models\Ideology;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;



class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // country
    // slider
    public function getSlider()
    {

        $slider = Slider::with('images')->paginate(10);
        return view('admin.slider.index', compact('slider'));
    }
    public function createSlider()
    {
        return view('admin.slider.create');
    }
    public function storeSlider(Request $request)
    {
        $slider = Slider::create([
            'discription' => $request->discription,
            'status' => $request->status,
        ]);
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $uploadedImage) {
                $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
                $imagePath = 'admin/assets/sliderimage/' . $imageName;
                $uploadedImage->move(public_path('admin/assets/sliderimage'), $imageName);
                $image = Image::create([
                    'slider_id' => $slider->id,
                    'filename' => $imageName,
                    'filepath' => $imagePath,
                ]);
            }
        }
        return redirect()->route('getSlider')->with('success', 'Slider added successfully.');
    }

    public function showSlider($id)
    {
        $slider = Slider::with('images')->find($id);
        return view('admin.slider.show', compact('slider'));
    }

    public function editSlider($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }
    public function updateSlider(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);
        $slider->update([
            'discription' => $request->discription,
            'status' => $request->status,
        ]);
        if ($request->hasFile('images')) {
            foreach ($slider->images as $image) {
                $imagePath = public_path($image->filepath);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $image->delete();
            }
            foreach ($request->file('images') as $uploadedImage) {
                $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
                $imagePath = 'admin/assets/sliderimage/' . $imageName;
                $uploadedImage->move(public_path('admin/assets/sliderimage'), $imageName);
                Image::create([
                    'slider_id' => $slider->id,
                    'filename' => $imageName,
                    'filepath' => $imagePath,
                ]);
            }
        }
        return redirect()->route('getSlider')->with('success', 'Slider updated successfully.');
    }
    public function updateSliderStatus(Request $request)
    {
        $sliderId = $request->input('slider_id');
        DB::table('sliders')->update(['status' => '0']);
        DB::table('sliders')->where('id', $sliderId)->update(['status' => '1']);
        return response()->json(['message' => 'Status updated successfully']);
    }
    public function deleteSlider($id)
    {
        $slider = Slider::find($id);
        if (!$slider) {
            return redirect()->route('getSlider')->with('error', 'Slider not found.');
        }
        $images = Image::where('slider_id', $id)->get();
        foreach ($images as $image) {
            $imagePath = public_path($image->filepath);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $image->delete();
        }
        $deleted = $slider->delete();
        if ($deleted) {
            return redirect()->route('getSlider')->with('success', 'Slider deleted successfully.');
        } else {
            return redirect()->route('getSlider')->with('error', 'Failed to delete Slider.');
        }
    }
    // support
    public function getSupport()
    {

        $support = Support::paginate(10);
        return view('admin.support.index', compact('support'));
    }
    public function createSupport()
    {
        return view('admin.support.create');
    }
    public function storeSupport(Request $request)
    {
        $data = [
            'content' => $request->content,
        ];
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $imageName = time() . '_' . $images->getClientOriginalName();
            $data['images'] = 'admin/assets/support/' . $imageName;
            $images->move(public_path('admin/assets/support'), $imageName);
        }
        Support::create($data);
        return redirect()->route('getSupport')->with('success', 'Support added successfully.');
    }
    public function editSupport($id)
    {
        $support = Support::find($id);
        return view('admin.support.edit', compact('support'));
    }
    public function updateSupport(Request $request, $id)
    {
        $support = Support::findOrFail($id);
        $data = [
            'content' => $request->content,
        ];
        if ($request->hasFile('images')) {
            $oldImagePath = public_path($support->image_path);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $uploadedImage = $request->file('images');
            $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
            $imagePath = 'admin/assets/support/' . $imageName;
            $uploadedImage->move(public_path('admin/assets/support'), $imageName);
            $data['images'] = $imagePath;
        }
        $support->update($data);
        return redirect()->route('getSupport')->with('success', 'Support updated successfully.');
    }
    public function deleteSupport($id)
    {
        $Support = Support::find($id);
        if (!$Support) {
            return redirect()->route('getSupport')->with('error', 'Support not found.');
        }
        $imagePath = public_path($Support->filepath);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $deleted = $Support->delete();
        if ($deleted) {
            return redirect()->route('getSupport')->with('success', 'Support deleted successfully.');
        } else {
            return redirect()->route('getSupport')->with('error', 'Failed to delete Slider.');
        }
    }
    // about
    public function getAbout()
    {

        $about = About::paginate(10);
        return view('admin.about.index', compact('about'));
    }
    public function createAbout()
    {
        return view('admin.about.create');
    }
    public function storeAbout(Request $request)
    {
        $data = [
            'content' => $request->content,
        ];
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $imageName = time() . '_' . $images->getClientOriginalName();
            $data['images'] = 'admin/assets/about/' . $imageName;
            $images->move(public_path('admin/assets/about'), $imageName);
        }
        About::create($data);
        return redirect()->route('getAbout')->with('success', 'About added successfully.');
    }
    public function editAbout($id)
    {
        $about = About::find($id);
        return view('admin.about.edit', compact('about'));
    }
    public function updateAbout(Request $request, $id)
    {
        $support = About::findOrFail($id);
        $data = [
            'content' => $request->content,
        ];
        if ($request->hasFile('images')) {
            $oldImagePath = public_path($support->image_path);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $uploadedImage = $request->file('images');
            $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
            $imagePath = 'admin/assets/about/' . $imageName;
            $uploadedImage->move(public_path('admin/assets/about'), $imageName);
            $data['images'] = $imagePath;
        }
        $support->update($data);
        return redirect()->route('getAbout')->with('success', 'About updated successfully.');
    }
    public function deleteAbout($id)
    {
        $About = About::find($id);
        if (!$About) {
            return redirect()->route('getAbout')->with('error', 'About not found.');
        }
        $imagePath = public_path($About->filepath);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $deleted = $About->delete();
        if ($deleted) {
            return redirect()->route('getAbout')->with('success', 'About deleted successfully.');
        } else {
            return redirect()->route('getAbout')->with('error', 'Failed to delete Slider.');
        }
    }

    // service
    public function getService()
    {

        $service = Service::paginate(10);
        return view('admin.service.index', compact('service'));
    }
    public function createService()
    {
        return view('admin.service.create');
    }
    public function storeService(Request $request)
    {
        $data = [
            'title' => $request->title,
        ];
        // if ($request->hasFile('images')) {
        //     $images = $request->file('images');
        //     $imageName = time() . '_' . $images->getClientOriginalName();
        //     $data['images'] = 'admin/assets/service/' . $imageName;
        //     $images->move(public_path('admin/assets/service'), $imageName);
        // }
        Service::create($data);
        return redirect()->route('getService')->with('success', 'Service added successfully.');
    }
    public function editService($id)
    {
        $service = Service::find($id);
        return view('admin.service.edit', compact('service'));
    }
    public function updateService(Request $request, $id)
    {
        $support = Service::findOrFail($id);
        $data = [
            'title' => $request->title,
        ];
        // if ($request->hasFile('images')) {
        //     $oldImagePath = public_path($support->image_path);
        //     if (file_exists($oldImagePath)) {
        //         unlink($oldImagePath);
        //     }
        //     $uploadedImage = $request->file('images');
        //     $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
        //     $imagePath = 'admin/assets/service/' . $imageName;
        //     $uploadedImage->move(public_path('admin/assets/service'), $imageName);
        //     $data['images'] = $imagePath;
        // }
        $support->update($data);
        return redirect()->route('getService')->with('success', 'Service updated successfully.');
    }
    public function deleteService($id)
    {
        $Service = Service::find($id);
        if (!$Service) {
            return redirect()->route('getService')->with('error', 'Service not found.');
        }
        // $imagePath = public_path($Service->filepath);
        // if (File::exists($imagePath)) {
        //     File::delete($imagePath);
        // }
        $deleted = $Service->delete();
        if ($deleted) {
            return redirect()->route('getService')->with('success', 'Service deleted successfully.');
        } else {
            return redirect()->route('getService')->with('error', 'Failed to delete Slider.');
        }
    }
    // Project
    public function getProject()
    {

        $project = Project::paginate(10);
        return view('admin.project.index', compact('project'));
    }
    public function createProject()
    {
        return view('admin.project.create');
    }
    public function storeProject(Request $request)
    {
        $data = [
            'title' => $request->title,
        ];
        Project::create($data);
        return redirect()->route('getProject')->with('success', 'Project added successfully.');
    }
    public function editProject($id)
    {
        $project = Project::find($id);
        return view('admin.project.edit', compact('project'));
    }
    public function updateProject(Request $request, $id)
    {
        $support = Project::findOrFail($id);
        $data = [
            'title' => $request->title,
        ];
        $support->update($data);
        return redirect()->route('getProject')->with('success', 'Project updated successfully.');
    }
    public function deleteProject($id)
    {
        $project = Project::find($id);
        if (!$project) {
            return redirect()->route('getProject')->with('error', 'Project not found.');
        }
        $deleted = $project->delete();
        if ($deleted) {
            return redirect()->route('getProject')->with('success', 'Project deleted successfully.');
        } else {
            return redirect()->route('getProject')->with('error', 'Failed to delete Slider.');
        }
    }

    // Client
    public function getClient()
    {

        $client = Client::paginate(10);
        return view('admin.client.index', compact('client'));
    }
    public function createClient()
    {
        return view('admin.client.create');
    }
    public function storeClient(Request $request)
    {
        $data = [
            'content' => $request->content,
        ];
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $imageName = time() . '_' . $images->getClientOriginalName();
            $data['images'] = 'admin/assets/client/' . $imageName;
            $images->move(public_path('admin/assets/client'), $imageName);
        }
        Client::create($data);
        return redirect()->route('getClient')->with('success', 'Client added successfully.');
    }
    public function editClient($id)
    {
        $client = Client::find($id);
        return view('admin.client.edit', compact('client'));
    }
    public function updateClient(Request $request, $id)
    {
        $support = Client::findOrFail($id);
        $data = [
            'content' => $request->content,
        ];
        if ($request->hasFile('images')) {
            $oldImagePath = public_path($support->image_path);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $uploadedImage = $request->file('images');
            $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
            $imagePath = 'admin/assets/client/' . $imageName;
            $uploadedImage->move(public_path('admin/assets/client'), $imageName);
            $data['images'] = $imagePath;
        }
        $support->update($data);
        return redirect()->route('getClient')->with('success', 'Client updated successfully.');
    }
    public function deleteClient($id)
    {
        $client = Client::find($id);
        if (!$client) {
            return redirect()->route('getClient')->with('error', 'Client not found.');
        }
        $imagePath = public_path($client->filepath);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $deleted = $client->delete();
        if ($deleted) {
            return redirect()->route('getClient')->with('success', 'Client deleted successfully.');
        } else {
            return redirect()->route('getClient')->with('error', 'Failed to delete Slider.');
        }
    }

    // Testimonial
    public function getTestimonials()
    {

        $testimonial = Testimonial::paginate(10);
        return view('admin.testimonial.index', compact('testimonial'));
    }
    public function createTestimonials()
    {
        return view('admin.testimonial.create');
    }
    public function storeTestimonials(Request $request)
    {
        $requestData = $request->except('_token');
        if ($request->hasFile('profile_picture')) {
            $picture = $request->file('profile_picture');
            $profilePIcture = time() . '.' . $picture->getClientOriginalExtension();
            $picture->move(public_path('admin/assets/testimonials'), $profilePIcture);
        } else {
            return redirect()->back()->withInput()->withErrors(['Profile Picture' => 'The Profile field is required.']);
        }
        $data = array_merge($requestData, ['profile_picture' => $profilePIcture]);
        Testimonial::insert($data);
        return redirect()->route('getTestimonials')->with('success', 'Testimonial added successfully.');
    }
    public function editTestimonials($id)
    {
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.edit', compact('testimonial'));
    }
    public function updateTestimonials(Request $request, $id)
    {
        $updateData = [
            'name' => $request->name,
            'designation' => $request->designation,
            'location' => $request->location,
            'testimonial_desc' => $request->testimonial_desc,
        ];
        if ($request->hasFile('profile_picture')) {
            $picture = $request->file('profile_picture');
            $profilePIcture = time() . '.' . $picture->getClientOriginalExtension();
            $picture->move(public_path('admin/assets/testimonials'), $profilePIcture);
            $updateData['profile_picture'] = $profilePIcture;
        }
        Testimonial::where('id', $id)->update($updateData);
        return redirect()->route('getTestimonials')->with('success', 'testimonial Updated successfully.');
    }
    public function deleteTestimonials($id)
    {
        $testimonial = Testimonial::where('id', $id)->first();
        $testimonialimagePath = public_path('admin/assets/testimonials/' . $testimonial->profile_picture);
        if (File::exists($testimonialimagePath)) {
            File::delete($testimonialimagePath);
        }
        $deleted = Testimonial::where('id', $id)->delete();
        if ($deleted) {
            return redirect()->route('getTestimonials')->with('success', 'testimonial deleted successfully.');
        } else {
            return redirect()->route('getTestimonials')->with('error', 'Failed to delete testimonial.');
        }
    }

    //gallery
    public function getGallery()
    {
        $gallery = Gallery::selectRaw('MAX(id) as id, aboutimage')
                        ->groupBy('aboutimage')
                        ->paginate(10);
        return view('admin.gallery.index', compact('gallery'));
    }

    public function createGallery()
    {
        return view('admin.gallery.create');
    }
    public function storeGallery(Request $request)
    {
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $uploadedImage) {
                $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
                $imagePath = 'admin/assets/gallery/' . $imageName;
                $uploadedImage->move(public_path('admin/assets/gallery'), $imageName);
                Gallery::create([
                    'filename' => $imageName,
                    'filepath' => $imagePath,
                    'aboutimage'=>$request->aboutimage
                ]);
            }
        }
        return redirect()->route('getGallery')->with('success', 'gallery added successfully.');
    }
    public function editGallery($id)
    {
        $gallery = Gallery::find($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function updateGallery(Request $request, $id)
    {
        $gallery = Gallery::find($id);
        if ($request->hasFile('images')) {
            foreach ($gallery->filepath as $image) {
                $imagePath = public_path($image->filepath);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $image->delete();
            }
            foreach ($request->file('images') as $uploadedImage) {
                $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
                $imagePath = 'admin/assets/gallery/' . $imageName;
                $uploadedImage->move(public_path('admin/assets/gallery'), $imageName);
                $gallery->images()->create([
                    'filename' => $imageName,
                    'filepath' => $imagePath,
                    'aboutimage' => $request->aboutimage
                ]);
            }
        } else {
            $gallery->update([
                'aboutimage' => $request->aboutimage
            ]);
        }
        return redirect()->route('getGallery')->with('success', 'Gallery Updated successfully.');
    }

    public function deleteGallery($id)
    {
        $gallery = Gallery::find($id);
        if (!$gallery) {
            return redirect()->route('getGallery')->with('error', 'Gallery Image not found.');
        }
        $galleryData = Gallery::where('aboutimage', $gallery->aboutimage)->get();
        if ($galleryData->isEmpty()) {
            return redirect()->route('getGallery')->with('error', 'Gallery Image not found.');
        }
        foreach ($galleryData as $image) {
            $imagePath = public_path($image->filepath);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $image->delete();
        }
        if ($galleryData->count() > 0) {
            return redirect()->route('getGallery')->with('success', 'Gallery deleted successfully.');
        } else {
            return redirect()->route('getGallery')->with('error', 'Failed to delete Gallery.');
        }
    }

    // carrier
        // about
    public function getCarrier()
    {

        $carrier = Carrier::paginate(10);
        return view('admin.carrier.index', compact('carrier'));
    }
    public function createCarrier()
    {
        return view('admin.carrier.create');
    }
    public function storeCarrier(Request $request)
    {
        $data = [
            'content' => $request->content,
        ];
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $imageName = time() . '_' . $images->getClientOriginalName();
            $data['images'] = 'admin/assets/carrier/' . $imageName;
            $images->move(public_path('admin/assets/carrier'), $imageName);
        }
        Carrier::create($data);
        return redirect()->route('getCarrier')->with('success', 'Carrier added successfully.');
    }
    public function editCarrier($id)
    {
        $carrier = Carrier::find($id);
        return view('admin.carrier.edit', compact('carrier'));
    }
    public function updateCarrier(Request $request, $id)
    {
        $support = Carrier::findOrFail($id);
        $data = [
            'content' => $request->content,
        ];
        if ($request->hasFile('images')) {
            $oldImagePath = public_path($support->image_path);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $uploadedImage = $request->file('images');
            $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
            $imagePath = 'admin/assets/carrier/' . $imageName;
            $uploadedImage->move(public_path('admin/assets/carrier'), $imageName);
            $data['images'] = $imagePath;
        }
        $support->update($data);
        return redirect()->route('getCarrier')->with('success', 'Carrier updated successfully.');
    }
    public function deleteCarrier($id)
    {
        $Carrier = Carrier::find($id);
        if (!$Carrier) {
            return redirect()->route('getCarrier')->with('error', 'Carrier not found.');
        }
        $imagePath = public_path($Carrier->filepath);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $deleted = $Carrier->delete();
        if ($deleted) {
            return redirect()->route('getCarrier')->with('success', 'Carrier deleted successfully.');
        } else {
            return redirect()->route('getCarrier')->with('error', 'Failed to delete Slider.');
        }
    }

    // teams
    public function getTeams()
    {

        $teams = Team::paginate(10);
        return view('admin.team.index', compact('teams'));
    }
    public function createTeams()
    {
        return view('admin.team.create');
    }

    public function storeTeams(Request $request)
    {
        $data = [
            'content' => $request->content,
            'name' => $request->name,
            'position' => $request->position,
        ];
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $imageName = time() . '_' . $images->getClientOriginalName();
            $data['images'] = 'admin/assets/team/' . $imageName;
            $images->move(public_path('admin/assets/team'), $imageName);
        }
        Team::create($data);
        return redirect()->route('getTeams')->with('success', 'Team added successfully.');
    }
    public function editTeams($id)
    {
        $teams = Team::find($id);
        return view('admin.team.edit', compact('teams'));
    }
    public function updateTeams(Request $request, $id)
    {
        $support = Team::findOrFail($id);
        $data = [
            'content' => $request->content,
            'name' => $request->name,
            'position' => $request->position,
        ];
        if ($request->hasFile('images')) {
            $oldImagePath = public_path($support->image_path);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $uploadedImage = $request->file('images');
            $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
            $imagePath = 'admin/assets/team/' . $imageName;
            $uploadedImage->move(public_path('admin/assets/team'), $imageName);
            $data['images'] = $imagePath;
        }
        $support->update($data);
        return redirect()->route('getTeams')->with('success', 'Team updated successfully.');
    }
    public function deleteTeams($id)
    {
        $teams = Team::find($id);
        if (!$teams) {
            return redirect()->route('getTeams')->with('error', 'Teams not found.');
        }
        $imagePath = public_path($teams->filepath);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $deleted = $teams->delete();
        if ($deleted) {
            return redirect()->route('getTeams')->with('success', 'Teams deleted successfully.');
        } else {
            return redirect()->route('getTeams')->with('error', 'Failed to delete Slider.');
        }
    }

    public function getSuccess()
    {

        $success = Success::paginate(10);
        return view('admin.success.index', compact('success'));
    }
    public function createSuccess()
    {
        return view('admin.success.create');
    }

    public function storeSuccess(Request $request)
    {
        $data = [
            'title' => $request->title,
            'number' => $request->number,
        ];
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $imageName = time() . '_' . $images->getClientOriginalName();
            $data['images'] = 'admin/assets/success/' . $imageName;
            $images->move(public_path('admin/assets/success'), $imageName);
        }
        Success::create($data);
        return redirect()->route('getSuccess')->with('success', 'Success added successfully.');
    }
    public function editSuccess($id)
    {
        $success = Success::find($id);
        return view('admin.success.edit', compact('success'));
    }
    public function updateSuccess(Request $request, $id)
    {
        $success = Success::findOrFail($id);
        $data = [
            'title' => $request->title,
            'number' => $request->number,
        ];
        if ($request->hasFile('images')) {
            $oldImagePath = public_path($success->image_path);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $uploadedImage = $request->file('images');
            $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
            $imagePath = 'admin/assets/success/' . $imageName;
            $uploadedImage->move(public_path('admin/assets/success'), $imageName);
            $data['images'] = $imagePath;
        }
        $success->update($data);
        return redirect()->route('getSuccess')->with('success', 'Success updated successfully.');
    }
    public function deleteSuccess($id)
    {
        $success = Success::find($id);
        if (!$success) {
            return redirect()->route('getSuccess')->with('error', 'Success Data not found.');
        }
        $imagePath = public_path($success->filepath);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $deleted = $success->delete();
        if ($deleted) {
            return redirect()->route('getSuccess')->with('success', 'Success  Data deleted successfully.');
        } else {
            return redirect()->route('getSuccess')->with('error', 'Failed to delete Slider.');
        }
    }


    // IDEOLOGY
    public function getIdeology()
    {

        $ideology = Ideology::paginate(10);
        return view('admin.ideology.index', compact('ideology'));
    }
    public function createIdeology()
    {
        return view('admin.ideology.create');
    }
    public function storeIdeology(Request $request)
    {
        $data = [
            'title' => $request->title,
        ];
        Ideology::create($data);
        return redirect()->route('getIdeology')->with('success', 'Ideology added successfully.');
    }
    public function editIdeology($id)
    {
        $ideology = Ideology::find($id);
        return view('admin.ideology.edit', compact('ideology'));
    }
    public function updateIdeology(Request $request, $id)
    {
        $support = Ideology::findOrFail($id);
        $data = [
            'title' => $request->title,
        ];
        $support->update($data);
        return redirect()->route('getIdeology')->with('success', 'Ideology updated successfully.');
    }
    public function deleteIdeology($id)
    {
        $ideology = Ideology::find($id);
        if (!$ideology) {
            return redirect()->route('getIdeology')->with('error', 'Ideology not found.');
        }
        $deleted = $ideology->delete();
        if ($deleted) {
            return redirect()->route('getIdeology')->with('success', 'Ideology deleted successfully.');
        } else {
            return redirect()->route('getProject')->with('error', 'Failed to delete Slider.');
        }
    }
}
