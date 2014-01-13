<?php

// require_once(CONTROLLERS. 'AdminBase');
App::import("Controller" , "AdminBase");

class AdminProgramingController extends AdminBaseController {
	
	// コンポーネント設定
// 	public $components = array('AdminBase');
	
	// モデル設定
	var $uses = array ();
	function beforeFilter() {
		parent::beforeFilter ();
		
		// viewパス
		$this->viewPath = 'Pages/Admin/Programing';
		// レイアウトクラスオフ
		$this->layout = '';
	}
	
	/**
	 * index action
	 */
	function index() {
	}
	function column() {
		$this->render('column');
	}
	
	// コラム保存 action
	function execute() {
		// post以外は不正なのでリダイレクト
		if (!$this->_isPostParams()) {
			$this->redirect('/admin/programing/index/');
		}
		
		$param = $this->_getRequestParams();
		var_dump($param);
		die;
	}
}