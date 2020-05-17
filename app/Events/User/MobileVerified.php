<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace App\Events\User;

use Illuminate\Queue\SerializesModels;

/**
 * 手机号码验证成功
 * @author Tongle Xu <xutongle@gmail.com>
 */
class MobileVerified
{
    use SerializesModels;

    /**
     * The verified user.
     *
     * @var \App\Models\User
     */
    public $user;

    /**
     * Create a new event instance.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }
}
