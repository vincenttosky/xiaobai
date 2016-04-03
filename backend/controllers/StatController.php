<?php

namespace backend\controllers;

use Yii;
use backend\models\Stat;
use backend\models\StatSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StatController implements the CRUD actions for Stat model.
 */
class StatController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['post', ],
                        'allow' => true,
                        'roles' => ['?']
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
        ];
    }

    /**
     * Lists all Stat models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $dataProvider->pagination->pageSize = 50;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Stat model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Stat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Stat(['scenario' => 'admin-create']);

        $ret = $model->load(Yii::$app->request->post());
        if ($ret) {
            $ret = $model->save();
        }

        if ($ret) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Stat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionPost($mac, $channel, $version, $oper, $bdict)
    {   
        $model = new Stat(['scenario' => 'admin-create']);
        $model->mac = $mac;
        $model->channel = $channel;
        $model->version = $version;
        $model->oper = $oper;
        $model->bdict = $bdict;
        if ($model->save()) {
            echo "OK";
        } else {
            echo "NO";
        }

    }

}
