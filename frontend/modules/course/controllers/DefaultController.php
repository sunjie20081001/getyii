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
      'hot' => '热',
      'rec' => '荐',
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
        //分类
        empty($params['slug'])? :$params['CourseSearch']['slug'] = $params['slug'];
        if(isset($params['slug'])){
            $courseTerm = CourseTerms::findOne(['slug' => $params['slug']]);
            ($courseTerm) ? $params['CourseSearch']['course_terms'] = $courseTerm->id :'';
        }
        
        //排序
        empty($params['sort'])? '':'';
        // 
        $dataProvider = $searchModel->search($params);
        $sort = $dataProvider->getSort();

        $sort->attributes = array_merge(
            $sort->attributes,[
                'new' => [
                    'asc' => [
                        'created_at' => SORT_DESC,
                    ],
                ],
                'hot' => [
                    'asc' => [
                        
                        'created_at' => SORT_DESC,
                    ],
                ],
                'rec' => [
                    'asc' => [
                        'create_at' => SORT_DESC,
                    ],
                ],
            ]
        );
        return $this->render('index', [
            'searchModel' => $searchModel,
            'sorts'       => $this->sorts,
            'dataProvider'=> $dataProvider
        ]);
    }
    
    /**
    * 课程详细页面
    * @param integer $id
    * @return mixed
    */
    public function actionView($id){
        $model = Course::findOne($id);
        
        return $this->render('view', [
            'model' => $model
        ]);
    }
    
    public function actionDelete($id){
        
    }
    
}
