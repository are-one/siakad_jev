<?php

namespace frontend\controllers;

use frontend\models\Pengaturan;
use frontend\models\PengaturanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\web\UploadedFile;

/**
 * PengaturanController implements the CRUD actions for Pengaturan model.
 */
class PengaturanController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Pengaturan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PengaturanSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pengaturan model.
     * @param int $id_pengaturan Id Pengaturan
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_pengaturan)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_pengaturan),
        ]);
    }

    /**
     * Creates a new Pengaturan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    // public function actionCreate()
    // {
    //     $model = new Pengaturan();

    //     if ($this->request->isPost) {
    //         if ($model->load($this->request->post())) {
    //             $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

    //             $model->logo='file-'.$model->id_pengaturan.".".$model->imageFile->extension;

    //             if ($model->upload($model->logo)) {

    //                 $model->save();

    //                 return $this->redirect(['index']);
    //             }
    //         }
    //     } else {
    //         $model->loadDefaultValues();
    //     }

    //     return $this->render('create', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Updates an existing Pengaturan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_pengaturan Id Pengaturan
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pengaturan)
    {
        $model = $this->findModel($id_pengaturan);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->imageFile !== NULL) {
               $model->logo='file-'.$model->id_pengaturan.".".$model->imageFile->extension;
           }
           

           if ($model->upload($model->logo)) {

            $model->save();

            return $this->redirect(['index']);
        }
    }

    return $this->render('update', [
        'model' => $model,
    ]);
}

    /**
     * Deletes an existing Pengaturan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_pengaturan Id Pengaturan
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pengaturan)
    {
        $this->findModel($id_pengaturan)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pengaturan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_pengaturan Id Pengaturan
     * @return Pengaturan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pengaturan)
    {
        if (($model = Pengaturan::findOne(['id_pengaturan' => $id_pengaturan])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionGambar($logo)
    {
        $alamat=\Yii::getAlias('@frontend/assets/images/'.$logo);
        return $this->response->sendFile($alamat);
    }
}
