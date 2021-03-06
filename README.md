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

5. And if you are intend to use search function you can use otherData variable. 

		<script type="text/javascript">
            angular.module('yourapp', ['viPaginator']).controller('yourController', ['$scope', function ($scope) {
                    $scope.perPage = 1;
                   
                    $scope.page2ID = 'paginationDiv2';
                    $scope.countUrl = '/vipaginator/getjsoncount.php';
                    $scope.ajaxUrl = '/vipaginator/getjsonarray.php';   

					$scope.otherData = {};
                    $scope.otherData.search = '';                 
            }]);
        </script>

		<div class="form-group">
             <label for="usr">Search:</label>
             <input type="text" class="form-control" ng-model="otherData.search">
        </div>

        <div class="container">
            <div class="row" ng-repeat="item in ajaxusers" style="border: 1px solid black">
                 <div class="col-lg-12">
                 	<p style="margin: 10px 0;">{{ item.firstname}} {{ item.lastname}}</p>
                 </div>                   
            </div>                    
        </div>   

       	<vi-paginator ng-show="ajaxusers" other-data="otherData" new-array="ajaxusers" per-page='perPage' div-id="page2ID" count-url="countUrl" ajax-url="ajaxUrl"></vi-paginator>

   	You can give variables other than search too. Since I used '$scope.$watchCollection("otherData", function (perPage) {' instead '$scope.$watch("otherData", function (perPage) {' so the plugin tracks sub variable changes too. You can use '$scope.otherData.yourdata = '';' like this. And remember you have to access this inside backend for count url function too.


6. Angular js post request is bit different from jquery post. So you can't take variables as S_POST['..'] inside php back end like jquery post. Instead you have to do this

		<?php
			$postdata = file_get_contents("php://input");
			$request = json_decode($postdata);

	Then you can access variables like this,
		
		$request->otherdata->search;

7. And lot of modern template engines use '{{ }}' to access variables in front end(Symfony TWIG, Laravel BLADE). So we have to use '[[ ]]' to access angular variables in front end. If so we have to do little change in 'vipaginator.js' line 646.

		template: '<div style="text-align: center; width: 100%;" id="{{ divId }}"></div>',
	to

		template: '<div style="text-align: center; width: 100%;" id="[[ divId ]]"></div>',

	

    This is how we add '[[ ]]' to angularjs module,,,
			

		<script type="text/javascript">
            angular.module('yourapp', ['viPaginator'], function($interpolateProvider) {
                            $interpolateProvider.startSymbol('[[');
                            $interpolateProvider.endSymbol(']]');
            }).controller('yourController', ['$scope', function ($scope) {
                    ......				             
            }]);
        </script>
