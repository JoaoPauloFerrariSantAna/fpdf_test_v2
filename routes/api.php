<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\WorkerResponse;
use App\Http\Resources\EnterpriseResource;
use App\Http\Resources\ProductSaleResource;
use App\Http\Resources\WorkerSaleResource;
use App\Models\Enterprise;
use App\Models\ProductSale;
use App\Models\WorkerSale;
use App\Models\Worker;

Route::get("/worker/enterprise/getWorker/{enterpriseId}", function(int $enterpriseId) {
	$enterprise = Enterprise::find($enterpriseId);
	return WorkerResponse::collection($enterprise->worker);
});

Route::get("/enterprise/worker/getEnterprise/{workerId}", function(int $workerId) {
	$worker = Worker::find($workerId);
	return new EnterpriseResource($worker->enterprise);
});

// product / sale
Route::get("/productSale/getInfo/{productSaleId}", function(int $productSaleId) {
	return new ProductSaleResource(ProductSale::find($productSaleId));
});

// worker / sale
Route::get("/workerSales/getInfo/{workerSaleId}", function(int $workerSaleId) {
	return new WorkerSaleResource(WorkerSale::find($workerSaleId));
});

Route::get("/generate/pdf/{enterpriseId}", function(int $enterpriseId) {
    return DB::table("enterprise_tbl")
        ->select(
            "enterprise_tbl.name AS ENTERPRISE_NAME", 
            "workers_tbl.name AS WHO_SOLD", 
            "product_tbl.name AS WHAT_WAS_SOLD", 
            "product_tbl.stock AS STOCK_LEFT", 
            DB::RAW("sale_tbl.amount_sold * product_tbl.price AS TOTAL_AMOUNT_SOLD") ,
            DB::RAW("SUM(sale_tbl.amount_sold) AS TOTAL_SOLD"),
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
});