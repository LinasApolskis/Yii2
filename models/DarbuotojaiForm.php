<?php

namespace app\models;

use Yii;
use borales\extensions\phoneInput\PhoneInputValidator;

/**
 * This is the model class for table "darbuotojai".
 *
 * @property int $id
 * @property string $vardas
 * @property string $pavarde
 * @property string $pareigos
 * @property string $telefonas
 * @property string $email
 * @property int $stazas
 * @property int $lygis
 * @property int $inviter
 */
class DarbuotojaiForm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'darbuotojai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vardas', 'email', 'pavarde', 'pareigos', 'telefonas', 'stazas', 'lygis'], 'required'],
            [['vardas', 'pavarde'], 'string', 'max' => 30],
            [['stazas', 'lygis', 'inviter'], 'integer'],
            [['pareigos'], 'string', 'max' => 40],
            [['telefonas'], 'string', 'max' => 20],
            ['email', 'email'],
            ['lygis', 'integer', 'max' => 10000],
            [['telefonas'], PhoneInputValidator::className()],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vardas' => 'Vardas',
            'pavarde' => 'Pavarde',
            'pareigos' => 'Pareigos',
            'telefonas' => 'Telefonas',
            'email' => 'Email',
            'stazas' => 'Stazas',
            'lygis' => 'Lygis',
            'inviter' => 'Inviter',
        ];
    }

    public function myname($id)
    {
        $model = DarbuotojaiForm::find()
            ->where(['id' => $id])
            ->one()->vardas;
        return $model;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTree()
    {
        return $this->hasOne(Tree::className(), ['id' => 'inviter']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrees()
    {
        return $this->hasMany(Tree::className(), ['inviter' => 'id']);
    }
}
