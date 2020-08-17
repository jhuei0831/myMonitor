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
</html>
