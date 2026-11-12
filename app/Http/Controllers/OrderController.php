<?php
namespace App\Http\Controllers;
use App\Models\{Order,OrderItem,Service,Setting}; use Illuminate\Http\Request; use Illuminate\Support\Facades\DB; use Illuminate\Support\Str;
class OrderController extends Controller {
 public function store(Request $request) {
  $data=$request->validate([
   'customer_name'=>'required|string|max:150','customer_phone'=>'nullable|string|max:30',
   'location'=>'required|string|max:255','service_id'=>'required|integer|exists:services,id',
   'addon_ids'=>'array','addon_ids.*'=>'integer|distinct|exists:services,id'
  ]);
  $order=DB::transaction(function() use($data) {
   $main=Service::where('status','Active')->where('category','!=','Add-on')->findOrFail($data['service_id']);
   $addons=Service::where('status','Active')->where('category','Add-on')->whereIn('id',$data['addon_ids']??[])->get();
   $total=$main->price+$addons->sum('price');
   $order=Order::create(['order_number'=>'GM-'.now()->format('ymd').'-'.strtoupper(Str::random(5)),'customer_name'=>$data['customer_name'],'customer_phone'=>$data['customer_phone']??null,'location'=>$data['location'],'service_id'=>$main->id,'service_name'=>$main->name,'base_price'=>$main->price,'total'=>$total,'status'=>'Pending','source'=>'Landing Page']);
   foreach($addons as $addon) OrderItem::create(['order_id'=>$order->id,'service_id'=>$addon->id,'item_type'=>'addon','name'=>$addon->name,'price'=>$addon->price,'quantity'=>1]);
   return $order;
  });
  return response()->json(['message'=>'Pesanan berhasil dicatat.','order_number'=>$order->order_number,'total'=>$order->total],201);
 }
}
