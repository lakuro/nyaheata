//html読み込み時、idタグに処理を紐付け
$(document).ready(function(){
	
	// 関連ページ追加
//	$("#addBindColBtn").click(function (){
//		console.log( "on addBindColBtn" );//TODO
//		
//		// 選択された関連ページのIDを追加
//		var i = $("#ColList").val() || [];
//		console.log(i); //TODO
//		
//		$('#selectBindCol').append($('<option>').html("追加される項目名").val(i));
//	});
	
	
//	$('#addBindColBtn').click(function(){
//		console.log( "on addBindColBtn" );//TODO
//		var i = $("#ColList");
//		console.log(i);//TODO
//		return;
//		// 選択した値を取得
//		var i = $("#ColList").val();
//		// 未選択の場合終了
//		if (i == null) {
//			return;
//		}
//		
//		console.log(i);//TODO
//		nowBind = $("#bindCol").val();
//		
//		if (nowBind == "") {
//			nowBind = i;
//		} else {
//			nowBind = nowBind + "," + i;
//		}
//		
//		$("#bindCol").val(nowBind)
//		// 選択項目を移動
//		$("#selectBindCol").append($("#ColList option:selected"));
//	});
//	
//	$('#delBindColBtn').click(function(){
//		console.log( "on delBindColBtn" );//TODO
//		
//		// 選択した値を取得
//		var i = $("#selectBindCol").val();
//		// 未選択の場合終了
//		if (i == null) {
//			return;
//		}
//		
//		// hiddonに入っている値を取得
//		bind = $("#bindCol").val();
//		delNumBind = bind.replace(i, "");
//		fixBind = delNumBind.replace(",,", ",");
//		
//		// 全て未選択状態の場合はクリア
//		if (fixBind == ",") {
//			$("#bindCol").val("");
//			return;
//		}
//		
//		$("#bindCol").val(fixBind)
//		// 選択項目を移動
//		$('#ColList').append($('#selectBindCol option:selected'));
//	});
	
	// コラム画面 ラジオボタン選択変更
	$('input[name="categoryId"]:radio').change( function() {  
		var selectCaterogyID;
		selectCaterogyID = $(this).val();
		
		// ラジオボタン選択前のものを非表示
		beforeItem = $('#beforeItemSelect').val();
		$("#itemSelect_"+ beforeItem).css("display", "none");

		// セレクトされたカテゴリのIDを生成
		$("#itemSelect_"+ selectCaterogyID).css("display", "");
		
		$('#beforeItemSelect').val(selectCaterogyID);
		
	});  
})