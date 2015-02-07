
tagPagesApp.controller("PostsCreateController", ["$scope", "PostsService", function($scope, PostsService) {

    $scope.post = {
        text: "",
        tags: []
    };

    $scope.create = function() {
        PostsService.create($scope.post);
    }
}]);
