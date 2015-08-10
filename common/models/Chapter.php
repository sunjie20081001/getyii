<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "chapter".
 *
 * @property integer $id
 * @property string $title
 * @property integer $course_id
 * @property integer $sort_order
 *
 * @property Course $course
 */
class Chapter extends \common\components\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chapter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'sort_order', 'created_at','updated_at'], 'integer'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'course_id' => '课程',
            'sort_order' => '排序',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideos(){
        return $this->hasMany(Video::className(), ['chapter_id' =>'id']);
    }
}
