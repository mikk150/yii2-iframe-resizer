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
    public $sourcePath = '@npm/iframe-resizer/js';

    /**
     * @inheritdoc
     */
    public $js = [
        'iframeResizer.contentWindow.js'
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        IframeResizerAsset::class
    ];
}
