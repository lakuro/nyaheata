<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $viewClass = 'Smarty';
	public $components = array('Cookie');
	/**
	 * リクエストパラメータを取得する。
	 * @return array	リクエストパラメータ
	 */
	function _getRequestParams(){
		$params = null;
		if(strcasecmp($_SERVER['REQUEST_METHOD'], "post") == 0){
			$params = $this->params['data'];
		} else if(strcasecmp($_SERVER['REQUEST_METHOD'], "get") == 0){
			$params = $this->params['url'];
// 			// Cakeが追加した変数を削除
// 			unset($params['url']);
		}
	
		return $params;
	}
	
	/**
	 * postかgetか判定
	 */
	function _isPostParams() {
		if(strcasecmp($_SERVER['REQUEST_METHOD'], "post") == 0){
			// ブラウザからHTMLページを要求された場合
			return true;
		}else{
			// フォームからPOSTによって要求された場合
			return false;
		}
	}
	/**
	 * cookie作成用
	 */
	function setCookie($name, $value,$enc = true, $time='7200') {
		$this->Cookie->write($name, $value, $enc, $time);
	}
	
	/**
	 * cookie 読み込み用
	 */
	function readCookie($name) {
		return $this->Cookie->read($name);
	
	}
}

