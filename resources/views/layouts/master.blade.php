<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Deerhost Template">
    <meta name="keywords" content="Deerhost, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>PLatefrorme | Presence</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/modalConnexion.css')}}" type="text/css">

</head>

<body>

    @yield('content')

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <!-- Js Plugins -->
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>

    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script type="text/javascript">
        $(function(){
            $('.nav a').filter(function(){return this.href==location.href}).parent().addClass('active').siblings().removeClass('active')
            $('.nav a').click(function(){
                $(this).parent().addClass('active').siblings().removeClass('active')	
            })
        })

        // When the user scrolls the page, execute myFunction

        $(document).ready(function() {
  
  $(window).scroll(function () {
      //if you hard code, then use console
      //.log to determine when you want the 
      //nav bar to stick.  
 
 
      var header = document.getElementById("myHeader");
var nav = document.getElementById("header");

      
    if ($(window).scrollTop() > header.offsetHeight) {
      $('#header').addClass('navbar-fixed');
      
    }
    if ($(window).scrollTop() < header.offsetHeight) {
      $('#header').removeClass('navbar-fixed');
      
    }
  });
});
// window.onscroll = function() {myFunction()};

// console.log('heloooooo');

// // Get the header
// var header = document.getElementById("myHeader");
// var nav = document.getElementById("header");

// // Get the offset position of the navbar
// var sticky = header.offsetTop;

// // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
// function myFunction() {
//   if (window.pageYOffset > sticky) {
//     header.classList.add("sticky");
//   } else {
//     header.classList.remove("sticky");
//   }
// }
        </script>
</body>

</html>
