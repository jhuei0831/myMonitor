@inject('button','App\Presenters\ButtonPresenter')
@extends('_layouts.app')
@section('content')
<div class="container">
    <button class="icon-btn add-btn">
        <div class="add-icon"></div>
        <div class="btn-txt">新增頻道</div>
    </button>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">請輸入頻道UUID</div>

                <div class="card-body">
                    <form action="{{ route('notifications.post') }}" method="post">
                        @csrf
                        <input type="text" name="uuid" placeholder="請輸入頻道UUID" class="form-control">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
