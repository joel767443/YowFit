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
            'calendarEntries' => $this->getCalendarEntries($user)
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

    /**
     * @param User $user
     * @return Collection
     */
    public function getCalendarEntries(User $user): Collection
    {
        return $user->calendarEntries()
            ->select('day_of_week', 'start_time', 'end_time', 'activity_type_id')
            ->selectRaw('IF(? BETWEEN start_time AND end_time, 1, 0) AS isCurrentTimeBetween', [now()])
            ->where('user_id', 1)
            ->where('end_time', '>=', now())
            ->where('day_of_week', 'Friday')
            ->get();
    }
}
