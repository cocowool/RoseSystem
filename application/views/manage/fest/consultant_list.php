<?php $this->load->view('manage/fest/fest_submenu'); ?>
<div class="rs_container">
	<div class="rs_container_condition">
	
	</div>
	<div class="rs_container_table">
		<table id="rs_table" class="display standard_table" width="100%">
			<thead>
				<tr>
					<th></th>
					<th>悦食大会</th>
					<th>顾问头像</th>
					<th>顾问姓名</th>
					<th>顾问排序</th>
					<th>操作</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th></th>
					<th>悦食大会</th>
					<th>顾问头像</th>
					<th>顾问姓名</th>
					<th>顾问排序</th>
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
			"url":'/index.php/manage/fest/serverside',
			"type":"post",
			"data": function(d){
				d.source = 'consultant';
			}
		},
		'columns':[
		    {"data":"id"},
			{"data":"fid"},
			{"data":"f_pic"},
			{"data":"f_name"},
			{"data":"f_order"},
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