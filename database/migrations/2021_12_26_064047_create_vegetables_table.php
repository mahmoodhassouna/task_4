<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVegetablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vegetables', function (Blueprint $table) {
            $table->id();
            $table->enum('item',['خيار','بطاطا','بندورة']);
            $table->enum('protection',['س','ص','ع']);
            $table->enum('protectionType',['س','ص','ع']);
            $table->date('date')->length(30);
            $table->double('area')->length(30);
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
        Schema::dropIfExists('vegetables');
    }
}
