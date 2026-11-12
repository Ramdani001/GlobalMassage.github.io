<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; use App\Models\Setting; use Illuminate\Http\Request;
class SettingController extends Controller {
 public function edit(){ $settings=Setting::pluck('value','key')->all();$pendingOrders=\App\Models\Order::where('status','Pending')->count();return view('admin.settings.edit',compact('settings','pendingOrders')); }
 public function update(Request $r){$data=$r->validate(['site_name'=>'required|string|max:150','whatsapp_number'=>'required|string|max:30','tagline'=>'nullable|string|max:255','services_title'=>'nullable|string|max:255','services_description'=>'nullable|string|max:1000','maintenance_mode'=>'nullable|boolean']);foreach(['site_name','whatsapp_number','tagline','services_title','services_description'] as $key)Setting::updateOrCreate(['key'=>$key],['value'=>$data[$key]??'']);Setting::updateOrCreate(['key'=>'maintenance_mode'],['value'=>$r->boolean('maintenance_mode')?'1':'0']);return back()->with('success','Pengaturan berhasil disimpan.');}
}
