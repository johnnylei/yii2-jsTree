<?php
/**
 * Created by PhpStorm.
 * User: johnny
 * Date: 17-6-16
 * Time: 上午12:27
 */

namespace johnnylei\jstree\jsTree;


use yii\widgets\InputWidget;
use yii\base\Exception;
use yii\helpers\Json;
use yii\helpers\Html;

class ActiveFormJsTree extends InputWidget
{
    public $containerId = 'js-tree';
    public $options = [];
    public $inputOptions = [
        'class' => 'form-control',
        'style'=>[
            'display'=>'none',
        ],
    ];
    public $js;

    public function run()
    {
        if (!$this->hasModel()) {
            throw new Exception('invalid model');
        }

        if (empty($this->options)) {
            throw new Exception('invalid options');
        }

        JsTreeAsset::register($this->view);
        $inputId = $this->inputOptions['id'] = isset($this->inputOptions['id'])?$this->inputOptions['id']:'js-tree-selected';
        $initial_js = '
        var tree = $("#'.$this->containerId.'").jstree('.Json::encode($this->options).');
        var core = tree.data("jstree")
        core.element.on("select_node.jstree", function (e, data) {
            var input = $("#'.$inputId.'").val(data.node.data);
        });';
        $this->view->registerJs($initial_js . $this->js);
        $this->inputOptions['hidden'] = true;
        $input = Html::activeTextInput($this->model, $this->attribute, $this->inputOptions);
        return $input.'<div id="'.$this->containerId.'"></div>';
    }
}