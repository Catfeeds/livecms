/**
 * 封装js弹层
 */
 var dialog = {

 	/**
 	 * 错误弹层
 	 * @param string message 提示信息
 	 */
 	error : function(message) {
 		layer.open({
 			content : message,
 			icon    : 2,
 			time    : 3000,
 			title   : '提示',
 			btn     : [],
 			closeBtn: 1,
 			shade   : 0.3,
 			offset  : 't',
 		});
 	},

 	/**
 	 * 成功弹层
 	 * @param string message 提示信息
 	 * @param string url 成功之后跳转地址
 	 */
 	success : function(message, url) {
 		layer.open({
 			content : message,
 			icon    : 1,
 			time    : 1500,
 			title   : '提示',
 			btn     : [],
 			closeBtn: 0,
 			shade   : 0.3,
 			offset  : 't',
 			end     : function() {
 				location.href = url;
 			}
 		});
 	},

 	loading : function(){
 		var layerloading = layer.msg('数据加载中, 请稍等...', {
          icon  : 16,
          shade : 0.3,
          time  : 0,
          offset:'t',
        });
 	},

 	/**
 	 * 表单数据提交
 	 * @param string url 数据处理地址
 	 * @param string href 成功之后跳转地址
 	 */
 	presentForm : function(url, href) {
 		$.ajax({
 			type 		: 'POST',
 			url         : url,
 			data        : $('#dataSet').serialize(),
 			beforeSend  : function() {
		 					dialog.loading();
		 	},
 			success     : function(info) {
 				if(info.code == '201') {
 					dialog.error(info.msg);
 				} else {
 					dialog.success(info.msg, href);
 				}
 			}
 		});
 	},

 	/**
 	 * 确认弹层
 	 * @param string message 确认框提示信息
 	 * @param string url 数据处理地址
 	 * @param string href 成功之后跳转地址
 	 * @param string data 数据
 	 */
 	confirm : function(message, url, href, data) {
 		layer.open({
 			content : message,
 			icon    : 3,
 			title   : '提示',
 			btn     : ['确认', '取消'],
 			offset  : 't',
 			shade   : 0,
 			yes     : function() {
 				//点击确认之后
 				$.ajax({
		 			type 		: 'POST',
		 			url         : url,
		 			data        : {data : data},
		 			beforeSend  : function() {
		 				dialog.loading();
		 			},
		 			success     : function(info) {
		 				if(info.code == '201') {
		 					dialog.error(info.msg);
		 				} else {
		 					dialog.success(info.msg, href);
		 				}
		 			}
		 		});
 			}
 		});
 	},


 }