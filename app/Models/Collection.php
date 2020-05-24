<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace App\Models;

use App\Models\Traits\UserTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * 用户收藏
 * @property int $id
 * @property int $user_id
 * @property User $user
 * @property Model $source
 * @property int $source_id
 * @property string $source_type
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 *
 * @author Tongle Xu <xutongle@gmail.com>
 */
class Collection extends Model
{
    use UserTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'collections';

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * 可以批量赋值的属性
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'source_id', 'source_type'
    ];

    /**
     * 应该被调整为日期的属性
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * 拥有此收藏的模型
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function source()
    {
        return $this->morphTo();
    }
}
