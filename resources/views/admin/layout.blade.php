<!doctype html>
<html lang="en" ng-app="tagPagesApp">
    <head>
        <meta charset="utf-8">

        <title>Administration</title>

        <link rel="stylesheet" href="{{ URL::to('assets/admin/css/main.css') }}">
    </head>
    <body>
        <div class="loading-indicator" loading-indicator style="display: none;"><img src="{{ url('assets/img/loader.gif') }}"></div>

        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#admin-navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Administration</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="admin-navbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Pages <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Tags</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-plus"></span> <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#/posts/create">Create</a></li>
                                <li><a href="#/posts">Edit</a></li>
                                <li><a href="#">Delete</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        @partials

        <script type="text/javascript" src="{{ URL::to('assets/admin/js/main.js') }}"></script>
        <script>
            angular.module('tagPagesApp').constant('BASE_URL', '{{ url() }}');
        </script>
    </body>
</html>