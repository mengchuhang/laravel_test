@extends('Admin.Layout.index')

@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
            <div class="dataTables_filter" id="DataTables_Table_1_filter">
                <label>Search: 
                    <input type="text" aria-controls="DataTables_Table_1">
                </label>
            </div>
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
            <thead>
                <tr role="row">
                    <th>ID</th>
                    <th>文章</th>
                    <th>内容</th>
                </tr>
            </thead>
            
            <tbody role="alert" aria-live="polite" aria-relevant="all">
                @foreach($data as $v)
                <tr class="odd">
                    <td>{{$v->id}}</td>
                    <td>{{$v->title}}</td>
                    <td>{{$v->content}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>

@endsection