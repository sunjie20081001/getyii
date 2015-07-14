<?php
/**
 * Created by PhpStorm.
 * User: sun
 * Date: 15-7-12
 * Time: 下午6:12
 */
namespace frontend\widgets;

use Yii;
use common\models\CourseTerms;


class Term extends \yii\bootstrap\Widget
{
    public function run()
    {
        $slug = Yii::$app->request->get('slug');
        $terms = CourseTerms::getTermsByOrder();
        return $this->render('term', [
            'terms' => $terms,
            'current' => $slug,
        ]);
    }
}