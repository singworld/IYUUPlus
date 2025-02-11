<?php
require_once dirname(__DIR__) . '/init.php';
require_once ROOT_PATH . '/app/functions.php';
require_once ROOT_PATH . '/src/helper.php';
echo microtime(true).' 当前脚本路径：'.__FILE__.PHP_EOL;

use IYUU\Rss\AbstractRss;
use Workerman\Autoloader;

Autoloader::setRootPath(ROOT_PATH);

global $argv;

echo "RSS订阅脚本，目前支持以下站点：".PHP_EOL;
ShowTableSites('Rss');
if (count($argv) < 2) {
    echo "执行RSS订阅命令时，缺少参数！！".PHP_EOL;
    exit(1);
}
// php脚本文件
$start_file = $argv[0];
// 参数1：任务标志
$uuid  = trim($argv[1]);

// 通用部分
$obj = AbstractRss::getInstance($uuid);
$obj->run();
