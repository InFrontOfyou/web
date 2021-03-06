<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
* This is the model class for table "films".
 *
 * @property int $id
* @property string $title Заголовок
* @property string $createdAt Дата создания
* @property string|null $updatedAt Дата изменения
*
 * @property Comment[] $comments
*/
class Film  extends BaseModel
{
/**
* {@inheritdoc}
     */
    public static function tableName()
{
    return 'films';
}

    /**
     * {@inheritdoc}
     */
    public function rules()
{
    return [
        [['title'], 'required'],
        [['createdAt', 'updatedAt'], 'safe'],
        [['title'], 'string', 'max' => 128],
    ];
}



    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
{
    return [
        'id' => 'ID',
        'title' => 'Заголовок',
        'createdAt' => 'Дата создания',
        'updatedAt' => 'Дата изменения',
    ];
}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
{
    return $this->hasMany(Comment::class, ['filmId' => 'id']);
}
    public function fields(){
        return array_merge(parent::fields(), [
            'comments'
        ] );
    }
}