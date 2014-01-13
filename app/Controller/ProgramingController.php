<?php

// require_once(CONTROLLERS. 'AdminBase');
// App::import("Controller" , "AdminBase");

class ProgramingController extends AppController {
	
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
		echo 'index';
		exit;
	}
	
	/**
	 * column action
	 */
	function column() {
		echo 'column';
		exit;
	}
}