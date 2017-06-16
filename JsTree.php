<?php
/**
 * Created by PhpStorm.
 * User: johnny
 * Date: 17-6-16
 * Time: 上午12:04
 */

namespace johnnylei\jstree;


use yii\base\Exception;
use yii\base\Widget;
use yii\helpers\Json;

class JsTree extends Widget
{
    public $containerId = 'js-tree';
    public $options;
    public $enableInitialJs = true;
    public $js;

    public function run() {
        if (empty($this->options)) {
            throw new Exception('options is required');
        }

        JsTreeAsset::register($this->view);
        $initial_js = $this->enableInitialJs?
            '$("#'.$this->containerId.'").jstree('.Json::encode($this->options).');':'';
        $this->view->registerJs($initial_js . $this->js);
        return '<div id="'.$this->containerId.'"></div>';
    }
}