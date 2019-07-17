<?php

namespace App\Http\Controllers\API\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $response = Password::broker()->sendResetLink(
            $request->only('email')
        );

//        if ($response === Password::INVALID_USER) {
//            throw ValidationException::withMessages([
//                'email' => [trans($response)],
//            ]);
//        }
//
//        return $this->sendResetLinkResponse($response);
    }

    /**
     * Get the response for a successful password reset link.
     *
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendResetLinkResponse($response)
    {
        return ['status' => trans($response)];
    }
}
