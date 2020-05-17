<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace App\Http\Controllers;

/**
 * Class MainController
 * @author Tongle Xu <xutongle@gmail.com>
 */
class MainController extends Controller
{
    /**
     * Displays homepage.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('main.index');
    }
}
