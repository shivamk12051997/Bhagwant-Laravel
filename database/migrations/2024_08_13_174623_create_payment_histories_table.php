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
        Schema::create('payment_histories', function (Blueprint $table) {
            $table->id();
            $table->string('created_by_id')->nullable();
            $table->string('worker_id')->nullable();
            $table->string('party_id')->nullable();
            $table->string('role')->nullable();
            $table->string('payment_date')->nullable();
            $table->string('payment_mode')->nullable();
            $table->string('amount')->nullable();
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
        Schema::dropIfExists('payment_histories');
    }
};
