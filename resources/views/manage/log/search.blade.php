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
                        <p>
                            <button class="btn btn-sm btn-info text-white" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fas fa-filter"></i> 篩選
                            </button>
                            {{ $button->To(route('log.index'), 'undo', 'btn-dark', '', '重置') }}
                        </p>
                        <div class="collapse" id="collapseExample">
                            <form action="{{ route('log.search') }}" method="post">
                            @csrf
                                <div class="card card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="IP">IP</label>
                                            <input type="text" class="form-control @error('IP') is-invalid @enderror" id="IP" name="IP" value="{{ old('IP') }}" placeholder="必填">
                                            @error('IP')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="browser">瀏覽器</label>
                                            <select class="custom-select" name="browser">
                                                <option value="">請選擇</option>
                                                @foreach (Config::get('variables.config.browser') as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="action">動作</label>
                                            <select class="custom-select" name="action">
                                                <option value="">請選擇</option>
                                                @foreach (Config::get('variables.config.action') as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="table">資料表</label>
                                            <select class="custom-select" name="table">
                                                <option value="">請選擇</option>
                                                @foreach (Config::get('variables.config.table') as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>  
                                    <button type="submit" class="btn btn-sm btn-secondary">
                                        <i class="fas fa-search"></i> 搜尋
                                    </button>                            
                                </div>
                            </form>
                        </div>
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
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($logs_search as $log)
                                    <tr>
                                        <td>{{ $log->user }}</td>
                                        <td>{{ $log->ip }}</td>
                                        <td>{{ $log->browser }}</td>
                                        <td>{{ $log->action }}</td>
                                        <td>{{ $log->table }}</td>
                                        <td>{{ $log->created_at }}</td>
                                        <td>{{ $button->detail(route('log.detail', $log->id)) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>              
                </div>
                <div class="card-footer text-center">
                    {!! $logs_search->links("pagination::bootstrap-4") !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
