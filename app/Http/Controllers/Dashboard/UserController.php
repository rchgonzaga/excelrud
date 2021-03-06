<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Requests\UserUpdateRequest;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function edit(Request $request)
    {
        $user = $request->user();
        return view('dashboard.user.edit', ['user' => $user]);
    }

    public function update($userId, UserUpdateRequest $request)
    {
        $user = User::find($userId);
        if (Gate::denies('user', $user)) abort(403);

        $fields = ['name'];
        foreach ($fields as $field) {
            $user->$field = $request->input($field);
        }

        $user->save();

        return redirect()->route('user.edit', ['id' => $user->id])->with('message', 'Profile updated');
    }
}
