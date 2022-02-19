<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }



        // return $user->createToken($request->device_name)->plainTextToken;
        return response()->json([
            'user' => $user,
            'token' => $user->createToken($request->device_name)->plainTextToken
        ], 200);
    } 

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'vatRegistration' => $request->input('vatRegistration'),
            'phone' => $request->input('phone')
        ]);

        return response()->json(['user' => $user, 'token' => $user->createToken($request->device_name)->plainTextToken], 200);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        Log::debug('change password request', (array) $request);
        if(! Hash::check($request->input('currentPassword'), Auth::user()->password)){
            return response()->json('invalid current password', 401);
        }

        Auth::user()->update([
            'password' => bcrypt($request->input('password'))
        ]);

        return response()->json(__('Password Updated successfully'), 200);
    }  
}
