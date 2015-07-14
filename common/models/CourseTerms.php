<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use common\components\db\ActiveRecord;

/**
 * This is the model class for table "course_terms".
 *
 * @property integer $id
 * @property string $title
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $excerpt
 * @property integer $parent_id
 * @property integer $count
 * @property integer $order
 *
 * @property Course[] $courses
 */
class CourseTerms extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_terms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'slug'], 'required'],
            [['created_at', 'updated_at', 'parent_id', 'count', 'order'], 'integer'],
            [['title', 'excerpt', 'slug'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '课程分类标题',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'excerpt' => '课程分类简介',
            'parent_id' => '父级分类',
            'slug' => '变量(短标签)',
            'count' => '课程数量',
            'order' => '排序',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['course_terms' => 'id']);
    }

    /**
     * @return array
     */
    public static function getParents()
    {
        return ArrayHelper::map(static::find()->where(['parent_id' => null])->orWhere(['parent_id' => 0])->orderBy(['order' => SORT_ASC])->all(), 'id', 'title');
    }

    public static function getTermsByParentId($parent_id = null)
    {
        return static::find()->where(['parent_id' => $parent_id])->orderBy(['order' => SORT_ASC])->all();
    }

    /**
     * @return array
     */
    public static function getTermsByOrder()
    {
        $terms = [];
        $parents = static::getTermsByParentId();
        foreach($parents as $parent){
            $terms[] = array(
                'parent' => $parent,
                'children' => static::getTermsByParentId($parent->id),
            );
        }

        return $terms;
    }

}
