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
    <div class="navbar-wrapper">
        <nav class="navbar navbar-inverse navbar-static-top">

                <div class="navbar-header">
                    <a class="navbar-brand" ui-sref="landing">EquiniTasks</a>
                </div>

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a ui-sref="pending">Pending Tasks</a></li>
                        <li><a ui-sref="completed">Completed Tasks</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a ui-sref="login">Login</a></li>
                        <li><a ui-sref="signup">Sign-up</a></li>
                        <li><a u-sref="#"></a></li>
                        <li><a ng-click="logout()">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

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
