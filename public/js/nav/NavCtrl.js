(function()
{
    "use strict";

    angular
        .module("equinitasks")
        .controller("NavCtrl", [
            "$scope",
            "$rootScope",
            "$state",
            "$window",
            "SessionService",


            function NavCtrl($scope, $rootScope, $state, $window, SessionService)
            {
                var self = this;
                var currentUser = null;

                if ($window.localStorage["currentUser"])
                {
                    currentUser = JSON.parse($window.localStorage["currentUser"]);

                    $scope.currentUser = SessionService.currentUser = currentUser;
                    $scope.isAuthenticated = SessionService.isAuthenticated = true;
                }

                $scope.logout = function()
                {
                    currentUser = null;
                    $window.localStorage.removeItem("currentUser");
                    SessionService.currentUser = {};
                    SessionService.isAuthenticated = false;
                    $state.go("landing");
                }

                $rootScope.$on("login", function(event)
                {
                    $scope.currentUser     = SessionService.currentUser;
                    $scope.isAuthenticated = SessionService.isAuthenticated;
                });
            }
        ]);
})();
