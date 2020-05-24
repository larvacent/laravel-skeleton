<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace App\Models\Traits;

use App\Models\Support;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Trait SupportTrait
 * @mixin \Illuminate\Database\Eloquent\Model
 *
 * @author Tongle Xu <xutongle@gmail.com>
 */
trait SupportTrait
{
    /**
     * 获取我赞过的
     * @return \Illuminate\Database\Eloquent\Relations\morphMany
     */
    public function supports()
    {
        return $this->morphMany(Support::class,'source');
    }

    /**
     * 赞
     * @param User $user
     * @return Model|\Illuminate\Database\Eloquent\Relations\MorphMany|object
     * @throws \Exception
     */
    public function support($user)
    {
        if (($support = $this->supports()->where('user_id', $user->id)->first()) == null) {
            $support = $this->supports()->create(['user_id' => $user->id]);
        }
        return $support;
    }

    /**
     * 是否赞过
     * @param int $sourceID
     * @return bool
     */
    public function isSupported($sourceID)
    {
        return $this->supports()->where('source_type', '=', static::class)->where('source_id', '=', $sourceID)->exists();
    }
}
