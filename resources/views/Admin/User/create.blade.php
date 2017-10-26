@extends('Admin.Layout.index')

@section('content')
@if (count($errors) > 0)
    <div class="mws-form-message error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/Admin/User" method="post">
    		{{ csrf_field() }}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">用户名</label>
    				<div class="mws-form-item">
    					<input type="text" name="name" class="small">
    				</div>
    			</div>
    		</div>
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">年龄</label>
                    <div class="mws-form-item">
                        <input type="text" name="age" class="small">
                    </div>
                </div>
            </div>
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">邮箱</label>
    				<div class="mws-form-item">
    					<input type="text" name="email" class="small">
    				</div>
    			</div>
    		</div>
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">手机号</label>
    				<div class="mws-form-item">
    					<input type="text" name="phone" class="small">
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