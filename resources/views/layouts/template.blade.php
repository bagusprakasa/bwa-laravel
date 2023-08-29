<!DOCTYPE html>
<html lang="en">

{{-- Head --}}
@include('includes.head')

<body>
    <div class="wrapper fullwidth-style">

        {{-- Navbar --}}
        @include('includes.navbar')

        {{-- Content --}}
        @yield('content')
        {{-- Footer --}}
        @include('includes.footer')
    </div>

    {{-- Javascript --}}
    @include('includes.script')
</body>

</html>
