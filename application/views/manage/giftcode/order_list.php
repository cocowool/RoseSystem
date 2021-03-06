<?php $this->load->view('manage/giftcode/giftcode_submenu'); ?>
<div class="rs_container">
	<div class="rs_container_condition">
	
	</div>
	<div class="rs_container_table">
		<table id="rs_table" class="display standard_table" width="100%">
			<thead>
				<tr>
					<th></th>
					<th>礼品名称</th>
					<th>序列号</th>
					<th>密码</th>
					<th>客户姓名</th>
					<th>订单时间</th>
					<th>快递单号</th>
					<th>状态</th>
					<th>操作</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th></th>
					<th>礼品名称</th>
					<th>序列号</th>
					<th>密码</th>
					<th>客户姓名</th>
					<th>订单时间</th>
					<th>快递单号</th>
					<th>状态</th>
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
			"url":'/index.php/manage/giftcode/serverside',
			"type":"post",
			"data": function(d){
				d.source = 2;
			}
		},
		'columns':[
		    {"data":"id"},
			{"data":"product"},
			{"data":"serialnumber"},
			{"data":"password"},
			{"data":"cnname"},
			{"data":"create_at"},
			{"data":"express"},
			{"data":"status"},
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