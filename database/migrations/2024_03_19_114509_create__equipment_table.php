<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_equipment', function (Blueprint $table) {
            $table->id();
            $table->string('equipment_name');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('tb_equipment');
    }
};
