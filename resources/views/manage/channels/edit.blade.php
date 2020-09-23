@inject('button','App\Presenters\ButtonPresenter')
@extends('_layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('channels.update', $channel->id) }}" method="POST">
                    <div class="card-header text-white bg-info">
                        <h4><i class="fas fa-user-circle"></i> 修改頻道</h4>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-warning">
                            加密打勾後密碼和密碼確認為必填。
                        </div>
                        <ul class="list-unstyled">
                            <li>{!! $button->GoBack(route('home')) !!}</li>
                        </ul>
                        @csrf
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_password" value="" id="is_password" checked>
                            <label class="form-check-label" for="is_password">加密</label>
                        </div>
                        <div class="form-group">
                            <label for="name">頻道名稱</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $channel->name }}" placeholder="必填">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group" id="password">
                            <label for="password">密碼</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="必填">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group" id="password_confirmation">
                            <label for="password_confirmation">密碼確認</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="必填">
                            @error('password_confirmation')
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
@section('js')
    <script>
        $("#is_password").click(function() {
            $("#password").toggleClass("d-none");
            $("#password_confirmation").toggleClass("d-none");
        });
    </script>
@endsection

