<?php

use Codeception\Test\Unit;
use mikk150\iframeresizer\IframeResizerAsset;
use mikk150\iframeresizer\IframeResizerWidget;
use yii\web\AssetManager;
use yii\web\JsExpression;
use yii\web\View;

class IframeResizerWidgetTest extends Unit
{
    public function testRun()
    {
        $widget = new IframeResizerWidget([
            'id' => 'testiframe',
            'view' => new View([
                'assetManager' => new AssetManager([
                    'basePath' => codecept_output_dir(),
                    'baseUrl' => codecept_output_dir(),
                ])
            ])
        ]);

        $this->assertEquals('<iframe id="testiframe"></iframe>', $widget->run());
    }

    public function testAssetRegistration()
    {
        $view = new View([
            'assetManager' => new AssetManager([
                'basePath' => codecept_output_dir(),
                'baseUrl' => codecept_output_dir(),
            ])
        ]);

        $widget = new IframeResizerWidget([
            'id' => 'testiframe',
            'view' => $view
        ]);

        $widget->run();

        $this->assertArrayHasKey(IframeResizerAsset::class, $view->assetBundles);
    }

    public function testJavascriptRegistration()
    {
        $view = new View([
            'assetManager' => new AssetManager([
                'basePath' => codecept_output_dir(),
                'baseUrl' => codecept_output_dir(),
            ])
        ]);

        $widget = new IframeResizerWidget([
            'id' => 'testiframe',
            'view' => $view
        ]);

        $widget->run();

        $this->assertArrayHasKey(View::POS_READY, $view->js);
        $this->assertContains('iFrameResize([], "#testiframe");', $view->js[View::POS_READY]);
    }

    public function testJavascriptOptionsRegistration()
    {
        $view = new View([
            'assetManager' => new AssetManager([
                'basePath' => codecept_output_dir(),
                'baseUrl' => codecept_output_dir(),
            ])
        ]);

        $widget = new IframeResizerWidget([
            'id' => 'testiframe',
            'resizerOptions' => [
                'checkOrigin' => false
            ],
            'view' => $view
        ]);

        $widget->run();

        $this->assertArrayHasKey(View::POS_READY, $view->js);
        $this->assertContains('iFrameResize({"checkOrigin":false}, "#testiframe");', $view->js[View::POS_READY]);
    }

    public function testIframeOptionsRegistration()
    {
        $view = new View([
            'assetManager' => new AssetManager([
                'basePath' => codecept_output_dir(),
                'baseUrl' => codecept_output_dir(),
            ])
        ]);

        $widget = new IframeResizerWidget([
            'id' => 'testiframe',
            'options' => [
                'src' => 'http://example.org'
            ],
            'view' => $view
        ]);

        $this->assertEquals('<iframe id="testiframe" src="http://example.org"></iframe>', $widget->run());
    }

    public function testJavascriptCallbackRegistration()
    {
        $view = new View([
            'assetManager' => new AssetManager([
                'basePath' => codecept_output_dir(),
                'baseUrl' => codecept_output_dir(),
            ])
        ]);

        $widget = new IframeResizerWidget([
            'id' => 'testiframe',
            'resizerOptions' => [
                'initCallback' => new JsExpression('function (e) {console.log(e)}')
            ],
            'view' => $view
        ]);

        $widget->run();

        $this->assertArrayHasKey(View::POS_READY, $view->js);
        $this->assertContains('iFrameResize({"initCallback":function (e) {console.log(e)}}, "#testiframe");', $view->js[View::POS_READY]);
    }
}
