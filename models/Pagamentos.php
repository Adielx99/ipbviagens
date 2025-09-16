<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pagamentos".
 *
 * @property int $Id
 * @property string|null $Valor_Pago
 * @property string|null $Data_Pagamento
 *
 * @property Inscricoes[] $inscricoes
 */
class Pagamentos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pagamentos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id'], 'required'],
            [['Id'], 'integer'],
            [['Data_Pagamento'], 'safe'],
            [['Valor_Pago'], 'string', 'max' => 7],
            [['Id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => Yii::t('app', 'Nº de pagamento'),
            'Valor_Pago' => Yii::t('app', 'Valor Pago'),
            'Data_Pagamento' => Yii::t('app', 'Data Pagamento'),
        ];
    }

    /**
     * Gets query for [[Inscricoes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInscricoes()
    {
        return $this->hasMany(Inscricoes::className(), ['Pagamentos_Id' => 'Id']);
    }
}
