<html>
    <head>
        <meta charset="windows-1252">
        <title></title>
        <!-- Latest jquery file -->
        <script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>

        <!-- Latest compiled and minified CSS -->
        <link href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <!-- Angular v 1.2.5 -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.5/angular.min.js"></script>

        <script type="text/javascript" src="vipaginator.js"></script>

        <script type="text/javascript">
            angular.module('yourapp', ['viPaginator']).controller('yourController', ['$scope', function ($scope) {
                    $scope.perPage = 1;
                    $scope.page1ID = 'paginationDiv1';
                    $scope.NoItems = '1';
                    $scope.paginateItems = [
                        {"firstName": "Ruhaim", "lastName": "Izmeth"},
                        {"firstName": "Nuwan", "lastName": "Chamara"},
                        {"firstName": "Tharindu", "lastName": "Chandrasiri"},
                        {"firstName": "Kasun", "lastName": "Dharshana"},
                        {"firstName": "Suresh", "lastName": "Eranda"},
                        {"firstName": "Damitha", "lastName": "Rathnakara"},
                        {"firstName": "Susith", "lastName": "Prasanna"},
                        {"firstName": "Danushka", "lastName": "Thushara"},
                        {"firstName": "Dulan", "lastName": "Sudasinghe"},
                        {"firstName": "Dimuth", "lastName": "Vithana"},
                        {"firstName": "Lahiru", "lastName": "Fernando"},
                        {"firstName": "Sanjaya", "lastName": "Ruwan"}
                    ];
                    
                    $scope.page2ID = 'paginationDiv2';
                    $scope.countUrl = '/vipaginator/getjsoncount.php';
                    $scope.ajaxUrl = '/vipaginator/getjsonarray.php';
                    
                }]);
        </script>
    </head>
    <body ng-app="yourapp">
        <div ng-controller="yourController">

            <select ng-model="perPage">
                <option value="1">1 item</option>
                <option value="2">2 item</option>
                <option value="3">3 item</option>
            </select>

            <!--pagination using normal json array without ajax (start)--> 
            <div class="container">
                <div class="row" ng-repeat="item in users" style="border: 1px solid black">
                    <div class="col-lg-12">
                        <p style="margin: 10px 0;">{{ item.firstName }} {{ item.lastName }}</p>
                    </div>                   
                </div>                    
            </div>

            <vi-paginator new-array="users" per-page='perPage' div-id="page1ID" items-array='paginateItems'></vi-paginator>
            <!--pagination using normal json array without ajax (end)-->             
            
            <!--pagination using ajax (start)-->
            <div class="container">
                <div class="row" ng-repeat="item in ajaxusers" style="border: 1px solid black">
                    <div class="col-lg-12">
                        <p style="margin: 10px 0;">{{ item.firstname }} {{ item.lastname }}</p>
                    </div>                   
                </div>                    
            </div>   
            
            <vi-paginator new-array="ajaxusers" per-page='perPage' div-id="page2ID" count-url="countUrl" ajax-url="ajaxUrl"></vi-paginator>
            <!--pagination using ajax (end)-->
        </div>        
    </body>
</html>
