## yii extension js tree
> install
```
composer require --prefer-dist johnnylei/jstree
```
jstree相关配置参照官方文档[https://www.jstree.com/](https://www.jstree.com/)
> 直接使用
```
<?= \common\widgets\jsTree\JsTree::widget([
    'options'=>[
        'core' => [
            'data' => [
                "text" => "Root node",
                "children" => [
                    [
                        "text" => "Child node 1",
                        "data"=>"name1",
                    ],
                    [
                        "text" => "Child node 2",
                        'data'=>'name2'
                    ],
                    [
                        "text" => "Child node 3",
                        'data'=>'name3',
                    ],
                ]
            ]
        ]
    ],
])?>
```
> 使用在active form里面
```
<?= $form->field($model, 'content')->widget(ActiveFormJsTree::className(), [
    'options'=>[
        'core' => [
            'data' => [
                "text" => "Root node",
                "children" => [
                    [
                        "text" => "Child node 1",
                        "data"=>"name1",
                    ],
                    [
                        "text" => "Child node 2",
                        'data'=>'name2'
                    ],
                    [
                        "text" => "Child node 3",
                        'data'=>'name3',
                    ],
                ]
            ]
        ]
    ],
])?>
```

> 在form表单里面使用
```
<?= FormJsTree::widget([
    'inputOptions'=>[
        'class' => 'form-control',
        'style'=>[
            'display'=>'none',
        ],
        'name'=>'MoveForm[parent]',
        'value'=>$parent,
    ],
    'options'=>[
        'core' => [
            'data' => [
                "text" => "Root node",
                "children" => [
                    [
                        "text" => "Child node 1",
                        "data"=>"name1",
                    ],
                    [
                        "text" => "Child node 2",
                        'data'=>'name2'
                    ],
                    [
                        "text" => "Child node 3",
                        'data'=>'name3',
                    ],
                ]
            ],
        ]
    ],
]);?>
```