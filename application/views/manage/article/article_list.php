<?php $this->load->view('manage/article/article_submenu'); ?>
<div class="rs_container">
	<div class="rs_container_condition">
	
	</div>
	<div class="rs_container_table">
		<table id="rs_table" class="display standard_table" width="100%">
			<thead>
				<tr>
					<th></th>
					<th>文章名称</th>
					<th>分类</th>
					<th>封面图</th>
					<th>排序</th>
					<th>图片资源</th>
					<th>更新时间</th>
					<th>操作</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th></th>
					<th>文章名称</th>
					<th>分类</th>
					<th>封面图</th>
					<th>排序</th>
					<th>图片资源</th>
					<th>更新时间</th>
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
		"orderFixed": [6, 'desc'],
		'ajax': {
			"url":'/index.php/manage/article/serverside',
			"type":"post",
			"data": function(d){
				//d.position = $('#position').val();
			}
		},
		'columns':[
		    {"data":"id"},
			{"data":"name"},
			{"data":"category"},
			{"data":"cover"},
			{"data":"sort"},
			{"data":"resource"},
			{"data":"update_at"},
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