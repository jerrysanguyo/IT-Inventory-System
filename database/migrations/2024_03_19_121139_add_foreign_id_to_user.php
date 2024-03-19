<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tb_users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id');
            
            $table->foreign('role_id')
                ->references('id') 
                ->on('tb_role')
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->after('password');
        });
    }

    public function down()
    {
        Schema::table('tb_users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id'); 
        });
    }
};
