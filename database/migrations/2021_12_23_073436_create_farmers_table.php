<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmers', function (Blueprint $table) {
            $table->id();
            $table->string('cardNumber',20)->unique();
            $table->string('idNumber',20)->unique();
            $table->string('entryDate',40);
            $table->string('birthDate',40)->nullable();
            $table->string('fName',20);
            $table->string('mName',20);
            $table->string('gName',20);
            $table->string('lName',20);
            $table->string('phone',20)->nullable();
            $table->string('email',30)->nullable();
            $table->string('guide',30);
            $table->enum('gender',['ذكر','انثى'])->nullable();
            $table->enum('socialState',['اعزب','متزوج'])->nullable();
            $table->enum('qualifications',['دبلوم','بكالوريس','ثانوية','غير ذلك'])->nullable();
            $table->foreignId('governorate_id')->nullable()->constrained('governorates','id')->nullOnDelete();
            $table->foreignId('region_id')->nullable()->constrained('regions','id')->nullOnDelete();
            $table->softDeletes();
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
        Schema::dropIfExists('farmers');
    }
}
