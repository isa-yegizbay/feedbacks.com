<?php

namespace app\controllers;

use app\models\Users;
use app\models\UsersSearch;
use Yii;
use app\models\Feedbacks;
use app\models\FeedbacksSearch;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FeedbacksController implements the CRUD actions for Feedbacks model.
 */
class FeedbacksController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Feedbacks models.
     * @return mixed
     */
    public function actionIndex()
    {
        $feedbacks = Feedbacks::find()->orderBy('date')->all();
        //var_dump($feedbacks);die;
        return $this->render('index', ['feedbacks'=>$feedbacks]);
    }

    /**
     * Displays a single Feedbacks model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionFindUserByName()
    {
        $data = Yii::$app->request->get('first_name');
        $test = null;
        if(isset($data)) {
            $user = Users::find()->where(['first_name'=>$data])->one();
            if(isset($user)){
                $test = $user->id;
            }
        }
        // return Json
        return \yii\helpers\Json::encode($test);
    }

    /**
     * Creates a new Feedbacks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Feedbacks();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Feedbacks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Feedbacks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Feedbacks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Feedbacks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Feedbacks::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionRecent(){

        $query = Feedbacks::find()->orderBy('date')->all();




        return Json::encode($query);
        //Yii::$app->db->createCommand('SELECT * FROM feedbacks')->queryAll();

    }
}
