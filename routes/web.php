<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\IngredientPlatController;
use App\Http\Controllers\PlatComposeIngredientController;
use App\Http\Controllers\PlatComposeController;
use App\Http\Controllers\MenuPlatController;
use App\Http\Controllers\MenuController;


Route::get('/', [LinkController::class, 'toHome'])->name('welcome')->defaults('title', 'Plats')->defaults('desc','Sakafo tsy misy Kalalao');

//Ingredient
Route::get('/ingredient', [LinkController::class, 'toIngredient'])->name('ingredient')->defaults('title','Ingredients')->defaults('desc','Ingredient tsy misy Kalalao');

Route::get('/addIngredient',[LinkController::class, 'toAddIngredient'])->name('addIngredient')->defaults('title','Add Ingredient')->defaults('desc','Anampy ingredient tsy misy Kalalao');

Route::post('/storeIngredient',[IngredientController::class,'storeIngredient'])->name('storeIngredient');

Route::get('/ingredient/{id}',[IngredientController::class,'toIngredientDetail'])->name('detailIngredient')->defaults('title','Detail Ingredient')->defaults('desc','Detail ingredient tsy misy Kalalao');

Route::get('/ingredient/{id}/edit',[IngredientController::class,'toIngredientEdit'])->name('editIngredient')->defaults('title','Editer Ingredient')->defaults('desc','Editer ingredient tsy misy Kalalao');

Route::post('/ingredient/{id}/editer',[IngredientController::class,'updateIngredient'])->name('editerIngredient');

Route::get('/ingredient/{id}/delete',[IngredientController::class,'deleteIngredient'])->name('deleteIngredient');

Route::get('/downloadPdf/{id}', [IngredientController::class, 'generatePdf'])->name('downloadPdf');

//Plat
Route::get('/addPlat',[LinkController::class, 'toAddPlat'])->name('addPlat')->defaults('title','Add Plat')->defaults('desc','Anampy plat tsy misy Kalalao');

Route::post('/addPlatFunction',[IngredientPlatController::class,'storeIngredientPlat'])->name('storeIngredientPlat');

Route::get('/detailPlat/{id}',[IngredientPlatController::class,'toIngredientPlatDetail'])->name('detailPlat')->defaults('title','Detail Plat')->defaults('desc','Detail plat tsy misy Kalalo');

Route::get('/detailPlat/{id}/delete',[IngredientPlatController::class,'deleteIngredientPlat'])->name('deleteIngredientPlat');

Route::get('/plat/edit/{id}',[LinkController::class,'toPlatUpdate'])->name('editerPlat')->defaults('title','Editer plat')->defaults('desc','Editer plat tsy misy Kalalao');

Route::post('/platIngredient/edit/{id}',[IngredientPlatController::class, 'updateIngredientPlat'])->name('updateIngredientPlat');


//Plat Compose
Route::get('/addPlatCompose',[LinkController::class, 'toAddPlatCompose'])->name('addPlatCompose')->defaults('title','Add Plat Compose')->defaults('desc','Anampy plat composé tsy misy Kalalao');

Route::post('/ajouterPlatCompose',[PlatComposeIngredientController::class,'strorePlatComposeIngredient'])->name('storeplatCompose');

Route::get('/detailPlatCompose/{id}', [PlatComposeController::class,'toDetailPlatCompose'])->name('detailPlatCompose')->defaults('title','Detail Plat compose')->defaults('desc','Detail Plat Compose tsy misy Kalalao');

Route::get('editPlatCompose/{id}', [PlatComposeController::class, 'toEditPlatCompose'])->name('editPlatCompose')->defaults('title','Edit Plat Compose')->defaults('desc','Edeter un plat Compose tsy misy Kalalao');

Route::post('/editerPlatCompose/{id}', [PlatComposeController::class,'updatePlatCompose'])->name('editerPlatCompose');

Route::get('/platCompose/delete/{id}', [PlatComposeController::class, 'deletePlatCompose'])->name('deletePlatCompose');

//Menu
Route::get('/toMenu', [LinkController::class, 'toMenu'])->name('toMenu')->defaults('title','Menu Kalalao')->defaults('desc','Liste Menu tsy misy Kalalao');

Route::get('/addMenu', [LinkController::class, 'toAddMenu'])->name('addMenu')->defaults('title','Menu Kalalao')->defaults('desc','Anampy Menu tsy misy Kalalao');

Route::post('/ajouterMenu', [MenuPlatController::class, 'storeMenuPlat'])->name('storeMenuPlat');

Route::get('/detailMenu/{id}', [MenuController::class, 'toDetailMenu'])->name('detailMenu')->defaults('title','Menu Kalalo')->defaults('desc','Menu tsy misy Kalalao detail');

Route::get('/editMenu/{id}', [MenuController::class, 'toEditMenu'])->name('editMenu')->defaults('title','Editer Menu')->defaults('desc','Editer Menu tsy misy Kalalao');

Route::post('/editer-menu/{id}', [MenuController::class, 'updateMenuPlat'])->name('updateMenu');

Route::get('/supprimer/{idPlat}/{idMenu}', [MenuController::class, 'deletePlat'])->name('deletePlat');

Route::get('/supprimerMenu/{id}', [MenuController::class, 'deleteMenu'])->name('deleteMenu');
