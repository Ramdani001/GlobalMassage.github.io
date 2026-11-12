<?php
namespace App\Http\Controllers;
use App\Models\Service;use App\Models\Setting;use App\Models\LandingSection;
class FrontController extends Controller {public function index(){$services=Service::where('status','Active')->orderBy('sort_order')->orderBy('id')->get();$settings=Setting::pluck('value','key')->all();if(($settings['maintenance_mode']??'0')==='1')abort(503,'Website sedang dalam pemeliharaan.');$sections=LandingSection::where('is_visible',true)->get()->keyBy('section_key');return view('front.index',compact('services','settings','sections'));}}
