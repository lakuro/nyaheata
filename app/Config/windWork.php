<?php
/**
 * コンフィギュレーションクラス
 */
class WIND_WORK_CONFIG {
	
	/** 事業カテゴリーリスト */
	public static $CATEGORY = array(
											'1' =>'建築',
											'2' =>'改修・解体'
										);
	
	/** 事業詳細リスト  */
	public static $SUB_CATEGORY = array(
											'1' => 'テスト1',
											'2' => 'テスト2',
											'3' => 'テスト3',
										);
	
	/** 事業詳細マッピング*/
	public static $CATEGORY_ITEMS_MAPPING = array(
											'1' => array('1', '2'),
											'2' => array('3')
										);
	
	/** 事業画像格納先*/
	public static $CATEGORY_IMG_DIR = 'img/prj_category_imj/';
	
	public static $CATEGORY_IMG_TYPE = '.jpg';
	
}