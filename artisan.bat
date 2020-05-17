@echo off

rem -------------------------------------------------------------
rem  Laravel command line bootstrap script for Windows.
rem
rem  @copyright Copyright (c) 2018 Jinan Larva Information Technology Co., Ltd.
rem  @link http://www.larva.com.cn/
rem -------------------------------------------------------------

@setlocal

set LARAVEL_PATH=%~dp0

if "%PHP_COMMAND%" == "" set PHP_COMMAND=php.exe

"%PHP_COMMAND%" "%LARAVEL_PATH%artisan" %*

@endlocal
