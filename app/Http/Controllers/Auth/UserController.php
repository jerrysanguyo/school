<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\auth\UserRequest;
use App\Http\Requests\auth\LoginRequest;
use App\DataTables\UserDataTable;
use App\Services\auth\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

    public function logout()
    {
        $this->userService->logout();

        return redirect()
            ->route('login')
            ->with('success', 'Logged out successfully');
    }
    
    public function loginCheck(LoginRequest $request)
    {
        if ($this->userService->check($request->validated())) {
            return redirect()
                ->route(Auth::user()->role . '.dashboard')
                ->with('success', 'User created successfully');
        }

        return redirect()
            ->route('login')
            ->with('failed', 'Invalid login credentials.');
    }
    
    public function index(Request $request, UserDataTable $dataTable)
    {
        $page_title = 'Users';
        $resource   = 'user';
        $page = 'Table';
    
        $query = User::query();
    
        if ($request->filled('search')) {
            $query->searchByName($request->input('search'));
        }
    
        $query->orderBy('created_at', 'desc');
    
        $users = $query->paginate(8)->withQueryString();
    
        return $dataTable->render('student.index', compact('page_title', 'resource', 'users', 'page'));
    }
    
    
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $this->userService->store($data);

        return redirect()
            ->route(Auth::user()->role . '.user.index')
            ->with('success', 'User added successfully');
    }
    
    public function show(User $user)
    {
        $page_title = 'User';
        return view('student.show', compact('user', 'page_title'));
    }

    public function update(UserRequest $request, User $user)
    {
        $this->userService->update($request->validated(), $user);

        return redirect()
            ->route(Auth::user()->role . '.user.index')
            ->with('success', 'User updated successfully');
    }
    
    public function destroy(User $user)
    {
        $this->userService->destroy($user);

        return redirect()
            ->route(Auth::user()->role . '.user.index')
            ->with('success', 'User updated successfully');
    }
}