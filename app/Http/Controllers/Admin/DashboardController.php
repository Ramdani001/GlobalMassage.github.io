<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; use App\Models\{Order,Service,Setting};
class DashboardController extends Controller {
 public function index(){
  $orders=Order::with('addons')->latest()->take(10)->get();
  $orderCount=Order::count(); $activeServices=Service::where('status','Active')->count();
  $revenue=Order::whereIn('status',['Confirmed','Completed'])->sum('total');
  $settings=Setting::pluck('value','key')->all(); $pendingOrders=Order::where('status','Pending')->count();
  return view('admin.dashboard',compact('orders','orderCount','activeServices','revenue','settings','pendingOrders'));
 }
}
