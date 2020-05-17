<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * 请求基类
 * @method \App\Models\User|null user()
 *
 * @author Tongle Xu <xutongle@gmail.com>
 */
abstract class Request extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        // Using policy for Authorization
        return true;
    }
}
