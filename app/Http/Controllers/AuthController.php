<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\RateLimiter;use Illuminate\Cache\RateLimiting\Limit;use Illuminate\Support\Str;
class AuthController extends Controller {
 public function create(){return view('auth.login');}
 public function store(Request $request){$request->validate(['email'=>'required|email|max:190','password'=>'required|string|max:200']);$key=Str::lower($request->input('email')).'|'.$request->ip();if(RateLimiter::tooManyAttempts($key,5))return back()->withErrors(['email'=>'Terlalu banyak percobaan login. Coba lagi dalam '.RateLimiter::availableIn($key).' detik.'])->onlyInput('email');if(Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password'),'is_admin'=>true],$request->boolean('remember'))){RateLimiter::clear($key);$request->session()->regenerate();$request->user()->forceFill(['last_login_at'=>now()])->save();return redirect()->intended(route('admin.dashboard'));}RateLimiter::hit($key,300);return back()->withErrors(['email'=>'Email atau password tidak sesuai.'])->onlyInput('email');}
 public function destroy(Request $request){Auth::logout();$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('login');}
}
