@inject('button','App\Presenters\ButtonPresenter')
@extends('_layouts.app')
@section('content')
<div class="container">
    <p>
        <button class="icon-btn add-btn">
            <div class="add-icon"></div>
            <div class="btn-txt">新增頻道</div>
        </button>
    </p>
    
    <div class="row justify-content-center">
        @foreach ($channels as $channel)
           <div class="col-md-4">
                <div class="card shadow channel">
                    <div class="card-header">
                        {{ $channel->name }}&nbsp;{!! $channel->password == NULL ? '' : '<i class="fas fa-key"></i>' !!}
                    </div>
                    <div class="card-body">
                        <p>{{ $channel->uuid }}</p>               
                        <div class="text-right">
                            {!! $button->To(route("channels.edit", $channel->id), 'edit') !!}
                            {!! $button->To(route("channels.destroy", $channel->id), 'trash', 'btn-delete text-right', 'delete') !!}
                            {!! $button->To(route("notifications.index", $channel->id), 'list', 'text-right') !!}
                        </div>   
                    </div>
                </div><br>
            </div>
        @endforeach
    </div>
</div>
@endsection
@section('js')
    <script>
        $(".add-btn").click(function (e) { 
            window.location.href = "{{ route('channels.create') }}";
        });
    </script>
@endsection
