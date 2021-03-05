<?php

    namespace App\Http\Controllers\API\Auth;

    use App\Http\Controllers\Controller;

    class LogoutController extends Controller
    {

        public function logout()
        {
            $user = auth()->user();

            foreach ($user->tokens as $token) {
               $token->delete();
            }

            return response()->json('Logged out successfully', 200);
        }
    }
