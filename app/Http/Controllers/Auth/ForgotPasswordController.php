<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail(ForgotPasswordRequest $request)
    {
        try {
            $status = Password::sendResetLink(
                $request->only("email")
            );

            if ($status == Password::RESET_LINK_SENT) {
                return response()->json(['message' => __($status)]);
            }

            throw ValidationException::withMessages([
                'email'=> [trans($status)],
            ]);
        } catch (ValidationException $e) {
            return response()->json(['message'=> __($e->getMessage())]);
        }
    }
}
