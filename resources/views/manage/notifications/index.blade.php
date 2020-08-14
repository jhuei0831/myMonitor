@extends('_layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">廣播</div>

                <div class="card-body">
                    <form action="{{ route('notifications.post') }}" method="post">
                        @csrf
                        <label for="fire">輸入要廣播的內容</label>
                        <input class="form-control" type="text" name="fire">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
