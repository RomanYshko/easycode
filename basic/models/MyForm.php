<?php
namespace app\models;

use Yii;

use yii\db\ActiveRecord;

class MyForm extends ActiveRecord
{
    public $name;
    public $email;
    public $url;
    public $text;

    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [

            [['name', 'email', 'text'], 'required', 'message' => 'Поля обизательные к заполнению '],
            ['email', 'email', 'message' => 'Некоректный e-mail адрес !'],

        ];
    }
}
?>