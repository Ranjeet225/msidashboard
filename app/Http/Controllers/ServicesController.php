<?php

namespace App\Http\Controllers;

use App\Models\services;
use App\Models\department;
use Illuminate\Http\Request;
use Validator;
class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $department = department::latest()->get();
        $services = services::with('department')->latest()->paginate(10);
        //dd($services);
        return view('admin.services.index',compact('department','services'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'service_name' => 'required|string|max:255',
            'provider' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'amount' => 'required|string|max:255',
            'description' => 'required|string',    
            'status' => 'required|boolean',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
        }
        $data = new services();
        $data->service_name = $request->service_name;
        $data->provider_type = $request->provider;
        $data->department_id = $request->department;
        $data->amount = $request->amount;
        $data->description = $request->description;
        $data->status = $request->status;
        if($data->save()){
            return response()->json(['status'=>true,'message'=>'Record Successfully add!']);
        } else {
            return response()->json(['status'=>true,'message'=>'Query not Run!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $services = services::select('id','service_name','provider_type','amount','description','department_id','status')->where('id',$id)->first();
        if(!empty($services)){
            return response(['status'=>true,'data'=>$services]);
        } else {
            return response(['status'=>false,'data'=>$services]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, services $services)
    {
        $rules = [
            'service_name' => 'required|string|max:255',
            'provider' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'amount' => 'required|string|max:255',
            'description' => 'required|string',    
            'status' => 'required|boolean',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
        }
        $data = services::find($request->id);
        $data->service_name = $request->service_name;
        $data->provider_type = $request->provider;
        $data->department_id = $request->department;
        $data->amount = $request->amount;
        $data->description = $request->description;
        $data->status = $request->status;
        if($data->save()){
            return response()->json(['status'=>true,'message'=>'Record Successfully Update!']);
        } else {
            return response()->json(['status'=>true,'message'=>'Query not Run!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(services $services,$id)
    {
       
        // $check = department::where('id',$services->id)->first();
        // if(empty($check)){
            services::where('id', '=', $id)->delete();
            return redirect()->route('services.index')->with('success', 'Deleted successfully.');
        // } else {
        //     return redirect()->route('country.index')->with('success', 'Cannot delete Department It is currently assigned to one or more State.');
        // } 
    }
}
