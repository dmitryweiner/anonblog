<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{

    private $_id;

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{

        $record=User::model()->findByAttributes(array('login'=>$this->username));

        if($record===null) {
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        } else if(!CPasswordHelper::verifyPassword($this->password,$record->password)) {
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        } else {
            $this->_id=$record->id;
            Yii::app()->user->setState('login', $record->login);
            $this->errorCode=self::ERROR_NONE;
            if ($this->username == 'admin') {
                Yii::app()->user->setState('isAdmin', true);
            }
        }
		return !$this->errorCode;
	}

    public function getId()
    {
        return $this->_id;
    }

}