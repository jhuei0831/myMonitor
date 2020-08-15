@extends('_layouts.app')

@section('content')
<div class="container">
    <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn normal border active">廣播</button>
        <button type="button" class="btn quick border">快速廣播</button>
    </div><hr>
    <div class="row justify-content-center" id="normal">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-light">廣播</div>

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
                        {{-- <input class="form-control" type="text" name="icon"> --}}
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
    <div class="row justify-content-center" id="quick">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-warning text-gray-dark">快速廣播</div>

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
        $(".normal").click(function() {
            $(this).toggleClass("btn-dark");
            $(this).toggleClass("text-light");
        });
        $(".quick").click(function() {
            $(this).toggleClass("btn-dark");
            $(this).toggleClass("text-light");
        });
    </script>
@endsection
