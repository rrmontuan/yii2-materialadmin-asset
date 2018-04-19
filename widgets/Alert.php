<?php
/**
 * @link http://www.yiiframework.com/
* @copyright Copyright (c) 2008 Yii Software LLC
* @license http://www.yiiframework.com/license/
*/

namespace rrmontuan\widgets;

use yii\bootstrap\Widget;
use rrmontuan\web\GrowlAsset;
use yii\helpers\Json;
use rrmontuan\helpers\AlertOptions;
use yii\base\Exception;

/**
 * Alert widget renders a message from session flash for MaterialAdmin alerts. All flash messages are displayed
 * in the sequence they were assigned using setFlash. You can set message as following:
 *
 * ```php
 * \Yii::$app->getSession()->setFlash('error', $alertOptions);
 * ```
 *
 * Multiple messages could be set as follows:
 *
 * ```php
 * \Yii::$app->getSession()->setFlash('error', [$alertOptions1, $alertOptions2]);
 * ```
 * 
 * Where $alertOptions, $alertOptions1 and $alertOptions2 are "AlertOptions" objects 
 *
 * @author Ricardo Montuan <ricardo.montuan@hotmail.com>
 */
class Alert extends Widget
{
	private $messages = [];
	public $clientOptions = [
		'type' => 'inverse',
		'allow_dismiss' => false,
		'label' => 'Cancel',
		'className' => 'btn-xs btn-inverse',
		'placement' => [
			'from' => 'top',
			'align' => 'right'
		],
		'delay' => 2500,
		'animate' => [
			'enter' => 'animated bounceIn',
			'exit' => 'animated bounceOut'
		],
		'offset' => [
			'x' => 20,
			'y' => 85
		]
	];
		
	/**
	 * Initializes the widget.
	 * This method will check for all flash messages 
	 */
	public function init()
	{
		parent::init();
		
		$session = \Yii::$app->getSession();
		$flashes = $session->getAllFlashes();

		foreach ($flashes as $type => $data) {
			$dataArray = (is_array($data)) ? $data : [$data];
			foreach ($dataArray as $item) {
					
				if($item instanceof AlertOptions)
					$options = $item->getArray();
				else
					$options = ['message' => $item];
				
				array_push($this->messages, [
					'options' => $options,
					'type' => $type
				]);
			}
		}
	}
	
	public function run(){
		
		$js = '';
		$view = $this->getView();
		
		foreach($this->messages as $data){
			$options = $data['options'];
			$clientOptions = $this->clientOptions;
			$clientOptions['type'] = $data['type'];
			
			$optionsJSON = Json::encode($options);
			$clientOptionsJSON = Json::encode($clientOptions);
			
			$js .= "$.growl({$optionsJSON}, {$clientOptionsJSON});";
			
		}
		
		GrowlAsset::register($view);
		$view->registerJs($js);
	}
}
