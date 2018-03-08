<?php
/**
 * @author bean
 * @version 2.0
 */
namespace newx\console\base;

use newx\helpers\ArrayHelper;
use newx\helpers\IniHelper;
use newx\helpers\StringHelper;

class Command extends Console
{
    /**
     * 初始化
     * @throws \Exception
     * @return $this
     */
    protected function init()
    {
        // 获取配置
        $config = ArrayHelper::value($this->config, 'app');
        if (empty($config)) {
            throw new \Exception("app config not exists");
        }

        // 设置时区
        $timezone = ArrayHelper::value($config, 'timezone', 'Etc/GMT');
        IniHelper::setTimezone($timezone);

        // 自定义全局函数库
        $file = APP_CONSOLE_PATH . '/config/function.php';
        if (file_exists($file)) {
            require_once $file;
        }

        return $this;
    }

    /**
     * 运行应用主体
     */
    public function run()
    {
        try {
            if (!$this->option) {
                throw new \Exception('console option not exists');
            }

            $options = explode('/', $this->option);
            if (count($options) == 1) {
                throw new \Exception('console action not exists');
            }

            // 初始化
            $this->init();

            // 获取执行函数
            $action = $options[count($options) - 1];
            $action = lcfirst(StringHelper::lower2upper($action, '-'));
            unset($options[count($options) - 1]);

            // 获取控制器
            $controller = $options[count($options) - 1];
            $controller = StringHelper::lower2upper($controller, '-');
            unset($options[count($options) - 1]);
            if ($options) {
                $controller = implode('\\', $options) . '\\' . $controller;
            }
            $controller = '\\console\\' . $controller;

            // 创建实例
            $app = new $controller();
            if (!method_exists($app, $action)) {
                throw new \Exception('console action not exists: ' . $action);
            }

            call_user_func_array([$app, $action], $this->params);
        } catch (\Exception $e) {
            echo $e->getMessage() . "\n";
            exit;
        }
    }
}