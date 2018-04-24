<?php

namespace app\controllers;

use app\models\KomisinisForm;
use Yii;
use app\models\DarbuotojaiForm;
use app\models\Darbuotojais;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DarbuotojaiController implements the CRUD actions for DarbuotojaiForm model.
 */
class DarbuotojaiController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all DarbuotojaiForm models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Darbuotojais();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionKomisinis()
    {
        $data = array();
        $model = new KomisinisForm();

        if ($model->load(Yii::$app->request->post())) {
            $darbuotojas = (new \yii\db\Query())->select('id, lygis, inviter')->from('darbuotojai')->where('id = :id', [':id' => $model->id])->one();
            $darbuotojas1 = (new \yii\db\Query())->select('id, lygis, inviter')->from('darbuotojai')->where('id = :id', [':id' => (int)$darbuotojas['inviter']])->one();
            $darbuotojas2 = (new \yii\db\Query())->select('id, lygis, inviter')->from('darbuotojai')->where('id = :id', [':id' => (int)$darbuotojas1['inviter']])->one();

            $bendradalis = (int)$darbuotojas1['lygis'] / (int)$darbuotojas['lygis'] + (int)$darbuotojas2['lygis'] / (int)$darbuotojas['lygis'] + 1;
            $dalissumos = $model->suma / $bendradalis;
            $data[] = $darbuotojas['id'];
            $data[] = number_format($dalissumos, 2);
            $data[] = $darbuotojas1['id'];
            if((int)$darbuotojas1['lygis'] > (int)$darbuotojas['lygis'])
            $data[] = number_format($dalissumos * (int)$darbuotojas1['lygis'] / (int)$darbuotojas['lygis'], 2);
            else
            $data[] = "Žinių lygis per mažas";
            $data[] = $darbuotojas2['id'];
            if((int)$darbuotojas2['lygis'] > (int)$darbuotojas['lygis'])
            $data[] = number_format($dalissumos * (int)$darbuotojas2['lygis'] / (int)$darbuotojas['lygis'], 2);
            else
            $data[] = "Žinių lygis per mažas";
            return $this->render('komisinis', [
                'model' => $model, 'data' => $data,
            ]);

        }


        return $this->render('komisinis', ['model' => $model, 'data' => $data,]);
    }

    public function actionVaizdavimas()
    {
        $searchModel = new Darbuotojais();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('vaizdavimas', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single DarbuotojaiForm model.
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

    /**
     * Creates a new DarbuotojaiForm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $data = (new \yii\db\Query())->select(['pareigos'])->from('darbuotojai')->all();
        $model = new DarbuotojaiForm();

        if ($model->load(Yii::$app->request->post())) {
            $inviters = (new \yii\db\Query())->select(['lygis'])->from('darbuotojai')->where('id = :id', [':id' => $model->inviter])->one();
            $inviter = (int)$inviters['lygis'];
            if ($inviter < $model->lygis) {
                $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else
                return $this->render('create', [
                    'model' => $model, 'data' => $data,
                ]);
        }

        return $this->render('create', [
            'model' => $model,'data' => $data,
        ]);
    }

    /**
     * Updates an existing DarbuotojaiForm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $data = (new \yii\db\Query())->select(['pareigos'])->from('darbuotojai')->all();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,'data' => $data,
        ]);
    }

    /**
     * Deletes an existing DarbuotojaiForm model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if($id!=1) {

            $inviters = (new \yii\db\Query())->select(['inviter'])->from('darbuotojai')->where('id = :id', [':id' => $id])->one();
            $inviter = (int)$inviters['inviter'];

            Yii::$app->db->createCommand()
                ->update('darbuotojai', ['inviter' => $inviter], 'inviter = :id', [':id' => $id])
                ->execute();
            $this->findModel($id)->delete();
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the DarbuotojaiForm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DarbuotojaiForm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DarbuotojaiForm::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
