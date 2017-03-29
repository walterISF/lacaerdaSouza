var app = angular.module("app", ["ngRoute"]);

app.config(["$routeProvider", function($routeProvider){
	$routeProvider.
	when("/",{templateUrl: "manutencao.html"}).
	when("/prod",{templateUrl: "producao.html"}).
	otherwise({redirectTo: "/"});

}]);


app.controller("myController", function($scope, $http, $location){
	$location.path("/prod");
});
