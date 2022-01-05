<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trees', function (Blueprint $table) {
            $table->id();
            $table->enum('item',['خيار','بطاطا','بندورة']);
            $table->enum('protection',['س','ص','ع']);
            $table->enum('irrigationMethod',['س','ص','ع']);
            $table->date('date')->length(30);
            $table->double('area')->length(30);
            $table->integer('treeNumber')->length(30);
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
        Schema::dropIfExists('trees');
    }
}
