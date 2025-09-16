<?php

namespace app\controllers;

use app\models\Inscricoes;
use app\models\InscricoesSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InscricoesController implements the CRUD actions for Inscricoes model.
 */
class InscricoesController extends Controller
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

                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'actions' => ['index', 'view', 'create', 'update', 'delete'],
                            'allow' => true,
                            'roles' => ['admin'],
                        ]

                    ],
                ],
                
            ]
        );
    }

    /**
     * Lists all Inscricoes models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new InscricoesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Inscricoes model.
     * @param int $user_id User Aluno ID
     * @param int $viagens_Id Viagem ID
     * @param int $Id ID
     * @param int $Pagamentos_Id Pagamentos ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($user_id, $viagens_Id, $Id, $Pagamentos_Id)
    {
        return $this->render('view', [
            'model' => $this->findModel($user_id, $viagens_Id, $Id, $Pagamentos_Id),
        ]);
    }

    /**
     * Creates a new Inscricoes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Inscricoes();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'user_id' => $model->user_id, 'viagens_Id' => $model->viagens_Id, 'Id' => $model->Id, 'Pagamentos_Id' => $model->Pagamentos_Id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Inscricoes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $user_Id User Aluno ID
     * @param int $viagens_Id Viagem ID
     * @param int $Id ID
     * @param int $Pagamentos_Id Pagamentos ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($user_Id, $viagens_Id, $Id, $Pagamentos_Id)
    {
        $model = $this->findModel($user_Id, $viagens_Id, $Id, $Pagamentos_Id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'user_Id' => $model->user_Id, 'viagens_Id' => $model->viagens_Id, 'Id' => $model->Id, 'Pagamentos_Id' => $model->Pagamentos_Id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Inscricoes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $user_Id User Aluno ID
     * @param int $viagens_Id Viagem ID
     * @param int $Id ID
     * @param int $Pagamentos_Id Pagamentos ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($user_Id, $viagens_Id, $Id, $Pagamentos_Id)
    {
        $this->findModel($user_Id, $viagens_Id, $Id, $Pagamentos_Id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Inscricoes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $User_aluno_Id User Aluno ID
     * @param int $viagens_Id Viagem ID
     * @param int $Id ID
     * @param int $Pagamentos_Id Pagamentos ID
     * @return Inscricoes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($user_Id, $viagens_Id, $Id, $Pagamentos_Id)
    {
        if (($model = Inscricoes::findOne(['user_Id' => $user_Id, 'viagens_Id' => $viagens_Id, 'Id' => $Id, 'Pagamentos_Id' => $Pagamentos_Id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
