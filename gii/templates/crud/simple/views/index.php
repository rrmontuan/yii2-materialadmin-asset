<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

echo "<?php\n";
?>

use yii\helpers\Html;
use <?= $generator->indexWidgetType === 'grid' ? "yii\\grid\\GridView" : "yii\\widgets\\ListView" ?>;
<?= $generator->enablePjax ? 'use yii\widgets\Pjax;' : '' ?>

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index card">
	<div class="card-header">
		<div class="m-b-10">
			<?= "<?= " ?>Html::a(<?= $generator->generateString('Cadastrar ' . Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>, ['create'], ['class' => 'btn btn-success btn-sm hec-save waves-effect waves-button waves-float']) ?>
		</div>
		<h2><small>Utilize os filtros abaixo caso queira pesquisar por um registro específico.</small></h2>
	</div>
<?= $generator->enablePjax ? "    <?php Pjax::begin(); ?>\n" : ''
?>   
<?php if(!empty($generator->searchModelClass)): ?>
<?= "        <?php " . ($generator->indexWidgetType === 'grid' ? "// " : "") ?>echo $this->render('_search', ['model' => $searchModel]); ?>
<?php endif;

if ($generator->indexWidgetType === 'grid'):
    echo "        <?= " ?>GridView::widget([
            'dataProvider' => $dataProvider,
            <?= !empty($generator->searchModelClass) ? "'filterModel' => \$searchModel,\n            'summaryOptions' => ['class'=>'infos'],\n			'layout' => '\n                {items}\n                <div id=\"data-table-command-footer\" class=\"bootgrid-footer container-fluid\">\n					<div class=\"row\">\n						<div class=\"col-sm-6\">{pager}</div>\n                        <div class=\"col-sm-6 infoBar\">{summary}</div>\n					</div>\n				</div>\n            ',\n            'columns' => [\n" : "'summaryOptions'=>['class'=>'infos'],\n			'layout' => '\n                {items}\n                <div id=\"data-table-command-footer\" class=\"bootgrid-footer container-fluid\">\n					<div class=\"row\">\n						<div class=\"col-sm-6\">{pager}</div>\n                        <div class=\"col-sm-6 infoBar\">{summary}</div>\n					</div>\n				</div>\n            ',\n            'columns' => [\n"; ?>
<?php
$count = 0;
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
        if (++$count < 6) {
            echo "                '" . $name . "',\n";
        } else {
            echo "                // '" . $name . "',\n";
        }
    }
} else {
    foreach ($tableSchema->columns as $column) {
        $format = $generator->generateColumnFormat($column);
        if (++$count < 6) {
            echo "                '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
        } else {
            echo "                // '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
        }
    }
}
?>
                [
            		'class' => 'yii\grid\ActionColumn',
            		'template' => '{view} {update} {delete}',
            		'buttons' => [
            			'view' => function ($url) {
            				return Html::a(
            					'<i class="md md-assignment"></i>',
            					$url,
            					[
            						'title' => Yii::t('yii', 'View'),
            						'data-pjax' => '0',
            						'class'=>'btn btn-primary waves-effect waves-button waves-float'
            					]
            				);
            			},
            			'update' => function ($url) {
            				return Html::a(
            					'<i class="md md-mode-edit"></i>',
            					$url,
            					[
            						'title' => Yii::t('yii', 'Update'),
            						'data-pjax' => '0',
            						'class'=>'btn btn-success waves-effect waves-button waves-float'
            					]
            				);
            			},
            			'delete' => function ($url) {
            				return Html::a(
            					'<i class="md md-delete"></i>',
            					$url,
            					[
            						'title' => Yii::t('yii', 'Delete'),
            						'data-pjax' => '0',
            						'data-method' => 'post',
            						'class'=>'btn btn-danger waves-effect waves-button waves-float',
            						'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?')
            					]
            				);
            			},
            		],
            	],
            ],
        ]); ?>
<?php else: ?>
        <?= "<?= " ?>ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'item'],
            'itemView' => function ($model, $key, $index, $widget) {
                return Html::a(Html::encode($model-><?= $nameAttribute ?>), ['view', <?= $urlParams ?>]);
            },
        ]) ?>
<?php endif; ?>
<?= $generator->enablePjax ? "    <?php Pjax::end(); ?>\n" : '' ?>
</div>
