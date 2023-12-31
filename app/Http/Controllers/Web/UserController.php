<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\UserStatus;
use App\Models\UserType;
use App\Services\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class UserController
 */
class UserController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        return view('admin.user.index', [
            'users' => UserService::getPaginatedUsers($request),
        ]);
    }

    /**
     * @param User $user
     * @return View
     */
    public function show(User $user): view
    {
        return view('admin.user.show', [
            'user' => $user,
        ]);
    }

    /**
     * @param User $user
     * @return View
     */
    public function edit(User $user): view
    {
        return view('admin.user.edit', [
            'user' => $user,
            'userTypes' => UserType::all(),
            'userStatuses' => UserStatus::all(),
        ]);
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
        UserService::delete($user);
        return redirect('users');
    }

}
