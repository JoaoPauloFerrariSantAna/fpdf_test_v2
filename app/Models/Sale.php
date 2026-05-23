<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

	protected $table = "sale_tbl";
    protected $fillable = array("amount_sold", "sale_date");
}
