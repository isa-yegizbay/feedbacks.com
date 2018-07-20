<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "places".
 *
 * @property int $id
 * @property string $place_name
 *
 * @property Feedbacks[] $feedbacks
 */
class Places extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'places';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['place_name'], 'required'],
            [['place_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'place_name' => 'Place Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeedbacks()
    {
        return $this->hasMany(Feedbacks::className(), ['place_id' => 'id']);
    }
}
