<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = <?= $generator->generateString('Cadastrar ' . Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>;
//$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-create card">

	<div class="card-header">
		<h2>
			Novo Registro<small>Preencha o formulário e clique no botão salvar para concluir o cadastro.</small>
		</h2>
	</div>
	
    <?= "<?= " ?>$this->render('_form', [
    	'model' => $model,
    ]) ?>

</div>
