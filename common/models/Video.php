<?php

namespace common\models;

use Yii;
use common\components\db\ActiveRecord;


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
 * @property integer $sort_order
 *
 * @property CoruseUser[] $coruseUsers
 * @property Course $course
 */
class Video extends ActiveRecord
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
            [['created_at', 'updated_at', 'user_id', 'status','chapter_id', 'course_id','sort_order'], 'integer'],
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
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'type' => 'Type',
            'title' => '标题',
            'content' => '内容',
            'video_url' => '视频地址',
            'user_id' => '用户',
            'status' => '状态',
            'course_id' => '课程',
            'chapter_id' => '章节',
            'sort_order' => '排序',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChapter(){
        return $this->hasOne(Chapter::className(),['id' => 'chapter_id']);
    }


}
