<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "coruse_user".
 *
 * @property integer $id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $user_id
 * @property integer $course_id
 * @property integer $video_id
 * @property integer $watch_time
 *
 * @property Video $video
 * @property Course $course
 * @property User $user
 */
class CoruseUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'coruse_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'created_at', 'updated_at', 'user_id', 'course_id', 'video_id', 'watch_time'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_id' => 'User ID',
            'course_id' => 'Course ID',
            'video_id' => 'Video ID',
            'watch_time' => '收看时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideo()
    {
        return $this->hasOne(Video::className(), ['id' => 'video_id']);
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
