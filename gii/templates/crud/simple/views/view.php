<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = <?= $generator->generateString('Visualizar {modelClass}', ['modelClass' => Inflector::camel2words(StringHelper::basename($generator->modelClass))]) ?>;
//$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-view card">
    <div class="card-header">
		<div class="m-b-10">
			<?= "<?= " ?>Html::a(Yii::t('yii', 'Update'), ['update', <?= $urlParams ?>], ['class' => 'btn btn-primary btn-sm hec-save waves-effect waves-button waves-float waves-effect waves-button waves-float']) ?>
	        <?= "<?= " ?>Html::a(Yii::t('yii', 'Delete'), ['delete', <?= $urlParams ?>], [
	            'class' => 'btn btn-danger btn-flat',
	            'data' => [
	            	'class' => 'btn btn-danger btn-sm hec-save waves-effect waves-button waves-float waves-effect waves-button waves-float',
	                'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
	                'method' => 'post',
	            ],
	        ]) ?>
		</div>
		<h2><small>Utilize os botões acima caso queira alterar ou excluir o registro atual.</small></h2>
	</div>
    <div class="card-body">
        <?= "<?= " ?>DetailView::widget([
            'model' => $model,
            'attributes' => [
<?php
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
        echo "                '" . $name . "',\n";
    }
} else {
    foreach ($generator->getTableSchema()->columns as $column) {
        $format = stripos($column->name, 'created_at') !== false || stripos($column->name, 'updated_at') !== false ? 'datetime' : $generator->generateColumnFormat($column);
        echo "                '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
    }
}
?>
            ],
        ]) ?>
    </div>
</div>
