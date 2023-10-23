<?php
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\UserController;
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
Route::get('test',function(){
    return'test';
});
// recupérer la liste des postes on utilise la methode ge
Route::get('posts',[PostController::class,'index']);
//on utilise la methode post pour ajouter un article
Route::put('posts/edit/{post}',[PostController::class, 'update']);
Route::delete('posts/{post}', [PostControlller::class, 'delete']);
Route::post('/register',[UserController::class,'register']);
Route::post('/login', [UserController::class,'login']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    Route::post('posts/create',[PostController::class,'store']);

    Route::get('/user',function(Request $request){
        
        return $request->user();

    });
});
