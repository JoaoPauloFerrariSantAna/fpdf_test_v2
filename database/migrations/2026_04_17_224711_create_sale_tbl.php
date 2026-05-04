<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sale_tbl', function (Blueprint $table) {
            $table->id();
            $table->integer("amount_sold");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sale_tbl');
    }
};