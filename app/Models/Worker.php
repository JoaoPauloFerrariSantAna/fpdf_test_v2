<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Worker extends Model
{
	use SoftDeletes;
	use HasFactory;

	protected $table = "workers_tbl";
	protected $fillable = array("name", "email", "sector", "enterprise_id");

	public function enterprise(): HasMany
	{
		return $this->hasMany(Enterprise::class);
	}
}
