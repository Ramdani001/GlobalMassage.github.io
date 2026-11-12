<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Order extends Model {
 protected $fillable=['order_number','customer_name','customer_phone','location','service_id','service_name','base_price','total','status','notes','source'];
 protected function casts(): array { return ['base_price'=>'integer','total'=>'integer']; }
 public function items(): HasMany { return $this->hasMany(OrderItem::class); }
 public function addons() { return $this->belongsToMany(Service::class,'order_items')->withPivot(['price','quantity'])->wherePivot('item_type','addon'); }
 public function service() { return $this->belongsTo(Service::class); }
}
