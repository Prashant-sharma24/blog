<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
{
    $this->middleware('checkUserId');
}
    public function index()
    {

        $users = User::latest()->paginate(5);

        return view('users.index',compact('users'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StorePostRequest $request){

        $input = $request->all();
        $user = User::create($input);
        $user->user_role = $request->user_role;
        $user->save();

        $request->user()->fill([
            // 'password' => Hash::make($request->newPassword)
            'password' => bcrypt($request['password']),
        ])->save();


        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|required|min:6|confirmed'
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
}

}
