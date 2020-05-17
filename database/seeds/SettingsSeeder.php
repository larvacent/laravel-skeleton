<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

use Illuminate\Database\Seeder;
use Larva\Settings\Settings;

/**
 * Class SettingsSeeder
 * @author Tongle Xu <xutongle@gmail.com>
 */
class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::set('user.enable_registration', '1');//启用注册
        Settings::set('user.enable_welcome_email', '1');//启用欢迎邮件
        Settings::set('user.enable_password_recovery', '1');//启用找回密码
    }
}
