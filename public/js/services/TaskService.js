(function()
{
    "use strict";

    angular
        .module("equinitasks")
        .service("TaskService", [
            "$http",

            function TaskService($http)
            {
                var self = this;

                self.getTasks = function()
                {
                    return $http.get("/api/v1.0.0/users/11/tasks");
                };

                self.addTask = function(taskData)
                {
                    return $http.post("/api/v1.0.0/users/11/tasks", {
                        "description" : taskData.description
                    })
                }

                self.updateTask = function(taskData)
                {
                    return $http.put("/api/v1.0.0/users/11/tasks/" + taskData.id, {
                        "description" : taskData.description,
                        "completed"   : taskData.completed
                    })
                }
            }
        ]);
})();
