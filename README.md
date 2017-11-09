yii2-tail
=========

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
