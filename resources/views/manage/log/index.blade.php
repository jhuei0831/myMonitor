@inject('button','App\Presenters\ButtonPresenter')
@extends('_layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-light"><i class="fas fa-podcast"></i>&nbsp;LOG</div>

                <div class="card-body">
                    <ul class="list-unstyled">
                        {{-- <li>{!! $button->create() !!}</li> --}}
                    </ul>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>使用者</td>
                                    <td>IP</td>
                                    <td>瀏覽器</td>
                                    <td>動作</td>
                                    <td>資料表</td>
                                    <td>建立時間</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($logs as $log)
                                    <tr>
                                        <td>{{ $log->user }}</td>
                                        <td>{{ $log->ip }}</td>
                                        <td>{{ $log->browser }}</td>
                                        <td>{{ $log->action }}</td>
                                        <td>{{ $log->table }}</td>
                                        <td>{{ $log->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>              
                </div>
                <div class="card-footer text-center">
                    {!! $logs->links("pagination::bootstrap-4") !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
