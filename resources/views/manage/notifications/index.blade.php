@inject('button','App\Presenters\ButtonPresenter')
@extends('_layouts.app')

@section('content')
<div class="container">
    <div class="btn-group" role="group" aria-label="Basic example" id="toggle">
        <a type="button" class="btn quick border btn-success text-light active noHover">快速廣播</a>
        <a type="button" class="btn normal border noHover">廣播</a>
    </div><hr>
    <div class="row justify-content-center" id="boradcast_normal" hidden>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-light"><i class="fas fa-broadcast-tower"></i>&nbsp;廣播</div>

                <div class="card-body">
                    <form action="{{ route('notifications.post') }}" method="post">
                        @csrf
                        <label for="title">標題</label>
                        <input class="form-control" type="text" name="title">
                        <label for="icon">Icon</label>
                        <select class="custom-select" name="icon">
                            <option>null</option>
                            <option>error</option>
                            <option>success</option>
                            <option>info</option>
                        </select>
                        <label for="message">內容</label>
                        <input class="form-control" type="text" name="message">
                        <label for="footer">Footer</label>
                        <input class="form-control" type="text" name="footer">     
                        <label for="footer">寬度</label>
                        <input class="form-control" type="number" min="600" name="width">        
                </div>
                <div class="card-footer text-center">
                    <input type="submit" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center" id="boradcast_quick">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-light"><i class="fas fa-broadcast-tower"></i>&nbsp;快速廣播</div>

                <div class="card-body">
                    <ul class="list-unstyled">
                        <li>{!! $button->create() !!}</li>
                    </ul>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td></td>
                                    <td>標題</td>
                                    <td>Icon</td>
                                    <td>訊息內容</td>
                                    <td>底部內容</td>
                                    <td>寬度</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notifications as $notification)
                                    <tr>
                                        <td><a href="{{ route('notifications.quick_post', $notification->id) }}"><i class="fas fa-volume-up"></i></a></td>
                                        <td>{{ $notification->title }}</td>
                                        <td>{{ $notification->icon }}</td>
                                        <td>{{ $notification->message }}</td>
                                        <td>{{ $notification->footer }}</td>
                                        <td>{{ $notification->width }}</td>
                                        <td>{!! $button->edit($notification->id) !!}&nbsp;{!! $button->deleting($notification->id) !!}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>              
                </div>
                <div class="card-footer text-center">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $("#toggle").click(function() {
            $(".normal").toggleClass("btn-success");
            $(".normal").toggleClass("text-light");
            $(".normal").toggleClass("active");
            $(".quick").toggleClass("btn-success");
            $(".quick").toggleClass("text-light");
            $(".quick").toggleClass("active");
            if ($(".normal").hasClass('active')) {
                $("#boradcast_normal").removeAttr("hidden"); 
            }
            else{
                $("#boradcast_normal").attr("hidden", "hidden");
            } 
            if ($(".quick").hasClass('active')) {
                $("#boradcast_quick").removeAttr("hidden"); 
            }
            else{
                $("#boradcast_quick").attr("hidden", "hidden");
            }    
        });
    </script>
@endsection
