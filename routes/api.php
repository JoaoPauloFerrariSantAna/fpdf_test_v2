<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

/**
 * // generating pdf
 * Route::get("/generate/pdf/{productSaleId}/{workerSaleId}", function(int $productSaleId, int $workerSaleId) {
 *	$productSaleInfo = ProductSale::with(array("product", "sale"))->find($productSaleId);
 *	$workerSaleInfo = WorkerSale::with(array("worker", "sale"))->find($workerSaleId);
 *	// work on generating the PDF file
 * });
 **/
