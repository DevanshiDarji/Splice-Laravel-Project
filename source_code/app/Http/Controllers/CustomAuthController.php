<?php

namespace App\Http\Controllers;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;


class CustomAuthController extends BaseController{
    public function index(){
        return view('auth.login');
    }  
      
    public function customLogin(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')->accessToken; 
            $success['name'] =  $user->name;
           
            //return $this->sendResponse($success, 'User login successfully.');
            return redirect()->intended('dashboard')->withSuccess('Signed in');
        }else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }

    public function registration(){
        return view('auth.registration');
    }
      
    public function customRegistration(Request $request){  
       /* $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("dashboard")->withSuccess('You have signed-in');*/
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;
   
       // return $this->sendResponse($success, 'User register successfully.');
        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data){
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    
    public function dashboard(){
        if(Auth::check()){
            $products = Product::paginate(2);
            return view('dashboard', ['products' => $products]);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}