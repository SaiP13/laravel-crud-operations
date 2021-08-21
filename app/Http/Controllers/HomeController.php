<?php

namespace App\Http\Controllers;
use App\UserModel;
use Illuminate\Http\Request;
use Session;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function users()
    {
        $data['userData'] = UserModel::getUserData();
        //$data['userData'] = DB::table('users')->paginate(2);

        return view('users')->with($data);
    }
    public function addUser()
    {
        return view('addUser');
    }
    public function addNewUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);
        $data['name'] = $request['name'];
        $data['email'] = $request['email'];
        $data['created_at'] = date('y-m-d h:i:s');
        $data['password'] = bcrypt($request['password']);
        
        $result = UserModel::addNewUser($data);
        if($result){
            $request->session()->flash('success', 'User Successfully Added!');
            return redirect('users');
        } else{
            $request->session()->flash('error', 'Failed ! Try again');
            return redirect('users');
        }

    }
    public function updateUser(Request $request,$id)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
            // "password" => 'required',
            // "password_confirmation" => 'required'
        ]);
        
        $data['name'] = $request['name'];
        $data['email'] = $request['email'];
        $data['updated_at'] = date('y-m-d h:i:s');
        //$data['password'] = bcrypt($request['password']);

        $result = UserModel::updateUserData($id,$data);
        if($result){
            $request->session()->flash('success', 'User Data Successfully Updated!');
            return redirect('users');
        } else{
            $request->session()->flash('error', 'Failed ! Try again');
            return redirect('users');
        }
        

    }
    public function editUser($id)
    {
        $userData = UserModel::getUserDetails($id);
        return view('addUser', compact('userData'));
    }
    public function deleteUser($id){
        
        $result = UserModel::deleteUser($id);
        if($result){
            \Session::flash('success', 'User successfully deleted!');
            return redirect('users');
        } else{
            return redirect('users');
        }

    }
}
