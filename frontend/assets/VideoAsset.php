<?php
	/**
	*
	*
	*/
namespace frontend\assets;
use Yii;
use yii\web\AssetBundle;

class VideoAsset extends AssetBundle
{
	public $basePath = '@webroot';
	public $baseUrl = '@web';
	
	public $css = ['css/video-js.min.css'];
	
	public $js  =['js/video.js'];
	
	public $depends = [
		 'yii\web\YiiAsset'
	];
}