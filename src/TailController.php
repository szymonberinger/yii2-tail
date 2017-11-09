<?php

namespace szymonberinger\tail;

use yii\console\Controller;

class TailController extends Controller
{
    public function actionIndex()
    {
        $this->stdout('Hello');
    }
}