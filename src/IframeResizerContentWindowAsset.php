<?php

namespace mikk150\iframeresizer;

use yii\web\AssetBundle;

/**
 * Class IframeResizerContentWindowAsset
 * @package mikk150\iframeresizer
 */
class IframeResizerContentWindowAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@bower/iframe-resizer/js';

    /**
     * @inheritdoc
     */
    public $js = [
        'iframeResizer.contentWindow.min.js'
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        IframeResizerAsset::class
    ];
}
