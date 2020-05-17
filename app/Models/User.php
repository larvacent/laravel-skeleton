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
use Illuminate\Support\Facades\Hash;

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
class User extends Authenticatable implements MustVerifyEmail
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
     * 获取手机号
     * @param \Illuminate\Notifications\Notification|null $notification
     * @return int|null
     */
    public function routeNotificationForMobile($notification)
    {
        return $this->mobile;
    }

    /**
     * 用户是否在线
     * @return bool
     */
    public function isOnline()
    {
        return Cache::has('user-online-' . $this->id);
    }

    /**
     * 发送邮箱验证通知
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        if (!is_null($this->email)) {
            $this->notify(new \Illuminate\Auth\Notifications\VerifyEmail);
        }
    }

    /**
     * Determine if the user has verified their mobile number.
     *
     * @return bool
     */
    public function hasVerifiedMobile()
    {
        return !is_null($this->mobile_verified_at);
    }

    /**
     * Mark the given user's mobile as verified.
     *
     * @return bool
     */
    public function markMobileAsVerified()
    {
        $status = $this->forceFill([
            'mobile_verified_at' => $this->freshTimestamp(),
        ])->save();
        event(new \App\Events\User\MobileVerified($this));
        return $status;
    }

    /**
     * 重置用户密码
     *
     * @param string $password
     * @return void
     */
    public function resetPassword($password)
    {
        $this->password = Hash::make($password);
        $this->setRememberToken(\Illuminate\Support\Str::random(60));
        $this->save();
        event(new \Illuminate\Auth\Events\PasswordReset($this));
    }

    /**
     * 重置用户手机号
     * @param int $mobile
     * @return bool
     */
    public function resetMobile($mobile)
    {
        $status = $this->forceFill([
            'mobile' => $mobile,
            'mobile_verified_at' => $this->freshTimestamp(),
        ])->save();
        event(new \App\Events\User\MobileReset($this));
        return $status;
    }

    /**
     * 重置用户邮箱
     * @param string $email
     * @return bool
     */
    public function resetEmail($email)
    {
        $status = $this->forceFill([
            'email' => $email,
            'email_verified_at' => $this->freshTimestamp(),
        ])->save();
        event(new \App\Events\User\MailReset($this));
        return $status;
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
