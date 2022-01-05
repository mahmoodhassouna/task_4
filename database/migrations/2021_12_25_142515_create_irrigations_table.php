<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIrrigationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('irrigations', function (Blueprint $table) {
            $table->id();
            $table->double('capacity')->nullable()->length(8);
            $table->double('height')->nullable()->length(8);
            $table->double('depthWellMeter')->nullable()->length(8);
            $table->double('depth')->nullable()->length(8);
            $table->double('energy')->nullable()->length(8);
            $table->double('electricity')->nullable()->length(8);
            $table->string('wellNumber',10)->nullable();
            $table->enum('pondType',['ع','ص','س'])->nullable();
            $table->enum('type',['بئر ','خزان علوي','مياه ارضية'])->nullable();
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
        Schema::dropIfExists('irrigations');
    }
}
