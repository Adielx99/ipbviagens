<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "atividades".
 *
 * @property int $Id
 * @property string|null $Nome
 * @property string|null $Descrição
 *
 * @property Viagens[] $viagens
 * @property ViagensHasAtividades[] $viagensHasAtividades
 */
class Atividades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'atividades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id'], 'required'],
            [['Id'], 'integer'],
            [['Nome', 'Descrição'], 'string', 'max' => 45],
            [['Id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => Yii::t('app', 'Nº de atividade'),
            'Nome' => Yii::t('app', 'Nome'),
            'Descrição' => Yii::t('app', 'Descrição'),
        ];
    }

    /**
     * Gets query for [[Viagens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getViagens()
    {
        return $this->hasMany(Viagens::className(), ['Id' => 'viagens_Id'])->viaTable('viagens_has_atividades', ['atividades_Id' => 'Id']);
    }

    /**
     * Gets query for [[ViagensHasAtividades]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getViagensHasAtividades()
    {
       //return $this->hasMany(Viagens_Atividades::className(), ['atividades_Id' => 'Id']);
    }

    public static function getAllAsArray(){
        $programs = Atividades::find()
            ->select(['nome'])
            ->indexBy('id')
            ->orderBy(['nome' => SORT_ASC])
            ->column();
        return $programs;
    }

}
