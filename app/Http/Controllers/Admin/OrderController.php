<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; use App\Models\Order; use Illuminate\Http\Request;
class OrderController extends Controller {
 public function index(Request $r){$q=Order::with('addons')->latest();if($r->filled('q'))$q->where(fn($x)=>$x->where('customer_name','like','%'.$r->q.'%')->orWhere('customer_phone','like','%'.$r->q.'%')->orWhere('order_number','like','%'.$r->q.'%'));$orders=$q->paginate(20)->withQueryString();return view('admin.orders.index',compact('orders'));}
 public function status(Request $r,Order $order){$data=$r->validate(['status'=>'required|in:Pending,Confirmed,Completed,Cancelled']);$order->update($data);return back()->with('success','Status pesanan diperbarui.');}
}
