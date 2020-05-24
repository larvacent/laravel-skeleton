<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Model;

/**
 * Trait BelongsToUserTrait
 * @property Model $this
 *
 * @package App\Models\Relations
 */
trait UserTrait
{
    /**
     * Get the user relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(
            config('auth.providers.' . config('auth.guards.web.provider') . '.model')
        );
    }
}
