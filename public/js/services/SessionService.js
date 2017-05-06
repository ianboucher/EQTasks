(function()
{
    "use strict";

    angular
        .module("equinitasks")
        .service("SessionService", [
            "$http",
            "$state",
            "$rootScope",

            function SessionService($http, $state, $rootScope)
            {
                var self = this;

                var authenticate = function(user)
                {
                    self.currentUser = user.data;
                    self.isAuthenticated = true;
                    $rootScope.$broadcast("login")
                    $state.go("pending");
                }


                self.login = function(credentials)
                {
                    $http.post("/api/v1.0.0/login", {
                        "email"    : credentials.email,
                        "password" : credentials.password
                    })
                    .then(function(user)
                    {
                        authenticate(user);
                    })
                    .catch(function(error)
                    {
                        console.log(error);
                    })
                };


                self.signup = function(credentials)
                {
                    $http.post("/api/v1.0.0/signup", {
                        "name"     : credentials.name,
                        "email"    : credentials.email,
                        "password" : credentials.password
                    })
                    .then(function(user)
                    {
                        authenticate(user);
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
