<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	
	private $_id;
	private $_username;
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
			
			//če je uporabnik med dovoljenimi uporabniki
			// dobi userja iz baze glede na uporabnisko ime
			$user=Users::model()->findByAttributes(array('username'=>$this->username));
			if($user){
				//ce user obstaja preveri ce se gelo ujema
				//echo $user->username;
				//echo $user->password;
				$parts	= explode( ':', $user->password );
				$crypt	= $parts[0];
				$salt	= @$parts[1];
				
				$testcrypt = JUserHelper::getCryptedPassword($this->password, $salt);
				if ($crypt == $testcrypt) {
					//geslo se ujema
					$this->_id = $user->id;
					$this->_username = $user->username;
					$this->errorCode=self::ERROR_NONE;
				} else {
					//geslo se ne ujema
					$this->errorCode=self::ERROR_PASSWORD_INVALID;
				}
			}
			else{
				//uporabnika ni v bazi
				$this->errorCode=self::ERROR_USERNAME_INVALID;
			}

			
		return !$this->errorCode;
	}
	
	public function getId()
    {
        return $this->_id;
    }
	public function getName()
    {
        return $this->_username;
    }
}