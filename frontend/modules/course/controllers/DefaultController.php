<?php

namespace frontend\modules\course\controllers;

use yii\web\Controller;

use common\models\Course;
use common\models\CourseSearch;
use common\models\User;
use common\models\CourseTerms;
use common\models\CourseTermsSearch;

use yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class DefaultController extends Controller
{
    const PAGE_SIZE = 3;
    
    public $sorts = [
      'new' => '新',
      'hot'  => '热',
      'rec'  => '荐',
    ];
    
    public function behaviors(){
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' =>[
                    'delete' => ['post']
                ]
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    ['allow' => true, 'actions' => ['index'], 'verbs' => ['GET'] ],
                    ['allow' => true, 'actions' => ['delete'], 'verbs' => ['POST'], 'roles' =>['@']]
                ]
            ]
        ];
    }
    
    public function actionIndex()
    {
        $searchModel = new CourseSearch();

        $params = Yii::$app->request->queryParams;
        empty($params['slug'])? :$params['CourseSearch']['slug'] = $params['slug'];

        $dataProvider = $searchModel->search($params);
        $sort = $dataProvider->getSort();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'sorts'       => $this->sorts,
            'dataProvider'=> $dataProvider
        ]);
    }
    
    public function actionDelete($id){
        
    }
    
}
