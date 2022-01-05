<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
//    Route::get('/profile', function(Request $request) {
//        return auth()->user();
   // });

    Route::post('create/farmer',[\App\Http\Controllers\API\FarmerController::class,'store'])->name('createFarmer');
    Route::get('latestFarmer',[\App\Http\Controllers\API\FarmerController::class,'latestFarmer'])->name('latestFarmer');
    Route::post('update/farmer/{id}',[\App\Http\Controllers\API\FarmerController::class,'update'])->name('updateFarmer');
    Route::delete('delete-farmer/{id}',[\App\Http\Controllers\API\FarmerController::class,'destroy']);
    Route::delete('arch-farmer/{id}',[\App\Http\Controllers\API\API\FarmerController::class,'archFarmer']);
    Route::delete('un-archive-farmer/{id}',[\App\Http\Controllers\API\FarmerController::class,'unarchFarmer']);
    Route::delete('delete-archiveFarmer/{id}',[\App\Http\Controllers\API\FarmerController::class,'deleteArchiveFarmer']);
    Route::get('archiveFarmersTable',[\App\Http\Controllers\API\FarmerController::class,'archiveFarmersTable'])->name('archiveFarmersTable');
    Route::get('farmers',[\App\Http\Controllers\API\FarmerController::class,'farmers'])->name('farmers');



    Route::get('lands-farmer',[\App\Http\Controllers\API\LandsController::class,'landsFarmer'])->name('lands-farmer');
    Route::get('landsFarmer/{farmer_id}',[\App\Http\Controllers\API\LandsController::class,'lands'])->name('landsFarmer');
    Route::get('latestLand',[\App\Http\Controllers\API\LandsController::class,'latestLand'])->name('latestLand');
    Route::delete('delete-land/{id}',[\App\Http\Controllers\API\LandsController::class,'destroy']);
    Route::post('create/land',[\App\Http\Controllers\API\LandsController::class,'store'])->name('createLand');


    Route::post('create/application',[\App\Http\Controllers\API\Application::class,'store'])->name('create_application');


    Route::post('create/buildings',[\App\Http\Controllers\API\BuildingController::class,'store'])->name('createbuildings');
    Route::delete('delete-buildings/{id}',[\App\Http\Controllers\API\BuildingController::class,'destroy']);

    Route::post('create/cattle',[\App\Http\Controllers\API\CattleController::class,'store'])->name('createCattle');
    Route::delete('delete-cattle/{id}',[\App\Http\Controllers\API\CattleController::class,'destroy']);

    Route::post('create/crops',[\App\Http\Controllers\API\CropController::class,'store'])->name('createCrops');
    Route::delete('delete-crops/{id}',[\App\Http\Controllers\API\CropController::class,'destroy']);


    Route::post('create/equipment',[\App\Http\Controllers\API\EquipmentController::class,'createEquipment'])->name('createEquipment');
    Route::delete('delete-equipment/{id}',[\App\Http\Controllers\API\EquipmentController::class,'delete']);

    Route::post('create/irrigation',[\App\Http\Controllers\API\IrrigationController::class,'store'])->name('createirrigation');
    Route::delete('delete-irrigation/{id}',[\App\Http\Controllers\API\IrrigationController::class,'destroy']);

    Route::post('create/other',[\App\Http\Controllers\API\OtherController::class,'store'])->name('createOther');
    Route::delete('delete-other/{id}',[\App\Http\Controllers\API\OtherController::class,'destroy']);

    Route::post('create/partner',[\App\Http\Controllers\API\PartnerController::class,'store'])->name('createPartner');
    Route::delete('delete-partner/{id}',[\App\Http\Controllers\API\PartnerController::class,'destroy']);

    Route::post('create/per_worker',[\App\Http\Controllers\API\PermanentworkerController::class,'store'])->name('createper_worker');
    Route::delete('delete-pworkers/{id}',[\App\Http\Controllers\API\PermanentworkerController::class,'destroy']);

    Route::post('create/poultry',[\App\Http\Controllers\API\PoultryController::class,'store'])->name('createPoultry');
    Route::delete('delete-poultry/{id}',[\App\Http\Controllers\API\PoultryController::class,'destroy']);

    Route::post('create/tree',[\App\Http\Controllers\API\TreesController::class,'store'])->name('createTree');
    Route::delete('delete-tree/{id}',[\App\Http\Controllers\API\TreesController::class,'destroy']);

    Route::post('create/vegetable',[\App\Http\Controllers\API\VegetableController::class,'store'])->name('createVegetable');
    Route::delete('delete-vegetable/{id}',[\App\Http\Controllers\API\VegetableController::class,'destroy']);

    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
});
