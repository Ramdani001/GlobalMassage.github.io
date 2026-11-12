<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class LandingSection extends Model {protected $fillable=['section_key','label','eyebrow','title','subtitle','description','body','primary_cta_text','primary_cta_url','secondary_cta_text','secondary_cta_url','image_path','metadata','is_visible','sort_order'];protected function casts():array{return ['metadata'=>'array','is_visible'=>'boolean','sort_order'=>'integer'];}}
