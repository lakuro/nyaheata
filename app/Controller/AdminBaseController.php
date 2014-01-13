<?php
class AdminBaseController extends AppController {

	// コンポーネント設定
	public $components = array('AdminBase', 'Cookie');
	
	// モデル設定
	var $uses = array ();
	
	public $isLogin = false;
	public $adminId = null;
	
	function beforeFilter() {
		parent::beforeFilter ();
		
		// ログインチェック
		$this->checkLogin();
		
		// 未ログイン時のみ
		if (!$this->isLogin) {
			// 管理画面ログインページ、認証ページの場合はリダイレクトしない
			if ($this->here != '/admin/login/') {
				$this->redirect('/admin/login/');
			}
		}
	}
	
	/**
	 * ログインチェック
	 */
	function checkLogin($user = null, $pass = null) {
		
		$this->log('checkLogin', LOG_DEBUG);
		// クッキーの存在チェック
		if ($this->adminId = $this->readCookie(Ny_CONFIG::$LOGIN_COOKIE_NAME)) {
			// クッキーに会員情報が存在する場合はチェックを行わない
			$this->isLogin = true;
			
			$this->log('cookieLogin', LOG_DEBUG);
			return ;
		}
		
		// ログイン実行時の以外の場合
		if ($user == null || $pass == null) {
			$this->log('no login', LOG_DEBUG);
			return ;
		}
		
		$this->log('ID/PW login', LOG_DEBUG);
		// ID/PWが正しいかチェック
		$adminData = $this->AdminBase->getAdminDataByUser($user, $pass);
		
		// 会員情報を取得できたかチェック
		if(!$adminData) {
			$this->log('login fail', LOG_DEBUG);
			return false;
		}
		
		$this->log('login success', LOG_DEBUG);
		
		// クッキーを作成
		$this->setCookie(Ny_CONFIG::$LOGIN_COOKIE_NAME, $adminData['AdminData']['id']);
		
		$this->isLogin = true;
		$this->adminId = $adminData['AdminData']['id'];
		
		return true;
		
	}
	
	/**
	 * アップロードファイルを画像名を変更してコピーする
	 *
	 * @param unknown $param
	 */
	function copyImg($upload_dir, $img_dir, $img_name) {
	
		// アップロードファイルの確認
		if (is_uploaded_file($upload_dir)) {
			$this->log('exit tmp_img :'.$upload_dir, LOG_DEBUG);
			// アップロードファイルの移動
			if (move_uploaded_file($upload_dir, $img_dir. $img_name)) {
				// アクセス制限の変更
				chmod($img_dir.$img_name , 0644);
				$this->log('success save tmp_img :'.$img_dir.$img_name, LOG_DEBUG);
				return true;
			} else {
				$this->log('failed save tmp_img :'.$img_dir.$img_name, LOG_DEBUG);
				return false;
			}
		} else {
			$this->log('no tmp_img', LOG_DEBUG);
			return false;
		}
	}
	

}