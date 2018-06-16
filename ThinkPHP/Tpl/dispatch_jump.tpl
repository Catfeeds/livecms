<?php
    if(C('LAYOUT_ON')) {
        echo '{__NOLAYOUT__}';
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>提示</title>
<style>
	p{
		display: none;
	}
	html{
		font-family: 微软雅黑;
	}
</style>
<script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/layer/layer.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/dialog.js"></script>
</head>
<body>
	<?php if(isset($message)) {?>
	<p class="msgsuccess"><?php echo($message); ?></p>
	<?php }else{?>
	<p class="msgerror"><?php echo($error); ?></p>
	<?php }?>
	<a id="href" href="<?php echo($jumpUrl); ?>"></a> 
	<script type="text/javascript">
	var msgsuccess = $('.msgsuccess').html();
	var msgerror   = $('.msgerror').html();
	if(msgsuccess) {
		var msg = msgsuccess;
	} else {
		var msg = msgerror;
	}
		layer.open({
 			content : msg,
 			icon    : 2,
 			time    : 3000,
 			title   : '提示',
 			btn     : [],
 			closeBtn: 0,
 			shade   : 0,
 			offset  : 't',
 			end     : function() {
 				var href = document.getElementById('href').href;
 				location.href = href;
 			}
 		});

// (function(){
// var wait = document.getElementById('wait'),href = document.getElementById('href').href;
// var interval = setInterval(function(){
// 	var time = --wait.innerHTML;
// 	if(time <= 0) {
// 		location.href = href;
// 		clearInterval(interval);
// 	};
// }, 1000);
// })();
</script>
</body>
</html>
