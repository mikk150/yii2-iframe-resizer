<?php

namespace mikk150\iframeresizer;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

/**
 * Class IframeResizerScrollTopContentWindowAsset
 * @package mikk150\iframeresizer
 */
class IframeResizerScrollTopContentWindowAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@mikk150/iframeresizer/assets/';

    /**
     * @inheritdoc
     */
    public $js = [
        'scrolltop.js',
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        IframeResizerContentWindowAsset::class,
        JqueryAsset::class,
    ];
}
