<!DOCTYPE html>
<html ng-app="equinitasks">

<head lang="en">
    <meta charset="UTF-8">
    <title>EquiniTasks</title>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:400,800,600,700,300">
    <link rel="stylesheet" type="text/css" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/landing.css">

</head>

<body>

    <!-- Insert Angular templates -->
    <ui-view></ui-view>

    <!-- Load App Dependencies -->
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.15/angular-ui-router.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.1.3/ui-bootstrap-tpls.min.js"></script>
    <script src="//cdn.jsdelivr.net/satellizer/0.15.5/satellizer.min.js"></script>


    <!-- Bootstrapping -->
    <script src="/js/app.js"></script>

    <!-- Services -->
    <script src="/js/services/SessionService.js"></script>
    <script src="/js/services/TaskService.js"></script>

    <!-- Controllers -->
    <script src="/js/landing/LandingCtrl.js"></script>
    <script src="/js/nav/NavCtrl.js"></script>
    <script src="/js/auth/AuthCtrl.js"></script>
    <script src="/js/tasks/TasksCtrl.js"></script>

</body>
</html>
