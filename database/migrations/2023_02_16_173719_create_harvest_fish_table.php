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
        Schema::create('harvest_fish', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fish_type_id')->nullable(); 
            $table->foreign('fish_type_id')->references('id')->on('fish_types'); 
            $table->dateTime('sow_date')->comment('tanggal tebar benih');
            $table->double('seed_amount');
            $table->double('seed_weight');
            $table->double('survival_rate');
            $table->double('average_weight')->default(0);
            $table->double('fish_amount')->default(0)->comment('jumlah ikan dalam ekor');
            $table->double('pond_volume')->default(0)->comment('volume kolam dalam m3');
            $table->double('total_feed_spent')->default(0)->comment('Total pakan yang diberikan selama budidaya');
            $table->date('harvest_date')->nullable();
            $table->double('harvest_amount');
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
        Schema::dropIfExists('harvest_fish');
    }
};
