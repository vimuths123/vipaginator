# vipaginator #
'vipaginator' is an Angularjs related pagination plugin we can use with or without ajax. It uses jquery, bootstrap and angularjs.

## Usage ##
1. Inside 'vipaginator.js' I have created a angularjs module called 'viPaginator' and wrote the plugin inside it.
   There fore you have inject 'viPaginator' module for your module first.

		<script type="text/javascript">
            angular.module('yourapp', ['viPaginator']).controller('yourController', ['$scope', function ($scope) {
                    
       		}]);
        </script>

2. Then you have to define how much items you need to show in one page, array name you need and id for pagination element div(This way you can use this plugin multiple times in one page).
    
		<script type="text/javascript">
            angular.module('yourapp', ['viPaginator']).controller('yourController', ['$scope', function ($scope) {
                    $scope.perPage = 1;
					$scope.page1ID = 'paginationDiv1';					             
            }]);
        </script>
		<vi-paginator new-array="users" per-page='perPage' div-id="page1ID"></vi-paginator>

3. If you are going to use this plugin without ajax, all you have to do is give the define array and give array name in directive.
	
		<script type="text/javascript">
            angular.module('yourapp', ['viPaginator']).controller('yourController', ['$scope', function ($scope) {
                    $scope.perPage = 1;
                    $scope.page1ID = 'paginationDiv1';
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
                }]);
        </script>

		<div class="container">
                <div class="row" ng-repeat="item in users" style="border: 1px solid black">
                    <div class="col-lg-12">
                        <p style="margin: 10px 0;">{{ item.firstName}} {{ item.lastName}}</p>
                    </div>                   
                </div>                    
        </div>

        <vi-paginator new-array="users" per-page='perPage' div-id="page1ID" items-array='paginateItems'></vi-paginator>
		
4. But if you are using ajax this becomes bit different. For that you have to give 'countUrl' witch returns count of all items in table or json dataset, and give 'ajaxUrl' wich returns datarange from table (How to do this with normal PHP backend has defined in examples).

		<script type="text/javascript">
            angular.module('yourapp', ['viPaginator']).controller('yourController', ['$scope', function ($scope) {
                    $scope.perPage = 1;
                   
                    $scope.page2ID = 'paginationDiv2';
                    $scope.countUrl = '/vipaginator/getjsoncount.php';
                    $scope.ajaxUrl = '/vipaginator/getjsonarray.php';                    
            }]);
        </script>
