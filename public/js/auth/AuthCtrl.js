(function()
{
    angular
        .module("equinitasks")
        .controller("AuthCtrl", [
            "$scope",
            "SessionService",

            function AuthCtrl($scope, SessionService)
            {
                var self = this;

                $scope.credentials = {};

                self.login = function()
                {
                    SessionService.login($scope.credentials);
                }

                self.signup = function()
                {
                    SessionService.signup($scope.credentials);
                }
            }
        ]);
})();
