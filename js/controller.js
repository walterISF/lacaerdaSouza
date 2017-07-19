var app = angular.module("app", ["ngRoute"]);

app.config(["$routeProvider", function($routeProvider){
	$routeProvider.
	when("/",{templateUrl: "producao.html",controller: "myController"}).
	when("/prod",{templateUrl: "manutencao.html",controller: "myController"}).
	otherwise({redirectTo: "/"});
    
}]);

app.controller("myController", function($scope, $http, $location){
	$(document).ready(function(){
		$('.parallax').parallax();
		$('.carousel').flickity({
		  // options
		  contain: true
		});

		// Initialize collapse button
		$(".button-collapse").sideNav();
		var $carousel = $('.carousel');
		$carousel.flickity('playPlayer');
		
		$('.button').on( 'click', function() {
			var $cellElems = $('<div class="carousel-cell"><img src="img/teste.jpg"/></div>');
			$carousel.flickity( 'append', $cellElems );
		});
		$(".scroll").click(function(event){        
        	event.preventDefault();
        	$('html,body').animate({scrollTop:$(this.hash).offset().top - 50}, 800);
   		});
	});
});
