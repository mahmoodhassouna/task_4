<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\TemporaryworkerController;
use App\Http\Controllers\PermanentworkerController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\LandController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\IrrigationController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\VegetableController;
use App\Http\Controllers\TreesController;
use App\Http\Controllers\PoultryController;
use App\Http\Controllers\CattleController;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\NotifyController;
use App\Http\Controllers\GovernoratesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth']], function () {

    Route::get('farmer', [FarmerController::class, 'index'])->name('farmer');
    Route::get('latestFarmer', [FarmerController::class, 'latestFarmer'])->name('latestFarmer');
    Route::post('create/farmer', [FarmerController::class, 'store'])->name('createFarmer');
    Route::get('edit/farmer/{farmer_id}', [FarmerController::class, 'edit'])->name('editFarmer');
    Route::post('update/farmer/{id}', [FarmerController::class, 'update'])->name('updateFarmer');
    Route::get('farmers-table', [FarmerController::class, 'showFarmers'])->name('farmersTable');
    Route::get('farmers', [FarmerController::class, 'farmers'])->name('farmers');
    Route::get('archiveFarmersTable', [FarmerController::class, 'archiveFarmersTable'])->name('archiveFarmersTable');
    Route::get('archiveFarmers', [FarmerController::class, 'archiveFarmers'])->name('archiveFarmers');
    Route::delete('arch-farmer/{id}', [FarmerController::class, 'archFarmer']);
    Route::delete('delete-farmer/{id}', [FarmerController::class, 'destroy']);
    Route::delete('un-archive-farmer/{id}', [FarmerController::class, 'unarchFarmer']);
    Route::delete('delete-archiveFarmer/{id}', [FarmerController::class, 'deleteArchiveFarmer']);


///route equipments
    Route::get('equipments', [EquipmentController::class, 'equipments'])->name('equipments');
    Route::delete('delete-equipment/{id}', [EquipmentController::class, 'delete']);
    Route::post('create/equipment', [EquipmentController::class, 'createEquipment'])->name('createEquipment');
    Route::get('farmerEquipments/{farmer_id}', [EquipmentController::class, 'edit'])->name('farmerEquipments');


////route worker
    Route::post('create/temp_worker', [TemporaryworkerController::class, 'store'])->name('createtemp_worker');
    Route::post('create/per_worker', [PermanentworkerController::class, 'store'])->name('createper_worker');
    Route::get('pworkers', [PermanentworkerController::class, 'pworkers'])->name('pworkers');
    Route::delete('delete-pworkers/{id}', [PermanentworkerController::class, 'destroy']);
    Route::get('tWorker/{farmer_id}', [TemporaryworkerController::class, 'edit'])->name('tWorker');
    Route::get('pworkersEdit/{farmer_id}', [PermanentworkerController::class, 'edit'])->name('pworkersEdit');


///route application
    Route::post('create/application', [ApplicationController::class, 'store'])->name('create_application');
    Route::get('applications/{farmer_id}', [ApplicationController::class, 'edit'])->name('applications');
    Route::post('update/application/{id}', [ApplicationController::class, 'update'])->name('update_application');

//lands
    Route::get('land', [LandController::class, 'index'])->name('land');
    Route::post('create/land', [LandController::class, 'store'])->name('createLand');
    Route::get('latestLand', [LandController::class, 'latestLand'])->name('latestLand');
    Route::get('showLand/{land_id}', [LandController::class, 'show'])->name('showLand');
    Route::delete('delete-land/{id}', [LandController::class, 'destroy']);
    Route::get('lands-farmer', [LandController::class, 'landsFarmer'])->name('lands-farmer');
    Route::get('landsFarmer/{farmer_id}', [LandController::class, 'lands'])->name('landsFarmer');
    Route::post('update/land/{id}', [LandController::class, 'update'])->name('updateLand');
    Route::get('create/newLandFarmer/{id}', [LandController::class, 'newLandFarmer'])->name('createNewLandFarmer');


    Route::post('create/partner', [PartnerController::class, 'store'])->name('createPartner');
    Route::get('partners', [PartnerController::class, 'partners'])->name('partners');
    Route::delete('delete-partner/{id}', [PartnerController::class, 'destroy']);
    Route::get('landPartners/{land_id}', [PartnerController::class, 'edit'])->name('landPartners');

//building
    Route::post('create/buildings', [BuildingController::class, 'store'])->name('createbuildings');
    Route::get('buildings', [BuildingController::class, 'buildings'])->name('buildings');
    Route::delete('delete-buildings/{id}', [BuildingController::class, 'destroy']);
    Route::get('landBuilding/{land_id}', [BuildingController::class, 'edit'])->name('landBuilding');


    Route::post('create/irrigation', [IrrigationController::class, 'store'])->name('createirrigation');
    Route::get('irrigation', [IrrigationController::class, 'irrigation'])->name('irrigation');
    Route::delete('delete-irrigation/{id}', [IrrigationController::class, 'destroy']);
    Route::get('landIrrigation/{land_id}', [IrrigationController::class, 'edit'])->name('landIrrigation');


    Route::post('create/crops', [CropController::class, 'store'])->name('createCrops');
    Route::get('crops', [CropController::class, 'crops'])->name('crops');
    Route::delete('delete-crops/{id}', [CropController::class, 'destroy']);
    Route::get('landCrops/{land_id}', [CropController::class, 'edit'])->name('landCrops');


    Route::post('create/vegetable', [VegetableController::class, 'store'])->name('createVegetable');
    Route::get('vegetables', [VegetableController::class, 'vegetables'])->name('vegetables');
    Route::delete('delete-vegetable/{id}', [VegetableController::class, 'destroy']);
    Route::get('landVegetable/{land_id}', [VegetableController::class, 'edit'])->name('landVegetable');


    Route::post('create/tree', [TreesController::class, 'store'])->name('createTree');
    Route::get('trees', [TreesController::class, 'trees'])->name('trees');
    Route::delete('delete-tree/{id}', [TreesController::class, 'destroy']);
    Route::get('landTree/{land_id}', [TreesController::class, 'edit'])->name('landTree');


    Route::post('create/poultry', [PoultryController::class, 'store'])->name('createPoultry');
    Route::get('poultry', [PoultryController::class, 'poultry'])->name('poultry');
    Route::delete('delete-poultry/{id}', [PoultryController::class, 'destroy']);
    Route::get('landPoultry/{land_id}', [PoultryController::class, 'edit'])->name('landPoultry');

//cattle
    Route::post('create/cattle', [CattleController::class, 'store'])->name('createCattle');
    Route::get('cattle', [CattleController::class, 'cattle'])->name('cattle');
    Route::delete('delete-cattle/{id}', [CattleController::class, 'destroy']);
    Route::get('landCattle/{land_id}', [CattleController::class, 'edit'])->name('landCattle');


    Route::post('create/other', [OtherController::class, 'store'])->name('createOther');
    Route::get('other', [OtherController::class, 'other'])->name('other');
    Route::delete('delete-other/{id}', [OtherController::class, 'destroy']);
    Route::get('landOther/{land_id}', [OtherController::class, 'edit'])->name('landOther');


    Route::get('search-farmer', [FarmerController::class, 'search']);
    Route::post('searchAboutFarmer', [FarmerController::class, 'searchAbout'])->name('searchAboutFarmer');


    Route::get('NotifySystem', [NotifyController::class, 'notify'])->name('NotifySystem');
    Route::get('NotifySystemTable', [NotifyController::class, 'index'])->name('NotifySystemTable');

    Route::get('region/{governorate_id}', [GovernoratesController::class, 'region'])->name('region');

});
