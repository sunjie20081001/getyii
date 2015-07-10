<?php

namespace common\models;

use Yii;

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
class CourseTerms extends \yii\db\ActiveRecord
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
            [['created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at', 'parent_id', 'count', 'order'], 'integer'],
            [['title', 'excerpt'], 'string', 'max' => 255]
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
            'count' => 'Count',
            'order' => 'Order',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['course_terms' => 'id']);
    }
}
