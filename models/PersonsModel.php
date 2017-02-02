<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persons".
 *
 * @property integer $id
 * @property string $name
 * @property string $sername
 * @property string $patronymic
 * @property integer $boss_id
 */
class PersonsModel extends \yii\db\ActiveRecord
{
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persons';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'sername', 'patronymic'], 'required'],
            [['boss_id'], 'integer'],
            [['boss_id'], 'default', 'value'=>''],
            [['name', 'sername', 'patronymic'], 'string', 'max' => 255],
        ];
    }

    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'sername' => 'Фамилия',
            'patronymic' => 'Отчество',
            'boss_id' => 'Начальник',
        ];
    }

    public static function getFullName($id)
    {
        $boss = self::find()
                ->where(['id'=>$id])
                ->one();

        return $boss->name.' '.$boss->patronymic.' '.$boss->sername;
    }
}
