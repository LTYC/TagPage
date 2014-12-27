
tagPagesApp.config(['$routeProvider',
    function ($routeProvider) {
        $routeProvider
            .when('/posts', {
                controller: 'asdf',
                templateUrl: ''
            })
            .when('/posts/:id', {
                controller: '',
                templateUrl: ''
            })
            .when('/posts/create', {
                controller: '',
                templateUrl: ''
            });
    }
]);
