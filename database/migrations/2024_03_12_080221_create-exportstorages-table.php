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
        Schema::create('exportstorages', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_import');
            $table->dateTime('date_export');
            $table->string('product');
            $table->integer('quantity');
            $table->string('user_import');
            $table->integer('user_export');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exportstorages');
    }
};
