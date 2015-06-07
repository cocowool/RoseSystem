<?php $this->load->view('manage/article/article_submenu'); ?>
<div class="rs_container">
	<div class="rs_container_condition">
	
	</div>
	<div class="rs_container_table">
		<table id="rs_table" class="display standard_table" width="100%">
			<thead>
				<tr>
					<th></th>
					<th>图片</th>
					<th>图片描述</th>
					<th>关联文章</th>
					<th>排序</th>
					<th>操作</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th></th>
					<th>图片</th>
					<th>图片描述</th>
					<th>关联文章</th>
					<th>排序</th>
					<th>操作</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	
	
	var dt = $('#rs_table').DataTable({
		'processing': true,
		'serverSide': true,
		'stateSave': true,
		'language': {
			'paginate': {
				'previous':'前一页',
				'next':'下一页'
			},
			'search': '搜索',
			'lengthMenu': '每页 _MENU_ 条记录',
			'info': '当前页为 _PAGE_ 共 _PAGES_',
			'infoEmpty':'没有找到记录'
		},
		'ajax': {
			"url":'/index.php/manage/resource/serverside',
			"type":"post",
			"data": function(d){
				d.aid = <?php echo $aid; ?>;
			}
		},
		'columns':[
		    {"data":"id"},
			{"data":"image"},
			{"data":"description"},
			{"data":"aid"},
			{"data":"sort"},
			{
				"class":"operation-control",
				"orderable":false,
				"data":"operation",
				"defaultContent":""
			}
		]		
	});


	//点击文本框复制其内容到剪贴板上方法
	function copyToClipboard(txt) {
	    if (window.clipboardData) {
	        window.clipboardData.clearData();
	        window.clipboardData.setData("Text", txt);
	        alert("已经成功复制到剪帖板上！");
	    } else if (navigator.userAgent.indexOf("Opera") != -1) {
	        window.location = txt;
	    } else if (window.netscape) {
	        try {
	            netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
	        } catch (e) {
	            alert("被浏览器拒绝！\n请在浏览器地址栏输入'about:config'并回车\n然后将'signed.applets.codebase_principal_support'设置为'true'");
	        }
	        var clip = Components.classes['@mozilla.org/widget/clipboard;1'].createInstance(Components.interfaces.nsIClipboard);
	        if (!clip) return;
	        var trans = Components.classes['@mozilla.org/widget/transferable;1'].createInstance(Components.interfaces.nsITransferable);
	        if (!trans) return;
	        trans.addDataFlavor('text/unicode');
	        var str = new Object();
	        var len = new Object();
	        var str = Components.classes["@mozilla.org/supports-string;1"].createInstance(Components.interfaces.nsISupportsString);
	        var copytext = txt;
	        str.data = copytext;
	        trans.setTransferData("text/unicode", str, copytext.length * 2);
	        var clipid = Components.interfaces.nsIClipboard;
	        if (!clip) return false;
	        clip.setData(trans, null, clipid.kGlobalClipboard);
	        alert("已经成功复制到剪帖板上！");
	    }
	}

// 	$("#rs_table .ys_copylink").live('click', function(){
// 		//alert('TEST');
// 		console.log('TEST');
// 	});

	$('[data-toggle="popover"]').popover();
	
	$('#rs_table').delegate('.ys_copylink', 'click', function(e){
		e.preventDefault();
		copyToClipboard($(this).attr('href'));
	});
});
</script>