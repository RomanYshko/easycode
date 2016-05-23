<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "user".
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $url
 * @property string $text
 */
class User extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'text'], 'required', 'message' => 'Поля обизательные к заполнению '],
            ['email', 'email', 'message' => 'Некоректный e-mail адрес !'],
            [['text'], 'string'],
            [['name', 'email', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'url' => 'Url',
            'text' => 'Text',
        ];
    }
}
