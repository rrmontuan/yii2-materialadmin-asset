<?php
namespace rrmontuan\web;

use yii\web\AssetBundle as BaseMaterialAdminLteAsset;

/**
 * Material Admin AssetBundle
 * @since 0.1
 */
class YiiChangesAsset extends BaseMaterialAdminLteAsset
{
	public $sourcePath = '@vendor/rrmontuan/yii2-materialadmin-asset/assets';

	public $css = [
	];

	public $js = [
		'js/yiiChanges.js',
	];

	public $depends = [
	];

}
