<?php
/**
 * 自动加载类
 * @author: bean
 * @time: 2017-3-11 16:51:27
 * @version 1.0
 */
namespace newx\console\base;

class AutoLoader
{
    /**
     * 自动加载文件
     * @param string $class className
     */
    public static function autoload($class)
    {
        // 检查类文件是否存在
        $classFile = PROJECT_PATH . '/' . $class . '.php';
        $classFile = str_replace('\\', '/', $classFile); // 兼容linux

        if (!file_exists($classFile)) {
            exit('load file not exists: ' . $classFile);
        }

        // 加载类文件
        require_once $classFile;
    }
}
spl_autoload_register("\\newx\\console\\base\\AutoLoader::autoload");