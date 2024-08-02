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
        Schema::create('challans', function (Blueprint $table) {
            $table->id();
            $table->string('created_by_id')->nullable();
            $table->string('challan_no')->nullable();
            $table->longText('lot_no_ids')->nullable();
            $table->string('in_out')->nullable();
            $table->string('date')->nullable();
            $table->string('party_id')->nullable();
            $table->string('pcs')->nullable();
            $table->string('price')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('challans');
    }
};
