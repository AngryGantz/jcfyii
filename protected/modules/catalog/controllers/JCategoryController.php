<?php

class JCategoryController extends Controller {

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
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view','upload', 'updatePhoto'),
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
            // Загрузка фото. используется расширение swfupload. С полями БД модели функция ничего не делает.
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
        $products = $model->Products(array('condition' => 'product_show=1'));
        $this->render('view', array(
            'model' => $model,
            'products' => $products,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new JCategory;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['JCategory'])) {
            $model->attributes = $_POST['JCategory'];
            $parent = JCategory::model()->findByPK($model->category_parent);
            $parent->appendChild($model);

            // if ($model->save())
            //    $this->redirect(array('view', 'id' => $model->category_id));
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

        if (isset($_POST['JCategory'])) {
            $model->attributes = $_POST['JCategory'];
            if ($model->save())
            $parent = JCategory::model()->findByPK($model->category_parent);
            $parent->moveBelow($model);
            $this->redirect(array('view', 'id' => $model->category_id));
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
        $dataProvider = new CActiveDataProvider('JNoEmtyCat', array(
                    'criteria' => array(
                        'condition' => 'vendor_id = 1',
                    )
                ));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new JCategory('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['JCategory']))
            $model->attributes = $_GET['JCategory'];

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
        $model = JCategory::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'jcategory-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    public function saveFoto($event) {
        $tmpFile = $event->sender['path'] . '/' . $event->sender['name'];
        $newPhotoName = $event->sender['uploadedFile']->name;
        if (isset($_POST['namePhoto']))
            $oldPhotoName = $_POST['namePhoto']; else
            $oldPhotoName = '';
        $id = $_POST['idmodel'];
        $model = JCategory::model()->findByPk($id);
        $dir = Yii::getPathOfAlias('photodir') . '/' . $model->category_photodir;
        $oldPhoto = $dir . '/' . $oldPhotoName;
        $newPhoto = $dir . '/' . $newPhotoName;
        $tmpFile = YiiBase::getPathOfAlias('webroot') . '/' . $tmpFile;
        copy($tmpFile, $newPhoto);
        unlink($tmpFile);

//$event->sender['uploadedFile'] is CUploadedFile
        //$event->sender['uploadedFile']->name; the original name of the file being uploaded
        // $event->sender['name']  yourfilename.EXT
    }

}
