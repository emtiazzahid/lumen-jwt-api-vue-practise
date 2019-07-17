<?php

namespace App\Http\Controllers\API\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed|min:6'
        ]);

        $user = $request->user();

        return tap($user)->update([
            'password' => bcrypt($request->password)
        ]);
    }
}
