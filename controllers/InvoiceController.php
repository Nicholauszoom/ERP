<?php

namespace app\controllers;

use app\models\Customer;
use app\models\Idetail;
use app\models\Invoice;
use app\models\InvoiceSearch;
use Mpdf\Mpdf;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * InvoiceController implements the CRUD actions for Invoice model.
 */
class InvoiceController extends Controller
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
     * Lists all Invoice models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new InvoiceSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Invoice model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionView($id)
    {
        $invoice_details=Idetail::find()->where(['invoice_id'=>$id])->all();

        $total_amount= 0;
        foreach ($invoice_details as $invoice_details) {
            $total_amount += $invoice_details->amount;
        }

        $cus=Customer::findOne(['invoice_id'=>$id]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'cus'=>$cus,
            'total_amount'=>$total_amount,
        ]);
    }


    public function actionReport($id)
    {
      $invoice= Invoice::findOne($id);


        $invoice_details=Idetail::find()->where(['invoice_id'=>$id])->all();

        $total_amount= 0;
        foreach ($invoice_details as $invoice_details) {
            $total_amount += $invoice_details->amount;
        }
        $content = $this->renderPartial('report', [
            'invoice' => $invoice,
            'total_amount'=>$total_amount
           
        ]);
    
        $pdf = new Mpdf;
        $pdf->WriteHTML($content);
        $pdf->Output();
        exit;
    }


    public function actionApprove($invoiceId)
    {
       
            $invoice=Invoice::findOne($invoiceId);

            
            // Update the status in the database based on the tender ID
            // Replace 'YourModel' with your actual model class name, 'status' with the database column name, and 'tenderId' with the appropriate tender ID column name
            $invoice->status= 2;
            Invoice::updateAll(['status' => $invoice->status], ['id' => $invoiceId]);
            
            return $this->redirect(['invoice/view', 'id' => $invoiceId]);
        
        
        return 'Error'; // Return an error message or any other response if needed
    }
    public function actionNotapprove($invoiceId)
    {
       
            $invoice=Invoice::findOne($invoiceId);

            
            // Update the status in the database based on the tender ID
            // Replace 'YourModel' with your actual model class name, 'status' with the database column name, and 'tenderId' with the appropriate tender ID column name
            $invoice->status= 3;
            Invoice::updateAll(['status' => $invoice->status], ['id' => $invoiceId]);
            
            return $this->redirect(['invoice/view', 'id' => $invoiceId]);
        
        
        return 'Error'; // Return an error message or any other response if needed
    }

    /**
     * Creates a new Invoice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Invoice();
    
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['idetail/create', 'invoiceId' => $model->id]);
            } else {
                // Handle form submission errors here
            }
        } else {
            $model->loadDefaultValues();
        }
    
        return $this->render('create', [
            'model' => $model,
        ]);
    }



    /**
     * Updates an existing Invoice model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }



    /**
     * Deletes an existing Invoice model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }



    protected function findModel($id)
    {
        if (($model = Invoice::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
