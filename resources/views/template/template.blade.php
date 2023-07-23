<!DOCTYPE html>
<html lang="en">

@include('template.component.header')
<style>
    #chart {
        width: 100%;
        height: 100%;
    }
</style>

<body id="body">
    <div class="wrapper horizontal-layout-3">
        <!-- navbar -->
        @include('template.component.navbar')
        <!-- end navbar -->

        <div class="main-panel">


            <div class="bg-warning pt-4 pb-5">
                <div class="container text-white py-2">
                    <div class="d-flex align-items-center">
                    </div>
                </div>
            </div>
            <div class="container mt--5">
                <div class="page-inner mt--3">
                    <!-- content -->
                    @yield('content')
                    <!-- end content -->
                </div>
            </div>
        </div>

        <!-- footer -->
        @include('template.component.footer')
        <!-- end-footer -->
    </div>


    {{-- Loading screen --}}
    <div class="d-none" id="screen-loading">
        <span class="spinner"></span>
        <h3 class="fw-bold mt-5">Tunggu sebentar ....</h3>
    </div>


    <!-- script -->
    @include('template.component.tag_script')
    <!-- end script -->

    @yield('manual_script')

</body>
