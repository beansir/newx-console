<?php
/**
 * @author: bean
 * @version: 2.0
 */
namespace newx\console\base;

require __DIR__ . '/AutoLoader.php';

use newx\helpers\ArrayHelper;
use newx\orm\NewxOrm;

class Console
{
    /**
     * 配置信息
     * @var array
     */
    protected $config = [];

    /**
     * 参数信息
     * @var array
     */
    protected $argv = [];

    /**
     * 当前命令
     * @var string
     */
    protected $option;

    /**
     * 当前参数
     * @var array
     */
    protected $params = [];

    /**
     * Application constructor.
     * @param array $config
     * @param array $argv
     */
    public function __construct($config, $argv)
    {
        $this->config = $config;
        $this->argv = $argv;

        // 获取命令选项
        $this->option = ArrayHelper::value($this->argv, 1);

        // 获取参数
        $argvCount = count($this->argv);
        if ($argvCount > 2) {
            for ($i = 2; $i < $argvCount; $i++) {
                $this->params[] = $this->argv[$i];
            }
        }

        // 加载ORM
        $this->loadOrm();
    }

    /**
     * 加载ORM
     */
    protected function loadOrm()
    {
        $db = ArrayHelper::value($this->config, 'database');
        NewxOrm::load($db);
    }

}