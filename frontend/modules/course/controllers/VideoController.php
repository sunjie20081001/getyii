<?php
namespace frontend\modules\course\controllers;

use common\components\Controller;
use common\models\Video;
use yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class VideoController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post']
                ],
                ],
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        ['allow' => true, 'actions' => ['view'], 'verbs' => ['GET']]
                    ]
                ]

        ];
    }


    public function actionView($id)
    {
        $model = Video::findOne($id);
        $course = $model->getCourse();
        $author = $course->getAuthor();

        return $this->render('view', [
            'model' => $model,
            'course' => $course,
            'author' => $author
        ]);
    }

    public function actionDelete($id)
    {
    }
}