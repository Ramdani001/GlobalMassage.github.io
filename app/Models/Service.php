<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Service extends Model {
 protected $fillable=['name','category','duration','price','description','label','status','sort_order','image_path'];
 protected function casts(): array { return ['price'=>'integer','sort_order'=>'integer']; }
 public function orderItems(): HasMany { return $this->hasMany(OrderItem::class); }
}
