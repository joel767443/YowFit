<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserStatusRequest;
use App\Http\Requests\UserStatusUpdateRequest;
use App\Models\UserStatus;
use App\Repositories\Contracts\UserStatusRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * @property UserStatusRepositoryInterface $userStatusRepository
 */
class UserStatusController extends Controller
{
    /**
     * @param UserStatusRepositoryInterface $userStatusRepository
     */
    public function __construct(UserStatusRepositoryInterface $userStatusRepository)
    {
        $this->userStatusRepository = $userStatusRepository;
    }

    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $userStatuses = $this->userStatusRepository->getAll($request);
        return view('admin.userStatus.index', compact('userStatuses'));
    }

    /**
     * @param UserStatus $userStatus
     * @return View
     */
    public function show(UserStatus $userStatus): View
    {
        return view('admin.userStatus.show', compact('userStatus'));
    }

    /**
     * @param UserStatus $userStatus
     * @return View
     */
    public function edit(UserStatus $userStatus): View
    {
        return view('admin.userStatus.edit', [
            'userStatus' => $userStatus,
        ]);
    }

    /**
     * @return View
     */
    public function create(): view
    {
        return view('admin.userStatus.create');
    }

    /**
     * @param CreateUserStatusRequest $request
     * @return RedirectResponse
     */
    public function store(CreateUserStatusRequest $request): RedirectResponse
    {
        $this->userStatusRepository->create($request->validated());
        return redirect('userStatuses')->with('success', 'UserStatus created successfully.');
    }

    /**
     * @param UserStatusUpdateRequest $request
     * @param UserStatus $userStatus
     * @return RedirectResponse
     */
    public function update(UserStatusUpdateRequest $request, UserStatus $userStatus): RedirectResponse
    {
        $this->userStatusRepository->update($userStatus, $request->validated());
        return redirect("userStatuses/$userStatus->id");
    }
}
