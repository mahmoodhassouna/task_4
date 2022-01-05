<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crops', function (Blueprint $table) {
            $table->id();

            $table->enum('item',['ص','ع','س']);

            $table->enum('crop',['ص','ع','س']);
            $table->date('agricultureHistory');
            $table->double('cultivatedArea');
            $table->enum('irrigationMethod',['ص','ع','س']);
            $table->boolean('depression')->nullable();
            $table->string('causeDepression',50)->nullable();
            $table->date('endDate',30)->nullable();
            $table->foreignId('land_id')->nullable()->constrained('lands','id')->nullOnDelete();

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
        Schema::dropIfExists('crops');
    }
}
