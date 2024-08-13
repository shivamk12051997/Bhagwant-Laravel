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
        Schema::create('material_challans', function (Blueprint $table) {
            $table->id();
            $table->string('created_by_id')->nullable();
            $table->string('party_id')->nullable();
            $table->string('material_item_id')->nullable();
            $table->string('challan_no')->nullable();
            $table->string('send_date')->nullable();
            $table->string('per_unit_price')->nullable();
            $table->string('qty')->nullable();
            $table->string('total_price')->nullable();
            $table->string('is_paid')->nullable();
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
        Schema::dropIfExists('material_challans');
    }
};
