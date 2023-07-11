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
        Schema::create('fish_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('latin_name');
            $table->integer('duration');
            $table->string('photo')->nullable();
            $table->double('selling_price')->nullable();
            $table->string('temperature')->nullable();
            $table->string('ph')->nullable();
            $table->string('water_height')->nullable()->comment('rentang ketinggian air');
            $table->string('water_type')->nullable();
            $table->text('preparation_description')->comment('deskripsi persiapan budidaya')->nullable();
            $table->text('seeding_description')->comment('deskripsi penebaran benih')->nullable();
            $table->text('cutivation_description')->comment('deskripsi masa budidaya')->nullable();
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
        Schema::dropIfExists('fish_types');
    }
};
