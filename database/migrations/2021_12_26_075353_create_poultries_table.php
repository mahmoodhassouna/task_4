<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoultriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poultries', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['ابقار','اغنام','دواجن']);
            $table->double('area')->length(9);
            $table->enum('farmerType',['س','ص','ع']);
            $table->enum('roof',['س','ص','ع']);
            $table->integer('number');
            $table->integer('age');

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
        Schema::dropIfExists('poultries');
    }
}
