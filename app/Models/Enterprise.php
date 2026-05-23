<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
	use SoftDeletes;
	use HasFactory;

	protected $table = "enterprise_tbl";
	protected $fillable = array("name", "worker_amount");

	public function worker(): HasMany
	{
		return $this->hasMany(Worker::class);
	}
}
