<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->enum('q1',['نعم','لا']);
            $table->enum('q2',['نعم','لا']);
            $table->enum('q3',['نعم','لا']);
            $table->enum('q4',['نعم','لا']);
            $table->enum('q5',['نعم','لا']);
            $table->enum('q6',['نعم','لا']);
            $table->enum('q7',['نعم','لا']);
            $table->enum('q8',['نعم','لا']);
            $table->enum('q9',['نعم','لا']);
            $table->enum('q10',['نعم','لا']);
            $table->enum('q11',['نعم','لا']);
            $table->enum('q12',['نعم','لا']);
            $table->boolean('certified')->default(0)->length(1);

            $table->integer('productionCapacity')->nullable()->length(8);
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
        Schema::dropIfExists('applications');
    }
}
