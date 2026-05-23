<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('enterprise_tbl', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger("worker_id");
			$table->string("name", 16);
			$table->integer("worker_amount");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enterprise_tbl');
    }
};
