<?php

namespace szymonberinger\tail;

use DirectoryIterator;
use Yii;
use yii\console\Controller;
use yii\helpers\Console;

class TailController extends Controller
{
    protected $_path;

    public function actionIndex($lines = 50)
    {
        if(!is_dir($this->_path)) {
            $this->stderr('Log directory not found' . PHP_EOL, Console::FG_RED);
            return;
        }

        $log_file = $this->getLastModifiedLogFile();

        if (!file_exists($log_file)) {
            $this->stderr("Could not find a log file in {$this->_path}" . PHP_EOL, Console::FG_RED);
            return;
        }

        $this->stdout("Start tailing {$log_file}" . PHP_EOL . PHP_EOL, Console::FG_GREEN);

        $output = shell_exec("tail -n{$lines} {$log_file}");

        $this->stdout($output . PHP_EOL);
    }

    public function beforeAction($action)
    {
        $this->_path = Yii::$app->basePath . DIRECTORY_SEPARATOR . 'runtime' . DIRECTORY_SEPARATOR . 'logs';

        return parent::beforeAction($action);
    }

    protected function getLastModifiedLogFile()
    {
        $log_file = '';
        $timestamp = 0;

        $files = new DirectoryIterator($this->_path);
        foreach ($files as $file) {
            if (!$file->isDot()) {
                if ($file->getMTime() > $timestamp) {
                    $log_file = $this->_path . DIRECTORY_SEPARATOR . $file->getFilename();
                    $timestamp = $file->getMTime();
                }
            }
        }

        return $log_file;
    }
}