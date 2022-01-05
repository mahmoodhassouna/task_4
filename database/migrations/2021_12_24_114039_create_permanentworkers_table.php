<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermanentworkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permanentworkers', function (Blueprint $table) {
            $table->id();
            $table->string('idNumber',10)->unique();
            $table->string('name',30);
            $table->string('phone',10);
            $table->string('address',100);
            $table->boolean('familyMembers')->length(1);
            $table->enum('gender',['ذكر','انثى']);
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
        Schema::dropIfExists('permanentworkers');
    }
}
