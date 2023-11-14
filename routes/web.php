<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [FrontendController::class, 'dashboard']);
Route::get('/category-wise-products/{id}', [FrontendController::class, 'categoryWiseProducts'])->name('category_wise.products');
Route::get('/product-details/{id}', [FrontendController::class, 'productDetails'])->name('product.details');



Route::get('/dashboard', function () {
    return view('dashboard');
    
})->middleware(['auth', 'verified'])->name('dashboard');



   

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'mypermission'])->group(function(){

    Route::get('/admin', [DashboardController::class, 'dashboard']);



    Route::prefix('comment')->group(function () {
        Route::post('store', [CommentController::class,  'store'])->name('comment.store');
    });
    
    
    
    Route::prefix('products')->group(function () {
    
        Route::get('/', [ProductController::class,  'index'])->name('product.index');
        Route::get('/create', [ProductController::class,  'create'])->name('product.create');
        Route::get('/show/{id}', [ProductController::class,  'show'])->name('product.show');
    
        Route::post('/store', [ProductController::class,  'store'])->name('product.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{id}',  [ProductController::class, 'update'])->name('product.update');
        Route::delete('/destroy/{id}',  [ProductController::class, 'destroy'])->name('product.destroy');
    
        Route::get('/pdf', [PdfController::class, 'productPDFGenerate'])->name('product.pdf');
        Route::get('/excel', [ExcelController::class, 'export'])->name('product.excel');
    
        // soft delete routes  
    
        Route::get('/trashlist',  [ProductController::class, 'trashlist'])->name('product.trashlist');
        Route::get('/restore/{id}',  [ProductController::class, 'restore'])->name('product.restore');
        Route::get('/restoreall',  [ProductController::class, 'restoreAll'])->name('product.restore_all');
    
        Route::delete('/delete/{id}',  [ProductController::class, 'delete'])->name('product.delete');
    
    
        /* 
            copy paste 
    
            
        */
    
    });
    
    Route::prefix('categories')->group(function () {
    
        Route::get('/', [CategoryController::class,  'index'])->name('category.index');
    
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    
        Route::post('/store', [CategoryController::class,  'store'])->name('category.store');
    
        Route::delete('/destroy/{id}',  [CategoryController::class, 'destroy'])->name('category.destroy');
    
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    
        Route::get('/show/{id}', [CategoryController::class, 'show'])->name('category.show');


        Route::post('/update/{id}',  [CategoryController::class, 'update'])->name('category.update');
    
        /* 
            copy paste 
    
            
        */
    });
    
    Route::prefix('sizes')->group(function () {
        Route::get('/', [SizeController::class,  'index'])->name('size.index');
        Route::get('/create', [SizeController::class,  'create'])->name('size.create');
        Route::post('/store', [SizeController::class,  'store'])->name('size.store');
    
        Route::delete('/destroy/{id}',  [SizeController::class, 'destroy'])->name('size.destroy');
    
        Route::get('/edit/{id}', [SizeController::class, 'edit'])->name('size.edit');
    
        Route::post('/update/{id}',  [SizeController::class, 'update'])->name('size.update');
    });


    Route::prefix('sliders')->group(function () {
        Route::get('/', [SliderController::class,  'index'])->name('slider.index');
        Route::get('/create', [SliderController::class,  'create'])->name('slider.create');
        Route::post('/store', [SliderController::class,  'store'])->name('slider.store');
    
        Route::delete('/destroy/{id}',  [SliderController::class, 'destroy'])->name('slider.destroy');
    
        Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
    
        Route::post('/update/{id}',  [SliderController::class, 'update'])->name('slider.update');
    });



    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class,  'index'])->name('user.index');
        Route::post('/user-contact-update/{id}', [UserController::class,  'contactUpdate'])->name('user.contact_update');

       
    });

    Route::prefix('carts')->group(function () {
        Route::get('/cartItems', [CartController::class,  'cartItems'])->name('cart.items');

        Route::post('/store', [CartController::class,  'store'])->name('cart.store');

       
    });
    
    
    
    
    
    Route::get('/admin/color/create', [ColorController::class, 'create'])->name('color.create');
    Route::post('/admin/color/store', [ColorController::class, 'store'])->name('color.store');
    Route::get('/admin/color/edit/{id}', [ColorController::class, 'edit'])->name('color.edit');
    Route::post('/admin/color/update/{id}', [ColorController::class, 'update'])->name('color.update');
    Route::delete('/admin/color/destroy/{id}', [ColorController::class, 'destroy'])->name('color.destroy');
    Route::get('/admin/color/list', [ColorController::class, 'list'])->name('color.list');
    

});




require __DIR__.'/auth.php';

/* 

    category 
    product 

    api  
    
    dropdown --- load

    category --- products 

    
*/

