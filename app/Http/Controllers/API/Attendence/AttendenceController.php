<?php

    namespace App\Http\Controllers\API\Attendence;

    use App\Http\Controllers\Controller;
    use App\Models\Attendence\Attendence;
    use Carbon\Carbon;
    use Illuminate\Http\Request;

    class AttendenceController extends Controller
    {

        public function checkIn()
        {
            Attendence::create([
                'user_id' => 7,
            ]);

            return response()->json('Check in successfully', 200);
        }

        public function checkOut(Attendence $attendence)
        {
            $outTime = Carbon::now();
            $totalWorkingSeconds = $outTime->diffInSeconds($attendence->created_at);
            $attendence->update([
                'updated_at' => $outTime,
                'total_working_hour' => $totalWorkingSeconds
            ]);

            return response()->json('Check out successfully', 200);
        }
    }
