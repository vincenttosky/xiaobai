<?php

namespace backend\controllers;

use Yii;
use backend\models\Source;
use backend\models\Software;
use backend\models\SourceSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * SourceController implements the CRUD actions for Source model.
 */
class SourceController extends Controller
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
                        'actions' => ['get', ],
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
     * Lists all Source models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SourceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Source model.
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
     * Creates a new Source model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Source(['scenario' => 'admin-create']);

        $ret = $model->load(Yii::$app->request->post());
        if ($ret) {
            $model->create_user_id = Yii::$app->user->getId();
            $model->update_user_id = Yii::$app->user->getId();
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
     * Updates an existing Source model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->setScenario('admin-update');

        $ret = $model->load(Yii::$app->request->post());
        if ($ret) {
            $model->update_user_id = Yii::$app->user->getId();
            $ret = $model->save();
        }

        if ($ret) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Source model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionGet($id)
    {
        $model = Source::findIdentity($id);
        if ($model === null) {
            echo json_decode("");
        } else {
            $ret = array();
            $main = Software::findIdentity($model->main);
            $ret['main'] = ArrayHelper::toArray($main);
            $game = Software::findIdentity($model->game);
            $ret['game'] = ArrayHelper::toArray($game);

            $right_keys = array('right1', 'right2', 'right3', 'right4');
            $right_ids = array();
            foreach ($right_keys as $right_key) {
                $right_id = $model->$right_key;
                if ($right_id)
                    array_push($right_ids, $right_id);
            }
            $right = Software::findIdentities($right_ids);
            $ret['right'] = ArrayHelper::toArray($right);

            $below_keys = array('below1', 'below2');
            $below_ids = array();
            foreach ($below_keys as $below_key) {
                $below_id = $model->$below_key;
                if ($below_id)
                    array_push($below_ids, $below_id);
            }
            $below = Software::findIdentities($below_ids);
            $ret['below'] = ArrayHelper::toArray($below);

            $after_keys = array('after1', 'after2', 'after3');
            $after_ids = array();
            foreach ($after_keys as $after_key) {
                $after_id = $model->$after_key;
                if ($after_id)
                    array_push($after_ids, $after_id);
            }
            $after = Software::findIdentities($after_ids);
            $ret['after'] = ArrayHelper::toArray($after);

            echo json_encode($ret);
        }
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Source::findIdentity($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
