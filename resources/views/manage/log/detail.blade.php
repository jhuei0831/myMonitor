@inject('button','App\Presenters\ButtonPresenter')
@extends('_layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white bg-info">
					<h4><i class="fas fa-clipboard-list"></i> LOG詳細資料</h4>
				</div>
                <div class="card-body">
                	<ul class="list-unstyled">
						<li>{{ $button->GoBack(route('log.index')) }}</li>
					</ul>
					<div class="table-responsive">
						<table class="table table-hover table-bordered">
							<thead>
								<tr class="table-info active">
									<th class="text-nowrap text-center">項目</th>
									<th class="text-nowrap text-center">資料</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>使用者</td>
									<td>{{ $log->user }}</td>
								</tr>
								<tr>
									<td>IP</td>
									<td>{{ $log->ip }}</td>
								</tr>
								<tr>
									<td>作業系統</td>
									<td>{{ $log->os }}</td>
								</tr>
								<tr>
									<td>瀏覽器</td>
									<td>{{ $log->browser }}</td>
								</tr>
								<tr>
									<td>瀏覽器詳細資料</td>
									<td>{{ $log->browser_detail }}</td>
								</tr>
								<tr>
									<td>動作</td>
									<td>{{ $log->action }}</td>
								</tr>
								<tr>
									<td>資料表</td>
									<td>{{ $log->table }}</td>
								</tr>
								<tr>
									<td>資料</td>
									<td><pre>{{ $log->data }}</pre></td>
								</tr>
								<tr>
									<td>建立時間</td>
									<td>{{ $log->created_at }}</td>
								</tr>
							</tbody>
						</table>
					</div>
                </div>
                <div class="card-footer">

				</div>
            </div>
        </div>
    </div>
</div>
@endsection
