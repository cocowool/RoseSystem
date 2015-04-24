<?php 
switch($category_type){
	case 1:
	default:
		$this->load->view('manage/article/article_submenu'); 
		break;
	case 2:
		$this->load->view('manage/video/video_submenu'); 
		break;
}

?>
<div class="rs_container">
	<div class="rs_container_condition">
	
	</div>
	<div class="rs_container_table">
		<table id="rs_table" class="display standard_table" width="100%">
			<thead>
				<tr>
					<th></th>
					<th>栏目名称</th>
					<th>栏目描述</th>
					<th>上级栏目</th>
					<th>栏目排序</th>
					<th>操作</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th></th>
					<th>栏目名称</th>
					<th>栏目描述</th>
					<th>上级栏目</th>
					<th>栏目排序</th>
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
			"url":'/index.php/manage/category/serverside',
			"type":"post",
			"data": function(d){
				d.ctype = <?php echo $category_type; ?>;
			}
		},
		'columns':[
		    {"data":"id"},
			{"data":"category"},
			{"data":"description"},
			{"data":"parent"},
			{"data":"sort"},
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