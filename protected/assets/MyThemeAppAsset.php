<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MyThemeAppAsset extends AssetBundle
{ 
    public $sourcePath = '@app/themes/mytheme'; // задаёт корневую директорию содержащую файлы ресурса в этом комплекте

    public $css = [
        'vendor/bootstrap/css/bootstrap.min.css',
        'vendor/fontawesome-free/css/all.min.css',
        'vendor/magnific-popup/magnific-popup.css',   
        'css/freelancer.min.css',
    ];
    public $js = [
    //'vendor/jquery/jquery.min.js',
    'vendor/bootstrap/js/bootstrap.bundle.min.js',
    'vendor/jquery-easing/jquery.easing.min.js',
    'vendor/magnific-popup/jquery.magnific-popup.min.js',
    'js/jqBootstrapValidation.js',
    //'js/contact_me.js',
    'js/freelancer.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
