<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\AuthModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function admin()
    {
        return view('admin');
    }

    public function signup()
    {
        return view('signup');
    }

   
    public function dashboard()
    {
        return view('dashboard');
    }

    public function register(Request $request)
    {       
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:55|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|',
        ]);      
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        AuthModel::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('admin')->with('success', 'Registration successful! Please login.');
    }


    public function adminregister(Request $request)
    {       
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:55|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|',
        ]);      
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        AuthModel::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('tables')->with('success', 'Registration successful! Please login.');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return redirect()->route('dashboard')->with('success', 'Logged in successfully!');
            
        }
        return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logged out successfully.');
    }


}




