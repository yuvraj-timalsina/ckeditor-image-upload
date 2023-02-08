<?php

    use App\Http\Controllers\HomeController;
    use App\Models\Post;
    use Illuminate\Support\Facades\Route;
    use UniSharp\LaravelFilemanager\Lfm;

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
        $post = Post::all();

        return view('welcome', ['post' => $post]);
    });
    Route::get('/post/{slug}', function($slug) {
    $post = \App\Models\Post::where('slug',$slug)->firstOrFail();
    return view('detail',['post' => $post]);
})->name('detail');

    Auth::routes();

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/create', [HomeController::class, 'create'])->name('create');
    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
        Lfm::routes();
    });
    Route::post('/create', [HomeController::class, 'store'])->name('store');
