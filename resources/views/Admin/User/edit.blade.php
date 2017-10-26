@extends('Admin.Layout.index')

@section('content')

<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/Admin/User/{{$data->id}}" method="post">
    		{{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">用户名</label>
    				<div class="mws-form-item">
    					<input type="text" name="name" placeholder="{{$data->name}}" disabled class="small">
    				</div>
    			</div>
    		</div>
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">年龄</label>
                    <div class="mws-form-item">
                        <input type="text" name="age" value="{{$data->age}}" class="small">
                    </div>
                </div>
            </div>
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">邮箱</label>
    				<div class="mws-form-item">
    					<input type="text" name="email" value="{{$data->email}}" class="small">
    				</div>
    			</div>
    		</div>
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">手机号</label>
    				<div class="mws-form-item">
    					<input type="text" name="phone" value="{{$data->phone}}" class="small">
    				</div>
    			</div>
    		</div>
    		<div class="mws-button-row">
    			<input type="submit" value="提交" class="btn btn-danger">
    			<input type="reset" value="重置" class="btn ">
    		</div>
    	</form>
    </div>    	
</div>

@endsection