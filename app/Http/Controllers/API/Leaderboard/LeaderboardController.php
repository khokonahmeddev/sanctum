<?php

    namespace App\Http\Controllers\API\Leaderboard;

    use App\Http\Controllers\Controller;
    use App\Models\Attendence\Attendence;
    use App\Models\User;

    class LeaderboardController extends Controller
    {

        public function index()
        {
            return Attendence::with('user')
                ->orderByDesc('total_working_hour')
                ->limit(5)
                ->get();

        }

        public function loggedInUserPosition()
        {

            $authUser = Attendence::where('user_id', auth()->user()->id);
//
//            $topTwoUser = Attendence::with(['user'])
//                        ->where('total_working_hour' ,'>', $authUser->first()->total_working_hour)
//                        ->orderByDesc('total_working_hour')
//                        ->limit(2)
//                        ->get()->toArray();
//
//            $lowTwoUser = Attendence::with(['user'])
//                ->where('total_working_hour' ,'<', $authUser->first()->total_working_hour)
//                ->orderByDesc('total_working_hour')
//                ->limit(2)
//                ->get()->toArray();
//
//            $data = array_merge($topTwoUser, $authUser->get()->toArray(), $lowTwoUser);
//
//            return $data;

//            SELECT * from (SELECT * from attendances where worked_hour >= (SELECT worked_hour FROM attendances WHERE user_id = 4)
//            ORDER by worked_hour ASC LIMIT 3) ORDER BY worked_hour DESC

            $topTwoUser = Attendence::with(['user'])
                        //->where('user_id', auth()->user()->id)
                        ->where('total_working_hour' ,'>', $authUser->first()->total_working_hour)
                        ->orderByDesc('total_working_hour')
                        ->limit(3)
                        ->get();
            return $topTwoUser;

        }
    }
