@inject('button','App\Presenters\ButtonPresenter')
@extends('_layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('notifications.update', $notification->id) }}" method="POST">
                    <div class="card-header text-white bg-info">
                        <h4><i class="fas fa-user-circle"></i> 修改快速廣播</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li>{!! $button->GoBack(route('notifications.index', $notification->channel->id)) !!}</li>
                        </ul>
                        @csrf
                        <div class="form-group">
                            <label for="title">標題</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $notification->title }}" placeholder="必填">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <select class="custom-select" name="icon">
                                @foreach (Config::get('variables.notification.icon') as $item)
                                    <option {{ $notification->icon == $item ? 'selected' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message">訊息內容</label>
                            <input type="text" class="form-control @error('message') is-invalid @enderror" id="message" name="message" value="{{ $notification->message }}" placeholder="必填">
                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="footer">底部內容</label>
                            <input type="text" class="form-control @error('footer') is-invalid @enderror" id="footer" name="footer" value="{{ $notification->footer }}" placeholder="必填">
                            @error('footer')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="width">寬度</label>
                            <input type="number" min="600" class="form-control @error('width') is-invalid @enderror" id="width" name="width" value="{{ $notification->width }}" placeholder="必填">
                            @error('width')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <input type="submit" class="btn btn-success" value="修改">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
