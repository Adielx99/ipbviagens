<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alunos".
 *
 * @property int $Id
 * @property string|null $palavra_passe
 * @property string|null $Nome
 * @property int|null $IsAdmin
 * @property string|null $email
 *
 * @property Inscricoes[] $inscricoes
 */
class Alunos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alunos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id'], 'required'],
            [['Id', 'IsAdmin'], 'integer'],
            [['palavra_passe'], 'string', 'max' => 200],
            [['Nome'], 'string', 'max' => 60],
            [['email'], 'string', 'max' => 70],
            [['Id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => Yii::t('app', 'Numero do aluno'),
            'palavra_passe' => Yii::t('app', 'Palavra Passe'),
            'Nome' => Yii::t('app', 'Nome'),
            'IsAdmin' => Yii::t('app', 'Is Admin'),
            'email' => Yii::t('app', 'Email'),
        ];
    }

    /**
     * Gets query for [[Inscricoes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInscricoes()
    {
        return $this->hasMany(Inscricoes::className(), ['Viagem_Id' => 'Id']);
    }
}
