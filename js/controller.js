var app = angular.module("app", ["ngRoute"]);

app.config(["$routeProvider", function($routeProvider){
	$routeProvider.
	when("/",{templateUrl: "index2.html"}).
	otherwise({redirectTo: "/"});

}]);


app.controller("myController", function($scope, $http, $location){
	$location.path("/");
});
