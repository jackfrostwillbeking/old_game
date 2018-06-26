var until_game  = 3;//開始ボタン押してからゲーム開始までの時間
var game_remain = 3;//ゲーム中の入力可能時間
/*
 *  StartClick : 
 *    ゲーム開始までのカウントダウンを開始する
 *    countDown呼び出し
 *  @param 
 *  @return 
 */
function StartClick(btn) {
    btn.disabled=true;//連続クリック防止
    countDown(until_game);
//    btn.disabled=false;//連続クリック防止解除
 };
 /*
 *  countDown : 
 *    カウントダウンしゲーム開始後入力フォームを初期化
 *    getGameResultを呼び出し
 *  @param {number} remaintime 残り時間(sec)
 */
function countDown(remaintime) {
    if(remaintime > 0){
    	$("#Timer").text('ゲーム開始まで' +remaintime +'秒');
    	setTimeout(function(){countDown(remaintime - 1)}, 1000);
    } else {
    	//終了時の処理
    	$("#Timer").text('スタート！');
        input.value = '';//入力場所初期化
        setTimeout(function(){getGameResult(game_remain)}, 1000);
    }
 }
 /*
 *  getGameResult : 
 *   ゲーム開始〜終了までカウントダウン
 *   終了後文字数カウントしDB保存api呼び出し
 *  @param {number} remaintime 残り時間(sec)
 */
 function getGameResult(remaintime) {
    if(remaintime > 0){
    	$("#Timer").text('ゲーム終了まで' +remaintime +'秒');
    	setTimeout(function(){getGameResult(remaintime - 1)}, 1000);
    } else {
    	//終了時の処理
        var name = $("li").text();
        var score = input.value.length;
        $.ajax({
            type: "POST",
            url: "login.php",
            data: {
                mode  : "insert",
                score : score,
                name  : name,
            },
            success: function(){
    	        $("#Timer").text('終了！そのままリロードしてください');
                location.reload();
            }
        });
    }
 }