<?php

// require_once(CONTROLLERS. 'AdminBase');
App::import("Controller" , "AdminBase");

class AdminController extends AdminBaseController {
	
	// コンポーネント設定
// 	public $components = array('AdminBase');
	
	// モデル設定
	var $uses = array ();
	function beforeFilter() {
		parent::beforeFilter ();
		
		// viewパス
		$this->viewPath = 'Pages/Admin';
		// レイアウトクラスオフ
		$this->layout = '';
	}
	
	/**
	 * index action
	 */
	function index() {
		$this->set('testData','入ったらいいな');
	}
	/**
	 * index action
	 */
	function login() {
		// postの場合はログインを行う
		if ($this->_isPostParams()) {
			$param = $this->_getRequestParams();
			
			$user = Set::extract ( 'user', $param );
			$pass = Set::extract ( 'pass', $param );
			
			$this->log ( 'login start ID/PASS : ' . $user . '/' . $pass, LOG_DEBUG );
			
			$res = $this->checkLogin ( $user, $pass );
			
			// 失敗した場合はエラー文言表示
			if (!$res) {
				$this->set('error', '1');
			}
		}
		
		// ログイン時
		if ($this->isLogin) {
			$this->redirect('/admin/index');
			exit;
		}
	}
	function phpinfo() {
		phpinfo();
	}
}