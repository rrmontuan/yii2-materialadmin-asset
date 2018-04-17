<?php
namespace rrmontuan\web;

use yii\web\AssetBundle as BaseMaterialAdminLteAsset;

/**
 * Material Admin AssetBundle
 * @since 0.1
 */
class MaterialAdminAsset extends BaseMaterialAdminLteAsset
{
    public $sourcePath = '@app/templates/materialadmin';
		
    public $css = [
    	'vendors/animate-css/animate.min.css',
		'vendors/sweet-alert/sweet-alert.min.css',
		'vendors/material-icons/material-design-iconic-font.min.css',
		'vendors/socicon/socicon.min.css','css/app.min.1.css',
		'css/app.min.2.css'
    ];
		
    public $js = [
    	//"js/jquery-2.1.1.min.js",
    	//"js/bootstrap.min.js",
        'vendors/nicescroll/jquery.nicescroll.min.js',
        'vendors/waves/waves.min.js',
        'vendors/sweet-alert/sweet-alert.min.js','js/charts.js',
        'js/functions.js',
        //'js/demo.js',
    ];
	
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    	'rrmontuan\web\YiiChangesAsset'
    ];

}
