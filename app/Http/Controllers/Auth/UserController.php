<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\auth\UserRequest;
use App\Services\auth\UserService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login()
    {
        return view('auth.login');
    }
    
    public function index()
    {
        return view('cms.index');
    }
    
    public function store(UserRequest $request)
    {
        $this->userService->create($request->validated());

        return redirect()
            ->route(Auth::user()->role . '.cms.index')
            ->with('success', 'User created successfully');
    }
    
    public function show(User $user)
    {
        //
    }
    
    public function edit(User $user)
    {
        return view('cms.edit', compact('user'));
    }
    
    public function update(UserRequest $request, User $user)
    {
        $this->userService->update($request->validated(), $user);

        return redirect()
            ->route(Auth::user()->role . '.cms.edit', $user)
            ->with('success', 'User updated successfully');
    }
    
    public function destroy(User $user)
    {
        $this->userService->destroy($user);

        return redirect()
            ->route(Auth::user()->role . '.cms.index')
            ->with('success', 'User updated successfully');
    }
}
