<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;
 
class AuthController extends Controller
{
 
    public function index()
    {
        return view('login');
    }  
 
    public function registration()
    {
        return view('registration');
    }
     
    public function postLogin(Request $request)
    {
        request()->validate([
        'u_email' => 'required',
        'u_password' => 'required',
        ]);
 
        $user = User::where('u_email', $request->u_email)->first();
        if($user){
            if(password_verify($request->u_password, $user->u_password)){
                $request->session()->put('userdata',array('u_name'=>$user->u_name,  'u_email'=>$user->u_email, 
                 'u_phone'=>$user->u_phone,  'u_address'=>$user->u_address,  'id'=>$user->id));
                return redirect('/')
                    ->with('success', 'Welcome '.$user->u_name);
            }else{
                return redirect('/login')
                    ->with('error', 'Invalid password.');
            }
        }else{
            return redirect('/login')
                ->with('error', 'Invalid email.');
        }
    }
 
    public function postRegistration(Request $request)
    {  
        request()->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        ]);
         
        $data = $request->all();
 
        $check = $this->create($data);
       
        return redirect("/")->withSuccess('Great! You have Successfully loggedin');
    }
     
    public function dashboard()
    {
 
      if(Auth::check()){
        return view('dashboard');
      }
      return redirect("login")->withSuccess('Opps! You do not have access');
    }
 
    // public function create(array $data)
    // {
    //   return User::create([
    //     'name' => $data['name'],
    //     'email' => $data['email'],
    //     'password' => Hash::make($data['password'])
    //   ]);
    // }
     
    public function logout(Request $request) {
        $request->session()->flush();
        return Redirect('login');
    }
}