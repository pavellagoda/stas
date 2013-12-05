<?php

class SliderimageController extends AdminController {

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new SliderImage;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['SliderImage'])) {
            $model->attributes = $_POST['SliderImage'];
            if ($model->validate()) {
                $file = CUploadedFile::getInstance($model, 'file');
                $path_inf = pathinfo($file->getName());
                $model->extension = $path_inf['extension'];
                if ($model->save()) {
                    $file->saveAs(Yii::app()->params['SLIDER_IMAGE_FOLDER'] . '/' . $model->id . '.' . $model->extension);
                    $this->redirect(array('index'));
                }
            }
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

        if (isset($_POST['SliderImage'])) {
            $model->attributes = $_POST['SliderImage'];
            if ($model->validate()) {
                $file = CUploadedFile::getInstance($model, 'file');
                $old_ext = $model->extension;
                $path_inf = pathinfo($file->getName());
                $model->extension = $path_inf['extension'];
                if ($model->save()) {
                    if (is_file(Yii::app()->params['SLIDER_IMAGE_FOLDER'] . '/' . $model->id . '.' . $old_ext)) {
                        unlink(Yii::app()->params['SLIDER_IMAGE_FOLDER'] . '/' . $model->id . '.' . $old_ext);
                    }
                    $file->saveAs(Yii::app()->params['SLIDER_IMAGE_FOLDER'] . '/' . $model->id . '.' . $model->extension);
                    $this->redirect(array('index'));
                }
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
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Manages all models.
     */
    public function actionIndex() {
        $model = new SliderImage('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['SliderImage']))
            $model->attributes = $_GET['SliderImage'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return SliderImage the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = SliderImage::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param SliderImage $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'slider-image-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
