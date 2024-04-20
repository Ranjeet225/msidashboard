<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller{

    public function index(){
        return view("admin.login");
    }

    public function dashboard(){
        return view('admin.dashboard');
    }
    // login Auth
    public function adminlogin(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin/dashboard');
        }
        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function adminprofile(){
        $admin = user::get();
        return view('admin.profile.profile',compact('admin'))->with('i');
    }

    public function logoutadmin(){
        Auth::logout();
        return redirect('/login');
    }

    public function adminchangepassword(Request $request){
        $user = auth()->user();
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('success', 'Current Password Not Match.');
        }
        if($request->new_password==$request->confirm_password){
            $admin = User::find(Auth::user()->id);
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success', 'Password changed successfully.');
        } else {
            return redirect()->back()->with('success', 'New Password Or confirm Password Not match.');
        }
    }

    public function CreateAdmin(Request $request){
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|max:255',
            'status' => 'required|boolean',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
        }

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->status = $request->status;
        if($data->save()){
            return response()->json(['status'=>true,'message'=>'Record Successfully add!']);
        } else {
            return response()->json(['status'=>false,'message'=>'Query Not Run!']);
        }

    }

    public function EditAdmin($id){
        $user = User::where('id',$id)->first();
        if(!empty($user)){
            return response(['status'=>true,'data'=>$user]);
        } else {
            return response(['status'=>false,'data'=>$user]);
        }
    }

    public function UpdateAdmin(Request $request){
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'status' => 'required|boolean',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
        }

        $data = User::find($request->id);
        $data->name = $request->name;
        $data->email = $request->email;
        if(!empty($request->password)){
           $data->password = $request->password;
        }
        $data->status = $request->status;
        if($data->save()){
            return response()->json(['status'=>true,'message'=>'Record Successfully add!']);
        } else {
            return response()->json(['status'=>false,'message'=>'Query Not Run!']);
        }
    }

    public function admindelete($id){
        $admin = User::find($id);
        $admin->delete();
        return redirect()->route('country.index')->with('success', 'Admin Deleted successfully.');
    }

}
