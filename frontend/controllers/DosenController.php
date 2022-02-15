<?php

namespace frontend\controllers;

use frontend\models\Dosen;
use frontend\models\DosenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


use yii\web\UploadedFile;

/**
 * DosenController implements the CRUD actions for Dosen model.
 */
class DosenController extends Controller
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
     * Lists all Dosen models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DosenSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dosen model.
     * @param string $nip Nip
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($nip)
    {
        return $this->render('view', [
            'model' => $this->findModel($nip),
        ]);
    }

    /**
     * Creates a new Dosen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Dosen();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                $model->foto='file-'.$model->nip.".".$model->imageFile->extension;

                if ($model->upload($model->foto)) {

                    $model->save();
                // file is uploaded successfully
                    return $this->redirect(['index']);
                }

            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Dosen model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $nip Nip
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($nip)
    {
        $model = $this->findModel($nip);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nip' => $model->nip]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Dosen model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $nip Nip
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($nip)
    {
        $this->findModel($nip)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Dosen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $nip Nip
     * @return Dosen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($nip)
    {
        if (($model = Dosen::findOne(['nip' => $nip])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    // aksi tampil gambar
    public function actionGambar($foto)
    {
        $alamat=\Yii::getAlias('@frontend/assets/images/'.$foto);
        return $this->response->sendFile($alamat);
    }
}
