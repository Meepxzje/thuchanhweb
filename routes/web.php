<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NsxController;
use App\Http\Controllers\NccController;
use App\Http\Controllers\LspController;
use App\Http\Controllers\SpController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PmController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CtpmController;

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

Route::get('/sorting', [IndexController::class, 'sort'])->name('index.sort');
Route::get('/sortingsp', [IndexController::class, 'sort1'])->name('index.sort1');


Route::get('/', [IndexController::class, 'show'])->name('home');;
Route::get('/chitiet', [IndexController::class, 'chitiet'])->name('index.chitiet1');
Route::get('/chitiet/{id}', [IndexController::class, 'chitietdanhmuc'])->name('index.chitiet');
Route::get('/chitietsp/{id}', [IndexController::class, 'chitietsp'])->name('index.chitietsp');
Route::post('/timkiem', [IndexController::class, 'search'])->name('index.search');



Route::get('/giohang', [CartController::class, 'show'])->name('cart.show');
Route::post('/giohang/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/giohang/xoa/{id}', [CartController::class, 'delete'])->name('cart.delete');
Route::get('/donhang', [CartController::class, 'donhang'])->name('cart.donhang');


//pm
Route::group(['middleware' => ['web']], function () {
    Route::post('/donhang', [PmController::class, 'add'])->name('pm.add');
});
Route::get('/dspm', [PmController::class, 'show'])->name('dspm');
Route::get('/xoakh/{id}', [PmController::class, 'xoakh'])->name('pm.xoakh');
Route::get('/xoaad/{id}', [PmController::class, 'xoaad'])->name('pm.xoaad');
Route::get('/suaxn/{id}', [PmController::class, 'suaxn'])->name('pm.suaxn');
Route::get('/suadg/{id}', [PmController::class, 'suadg'])->name('pm.suadg');
Route::get('/suaht/{id}', [PmController::class, 'suaht'])->name('pm.suaht');


Route::get('chitietpm/{id}', [CtpmController::class, 'xemctdh'])->name('pm.xemctdh');
Route::get('chitietpmad/{id}', [CtpmController::class, 'xemctdhad'])->name('pm.xemctdhad');


Route::get('/home', [IndexController::class, 'show']);
Route::get('/index', [IndexController::class, 'show']);



//home
Route::get('/homead', [HomeController::class, 'show'])->name('homead');
Route::post('/timkiemad', [HomeController::class, 'search']);


//nsx
Route::get('/themnsx', [NsxController::class, 'formthem']);
Route::post('/themnsx', [NsxController::class, 'add'])->name('nsx.add');
Route::get('/dsnsx', [NsxController::class, 'show'])->name('dsnsx');
Route::get('/suansx/{id}', [NsxController::class, 'edit'])->name('nsx.suansx');
Route::put('/updatensx/{id}', [NsxController::class, 'update'])->name('nsx.update');
Route::get('/xoansx/{id}', [NSXController::class, 'destroy'])->name('nsx.xoansx');

//ncc

Route::get('/themncc', [NccController::class, 'formthem']);
Route::post('/themncc', [NccController::class, 'add'])->name('ncc.add');
Route::get('/dsncc', [NccController::class, 'show'])->name('dsncc');
Route::get('/suancc/{id}', [NccController::class, 'edit'])->name('ncc.suancc');
Route::put('/updatencc/{id}', [NccController::class, 'update'])->name('ncc.update');
Route::get('/xoancc/{id}', [NccController::class, 'destroy'])->name('ncc.xoancc');

//lsp

Route::get('/themlsp', [LspController::class, 'formthem']);
Route::post('/themlsp', [LspController::class, 'add'])->name('lsp.add');
Route::get('/dslsp', [LspController::class, 'show'])->name('dslsp');
Route::get('/sualsp/{id}', [LspController::class, 'edit'])->name('lsp.sualsp');
Route::put('/updatelsp/{id}', [LspController::class, 'update'])->name('lsp.update');
Route::get('/xoalsp/{id}', [LspController::class, 'destroy'])->name('lsp.xoalsp');

//sp
Route::get('/dssp', [SpController::class, 'show'])->name('dssp');
Route::get('/themsp', [SpController::class, 'formthem']);
Route::post('/themsp', [SpController::class, 'add'])->name('sp.add');
Route::get('/xoasp/{id}', [SpController::class, 'destroy'])->name('sp.xoasp');
Route::get('/suasp/{id}', [SpController::class, 'edit'])->name('sp.suasp');
Route::put('/updatesp/{id}', [SpController::class, 'update'])->name('sp.update');

//login
Route::get('/dstk', [LoginController::class, 'show']);
Route::get('/login', [LoginController::class, 'formthem'])->name('login');
Route::post('/dangky', [LoginController::class, 'dangky'])->name('login.dangky');
Route::post('/login', [LoginController::class, 'dangnhap'])->name('login.dangnhap');
Route::get('/dangxuat', [LoginController::class, 'dangxuat'])->name('login.dangxuat');


//canhan
Route::get('/canhan', [ProfileController::class, 'canhan'])->name('profile.canhan');
Route::post('/canhan', [ProfileController::class, 'update'])->name('profile.update');
