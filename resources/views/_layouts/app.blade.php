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
            let form = event.target.form;
            Swal.fire({
                title: '{{ trans('action.delete_confirm1') }}',
                text: '{{ trans('action.delete_confirm2') }}',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{ trans('action.confirm') }}',
                cancelButtonText: '{{ trans('action.cancel') }}'
                }).then((result) => {
                    if (result.value) {
                        form.submit();
                        } else {
                            Swal.fire('{{ trans('action.keep') }}');
                        }
                    })
        });
    </script>
</html>
