<?php
namespace AzulSample\MyLog;

use Monolog\Monolog;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class MyLog 
{
    private $log = null;
    public const WARNING = 1;
    public const ERROR   = 2;

    public function __construct($file) 
    {
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler($file, Level::Warning));
    }

    public function put($value, $type): void
    {
        if ($type == self::WARNING) {
            $log->warning($value);
        }

        if ($type == self::ERROR) {
            $log->error($value);
        }
    }
}