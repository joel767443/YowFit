<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\UserStatusRepositoryInterface;
use App\Repositories\Contracts\UserTypeRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @property UserRepositoryInterface $userRepository
 * @property UserTypeRepositoryInterface $userTypeRepository
 * @property UserStatusRepositoryInterface $userStatusRepository
 */
class UserController extends Controller
{

    /**
     * @param UserRepositoryInterface $userRepository
     * @param UserTypeRepositoryInterface $userTypeRepository
     * @param UserStatusRepositoryInterface $userStatusRepository
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        UserTypeRepositoryInterface $userTypeRepository,
        UserStatusRepositoryInterface $userStatusRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->userTypeRepository = $userTypeRepository;
        $this->userStatusRepository = $userStatusRepository;
    }

    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        return view('admin.user.index', [
            'users' => $this->userRepository->getAll($request),
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
            'userTypes' => $this->userTypeRepository->getAll(),
            'userStatuses' => $this->userStatusRepository->getAll(),
        ]);
    }

    /**
     * @param UpdateUserRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $this->userRepository->update($user, $request->validated());
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
