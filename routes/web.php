<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/home', [App\Http\Controllers\NewController::class, 'index'])->name('home');


Route::get('/', function () {
    return view('index');
});


// Route::get('/home/adminlogin', function () {
//     return view('admin/login');
// })->name('adminlogin');

// Route::get('/admin/dashboard', function () {
//     return view('admin.layouts.auth');
// })->middleware(['auth:admin'])->name('admin.dashboard');

// require __DIR__ . '/adminauth.php';


// Route::get('/admin', function () {
//     return view('admin/login');
// })->middleware(['auth'])->name('adminlogin');

Route::group(['prefix' => 'admin'], function () {

    // Route::group(['middleware' => 'admin.guest:admin'], function () {
    Route::get('/', function () {
        return view('admin/login');
    })->name('admin.login');
    // });
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/headline', [App\Http\Controllers\HeadlineController::class, 'index'])->name('admin.headline');
        Route::get('/article', [App\Http\Controllers\ArticleController::class, 'index'])->name('admin.article');
        Route::get('/contact-report', [App\Http\Controllers\ContactController::class, 'index'])->name('admin.article');
    });
});




Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('view:clear');
    return 'DONE'; //Return anything
});

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
    return 'DONE'; //Return anything
});



// Route::get('/admin', function () {
//     return view('admin/login');
// })->middleware(['auth'])->name('adminlogin');

// require __DIR__ . '/auth.php';



// Route::get('adminlogin', function () {
//     return view('admin/Dashboard');
// });






// Route::get('/admin/lo', function () {
//     return view('admin/login');
// });




// Route::post('/dashboard', function () {
//     return view('admin/Dashboard');
// });


// Route::post('/adminlogin', function () {
//     return view('admin/Dashboard');
// });

Route::get('/headline', function () {
    return view('admin/headline');
});

// Route::get('/headline', function () {
//     return view('admin/headline');
// });

Route::get('/article', function () {
    return view('admin/article');
});

Route::get('/feedback', function () {
    return view('feedback');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/legal', function () {
    return view('admin/legal');
});


Route::get('/home', [App\Http\Controllers\HeadlineController::class, 'list']);
Route::get('/articles-n-updates', [App\Http\Controllers\ArticleController::class, 'list']);
Route::get('/case-studies-2-insights', [App\Http\Controllers\LegalController::class, 'list']);








// routes for headline


//Route::get('/headline', [App\Http\Controllers\HeadlineController::class, 'index']);
Route::post('/add_headline', [App\Http\Controllers\HeadlineController::class, 'store']);
Route::get('/headline/headline_show', [App\Http\Controllers\HeadlineController::class, 'show']);
Route::get('/headline/edit_headline', [App\Http\Controllers\HeadlineController::class, 'edit']);
Route::post('/headline/headline_update', [App\Http\Controllers\HeadlineController::class, 'update']);
Route::post('/headline/headline_update', [App\Http\Controllers\HeadlineController::class, 'update']);
Route::get('/headline/headline_deactivate', [App\Http\Controllers\HeadlineController::class, 'deactivate']);
Route::get('/headline/headline_activate', [App\Http\Controllers\HeadlineController::class, 'activate']);





// routes for article

Route::get('/article', [App\Http\Controllers\ArticleController::class, 'index']);
Route::post('/add_article', [App\Http\Controllers\ArticleController::class, 'store']);
Route::get('/article/article_show', [App\Http\Controllers\ArticleController::class, 'show']);
Route::get('/article/edit_article', [App\Http\Controllers\ArticleController::class, 'edit']);




//routes for contact

Route::post('/add_contact', [App\Http\Controllers\ContactController::class, 'store']);
Route::get('/contact_show', [App\Http\Controllers\ContactController::class, 'show']);


//rautes for feedback
Route::post('/add_feedback', [App\Http\Controllers\FeedbackController::class, 'store']);
Route::get('/feedback', [App\Http\Controllers\FeedbackController::class, 'index']);
Route::get('/feedback_show', [App\Http\Controllers\FeedbackController::class, 'show']);


//routes for legal and news
Route::post('/add_legal', [App\Http\Controllers\LegalController::class, 'store']);
Route::get('legal/legal_show', [App\Http\Controllers\LegalController::class, 'show']);
Route::get('/legal/edit_legal', [App\Http\Controllers\LegalController::class, 'edit']);
Route::get('legal/legal_deactivate', [App\Http\Controllers\LegalController::class, 'deactivate']);
Route::get('legal/legal_activate', [App\Http\Controllers\LegalController::class, 'activate']);
