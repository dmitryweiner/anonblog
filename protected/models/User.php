<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $login
 * @property string $name
 * @property string $password
 * @property string $creation_date
 *
 * The followings are the available model relations:
 * @property Comment[] $comments
 * @property Like[] $likes
 * @property Post[] $posts
 */
class User extends CActiveRecord
{
    public $password2;
    public $verify_code;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('login, name, password, password2', 'safe'),
			array('login, name, password', 'required'),
			array('login, name, password', 'length', 'max'=>255),
            array('password', 'length', 'min'=>6),
            array('login', 'unique'),
            array('password', 'compare', 'compareAttribute'=>'password2', 'on'=>'registration'),
            array('login', 'match', 'pattern' => '/^[A-Za-z0-9]+$/u','message' => 'Login contains illegal symbols.'),
            array('verify_code', 'captcha', 'allowEmpty'=>false, 'on'=>'registration'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, login, name, password, creation_date', 'safe', 'on'=>'search'),
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
			'comments' => array(self::HAS_MANY, 'Comment', 'user_id'),
			'likes' => array(self::HAS_MANY, 'Like', 'user_id'),
			'posts' => array(self::HAS_MANY, 'Post', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
        //todo: translate
		return array(
			'id' => Yii::t("app", "Id"),
			'login' => Yii::t("app", "User login"),
			'name' => Yii::t("app", "Name"),
			'password' => Yii::t("app", "Password"),
            'password2' => Yii::t("app", "Repeat password"),
			'creation_date' => Yii::t("app", "Creation date"),
            'verify_code' => Yii::t("app", "Verify code"),
        );
	}

    public function safeAttributes()
    {
        return array('login', 'name', 'password', 'password2', 'verify_code');
    }

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('creation_date',$this->creation_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

}
