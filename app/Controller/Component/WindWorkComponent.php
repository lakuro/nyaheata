<?php
// モデル設定

App::import('Model', 'WwColumnList');
class WindWorkComponent extends Component {
	
	function test() {
		echo 'test';
		die;
	}
	
	/**
	 * 指定したIDのカラム情報を取得
	 * @return array
	 */
	function getColumnById($id) {
		
		$wwColumnListModel = new WwColumnList();
		
		$column = $wwColumnListModel->findById($id);
		
		return $column;
	}
	
	/**
	 * 指定したIDのカラム情報を取得
	 * @return array
	 */
	function getSortColumn() {
	
		$wwColumnListModel = new WwColumnList();
	
		$columns = $wwColumnListModel->find('all');
	
		return $columns;
	}
}