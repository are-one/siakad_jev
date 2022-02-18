<?php

namespace frontend\controllers;

use frontend\models\Matakuliah;
use frontend\models\MatakuliahSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MatakuliahController implements the CRUD actions for Matakuliah model.
 */
class MatakuliahController extends Controller
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
     * Lists all Matakuliah models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MatakuliahSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Matakuliah model.
     * @param string $kode_mk Kode Mk
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($kode_mk)
    {
        return $this->render('view', [
            'model' => $this->findModel($kode_mk),
        ]);
    }

    /**
     * Creates a new Matakuliah model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Matakuliah();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Matakuliah model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $kode_mk Kode Mk
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($kode_mk)
    {
        $model = $this->findModel($kode_mk);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kode_mk' => $model->kode_mk]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Matakuliah model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $kode_mk Kode Mk
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($kode_mk)
    {
        $this->findModel($kode_mk)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Matakuliah model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $kode_mk Kode Mk
     * @return Matakuliah the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($kode_mk)
    {
        if (($model = Matakuliah::findOne(['kode_mk' => $kode_mk])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
