<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;use App\Models\Service;use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;
class ServiceController extends Controller {
 public function index(Request $r){$q=Service::query();if($r->filled('q'))$q->where('name','like','%'.$r->q.'%');if($r->filled('category'))$q->where('category',$r->category);$services=$q->orderBy('sort_order')->orderByDesc('id')->paginate(15)->withQueryString();return view('admin.services.index',compact('services'));}
 public function create(){ $service=new Service(); return view('admin.services.form',compact('service')); }
 public function store(Request $r){$data=$this->validated($r);if($r->hasFile('image'))$data['image_path']=$r->file('image')->store('services','public');Service::create($data);return redirect()->route('admin.services.index')->with('success','Layanan berhasil ditambahkan.');}
 public function edit(Service $service){return view('admin.services.form',compact('service'));}
 public function update(Request $r,Service $service){$data=$this->validated($r);if($r->hasFile('image')){$this->deleteImage($service->image_path);$data['image_path']=$r->file('image')->store('services','public');}if($r->boolean('remove_image')){$this->deleteImage($service->image_path);$data['image_path']=null;} $service->update($data);return redirect()->route('admin.services.index')->with('success','Layanan berhasil diperbarui.');}
 public function destroy(Service $service){if($service->orderItems()->exists()||\App\Models\Order::where('service_id',$service->id)->exists()){$service->update(['status'=>'Inactive']);}else{$this->deleteImage($service->image_path);$service->delete();}return back()->with('success','Layanan berhasil dihapus/nonaktifkan.');}
 private function deleteImage(?string $path):void{if($path)Storage::disk('public')->delete($path);}
 private function validated(Request $r):array{return $r->validate(['name'=>'required|string|max:150','category'=>'required|in:Standard,Long Time,Add-on','duration'=>'required|string|max:60','price'=>'required|integer|min:0','description'=>'nullable|string|max:1000','label'=>'nullable|string|max:100','status'=>'required|in:Active,Inactive','sort_order'=>'nullable|integer|min:0','image'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:5120','remove_image'=>'nullable|boolean']);}
}
