<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users.signup');
    }

    public function signup()
    {
        return view('users.signup');
    }

    public function store(Request $request)
    {
        $request->validate([
            'u_name' => 'required|string|max:255',
            'u_email' => 'required|string|email|max:255|unique:users',
            'u_phone' => 'required|string|max:255',
            'u_address' => 'required|string|max:255',
            'u_password' => 'required|string|min:6',
        ]);
        
        $user = new User();
        $user->u_name = $request->u_name;
        $user->u_email = $request->u_email;
        $user->u_phone = $request->u_phone;
        $user->u_address = $request->u_address;
        $user->u_password = bcrypt($request->u_password);
        $user->save();

        return redirect('/login')
            ->with('success', 'User created successfully.');
    }

    public function auth(Request $request){
        $request->validate([
            'u_email' => 'required|string|email|max:255',
            'u_password' => 'required|string|min:6',
        ]);

        $user = User::where('u_email', $request->u_email)->first();
        if($user){
            if(password_verify($request->u_password, $user->u_password)){
                $request->session()->put('userdata',array('u_name'=>$user->u_name,  'u_email'=>$user->u_email, 
                 'u_phone'=>$user->u_phone,  'u_address'=>$user->u_address,  'id'=>$user->id));

                return redirect()->route('dashboard')
                    ->with('success', 'Welcome '.$user->u_name);
            }else{
                return redirect()->route('login')
                    ->with('error', 'Invalid password.');
            }
        }else{
            return redirect()->route('login')
                ->with('error', 'Invalid email.');
        }
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.update', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        $user = User::find($user->id);
        $user->u_name = $request->name;
        $user->u_email = $request->email;
        $user->u_phone = $request->phone;
        $user->u_address = $request->address;
        $user->u_password = bcrypt($request->password);
        $user->update($user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully.');
    }
}
