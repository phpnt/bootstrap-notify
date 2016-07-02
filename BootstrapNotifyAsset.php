<?php
/**
 * Created by PhpStorm.
 * User: phpNT - http://phpnt.com
 * Date: 02.07.2016
 * Time: 20:31
 */

namespace phpnt\bootstrapNotify;

use yii\web\AssetBundle;

class BootstrapNotifyAsset extends AssetBundle
{
    /**
     * @inherit
     */
    public $sourcePath = '@bower/bootstrap.growl';

    /**
     * @inherit
     */
    public $js = [
        'dist/bootstrap-notify.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}