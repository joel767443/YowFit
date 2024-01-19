<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserTypeRequest;
use App\Http\Requests\UserTypeUpdateRequest;
use App\Models\UserType;
use App\Repositories\Contracts\UserTypeRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * @property UserTypeRepositoryInterface $userTypeRepository
 */
class UserTypeController extends Controller
{
    /**
     * @param UserTypeRepositoryInterface $userTypeRepository
     */
    public function __construct(UserTypeRepositoryInterface $userTypeRepository)
    {
        $this->userTypeRepository = $userTypeRepository;
    }

    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $userTypes = $this->userTypeRepository->getAll($request);
        return view('admin.userType.index', compact('userTypes'));
    }

    /**
     * @param UserType $userType
     * @return View
     */
    public function show(UserType $userType): View
    {
        return view('admin.userType.show', compact('userType'));
    }

    /**
     * @param UserType $userType
     * @return View
     */
    public function edit(UserType $userType): View
    {
        return view('admin.userType.edit', [
            'userType' => $userType,
        ]);
    }

    /**
     * @return View
     */
    public function create(): view
    {
        return view('admin.userType.create');
    }

    /**
     * @param CreateUserTypeRequest $request
     * @return RedirectResponse
     */
    public function store(CreateUserTypeRequest $request): RedirectResponse
    {
        $this->userTypeRepository->create($request->validated());
        return redirect('userTypes')->with('success', 'UserType created successfully.');
    }

    /**
     * @param UserTypeUpdateRequest $request
     * @param UserType $userType
     * @return RedirectResponse
     */
    public function update(UserTypeUpdateRequest $request, UserType $userType): RedirectResponse
    {
        $this->userTypeRepository->update($userType, $request->validated());
        return redirect("userTypes/$userType->id");
    }
}
