<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form card-body card-padding">
	
	<?= "<?php \n" ?>
		$form = ActiveForm::begin([
			'id' => 'contact-form',
			'fieldConfig' => [
	        	'template' => '<div class="form-group"><div class="fg-line">{label}{input}</div>{error}</div>',
	            'options' => [
	            	'tag'=>'span'
	            ]
	    	]
	    ]); 
    ?>
    
    <?= "<?= " ?>$form->errorSummary($model); ?>
    	
    <?php
		foreach ( $generator->getColumnNames () as $attribute ) {
			if (in_array ( $attribute, $safeAttributes )) {
				echo "        <?= " . $generator->generateActiveField ( $attribute ) . " ?>\n\n";
			}
		}
	?>	

	<?= "<?= " ?>Html::submitButton(<?= $generator->generateString('Salvar') ?>, ['class' => 'btn btn-primary btn-sm m-t-10 waves-effect waves-button waves-float']) ?>
	
	<?= "<?php " ?>ActiveForm::end(); ?>
		
</div>
