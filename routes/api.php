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
use App\Models\PdfGenerator;

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
    $enterprise = new Enterprise();
    $pdfGenerator = new PdfGenerator($enterprise->getSales($enterpriseId));

    return response($pdfGenerator->generate())
        ->header("Content-Type", "application/pdf");
});