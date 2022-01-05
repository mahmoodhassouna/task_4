<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['منزل صغير','كوخ','مزارع اغنام','مزارع دواجن','مزارع حبش','مزارع ابقار']);
            $table->enum('ownerBuild',['ع','ص','س']);
            $table->integer('area')->length(8);
            $table->string('note',150);
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
        Schema::dropIfExists('buildings');
    }
}
