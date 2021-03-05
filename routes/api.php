<?php

    use App\Http\Controllers\API\Attendence\AttendenceController;
    use App\Http\Controllers\API\Auth\LoginController;
    use App\Http\Controllers\API\Auth\LogoutController;
    use App\Http\Controllers\API\Leaderboard\LeaderboardController;
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
    Route::post('login', [LoginController::class, 'login'])->name('login');

//    Route::middleware('auth:api')->get('/user', function (Request $request) {
//        return $request->user();
//    });

    Route::post('check-in', [AttendenceController::class, 'checkIn'])->name('check_in');
    Route::patch('check-out/{attendence}', [AttendenceController::class, 'checkOut'])->name('check_out');
    Route::get('top-five-average-working-hour', [LeaderboardController::class, 'index'])
           ->name('top_five_average_working_hour');

    Route::middleware('auth:sanctum')->group(function () {

        Route::post('auth/logout', [LogoutController::class, 'logout'])->name('logout');


    });
