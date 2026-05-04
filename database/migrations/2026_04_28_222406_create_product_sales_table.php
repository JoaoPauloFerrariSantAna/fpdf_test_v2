<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger("sale_id");
            $table->unsignedBigInteger('worker_id');
            $table->foreign("product_id")->references("id")->on("product_tbl");
            $table->foreign("sale_id")->references("id")->on("sale_tbl");
            $table->foreign("worker_id")->references("id")->on("workers_tbl");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_sales');
    }
};
