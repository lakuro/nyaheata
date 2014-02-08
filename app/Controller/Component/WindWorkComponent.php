<?php
// モデル設定

App::import('Model', 'WwColumnList');
class WindWorkComponent extends Component {
	
	/**
	 * 指定したIDのコラム情報を取得
	 * @return array
	 */
	function getColumnById($id) {
		
		$wwColumnListModel = new WwColumnList();
		
		$column = $wwColumnListModel->findById($id);
		
		return $column;
	}
	
	/**
	 * 指定したIDのコラム情報を取得
	 * @return array
	 */
	function getSortColumn() {
	
		$wwColumnListModel = new WwColumnList();
	
		$columns = $wwColumnListModel->find('all');
	
		return $columns;
	}
	
	/**
	 * コラム登録・更新
	 */
	function saveColumn($data) {
		$wwColumnListModel = new WwColumnList();
		
		$res = $wwColumnListModel->save($data);
		
		return $res;
	}
	
	/**
	 * コラムの削除
	 */
	function deleteColumn($id) {
		$wwColumnListModel = new WwColumnList();
		
		$res = $wwColumnListModel->delete($id);
		
		return $res;
	}
	
}