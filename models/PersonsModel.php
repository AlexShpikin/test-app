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
            [['name', 'sername', 'patronymic'], 'match', 'pattern' => '/^[а-яА-Я-\s]+$/u']
        ];
    }

    
    public function getBoss()
    {
        return $this->hasOne(self::className(), ['id' => 'boss_id']);
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
            'boss_id' => 'Начальник'
        ];
    }

    public function getFullName()
    {
        return $this->name.' '.$this->patronymic.' '.$this->sername;
    }

    public function getBossName()
    {
        if(isset($this->boss)){
            return $this->boss->getFullName();
        }else{
            return null;
        }
    }

    public function getPersons()
    {
        $query = self::find();

        if(!$this->getIsNewRecord()){
            $query
                ->where('id != '.$this->id)
                ->andWhere('boss_id != '.$this->id.' OR boss_id IS NULL');
        }      
        return $query->all();  
    }
}
