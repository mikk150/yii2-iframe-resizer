yii2-iframe-resizer
====================

This extension generates auto resizing iframes

[![Build Status](https://travis-ci.org/mikk150/yii2-iframe-resizer.svg?branch=master)](https://travis-ci.org/mikk150/yii2-iframe-resizer)
[![codecov](https://codecov.io/gh/mikk150/yii2-iframe-resizer/branch/master/graph/badge.svg)](https://codecov.io/gh/mikk150/yii2-iframe-resizer)

## Usage
```php
// in your view

echo mikk150\iframeresizer\IframeResizerWidget::widget([
    'resizerOptions' => [
        'checkOrigin' => false,
        'initCallback' => new yii\web\JsExpression('function (e) {console.log(e)}')
    ],
    'options' => [
        'src' => 'http://example.org'
    ],
])
```

Be sure that your iframe content has `mikk150\iframeresizer\IframeResizerContentWindowAsset` registered