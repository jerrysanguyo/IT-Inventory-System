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
        Schema::create('department', function (Blueprint $table) {
            $table->id();
            $table->string('equipment_name');
            $table->foreignId('equipment_id')
                ->constrained('tbl_equipment')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('serial_number');
            $table->string('remarks');
            $table->foreignId('department_id')
                ->constrained('tbl_department')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('user');
            $table->foreignId('issued_by')
                ->constrined('tbl_users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('received_by');
            $table->date('date_issued');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department');
    }
};
