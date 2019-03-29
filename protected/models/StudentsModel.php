<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $group
 * @property int $sex
 * @property int $college_id
 *
 * @property College $college
 */
class StudentsModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sex', 'college_id'], 'integer'],
            [['name', 'surname'], 'string', 'max' => 64],
            [['group'], 'string', 'max' => 16],
            [['college_id'], 'exist', 'skipOnError' => true, 'targetClass' => CollegeModel::className(), 'targetAttribute' => ['college_id' => 'id
            ']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'group' => 'Group',
            'sex' => 'Sex',
            'college_id' => 'College ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCollege()
    {
        return $this->hasOne(CollegeModel::className(), ['id' => 'college_id']);
    }

    public function getAllRows()
    {
        return $this->find()->all();
    }
}
