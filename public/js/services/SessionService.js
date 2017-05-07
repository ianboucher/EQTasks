(function()
{
    "use strict";

    angular
        .module("equinitasks")
        .service("SessionService", [
            "$http",
            "$auth",
            "$state",
            "$rootScope",
            "$window",

            function SessionService($http, $auth, $state, $rootScope, $window)
            {
                var self = this;

                var authenticate = function(user)
                {
                    self.currentUser = user;
                    self.isAuthenticated = true;
                    $rootScope.$broadcast("login");
                    $window.localStorage.setItem("currentUser", angular.toJson(self.currentUser));
                    $state.go("pending");
                }


                self.login = function(credentials)
                {
                    $auth.login(credentials).then(function()
                    {
                        return $http.get("/api/v1.0.0/auth")
                    })
                    .then(function(response)
                    {
                        authenticate(response.data.user);
                    })
                    .catch(function(error)
                    {
                        console.log(error);
                    })
                };


                self.signup = function(credentials)
                {
                    $auth.signup(credentials).then(function(response)
                    {
                        authenticate(response.data.user);
                    })
                    .catch(function(error)
                    {
                        console.log(error);
                    })
                };

                return self;
            }
        ]);
})();
