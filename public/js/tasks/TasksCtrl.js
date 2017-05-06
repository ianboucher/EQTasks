(function()
{
    "use strict";

    angular
        .module("equinitasks")
        .controller("TasksCtrl", [
            "$scope",
            "$state",
            "TaskService",
            "$window",

            function TasksCtrl($scope, $state, TaskService, $window)
            {
                var self = this;
                var currentUser = null;

                if ($window.localStorage["currentUser"])
                {
                    currentUser = JSON.parse($window.localStorage["currentUser"]);
                    
                    TaskService.getTasks(currentUser.id).then(function(tasks)
                    {
                        self.items = tasks.data;
                    })
                    .catch(function(error)
                    {
                        console.log(error);
                    });
                }
                else
                {
                    // TODO: Add flash message for unauthenticated users
                    $state.go("login");
                }


                this.addTask = function(taskData)
                {
                    TaskService.addTask(currentUser.id, taskData).then(function(task)
                    {
                        self.items.push(task.data);
                        $scope.taskData = {};
                    })
                    .catch(function(error)
                    {
                        console.log(error);
                    });
                }


                this.toggleComplete = function(taskData)
                {
                    TaskService.updateTask(currentUser.id, taskData).catch(function(error)
                    {
                        console.log(error);
                    });
                }
            }
        ]);
})();
