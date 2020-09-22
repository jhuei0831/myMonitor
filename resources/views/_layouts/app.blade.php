<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('_partials.head')
    <body>
        <div id="app">
            @include('_partials.nav')
            <main class="py-4">
                @include('_partials.message')
                @yield('content')
            </main>
        </div>
    </body>
    @include('_partials.footer')
    @yield('js')
    <script>
        $('.btn-delete').on('click',function () {
            event.preventDefault();
            var id = $(this).data('id');
            Swal.fire({
                title: '確認刪除?',
                text: '若刪除資料將無法復原!',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '確認',
                cancelButtonText: '取消'
                }).then((result) => {
                    if (result.value) {
                            window.location.href = document.getElementById("delete").href + id;
                        } else {
                            Swal.fire('資料已保留');
                        }
                    })
        });
    </script>
</html>
