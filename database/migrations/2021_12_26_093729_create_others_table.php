<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOthersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('others', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['ابقار','اغنام','دواجن']);
            $table->double('area')->length(9);
            $table->enum('farmerType',['س','ص','ع']);
            $table->integer('number')->length(8);
            $table->string('notes',155);
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
        Schema::dropIfExists('others');
    }
}
