var app = angular.module("app", ["ngRoute"]);

app.config(["$routeProvider", function($routeProvider){
	$routeProvider.
	when("/",{templateUrl: "manutencao.html",controller: "myController"}).
	when("/prod",{templateUrl: "producao.html",controller: "myController"}).
	otherwise({redirectTo: "/"});
    
}]);

app.controller("myController", function($scope, $http, $location){
	$(document).ready(function(){

		$('.parallax').parallax();

		$('.carousel').flickity({
		  // options
		  contain: true,
		  bgLazyLoad: true
		});

		// Initialize collapse button
		$(".button-collapse").sideNav();

		$(".scroll").click(function(event){        
        	event.preventDefault();
        	$('html,body').animate({scrollTop:$(this.hash).offset().top - 50}, 800);   		
		});

		$(window).scroll(function() {
		   if($(window).scrollTop() + $(window).height() == $(document).height()) {
		   		$(".circulo").css("display","none");
		   }
		   else
		   {
		   		$(".circulo").css("display","block");
		   }
		});
 		
	});

	$(function carregarCaroucel()
	{
		var $carousel = $('.carousel');
		$carousel.flickity('playPlayer');
				//get dados api
		/*################################################################################*/
		//https://api.instagram.com/v1/users/search?q=lacerdasouzaengenharia&access_token=5536912247.3a6b548.2609b93a94dc4e6fbfb3072f2c0d2f9e
		/*################################################################################*/
		var token = '5536912247.3a6b548.2609b93a94dc4e6fbfb3072f2c0d2f9e', // learn how to obtain it below
		    userid = 5536912247, // User ID - get it in source HTML of your Instagram profile or look at the next example :)
		    num_photos = 5; // how much photos do you want to get
		 
		$.ajax({
			url: 'https://api.instagram.com/v1/users/' + userid + '/media/recent', // or /users/self/media/recent for Sandbox
			dataType: 'jsonp',
			type: 'POST',
			data: {access_token: token, count: num_photos},
			success: function(data){
				for( x in data.data ){
					console.log(data);
					//var $cellElems = $('<div class="carousel-cell"><img data-flickity-lazyload="'+data.data[x].images.low_resolution.url+'"></div>');
					var $cellElems = $('<div class="carousel-cell" data-flickity-bg-lazyload="'+data.data[x].images.low_resolution.url+'"></div>');
					$carousel.flickity( 'append', $cellElems );
					// data.data[x].images.low_resolution.url - URL of image, 306х306
					// data.data[x].images.thumbnail.url - URL of image 150х150
					// data.data[x].images.standard_resolution.url - URL of image 612х612
					// data.data[x].link - Instagram post URL 
				}

			},
			error: function(data){
				console.log(data); // send the error notifications to console
			}
		});
	});
});
