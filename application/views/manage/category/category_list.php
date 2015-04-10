<h1>视频管理</h1>
<div class="rs_submenu">
	<div class="dropdown">
		<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
    		视频分类
    		<span class="caret"></span>
  		</button>
		<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
			<li role="presentation"><a role="menuitem" tabindex="-1" href="/manage/category">分类列表</a></li>
		    <li role="presentation"><a role="menuitem" tabindex="-1" href="/manage/category/add">新增分类</a></li>
		</ul>
	</div>
	<div class="dropdown">
		<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
    		视频列表
    		<span class="caret"></span>
  		</button>
		<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
			<li role="presentation"><a role="menuitem" tabindex="-1" href="#">视频列表</a></li>
		    <li role="presentation"><a role="menuitem" tabindex="-1" href="/manage/video/add">新增视频</a></li>
		</ul>
	</div>
</div>
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
				//d.position = $('#position').val();
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
				"defaultContent":"<a href='#'>删除</a>"
			}
		]
	});
});
</script>