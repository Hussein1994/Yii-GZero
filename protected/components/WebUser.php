<?php
class WebUser extends CWebUser {
 
	// Store model to not repeat query.
	private $_model;
	private $_email;
	private $_client;

	// Return first name.
	// access it by Yii::app()->user->email
	function getEmail(){
		$user = $this->loadUser(Yii::app()->user->id);
		if($user){
			$this->_email = $user->email; return $this->_email;
			}
		else{
			return 'none';
		}
	}
	
	// Load user model.
	protected function loadUser($id=null)
    {
        if($this->_model===null)
        {
            if($id!==null)
                $this->_model=User::model()->findByPk($id);
        }
        return $this->_model;
    }
}