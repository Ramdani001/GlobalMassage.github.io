<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;use Illuminate\Http\Request;use Illuminate\Support\Facades\Hash;use Illuminate\Validation\Rules\Password;
class SecurityController extends Controller {
 public function edit(){return view('admin.security.edit');}
 public function update(Request $request){$data=$request->validate(['current_password'=>'required|string','password'=>['required','confirmed',Password::min(14)->mixedCase()->numbers()->symbols()->uncompromised()]]);if(!Hash::check($data['current_password'],$request->user()->password))return back()->withErrors(['current_password'=>'Password saat ini tidak sesuai.']);$request->user()->forceFill(['password'=>$data['password']])->save();$request->session()->regenerate();return back()->with('success','Password admin berhasil diperbarui.');}
}
