@inject('button','App\Presenters\ButtonPresenter')
@extends('_layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('notifications.store') }}" method="POST">
                    <div class="card-header text-white bg-info">
                        <h4><i class="fas fa-user-circle"></i> 新增快速廣播</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li>{!! $button->GoBack(route('notifications.index')) !!}</li>
                        </ul>
                        @csrf
                        <div class="form-group">
                            <label for="title">標題</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="必填">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <select class="custom-select" name="icon">
                                <option>null</option>
                                <option>error</option>
                                <option>success</option>
                                <option>info</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message">訊息內容</label>
                            <input type="text" class="form-control @error('message') is-invalid @enderror" id="message" name="message" value="{{ old('message') }}" placeholder="必填">
                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="footer">底部內容</label>
                            <input type="text" class="form-control @error('footer') is-invalid @enderror" id="footer" name="footer" value="{{ old('footer') }}" placeholder="必填">
                            @error('footer')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="width">底部內容</label>
                            <input type="number" class="form-control @error('width') is-invalid @enderror" id="width" name="width" value="{{ old('width') }}" placeholder="必填">
                            @error('width')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <input type="submit" class="btn btn-primary" value="新增">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
