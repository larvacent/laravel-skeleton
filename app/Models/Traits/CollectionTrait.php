<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace App\Models\Traits;

use App\Models\Collection;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Trait CollectionTrait
 *
 * @mixin \Illuminate\Database\Eloquent\Model
 * @author Tongle Xu <xutongle@gmail.com>
 */
trait CollectionTrait
{
    /**
     * 获取收藏
     * @return \Illuminate\Database\Eloquent\Relations\morphMany
     */
    public function collections()
    {
        return $this->morphMany(Collection::class,'source');
    }

    /**
     * 查询指定用户是否收藏了指定的模型
     * @param int $id
     * @return bool
     */
    public function isCollected($id)
    {
        return $this->collections()->where('source_type', '=', static::class)->where('source_id', '=', $id)->exists();
    }

    /**
     * 收藏
     * @param User $user
     * @return Model|\Illuminate\Database\Eloquent\Relations\MorphMany|object
     * @throws \Exception
     */
    public function collect($user)
    {
        if (($collection = $this->collections()->where('user_id', $user->id)->first()) == null) {
            $collection = $this->collections()->create(['user_id' => $user->id]);
        } else {
            $collection->delete();
        }
        return $collection;
    }
}
