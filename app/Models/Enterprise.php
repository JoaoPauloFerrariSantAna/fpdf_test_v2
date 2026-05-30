<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

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

	public function getSales(int $enterpriseId): Collection
	{
		return DB::table("enterprise_tbl")
        ->select(
            "enterprise_tbl.name AS ENTERPRISE",
            "workers_tbl.name AS SELLER",
            "product_tbl.name AS SOLDED",
            "product_tbl.stock AS LEFT",
            DB::RAW("sale_tbl.amount_sold * product_tbl.price AS TOTAL_SOLD"),
            DB::RAW("SUM(sale_tbl.amount_sold) AS TOTAL"),
            "sale_tbl.created_at AS WHEN_SOLD"
        )
        ->join("workers_tbl", "workers_tbl.enterprise_id", '=', "enterprise_tbl.id")
        ->join("worker_sale", "worker_sale.worker_id", '=', "workers_tbl.id")
        ->join("sale_tbl", "sale_tbl.id", '=', "worker_sale.sale_id")
        ->join("product_sales", "product_sales.sale_id", '=', "sale_tbl.id")
        ->join("product_tbl", "product_tbl.id", '=', "product_sales.sale_id")
        ->where("enterprise_tbl.id", '=', $enterpriseId)
        ->groupBy("workers_tbl.name")
        ->get();
	}
}
