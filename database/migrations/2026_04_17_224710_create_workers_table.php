<?php

require_once __DIR__ . "/../../app/Enums/WorkerType.php";

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\WorkerType;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('workers_tbl', function (Blueprint $table) {
            $table->id();
			$table->string("name", 16);
			$table->string("email", 32);
			$table->enum("sector", array_column(WorkerType::cases(), "value"));
            $table->unsignedBigInteger("enterprise_id");
			$table->foreign("enterprise_id")->references("id")->on("enterprise_tbl");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('workers_tbl');
    }
};
