#!/usr/bin/env php
<?php
defined('VENDOR_PATH') or define('VENDOR_PATH', __DIR__ . '/../../');
defined('VENDOR_CONSOLE_PATH') or define('VENDOR_CONSOLE_PATH', __DIR__);
defined('APP_CONSOLE_PATH') or define('APP_CONSOLE_PATH', __DIR__ . '/../../../console');

require VENDOR_PATH . 'autoload.php';

// 配置文件
$config = require APP_CONSOLE_PATH . '/config/config.php';
$app = new \newx\console\base\Command($config, $argv);
$app->run();