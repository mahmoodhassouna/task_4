<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lands', function (Blueprint $table) {
            $table->id();
            $table->integer('pieceNumber')->length(10);
            $table->integer('voucherNumber')->length(10);
            $table->integer('areaBuildingTenurePurposes')->length(10);
            $table->integer('areaBuildingNonTenurePurposes')->length(10);
            $table->integer('permanentFallowArea')->length(10);
            $table->integer('temporaryFallowSpace')->length(10);

            $table->integer('cultivatedLandArea')->length(10);
            $table->integer('areaForestTrees')->length(10);
            $table->integer('totalLandArea')->length(10);
            $table->integer('farFromArmisticeLine')->length(10);


            $table->enum('typeOfContract',['بدل','ايجار','ملك']);
            $table->enum('possessionType',['ع','ص','س']);
            $table->enum('ownerType',['مؤسسة','فرد']);
            $table->enum('institutionType',['اهلية','دينية']);

            $table->string('idNumber',10)->unique()->nullable();
          //  $table->string('idNumber2',10)->unique()->nullable();
            $table->string('institutionNumber',10)->unique()->nullable();
            $table->string('idInstitutionNumber',10)->unique()->nullable();
            $table->string('institutionName',40)->nullable();
            $table->string('personInstitutionName',40)->nullable();
            $table->string('owner',20);
            $table->string('fName',20);
            $table->string('mName',20);
            $table->string('gName',20);
            $table->string('lName',20);
            $table->string('guide',100);
            $table->string('notes',100);
            $table->double('lat')->default(34.4667)->length(30)->nullable();
            $table->double('lng')->default(31.5016)->length(30)->nullable();

            $table->foreignId('farmer_id')->nullable()->constrained('farmers','id')->cascadeOnDelete();

            $table->foreignId('governorate_id')->nullable()->constrained('governorates','id')->nullOnDelete();
            $table->foreignId('region_id')->nullable()->constrained('regions','id')->nullOnDelete();

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
        Schema::dropIfExists('lands');
    }
}
