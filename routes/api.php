<?php
use Illuminate\Http\Request;   
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AmarapiController;
use App\Http\Controllers\AuthController;
//use App\Http\Controllers\API\AuthController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  //  return $request->user();
// });

//<!-------------------------------Good Work--------------------------->
//Route::post('/amar',[ApiController::class,'store']);
//Route::get('/amar/{post}',[ApiController::class,'show']);
//Route::put('/amar/{post}',[ApiController::class,'update']);
//Route::delete('/amar/{post}',[ApiController::class,'destroy']);
//<!-------------------------------Good Last Work --------------------->


//Route::post('register', [AuthController::class, 'signup']);

Route::post('/new',[AmarapiController::class,'store']);
Route::get('/new/{post}',[AmarapiController::class,'show']);
Route::put('/new/{post}',[AmarapiController::class,'update']);
Route::delete('/new/{post}',[AmarapiController::class,'destroy']);


Route::post('register', [AuthController::class, 'register']);
Route::post('/login',[AuthController::class,'login']);
Route::middleware('auth:sanctum')->group(function () {
Route::post('logout', [AuthController::class, 'logout']);
});




