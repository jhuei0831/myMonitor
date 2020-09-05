@inject('button','App\Presenters\ButtonPresenter')
@extends('_layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('channels.store') }}" method="POST">
                    <div class="card-header text-white bg-info">
                        <h4><i class="fas fa-podcast"></i>&nbsp;新增頻道</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li>{!! $button->GoBack(route('channels.index')) !!}</li>
                        </ul>
                        <div class="alert alert-warning"><font color="red">*</font> 為必填</div>
                        @csrf
                        <div class="form-group">
                            <label for="name"><font color="red">*</font> 頻道名稱</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="必填">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">密碼</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <input type="submit" class="btn btn-success" value="新增">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
