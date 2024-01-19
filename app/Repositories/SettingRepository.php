<?php

namespace App\Repositories;

use App\Models\Setting;
use App\Repositories\Contracts\SettingRepositoryInterface;

/**
 * Class SettingRepository
 */
class SettingRepository extends BaseRepository implements SettingRepositoryInterface
{
    /**
     * @param Setting $setting
     */
    public function __construct(Setting $setting)
    {
        parent::__construct($setting);
        $this->model = $setting;
    }
}
