var app = angular.module("app", ["ngRoute"]);

app.config(["$routeProvider", function($routeProvider){
	$routeProvider.
	when("/",{templateUrl: "manutencao.html"}).
	when("/prod",{
		templateUrl: "producao.html",
		controller: "myController",
	}).
	otherwise({redirectTo: "/"});

}]);


app.controller("myController", function($scope, $http, $location){
	$(document).ready(function(){
	  $('.parallax').parallax();
	});
});
