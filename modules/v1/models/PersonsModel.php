<?php

namespace app\modules\v1\models;

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

    const SCENARIO_CREATE = 'create';
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
            [['name', 'sername', 'patronymic'], 'string', 'max' => 255],
        ];
    }


    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['name', 'sername', 'patronymic'];
        return $scenarios;
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'sername' => 'Sername',
            'patronymic' => 'Patronymic',
            'boss_id' => 'Boss ID',
        ];
    }
}
