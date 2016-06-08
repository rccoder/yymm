<?php

// 定义应用目录
define('APP_PATH', __DIR__ . '/../app/');
// 定义运行目录
define('RUNTIME_PATH',APP_PATH.'runtime/');
// 开启调试模式
define('APP_DEBUG', true);
// 开启行为
define('APP_HOOK',true);
// 加载框架引导文件
require __DIR__ . '/../system/start.php';
