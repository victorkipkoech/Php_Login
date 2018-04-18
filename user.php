<?php

class User{
	protected $loggedIn=false;
	protected $data=[];

	public function getData(){
		return $this->data;

	}
	public function setData($data){
		$this->data=$data;
	}
	public function isloggedIn(){
		return $this->loggedIn;
	}
}
// $user = new User;
// if ($user->isloggedIn()) {
// 	echo 'You are logged in';
// }
$rc =new ReflectionClass('User');
// echo '<pre>'.print_r(get_class_methods($rc), true);
echo $rc->getName();
?>