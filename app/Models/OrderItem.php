<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class OrderItem extends Model {
 protected $fillable=['order_id','service_id','item_type','name','price','quantity'];
 protected function casts(): array { return ['price'=>'integer','quantity'=>'integer']; }
}
