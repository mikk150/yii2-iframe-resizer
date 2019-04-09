<?php

namespace mikk150\iframeresizer;

use yii\web\AssetBundle;

/**
 * Class IframeResizerAsset
 * @package mikk150\iframeresizer
 */
class IframeResizerAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@bower/iframe-resizer/js';

    /**
     * @inheritdoc
     */
    public $js = [
        'iframeResizer.min.js'
    ];
}
