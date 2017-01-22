<!DOCTYPE html>
<html>
<head>
<title>AngularJS GET request with PHP</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-rc.0/angular.min.js"></script>

</head>
<body>
<br>
<div class="row">
<div class="container">
<div ng-app="fetch" ng-controller="dbCtrl">
 
<table class="table table-hover">
<tr>
<th>Name</th>
</tr>
<tbody>
<tr ng-repeat="x in participants">
<td>{{x.name}}</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</body>
<script>
var fetch = angular.module('fetch', []);
fetch.controller('dbCtrl', ['$scope', '$http', function ($scope, $http) {
$http.get("http://localhost:7777/onlineexam/api/v1/participants")
.success(function(data){
$scope.participants = data.participants;
//$scope.members = response.participants;
})
.error(function() {
$scope.data = "error in fetching data";
});
}]);
</script>
</html>