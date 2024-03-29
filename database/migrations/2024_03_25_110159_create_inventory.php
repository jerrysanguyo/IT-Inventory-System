<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_id')
                ->constrained('unit')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('quantity');
            $table->string('equipment_name');
            $table->foreignId('equipment_id')
                ->constrained('equipment')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('serial_number');
            $table->string('remarks');
            $table->foreignId('department_id')
                ->constrained('department')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('user');
            $table->foreignId('issued_by')
                ->constrained('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('received_by');
            $table->date('date_issued');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('inventory');
    }
};
