<?php
/**
 * This is NOT a freeware,
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @license http://www.larva.com.cn/license/
 * @link http://www.larva.com.cn/
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 栏目模型
 * @property int $id 栏目ID
 * @property int $parent_id 父栏目ID
 * @property string $title 栏目名称
 * @property int $order 栏目排序
 * @property string $style 栏目样式
 * @property string $image 栏目图片
 * @property string description 栏目描述
 * @property \Illuminate\Support\Carbon $created_at 创建时间
 * @property \Illuminate\Support\Carbon $updated_at 更新时间
 *
 * @property Category $parent 父栏目
 * @property Category[] $children 子栏目
 *
 * @author Tongle Xu <xutongle@gmail.com>
 */
class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * 允许批量赋值的属性
     * @var array
     */
    public $fillable = [
        'id', 'parent_id', 'title', 'order', 'style', 'image', 'description'
    ];

    /**
     * Get the parent relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(static::class, 'parent_id');
    }

    /**
     * Get children of current node.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(static::class, 'parent_id');
    }

    /**
     * 获取子栏目
     * @return array
     */
    public function getChildren()
    {
        return $this->children()->pluck('id')->all();
    }
}
