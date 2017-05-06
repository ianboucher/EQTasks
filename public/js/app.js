(function()
{
    "use strict";

    angular
        .module("equinitasks", [
            "ui.router",
            "ui.bootstrap"
        ])
        .config(function($stateProvider, $locationProvider)
        {
            $locationProvider
                .html5Mode
                ({
                    enabled: true,
                    requireBase: false
                });

            $stateProvider
                .state
                (
                    "landing",
                    {
                        url         : "/",
                        controller  : "LandingCtrl as landing",
                        templateUrl : "js/landing/landing.html"
                    }
                )
                .state
                (
                    "login",
                    {
                        url         : "/login",
                        controller  : "AuthCtrl as auth",
                        templateUrl : "js/auth/login.html"
                    }
                )
                .state
                (
                    "signup",
                    {
                        url         : "/signup",
                        controller  : "AuthCtrl as auth",
                        templateUrl : "js/auth/signup.html"
                    }
                )
                .state
                (
                    "pending",
                    {
                        url         : "/pending",
                        controller  : "TasksCtrl as tasks",
                        templateUrl : "js/tasks/pending_tasks.html"
                    }
                )
                .state
                (
                    "completed",
                    {
                        url         : "/completed",
                        controller  : "TasksCtrl as tasks",
                        templateUrl : "js/tasks/completed_tasks.html"
                    }
                )
        }
    )
})();
