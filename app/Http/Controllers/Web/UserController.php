<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\UserStatusRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;

/**
 *
 */
class UserController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    protected UserRepositoryInterface $userRepository;
    /**
     * @var UserStatusRepositoryInterface
     */
    protected UserStatusRepositoryInterface $userStatusRepository;

    /**
     * @param UserRepositoryInterface $userRepository
     * @param UserStatusRepositoryInterface $userStatusRepository
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        UserStatusRepositoryInterface $userStatusRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->userStatusRepository = $userStatusRepository;
    }

    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        return view('admin.user.index', ['users' => $this->userRepository->getAll($request)]);
    }

    /**
     * @param User $user
     * @return View
     */
    public function show(User $user): View
    {
        return view('admin.user.show', ['user' => $user]);
    }

    /**
     * @param User $user
     * @return View
     */
    public function edit(User $user): View
    {
        return view('admin.user.edit', [
            'user' => $user,
            'roles' => Role::all(),
            'userStatuses' => $this->userStatusRepository->getAll(),
        ]);
    }

    /**
     * @param UserRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UserRequest $request, User $user): RedirectResponse
    {

        $validated = $request->validated();

        $user->addRoles($request->input('roles'));

        Arr::forget($validated, 'roles');

        $this->userRepository->update($user, $validated);

        return redirect("users/$user->id");
    }

    /**
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        $this->userRepository->delete($user);
        return redirect('users');
    }

}
