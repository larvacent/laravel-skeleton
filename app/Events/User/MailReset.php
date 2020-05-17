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
 * 邮箱重置事件
 * @author Tongle Xu <xutongle@gmail.com>
 */
class MailReset
{
    use SerializesModels;

    /**
     * The user.
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
