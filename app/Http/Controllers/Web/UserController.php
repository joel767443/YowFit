<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
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
     * @param User $user
     * @return View
     */
    public function show(User $user): view
    {
        return view('admin.user.show', [
            'user' => $user,
            'currentTime' => Carbon::now()->format('H:i'),
        ]);

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
