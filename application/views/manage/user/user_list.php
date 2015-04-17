<?php $this->load->view('manage/video/video_submenu'); ?>
<div class="rs_container">
	<div class="rs_container_condition">
	
	</div>
	<div class="rs_container_table">
		<table id="rs_table" class="display standard_table" width="100%">
			<thead>
				<tr>
					<th></th>
					<th>用户名</th>
					<th>性别</th>
					<th>居住地</th>
					<th>电子邮件</th>
					<th>手机</th>
					<th>操作</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th></th>
					<th>用户名</th>
					<th>性别</th>
					<th>居住地</th>
					<th>电子邮件</th>
					<th>手机</th>
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
			"url":'/index.php/manage/user/serverside',
			"type":"post",
			"data": function(d){
				//d.position = $('#position').val();
			}
		},
		'columns':[
		    {"data":"id"},
			{"data":"username"},
			{"data":"gender"},
			{"data":"hometown"},
			{"data":"email"},
			{"data":"mobile"},
			{
				"class":"operation-control",
				"orderable":false,
				"data":"operation",
				"defaultContent":""
			}
		]		
	});
});
</script>