@extends('_layouts.app')

@section('content')
<div class="container">
    <div class="btn-group" role="group" aria-label="Basic example" id="toggle">
        <a type="button" class="btn normal border btn-success text-light active noHover">廣播</a>
        <a type="button" class="btn quick border noHover">快速廣播</a>
    </div><hr>
    <div class="row justify-content-center" id="boradcast_normal">
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
                </div>
                <div class="card-footer text-center">
                    <input type="submit" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center" id="boradcast_quick" hidden>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-light"><i class="fas fa-broadcast-tower"></i>&nbsp;快速廣播</div>

                <div class="card-body">
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
                                    <td>*</td>
                                </tr>
                            </thead>
                            <tbody>
                                
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
