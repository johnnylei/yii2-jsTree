<?php
/**
 * Created by PhpStorm.
 * User: johnny
 * Date: 17-6-16
 * Time: 上午1:04
 */

namespace johnnylei\jstree;


use yii\base\Widget;
use yii\base\Exception;
use yii\helpers\Json;
use yii\helpers\Html;

class FormJsTree extends Widget
{
    public $containerId = 'js-tree';
    public $options = [];
    public $inputOptions = [
        'class' => 'form-control',
        'style'=>[
            'display'=>'none',
        ],
        'name'=>'js_tree_selected',
        
    ];
    public $js;

    public function run()
    {
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
        
        $name = isset($this->inputOptions['name'])?$this->inputOptions['name']:null;
        $value = isset($this->inputOptions['value'])?$this->inputOptions['value']:null;
        $input = Html::input('input', $name, $value, $this->inputOptions);
        return $input.'<div id="'.$this->containerId.'"></div>';
    }
}