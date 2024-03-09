<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lot_nos', function (Blueprint $table) {
            $table->id();
            $table->string('created_by_id')->nullable();
            $table->string('lot_no')->nullable();
            $table->string('color_id')->nullable();
            $table->string('size_id')->nullable();
            $table->string('pcs')->nullable();
            $table->string('worker_id')->nullable();
            $table->string('price')->nullable();
            $table->string('gender')->nullable();
            $table->string('press')->nullable();
            $table->string('status')->nullable();
            $table->string('remarks')->nullable();
            $table->string('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lot_nos');
    }
};
