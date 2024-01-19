<?php

namespace App\Repositories;

use App\Models\UserStatus;
use App\Repositories\Contracts\UserStatusRepositoryInterface;

/**
 * Class UserStatusRepository
 */
class UserStatusRepository extends BaseRepository implements UserStatusRepositoryInterface
{
    /**
     * @param UserStatus $userStatus
     */
    public function __construct(UserStatus $userStatus)
    {
        parent::__construct($userStatus);
        $this->model = $userStatus;
    }
}
