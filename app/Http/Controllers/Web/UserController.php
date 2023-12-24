<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\CalendarEvent;
use App\Models\User;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

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
        $events = CalendarEvent::where('user_id', auth()->user()->id)
            ->whereBetween('start_time', [now()->startOfWeek(), now()->endOfWeek()])
            ->get();

        return view('admin.user.show', [
            'user' => $user,
            'events' => $events
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
        UserService::deleteUser($user);
        return redirect('users');
    }
}
