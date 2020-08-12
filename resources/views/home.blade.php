@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('fire') }}" method="post">
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
