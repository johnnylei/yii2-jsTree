<?php
namespace johnnylei\jstree;
use yii\web\AssetBundle;

/**
 * Created by PhpStorm.
 * User: johnny
 * Date: 17-6-16
 * Time: 上午12:02
 */
class JsTreeAsset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/assets';
    public $js = [
        'jstree.min.js',
    ];
    public $css = [
        '/css/style.min.css'
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}