<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemporaryworkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporaryworkers', function (Blueprint $table) {
            $table->id();
            $table->integer('numberMales')->length(10);
            $table->integer('numberMalesFamily')->length(10);
            $table->integer('numberFmales')->length(10);
            $table->integer('numberFmalesFamily')->length(10);
            $table->foreignId('farmer_id')->nullable()->constrained('farmers','id')->nullOnDelete();

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
        Schema::dropIfExists('temporaryworkers');
    }
}
