<!DOCTYPE html>
<html>

    @include('partials.header')

    <!--
    BODY TAG OPTIONS:
    =================
    Apply one or more of the following classes to get the
    desired effect
    |---------------------------------------------------------|
    | SKINS         | skin-blue                               |
    |               | skin-black                              |
    |               | skin-purple                             |
    |               | skin-yellow                             |
    |               | skin-red                                |
    |               | skin-green                              |
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | layout-top-nav                          |
    |               | sidebar-collapse                        |
    |               | sidebar-mini                            |
    |---------------------------------------------------------|
    -->
    <body class="skin-blue sidebar-mini">
        <div class="wrapper">

            @include('partials.main_header')

            @include('partials.sidebar')

            <div class="content-wrapper">

                @include('partials.page_heading')

                <section class="content">
                    @yield('main-content')
                </section>
            </div>

            @include('partials.control_sidebar')

            @include('partials.footer')

        </div>

        @include('partials.scripts')
    </body>
</html>