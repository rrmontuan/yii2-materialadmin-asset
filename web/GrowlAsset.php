<?php
namespace rrmontuan\web;

use yii\web\AssetBundle as BaseAdminLteAsset;

/**
 * Material Admin AssetBundle
 * @since 0.1
 */
class GrowlAsset extends BaseAdminLteAsset
{
	public $css = [
	];

	public $js = [
		'vendors/bootstrap-growl/bootstrap-growl.min.js',
	];

	public $depends = [
	];
	
	/**
	 * @inheritdoc
	 */
	public function init()
	{
		//The GrowlAsset will utilize the same sourcePath that MaterialAdminAsset
		$bundle = \Yii::$app->assetManager->getBundle('rrmontuan\web\MaterialAdminAsset');
		$this->sourcePath = $bundle->sourcePath;
	
		parent::init();
	}

}
