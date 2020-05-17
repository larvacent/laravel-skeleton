<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

/**
 * 用户模型
 * @property int $id ID
 * @property string $username 昵称
 * @property string $email 邮箱
 * @property string $mobile 手机号
 * @property string $password 密码
 * @property string $remember_token
 * @property Carbon|null $mobile_verified_at 手机验证时间
 * @property Carbon|null $email_verified_at 邮箱验证时间
 * @property Carbon $created_at 注册时间
 * @property Carbon $updated_at 更新时间
 * @property Carbon|null $deleted_at 删除时间
 *
 * @author Tongle Xu <xutongle@gmail.com>
 */
class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

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
        'username', 'mobile', 'email', 'password',
    ];

    /**
     * 隐藏输出的属性
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 属性类型转换
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'mobile_verified_at' => 'datetime',
    ];

    /**
     * 应该被调整为日期的属性
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * 用户是否在线
     * @return bool
     */
    public function isOnline()
    {
        return Cache::has('user-online-' . $this->id);
    }

    /**
     * 随机生成一个用户名
     * @param string $username 用户名
     * @return string
     */
    public static function generateUsername($username)
    {
        if (static::query()->where('username', '=', $username)->exists()) {
            $row = static::query()->max('id');
            $username = $username . ++$row;
        }
        return $username;
    }
}
