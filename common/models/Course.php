<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property integer $id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $user_id
 * @property string $title
 * @property string $content
 * @property string $video_url
 * @property integer $course_terms
 * @property string $excerpt
 * @property string $image
 *
 * @property CoruseUser[] $coruseUsers
 * @property CourseTerms $courseTerms
 * @property User $user
 * @property Video[] $videos
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'user_id', 'course_terms'], 'required'],
            [['created_at', 'updated_at', 'user_id', 'course_terms'], 'integer'],
            [['content'], 'string'],
            [['title', 'video_url', 'excerpt', 'image'], 'string', 'max' => 255]
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
            'title' => 'Title',
            'content' => 'Content',
            'video_url' => 'Video Url',
            'course_terms' => 'Course Terms',
            'excerpt' => 'Excerpt',
            'image' => 'Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoruseUsers()
    {
        return $this->hasMany(CoruseUser::className(), ['course_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseTerms()
    {
        return $this->hasOne(CourseTerms::className(), ['id' => 'course_terms']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideos()
    {
        return $this->hasMany(Video::className(), ['course_id' => 'id']);
    }
}
