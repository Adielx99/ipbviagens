<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "viagens".
 *
 * @property int $Id
 * @property string|null $Data_Partida
 * @property string|null $Data_Chegada
 * @property string|null $Ponto_Partida
 * @property string|null $Ponto Chegada
 * @property float|null $Preco
 *
 * @property Atividades[] $atividades
 * @property Inscricoes[] $inscricoes
 * @property ViagensHasAtividades[] $viagensHasAtividades
 */
class Viagens extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'viagens';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Data_Partida', 'Data_Chegada'], 'safe'],
            [['Preco'], 'number'],
            [['Ponto_Partida', 'Ponto_Chegada'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => Yii::t('app', 'Nº de viagem'),
            'Data_Partida' => Yii::t('app', 'Data de partida'),
            'Data_Chegada' => Yii::t('app', 'Data de chegada'),
            'Ponto_Partida' => Yii::t('app', 'Ponto de partida'),
            'Ponto_Chegada' => Yii::t('app', 'Ponto de chegada'),
            'Preco' => Yii::t('app', 'Preco'),
        ];
    }

    /**
     * Gets query for [[Atividades]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAtividades()
    {
        return $this->hasMany(Atividades::className(), ['Id' => 'atividades_Id'])->viaTable('viagens_has_atividades', ['viagens_Id' => 'Id']);
    }

    /**
     * Gets query for [[Inscricoes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInscricoes()
    {
        return $this->hasMany(Inscricoes::className(), ['user_id' => 'Id']);
    }

    /**
     * Gets query for [[ViagensHasAtividades]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getViagensHasAtividades()
    {
        //return $this->hasMany(ViagensHasAtividades::className(), ['viagens_Id' => 'Id']);
    }
}
