<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use common\components\db\ActiveRecord;

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
class Course extends ActiveRecord
{
    const REC_YES = 1;
    const REC_NO = 0;
    
    
    
    
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
            [['user_id', 'course_terms'], 'required'],
            [['created_at', 'updated_at', 'user_id', 'course_terms', 'is_rec'], 'integer'],
            ['is_rec', 'default', 'value' => self::REC_NO],
            ['is_rec', 'in', 'range' => [self::REC_YES, self::REC_NO]],
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
            'user_id' => '视频作者',
            'title' => '标题',
            'content' => '内容',
            'video_url' => '视频地址',
            'course_terms' => '课程分类',
            'excerpt' => '简述',
            'image' => '图片',
            'is_rec' => '是否推荐', //0, 1
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
     * 获取课程作者
     * @return \common\models\User
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id'])->one();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideos()
    {
        return $this->hasMany(Video::className(), ['course_id' => 'id'])->all();
    }
    
    public function recValues(){
        return [
            self::REC_NO  => '不推荐',
            self::REC_YES => '推荐',            
        ];
    }
    
    
    public static function getCourseArray(){
        return ArrayHelper::map(static::find()->all(),'id','title');
    }
}
