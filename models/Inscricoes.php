<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inscricoes".
 *
 * @property int $user_id
 * @property int $viagem_Id
 * @property string|null $Data
 * @property int|null $Pago
 * @property int $Id
 * @property int $Pagamentos_Id
 *
 * @property Pagamentos $pagamentos
 * @property Viagens $userAluno
 * @property Alunos $viagem
 */
class Inscricoes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inscricoes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'viagens_Id', 'Id', 'Pagamentos_Id'], 'required'],
            [['user_id', 'viagens_Id', 'Pago', 'Id', 'Pagamentos_Id'], 'integer'],
            [['Data'], 'safe'],
            [['user_id', 'viagens_Id', 'Id', 'Pagamentos_Id'], 'unique', 'targetAttribute' => ['user_id', 'viagens_Id', 'Id', 'Pagamentos_Id']],
            [['viagens_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Alunos::className(), 'targetAttribute' => ['viagens_Id' => 'Id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Viagens::className(), 'targetAttribute' => ['user_id' => 'Id']],
            [['Pagamentos_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Pagamentos::className(), 'targetAttribute' => ['Pagamentos_Id' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'Nº do aluno'),
            'Viagem_Id' => Yii::t('app', 'Id da Viagem'),
            'Data' => Yii::t('app', 'Data da inscrição'),
            'Pago' => Yii::t('app', 'Pago'),
            'Id' => Yii::t('app', 'Nº de inscrição'),
            'Pagamentos_Id' => Yii::t('app', 'Id do Pagamentos'),
        ];
    }

    /**
     * Gets query for [[Pagamentos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPagamentos()
    {
        return $this->hasOne(Pagamentos::className(), ['Id' => 'Pagamentos_Id']);
    }

    /**
     * Gets query for [[UserAluno]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserAluno()
    {
        return $this->hasOne(Viagens::className(), ['Id' => 'user_id']);
    }

    /**
     * Gets query for [[Viagem]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getViagem()
    {
        return $this->hasOne(Alunos::className(), ['Id' => 'Viagem_Id']);
    }
}
