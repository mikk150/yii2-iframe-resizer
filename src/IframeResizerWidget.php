<?php

namespace mikk150\iframeresizer;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;

class IframeResizerWidget extends Widget
{
    /**
     * @var array IframeResizer options
     *
     * @see https://github.com/davidjbradshaw/iframe-resizer/blob/master/docs/parent_page/options.md
     **/
    public $resizerOptions;

    /**
     * @var array iframe element options
     */
    public $options = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if (!$this->resizerOptions) {
            $this->resizerOptions = [];
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $id = $this->getId();
        $iframeResizerOptions = Json::htmlEncode($this->resizerOptions);

        IframeResizerAsset::register($this->view);

        $this->view->registerJs('iFrameResize(' . $iframeResizerOptions . ', "#' . $id . '");');

        return Html::tag('iframe', '', ArrayHelper::merge($this->options, ['id' => $id]));
    }
}
