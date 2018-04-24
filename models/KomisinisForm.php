<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class KomisinisForm extends Model
{
    public $id;
    public $suma;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['id', 'suma'], 'required'],
            [['id', 'suma'], 'integer'],
        ];
    }
}
