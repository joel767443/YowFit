<?php

namespace App\Repositories;

use App\Models\UserType;
use App\Repositories\Contracts\UserTypeRepositoryInterface;

/**
 * Class UserTypeRepository
 */
class UserTypeRepository extends BaseRepository implements UserTypeRepositoryInterface
{
    /**
     * @param UserType $userType
     */
    public function __construct(UserType $userType)
    {
        parent::__construct($userType);
        $this->model = $userType;
    }
}
