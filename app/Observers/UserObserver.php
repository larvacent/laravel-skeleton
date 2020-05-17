<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Cache;

/**
 * User 观察者
 *
 * @author Tongle Xu <xutongle@gmail.com>
 */
class UserObserver
{
    /**
     * 处理 User「新建」事件
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $user->profile()->create();//创建Profile
        $user->extra()->create();//创建Extra
    }

    /**
     * 处理 User「更新」事件
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        Cache::forget('users:' . $user->id);
    }

    /**
     * 处理 User「删除」事件
     *
     * @param \App\Models\User $user
     * @return void
     * @throws \Exception
     */
    public function deleted(User $user)
    {
        Cache::forget('users:' . $user->id);
    }

    /**
     * 处理 User「恢复」事件
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function restored(User $user)
    {

    }

    /**
     * 处理 User「强制删除」事件
     *
     * @param \App\Models\User $user
     * @return void
     * @throws \Exception
     */
    public function forceDeleted(User $user)
    {
        $user->profile->delete();
        $user->extra->delete();
        Cache::forget('users:' . $user->id);
    }
}
