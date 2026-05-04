<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkerSale extends Model
{
	use HasFactory;

	protected $table = "worker_sale";
	protected $fillable = array("worker_id", "sale_id");

	public function worker(): BelongsTo
	{
		return $this->belongsTo(Worker::class);
	}

	public function sale(): BelongsTo
	{
		return $this->belongsTo(Sale::class);
	}
}
