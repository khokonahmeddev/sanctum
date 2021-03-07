<?php

    namespace App\Http\Controllers\API\Auth;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\LoginRequest;
    use App\Models\User;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Validation\ValidationException;


    class LoginController extends Controller
    {
        public function login(LoginRequest $request)
        {
            $user = User::whereEmail($request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                throw ValidationException::withMessages([
                    'message' => ['These credentials do not match our records.'],
                ]);
            }
            $token = $user->createToken($request->header('User-Agent'))->plainTextToken;

            $response = [
                'user' => $user,
                'token' => $token
            ];

            return response($response, 201);
        }
    }
