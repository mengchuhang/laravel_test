@extends('Admin.Layout.index')

@section('css')
	#pagination{

	}
@endsection
@section('content')

<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span>{{$title}}</span>
	</div>
	<div class="mws-panel-body no-padding">
	    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
	    	<div class="dataTables_filter" id="DataTables_Table_1_filter">
	    	<form action="">
	    		<label>关键词： 
	    			<input type="text" name="search" aria-controls="DataTables_Table_1">
	    			<button>搜索</button>
	    		</label>
	    	</form>
	    	</div>
	    	<table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
	        <thead>
	            <tr role="row">
	            	<th>ID</th>
	            	<th>用户名</th>
	            	<th>年龄</th>
	            	<th>邮箱</th>
	            	<th>手机号</th>
	            	<th>操作</th>
	            </tr>
	        </thead>
	        
		    <tbody role="alert" aria-live="polite" aria-relevant="all">
		    	@foreach($data as $v)
		    	<tr class="odd">
		            <td>{{$v->id}}</td>
		            <td>{{$v->name}}</td>
		            <td>{{$v->age}}</td>
		            <td>{{$v->userinfo->email}}</td>
		            <td>{{$v->userinfo->phone}}</td>
		            <td>
		            	<form action="/Admin/User/{{$v->id}}/edit" method="get" style="display: inline;">
							<button class="btn btn-info">修改</button>
		            	</form>
		            	<form action="/Admin/User/{{$v->id}}" method="post" style="display: inline;">
		            		{{csrf_field()}}
		            		<input type="hidden" name="_method" value="DELETE">
							<button class="btn btn-info">删除</button>
		            	</form>
						<form action="/Admin/User/{{$v->id}}" method="get" style="display: inline;">
							<button class="btn btn-info">查看用户信息</button>
		            	</form>
		            </td>
		        </tr>
				@endforeach
		    </tbody>
	    </table>

	    <div class="dataTables_info" id="DataTables_Table_1_info">Showing 1 to 10 of 57 entries</div>
	 </div>
	</div>

	</div>

@endsection