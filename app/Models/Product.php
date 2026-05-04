<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
	use HasFactory;

	protected $table = "product_tbl";
	protected $fillable = array("name", "stock", "price", "created_at", "updated_at");
}
