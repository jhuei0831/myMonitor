@inject('button','App\Presenters\ButtonPresenter')
@extends('_layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-light"><i class="fas fa-podcast"></i>&nbsp;頻道列表</div>

                <div class="card-body">
                    <ul class="list-unstyled">
                        <li>{!! $button->create() !!}</li>
                    </ul>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>UUID</td>
                                    <td>頻道名稱</td>
                                    <td>是否有密碼</td>
                                    <td>建立時間</td>
                                    <td>修改時間</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($channels as $channel)
                                    <tr>
                                        <td>{{ $channel->uuid }}</td>
                                        <td>{{ $channel->name }}</td>
                                        <td>{{ $channel->password == 'NULL' ? 'YES' : 'NO' }}</td>
                                        <td>{{ $channel->created_at }}</td>
                                        <td>{{ $channel->updated_at }}</td>
                                        <td>{!! $button->edit($channel->id) !!}&nbsp;{!! $button->deleting($channel->id) !!}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>              
                </div>
                <div class="card-footer text-center">
                    {!! $channels->links("pagination::bootstrap-4") !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
