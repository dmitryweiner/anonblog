<?php

/**
 * This is the model class for table "{{post}}".
 *
 * The followings are the available columns in table '{{post}}':
 * @property integer $id
 * @property string $title
 * @property string $message
 * @property integer $user_id
 * @property string $creation_date
 *
 * The followings are the available model relations:
 * @property Comment[] $comments
 * @property Like[] $likes
 * @property User $user
 */
class Post extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{post}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, message, user_id, creation_date', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, message, user_id, creation_date', 'safe', 'on'=>'search'),
		);
	}

    public function defaultScope()
    {
        return array(
            'order'=>'post.creation_date DESC',
            'alias'=>'post'
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
			'comments' => array(self::HAS_MANY, 'Comment', 'post_id'),
            'commentsTotal' => array(self::STAT,  'Comment', 'post_id'),
			'likes' => array(self::HAS_MANY, 'Like', 'post_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t("app", "Id"),
            'title' => Yii::t("app", "Title"),
			'message' => Yii::t("app", "Message"),
			'creation_date' => Yii::t("app", "Creation date"),
		);
	}

	/**
	 * Calculates total likes ratio for the specific post
	 *
	 * @return int
	 */
    public function getLikesRate() {
        $sql = 'select sum(reaction) from tbl_like where post_id = :id';
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(':id', $this->id, PDO::PARAM_STR);
        $likes= $command->queryScalar();
        return (int) $likes;
    }

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('creation_date',$this->creation_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Post the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
