<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property int $campaign_id
 * @property string $company_name
 * @property string $company_reg_no
 * @property string $company_email
 * @property string $company_website
 * @property string $company_description
 * @property string $company_industry
 * @property int $company_employees_count
 * @property string $company_postal
 * @property string $company_designation
 *
 * @property Campaign $campaign
 * @property Industry $industry
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['campaign_id', 'company_name', 'company_reg_no', 'company_email', 'company_website', 'company_description', 'company_employees_count', 'company_postal', 'company_designation'], 'required'],
            [['campaign_id', 'company_employees_count'], 'integer'],
            [['company_name', 'company_reg_no', 'company_email', 'company_website', 'company_description', 'company_postal', 'company_designation'], 'string', 'max' => 255],
            ['company_email','email'],
            [['company_website'],'url', 'defaultScheme' => ''],
            [['campaign_id'], 'exist', 'skipOnError' => true, 'targetClass' => Campaign::className(), 'targetAttribute' => ['campaign_id' => 'c_id']],
            [['company_industry'], 'exist', 'skipOnError' => true, 'targetClass' => Industry::className(), 'targetAttribute' => ['company_industry' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'campaign_id' => 'Campaign ID',
            'company_name' => 'Company Name',
            'company_reg_no' => 'Company Reg No',
            'company_email' => 'Company Email',
            'company_website' => 'Company Website',
            'company_description' => 'Company Description',
            'company_industry' => 'Company Industry',
            'company_employees_count' => 'Company Employees Count',
            'company_postal' => 'Company Postal',
            'company_designation' => 'Company Designation',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampaign()
    {
        return $this->hasOne(Campaign::className(), ['c_id' => 'campaign_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndustry()
    {
        return $this->hasOne(Industry::className(), ['id' => 'company_industry']);
    }
}
