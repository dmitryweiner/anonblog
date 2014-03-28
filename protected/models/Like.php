<?php
/**
 * The followings are the available columns in table 'tbl_post':
 * @property integer $id
 * @property integer $post_id
 * @property integer $reaction
 * @property integer $creation_date
 */
class Like extends CActiveRecord
{

	/**
	 * Returns the static model of the specified AR class.
	 * @return static the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{like}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('post_id, reaction', 'required'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t("app", "Id"),
			'post_id' => Yii::t("app", "Post ID"),
            'reaction' => Yii::t("app", "Reaction"),
			'creation_date' => Yii::t("app", "Creation date"),
		);
	}

	/**
	 * This is invoked before the record is saved.
	 * @return boolean whether the record should be saved.
	 */
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord) {
				$this->creation_date=date('Y-m-d H:i:s');
			}
			return true;
		}
		else
			return false;
	}

	/**
	 * This is invoked after the record is deleted.
	 */
	protected function afterDelete()
	{
		parent::afterDelete();
	}

}