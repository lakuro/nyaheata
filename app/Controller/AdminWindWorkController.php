<?php

// require_once(CONTROLLERS. 'AdminBase');
App::import("Controller" , "AdminBase");
//App::import("Config" , "br_outlet");
require_once(APP.'Config'.DS.'windWork.php');
class AdminWindWorkController extends AdminBaseController {
	
	// コンポーネント設定
 	public $components = array('WindWork');
	
	// モデル設定
	var $uses = array ();
	function beforeFilter() {
		parent::beforeFilter ();
		
		// viewパス
		$this->viewPath = 'Pages/Admin/windWork';
		// レイアウトクラスオフ
		$this->layout = '';
		
		// 基本設定
		// カテゴリー設定
		$category = WIND_WORK_CONFIG::$CATEGORY;
		$this->set('category', $category);
		
		// サブカテゴリー
		$sub_category = WIND_WORK_CONFIG::$SUB_CATEGORY;
		$this->set('sub_category', $sub_category);
		
		// カテゴリーアイテムマッピングの設定
		$categoryItemMap = WIND_WORK_CONFIG::$CATEGORY_ITEMS_MAPPING;
		$this->set('categoryItemMap', $categoryItemMap);
	}
	
	/**
	 * 企業画像設定画面
	 */
	function prjImgSetting() {
		// パラメータの判定
		if (!isset($this->data['caterogy'])) {
			$this->set('prjType', '1');
		}
		// 事業カテゴリの取得
		$category = WIND_WORK_CONFIG::$CATEGORY;
		$this->set('caterogy', $category);
		// ブラウザキャッシュの削除
		$this->response->disableCache();
	}
	
	/**
	 * 企業画像設定保存
	 */
	function prjImgSettingExecute() {
		// post以外は不正なのでリダイレクト
		if (!$this->_isPostParams()) {
			$this->redirect('/admin/brOutlet/prjImgSetting/');
		}
		
		// 画像ディレクトリの設定
		$img_dir = WWW_ROOT. WIND_WORK_CONFIG::$CATEGORY_IMG_DIR;
		
		// 一時画像名の設定
		$tmp_img_name = $this->data['caterogy'].WIND_WORK_CONFIG::$CATEGORY_IMG_TYPE;
		
		// アップロード画像をtmp画像として保存
		$copy_res = $this->copyImg($this->data['selectImj']['tmp_name'], $img_dir, $tmp_img_name);
		
		// コピーに失敗した場合
		if (!$copy_res) {
			$this->set('error','1');
		}
		$this->response->disableCache();
		$this->set('prjType', $this->data['caterogy']);
		$this->setAction('prjImgSetting');
	}
	
	/**
	 * カラム管理 一覧
	 */
	function productList() {
		$columns = $this->WindWork->getSortColumn();
		
		$this->data = $columns;
		$this->set('data', $this->data);
	}
	
	/**
	 * カラム管理 詳細
	 */
	function productColumn() {
		
		$params = $this->_getRequestParams();
		$id = Set::extract('/id', $params);
		
		$column = array();
		// idチェック
		if ($id != null) {
			$column = $this->WindWork->getColumnById($id);
		}
		
		$this->data = $column;
		var_dump($this->data);
		$this->set('data', $this->data);
	}
	
	/**
	 * カラム管理 保存実行
	 */
	function productColumnExecute() {
		// post以外は不正なのでリダイレクト
		if (!$this->_isPostParams()) {
			$this->redirect('/admin/brOutlet/prjImgSetting/');
		}
		
		$params = $this->_getRequestParams();
		var_dump($this->data);
		die;
		// 事業カテゴリの取得dItem', $prjCategoryItem);
	}
}