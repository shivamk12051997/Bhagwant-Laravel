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
        Schema::create('lot_no_activities', function (Blueprint $table) {
            $table->id();
            $table->string('created_by_id')->nullable();
            $table->string('lot_no_id')->nullable();
            $table->string('worker_id')->nullable();
            $table->string('action')->nullable();
            $table->string('is_complete')->nullable();
            $table->longText('remarks')->nullable();
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
        Schema::dropIfExists('lot_no_activities');
    }
};
