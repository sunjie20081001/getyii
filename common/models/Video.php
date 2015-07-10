<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "video".
 *
 * @property integer $id
 * @property integer $create_at
 * @property integer $update_at
 * @property string $type
 * @property string $title
 * @property string $content
 * @property string $video_url
 * @property integer $user_id
 * @property integer $status
 * @property integer $course_id
 *
 * @property CoruseUser[] $coruseUsers
 * @property Course $course
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'video';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_at', 'update_at', 'user_id', 'status', 'course_id'], 'integer'],
            [['content'], 'string'],
            [['type'], 'string', 'max' => 32],
            [['title', 'video_url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'type' => 'Type',
            'title' => 'Title',
            'content' => 'Content',
            'video_url' => 'Video Url',
            'user_id' => 'User ID',
            'status' => 'Status',
            'course_id' => 'Course ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoruseUsers()
    {
        return $this->hasMany(CoruseUser::className(), ['video_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }
}
