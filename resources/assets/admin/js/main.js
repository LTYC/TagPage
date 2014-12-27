
var tagPagesApp = angular.module('tagPagesApp', ['ngRoute', 'ui.bootstrap', 'flow']);

tagPagesApp.config(['$httpProvider', 'flowFactoryProvider',
    function ($httpProvider, flowFactoryProvider) {
        $httpProvider.interceptors.push(['$q', '$rootScope', '$location', 'BASE_URL', function ($q, $rootScope, $location, BASE_URL) {
            return {
                'request': function (config) {
                    $rootScope.$broadcast('loading-started');
                    return config || $q.when(config);
                },
                'response': function (response) {
                    $rootScope.$broadcast('loading-complete');
                    return response || $q.when(response);
                },
                'responseError': function (rejection) {
                    var status = rejection.status;
                    $rootScope.$broadcast('loading-complete');
                    if (status == 401 && rejection.data === 'Unauthorized') {
                        $rootScope.$broadcast('auth-error');
                        window.location.href = BASE_URL + "/login";
                        return;
                    }
                    return $q.reject(rejection);
                }
            };
        }]);
        flowFactoryProvider.defaults = {
            testChunks: false
        };
    }
]);

tagPagesApp.run(['$http', function ($http) {
    $http.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
}]);
