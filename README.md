<h2 align="center">NewX Console</h2>

## 目录结构
* console // 控制台目录
    * config
        * config.php
        * function.php
    * Home.php

#### 配置文件
console/config/config.php
```php
<?php
return [
    'app' => [
        'timezone' => 'Asia/Shanghai', // 时区
    ],
    'database' => [
        'default' => [
            'host'      => '127.0.0.1',
            'user'      => 'user',
            'password'  => 'password',
            'db'        => 'db',
            'type'      => 'mysqli'
        ],
    ],
];
```

#### 运行脚本
```
command home/index param1 param2 ...
```