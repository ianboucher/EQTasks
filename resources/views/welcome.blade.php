<!DOCTYPE html>
<html ng-app="equinitasks">

<head lang="en">
    <meta charset="UTF-8">
    <title>EquiniTasks</title>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:400,800,600,700,300">
    <link rel="stylesheet" type="text/css" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="/css/normalize.css">

</head>

<body>

    <nav class="navbar"> <!-- navigation bar -->
        <a ui-sref="landing" class="logo">
            <img src="" alt="EquiniTasks" class="logo">
        </a>
        <div class="links-container">
            <a ui-sref="tasks"   class="navbar-link">Pending Tasks</a>
            <a ui-sref="archive" class="navbar-link">Completed Tasks</a>
        </div>
    </nav>

    <div class="container">
        <div class="row row-centered">
            <div class="col-xs-10 col-centered">

                <ui-view></ui-view>

            </div>
        </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.15/angular-ui-router.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.1.3/ui-bootstrap-tpls.min.js"></script>


    <!-- Bootstrapping -->
    <script src="/js/app.js"></script>

    <!-- Services -->
    <script src="/js/services/TaskService.js"></script>

    <!-- Controllers -->
    <script src="/js/landing/LandingCtrl.js"></script>
    <script src="/js/tasks/TasksCtrl.js"></script>



</body>
</html>
