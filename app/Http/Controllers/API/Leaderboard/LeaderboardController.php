<?php

    namespace App\Http\Controllers\API\Leaderboard;

    use App\Http\Controllers\Controller;
    use App\Models\User;
    use Illuminate\Database\Eloquent\Builder;

    class LeaderboardController extends Controller
    {

        public function index()
        {
            return User::join('attendences', 'users.id', '=', 'attendences.user_id')
                ->orderByDesc('attendences.total_working_hour', 'desc')
                ->limit(5)
                ->get();
        }
    }
