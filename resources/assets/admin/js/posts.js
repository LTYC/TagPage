
tagPagesApp.config(['$routeProvider',
    function ($routeProvider) {
        $routeProvider
            .when('/posts', {
                controller: 'PostsIndexController',
                templateUrl: 'admin/partials/index'
            })
            .when('/posts/create', {
                controller: 'PostsCreateController',
                templateUrl: 'admin/partials/posts.create'
            })
            .when('/posts/:id', {
                controller: 'PostsShowController',
                templateUrl: 'admin/partials/show'
            });
    }
]);
