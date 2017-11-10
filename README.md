yii2-tail
=========

[![Latest Stable Version](https://poser.pugx.org/szymonberinger/yii2-tail/v/stable)](https://packagist.org/packages/szymonberinger/yii2-tail)
[![License](https://poser.pugx.org/szymonberinger/yii2-tail/license)](https://packagist.org/packages/szymonberinger/yii2-tail)
[![Total Downloads](https://poser.pugx.org/szymonberinger/yii2-tail/downloads)](https://packagist.org/packages/szymonberinger/yii2-tail)
[![StyleCI](https://styleci.io/repos/110142913/shield?branch=master)](https://styleci.io/repos/110142913)

Extension provides console command to tail the application log.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run:
```
$ php composer.phar require szymonberinger/yii2-tail "*"
```

or add:
```
"szymonberinger/yii2-tail": "*"
```

to the ```require``` section of your `composer.json` file.

Add the following in your console config:
```php
return [
    ...
    'controllerMap' => [
        ...
        'tail' => [
            'class' => 'szymonberinger\tail\TailController',
        ],
        ...
    ],
    ...
];
```

## Usage

Just run command:
```bash
$ php yii tail
```

By default the last 50 lines will be shown. You can change that number by just adding a parameter.
```bash
$ php yii tail 200
```
