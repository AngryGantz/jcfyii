<?php

/*
 * Хелпер для вызова CKEditor
 * Редактор лежит в корне.
 * $attribute - поле модели, для которого вызывается редактор
 *
 */
class JCKeditor extends CHtml
{
    public static function activeCKEditor($model,$attribute,$params=array('width'=>'100%'),$htmlOptions=array())
    {
        self::resolveNameID($model,$attribute,$htmlOptions);
        self::clientChange('change',$htmlOptions);
        if($model->hasErrors($attribute))
            self::addErrorCss($htmlOptions);
        $text=self::resolveValue($model,$attribute);
        include_once "ckeditor/ckeditor.php";
        $CKEditor = new CKEditor();
        $CKEditor->basePath = '/ckeditor/';
        foreach ($params as $i => $value) {
            $CKEditor->config[$i] = $value;  
        }
        $CKEditor->editor($htmlOptions['name'], $text);
    }
}
?>
