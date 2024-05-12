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
        Schema::create('master_lots', function (Blueprint $table) {
            $table->id();
            $table->string('created_by_id')->nullable();
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->longText('size_ids')->nullable();
            $table->string('cutting_price')->nullable();
            $table->string('printing_price')->nullable();
            $table->string('sewing_machine_price')->nullable();
            $table->string('overlock_price')->nullable();
            $table->string('linking_price')->nullable();
            $table->string('kaj_button_price')->nullable();
            $table->string('thread_cutting_price')->nullable();
            $table->string('press_price')->nullable();
            $table->string('packing_price')->nullable();
            $table->string('show_gender')->nullable();
            $table->string('show_press')->nullable();
            $table->string('deleted_at')->nullable();
            $table->timestamps();
        });
    }

     
    public function down()
    {
        Schema::dropIfExists('master_lots');
    }
};
