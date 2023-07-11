<?php

use App\Http\Controllers\Admin\CommodityController;
use App\Http\Controllers\Admin\RegressionModelController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Mitra\HarvestFishController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Mitra\OperationCostsController;
use App\Http\Controllers\Mitra\PondController;
use App\Http\Controllers\Mitra\PredictionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    // home
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::get('/chart/data', [HomeController::class, 'getData'])->name('chart.data');

    // profile
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [HomeController::class, 'updateProfile'])->name('profile.update');
    Route::patch('/profile/password', [HomeController::class, 'updatePassword'])->name('profile.password.update');

    // commodity management
    Route::post('/commodity/delete', [CommodityController::class, 'deleteCommodity'])->name('commodity.delete');
    Route::resource('commodity', CommodityController::class);

    // implementation prediction
    Route::get('/excel/download', [PredictionController::class, 'downloadExcel'])->name("excel.download");
    Route::get('/range/sr', [PredictionController::class, 'getRangeSr'])->name('range.sr');
    Route::get('/fish/description', [PredictionController::class, 'getFishDesc'])->name('fish.description');
    Route::get('/pond/volume', [PredictionController::class, 'getVolumePond'])->name('pond.volume');
    Route::get('/fish/count', [PredictionController::class, 'getTotalFishCount'])->name('fish.count');
    Route::get('/index/prediction', [PredictionController::class, 'index'])->name('index.prediction');

    // role admin
    Route::middleware(['admin'])->group(function () {
        // user management
        Route::post('/user/delete', [UserController::class, 'deleteUser'])->name('user.delete');
        Route::resource('user', UserController::class);

        // learning model
        Route::get('/training/model', [RegressionModelController::class, 'train_model'])->name('learning.model.train');
        Route::get('/testing/model', [RegressionModelController::class, 'test_model'])->name('learning.model.test');
        Route::get('/train/data', [RegressionModelController::class, 'get_data_train'])->name('learning.data.train');
    });
});
