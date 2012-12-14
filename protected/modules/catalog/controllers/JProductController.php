<?php

class JProductController extends Controller {

    public $_model;

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '/layouts/column1';

    /**
     * @return array action filters
     */
    public function filters() {
        if (Yii::app()->hasModule('rights')) $f = 'rights'; else $f='accessControl';
        return array($f);
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('upload', 'updatePhoto'),
                'users' => array('*'),
            ),
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actions() {
        return array(
            // Загрузка фото для товара. используется расширение swfupload. С полями БД модели функция ничего не делает.
            'upload' => array(
                'class' => 'mext.swfupload.SWFUploadAction',
                'filepath' => Yii::getPathOfAlias('photourl') . '/fr1.EXT', // 'EXT' will be replaced by file extension
                'onAfterUpload' => array($this, 'saveFoto'),
            )
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $model = $this->loadModel($id);
        // массив URL дополнительных фото продукта
        // $addPhotosURL=$model->getUrlAddPhoto();
        $addPhotosURL = $model->getUrlTumbsAddPhoto(415, 415);
        // массив URL тумбнэйлов дополнительных фото продукта
        $tumbsUrl = $model->getUrlTumbsAddPhoto(80, 80);
        // Массив URL основных фото
        $corePhotosURL = $model->getUrlCorePhoto();
        $this->render('view', array(
            'model' => $model,
            'addPhotosURL' => $addPhotosURL,
            'tumbsUrl' => $tumbsUrl,
            'corePhotosURL' => $corePhotosURL,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new JProduct;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['JProduct'])) {
            $model->attributes = $_POST['JProduct'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->product_id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['JProduct'])) {
            $oldCat = '';
            if (isset($_POST['oldMainCat']))
                $oldCat = $_POST['oldMainCat'];
            $model->attributes = $_POST['JProduct'];
            if ($model->save()) {
                if ($oldCat != $model->product_maincategory) {
                    if (isset($oldCat))
                        $model->changeMainCat($oldCat);
                }
                $this->redirect(array('view', 'id' => $model->product_id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('JProduct');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new JProduct('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['JProduct']))
            $model->attributes = $_GET['JProduct'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = JProduct::model()->findByPk($id);
        $this->_model = $model;
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'jproduct-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * Добавление новой фотографии в директорию фото главной категории продукта
     * Эта функция не меняет поля БД модели товара. Она лишь записывает файл с новой фотографией в директорию с фото,
     * указанную в главной категории продукта. Но если идёт добавление дополнительного фото,
     * в таблице с фото добавляется соответствующая запись.  
     * $oldPhotoName - фото, которое заменяется новым. Его можно в принципе удалить. Но. Если поле этого
     * при редактировании карточки товара не будет подтверждено сохранение изменений, то товар останется 
     * без фото. Поэтому принял решение, что чистку папок от старых неприлинкованных фото буду делать отдельно
     * запуском специальных процедур, проверяющих наличие в папках "непривязанных" картинок.
     * @param type $event
     */
    public function saveFoto($event) {
        $tmpFile = $event->sender['path'] . '/' . $event->sender['name'];
        $newPhotoName = $event->sender['uploadedFile']->name;
        if (isset($_POST['namePhoto']))
            $oldPhotoName = $_POST['namePhoto']; else
            $oldPhotoName = '';
        $id = $_POST['idmodel'];
        $model = JProduct::model()->findByPk($id);
        $model->changePhoto($tmpFile, $newPhotoName, $oldPhotoName);
        if ($oldPhotoName == 'NOT_MAIN_PHOTO') {
            $photo = new JPhoto;
            $photo->photo_name = $newPhotoName;
            $photo->photo_idproduct = $id;
            $photo->save();
        }
        //$event->sender['uploadedFile'] is CUploadedFile
        //$event->sender['uploadedFile']->name; the original name of the file being uploaded
        // $event->sender['name']  yourfilename.EXT
    }

    /**
     *  Рендеринг фотографий товара в админке после добавления или удаления. 
     *  Управление передается из контроллера JPhotoController.
     *  $_GET['product_id'] идет из представления редактирования продукта 
     *  вместе с запросами к JPhotoController. 
     *  Нормально работает только при "$processOutput true" - 4й параметр в renderPartial.
     *  Но при этом каждый запрос подтягиваются заново скрипты JS. Для предотвращения этого,
     *  подтягивающиеся скрипты вырубаем здесь.  (scriptMap false) 
     *  Приходится заново искать модель, как это обойти пока не понял.
     *  @return ajax ответ. 
     */
    public function actionUpdatePhoto() {
        $id = '';
        if (isset($_GET['product_id']))
            $id = $_GET['product_id'];
        if (isset($_POST['product_id']))
            $id = $_POST['product_id'];
        if ($id) {

            $data['model'] = $this->loadModel($id);
            Yii::app()->clientscript->scriptMap['bootstrap.js'] = false;
            Yii::app()->clientscript->scriptMap['jquery.min.js'] = false;
            Yii::app()->clientscript->scriptMap['jquery.js'] = false;
            //       Yii::app()->clientscript->scriptMap['jquery.prettyPhoto.js'] = false;
            $this->renderPartial('_frameAddPhoto', $data, false, true);
        }
        else
            throw new CHttpException(400, 'Неверный запрос на показ фото продукта без указания продукта.');
    }

}
