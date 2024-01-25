<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\UserStatusRepositoryInterface;
use App\Repositories\Contracts\UserTypeRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected UserRepositoryInterface $userRepository;
    protected UserTypeRepositoryInterface $userTypeRepository;
    protected UserStatusRepositoryInterface $userStatusRepository;

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

    public function index(Request $request): View
    {
        return view('admin.user.index', ['users' => $this->userRepository->getAll($request)]);
    }

    public function show(User $user): View
    {
        return view('admin.user.show', ['user' => $user]);
    }

    public function edit(User $user): View
    {
        return view('admin.user.edit', [
            'user' => $user,
            'userTypes' => $this->userTypeRepository->getAll(),
            'userStatuses' => $this->userStatusRepository->getAll(),
        ]);
    }

    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $this->userRepository->update($user, $request->validated());
        return redirect("users/{$user->id}");
    }

    public function destroy(User $user): RedirectResponse
    {
        $this->userRepository->delete($user);
        return redirect('users');
    }
}
