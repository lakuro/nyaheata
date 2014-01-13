<?php
// モデル設定

App::import('Model', 'AdminData');
class AdminBaseComponent extends Component {
	
	function getAdminDataByUser($user, $pass) {
		
		$this->log('checkAdminDataByUser start ID/PW login : '.$user.'/'.$pass, LOG_DEBUG);
		
		$adminDataModel = new AdminData();
		
		$adminData = array();
		
		// ユーザ名とパスワードが一致するデータを取得
		$adminData = $adminDataModel->findByUserAndPassword($user,$pass);
		
		$this->log($adminData, LOG_DEBUG);
		
		return $adminData;
		
	}
	
}