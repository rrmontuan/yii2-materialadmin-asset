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
		'vendors/socicon/socicon.min.css',
		'css/app.min.1.css',
		'css/app.min.2.css'
    ];
		
    public $js = [
        'vendors/nicescroll/jquery.nicescroll.min.js',
        'vendors/waves/waves.min.js',
        'vendors/sweet-alert/sweet-alert.min.js',
		'js/charts.js',
        'vendors/bootstrap-select/bootstrap-select.min.js',
    	'vendors/moment/moment.min.js',
    	'vendors/sparklines/jquery.sparkline.min.js',
    	'js/functions.js',
    ];
	
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    	'rrmontuan\web\YiiChangesAsset'
    ];

}
