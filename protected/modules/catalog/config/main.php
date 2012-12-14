<?php

$baseImg='images/catalog';

$catalogConfigDir = dirname(__FILE__);
$rootCatalog = $catalogConfigDir .'/'. '..';
$projectRootDir =$_SERVER['DOCUMENT_ROOT'].Yii::app()->urlManager->baseUrl;

Yii::setPathOfAlias('mcatalog', $rootCatalog);
Yii::setPathOfAlias('mext', $rootCatalog .'/extensions');
Yii::setPathOfAlias('photodir', $projectRootDir .$baseImg);
Yii::setPathOfAlias('photourl', Yii::app()->request->getBaseUrl() .$baseImg);
Yii::setPathOfAlias('thumbdir', $projectRootDir .'assets/'.$baseImg);
Yii::setPathOfAlias('thumburl', Yii::app()->request->getBaseUrl() .'assets/'. $baseImg);


// Yii::setPathOfAlias('catalog', 'application.modules.catalog');
return array(
   'import' => array(
       'mcatalog.helpers.*',
       'mext.nestedset.*',
       'mext.EWideImage.EWideImage',
       'mext.select2.ESelect2',
       'mext.swfupload.*',
       'mext.EAjaxUpload.*',
   )    
);
?>
