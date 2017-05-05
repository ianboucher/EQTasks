(function()
{
    "use strict";

    angular
        .module("equinitasks", [
            "ui.router",
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
                    "tasks",
                    {
                        url         : "/tasks",
                        controller  : "TasksCtrl as tasks",
                        templateUrl : "js/tasks/current_tasks.html"
                    }
                )
        }
    )
})();
