<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('admin.user.index', ['users' => User::all()]);
    }

    /**
     * @param CreateUserRequest $request
     * @return RedirectResponse
     */
    public function store(CreateUserRequest $request): RedirectResponse
    {
        User::create($request->validated());
        return redirect('users');
    }

    /**
     * @param User $user
     * @return View
     */
    public function show(User $user): view
    {
        return view('admin.user.show', ['user' => $user]);
    }

    /**
     * @param User $user
     * @return View
     */
    public function edit(User $user): view
    {
        return view('admin.user.edit', ['user' => $user]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.user.create');
    }

    /**
     * @param UpdateUserRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());
        return redirect("users/$user->id");
    }

    /**
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect('users');
    }
}
