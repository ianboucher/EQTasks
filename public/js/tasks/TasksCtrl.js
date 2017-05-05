(function()
{
    "use strict";

    angular
        .module("equinitasks")
        .controller("TasksCtrl", [
            "$scope",
            "TaskService",

            function TasksCtrl($scope, TaskService)
            {
                var self = this;

                TaskService.getTasks().then(function(tasks)
                {
                    self.items = tasks.data;
                    console.log(self.items);
                })
                .catch(function(error)
                {
                    console.log(error);
                });


                this.addTask = function(taskData)
                {
                    TaskService.addTask(taskData).then(function(task)
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
                    TaskService.updateTask(taskData).then(function(task)
                    {
                        console.log(task);
                    })
                    .catch(function(error)
                    {
                        console.log(error);
                    });
                }
            }
        ]);
})();
