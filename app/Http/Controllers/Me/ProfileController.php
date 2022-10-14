<?php

namespace App\Http\Controllers\Me;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();

        return response()->json([
            'meta' => [
                'code' => 200,
                'status' => 'success',
                'message' => 'User data fetched successfully'
            ],
            'data' => [
                'name' => $user->name,
                'email' => $user->email,
                'picture' => $user->picture
            ]
        ]); 
    }

    public function update(Request $request)
    {
        $user = User::find(auth()->id());

        $update = $user->update($request);
    }
}
