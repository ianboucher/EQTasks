(function()
{
    "use strict";

    angular
        .module("equinitasks")
        .service("TaskService", [
            "$http",
            "$cacheFactory",

            function TaskService($http, $cacheFactory)
            {
                var self = this;
                var $httpDefaultCache = $cacheFactory.get("$http");

                self.getTasks = function(userId)
                {
                    return $http.get("/api/v1.0.0/users/" + userId + "/tasks", { "cache" : true });
                };


                self.addTask = function(userId, taskData)
                {
                    $httpDefaultCache.removeAll();

                    return $http.post("/api/v1.0.0/users/" + userId + "/tasks", {
                        "description" : taskData.description
                    })
                };


                self.updateTask = function(userId, taskData)
                {
                    $httpDefaultCache.removeAll();

                    return $http.put("/api/v1.0.0/users/" + userId + "/tasks/" + taskData.id, {
                        "description" : taskData.description,
                        "completed"   : taskData.completed
                    })
                };

                return self;
            }
        ]);
})();
