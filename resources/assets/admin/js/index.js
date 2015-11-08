
tagPagesApp.config(['$routeProvider',
    function ($routeProvider) {
        $routeProvider
            .when('/', {
                controller: 'IndexController',
                templateUrl: 'admin/partials/pages.index'
            }).otherwise({
                redirectTo: '/'
            });
    }
]);
