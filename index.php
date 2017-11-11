<!DOCTYPE html>
<html lang="en">
  

 <head>
  
    <title>BlockMart</title>
<!-- styles-->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/font-awesome.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/animate.css" rel="stylesheet">
    <link href="./css/skin-blue.css" rel="stylesheet">
  

  <title>Blockchain Jobs | BlockMart</title>

  

  <!-- Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.1.2/jquery.bxslider.css" rel="stylesheet">
  

  <link rel="icon" href="http://lokaso.in/wp-content/uploads/2016/09/Lokaso-app.png" type="image/x-icon" />


                
  <style type="text/css">.form .form-group__complex,
.search-results__title {
   display: none;
}

/*.details-header__company-profile .container {
   padding-right: 15px;
}

.details-header__company-profile .sidebar {
   float: none !important;
   width: 100%;
}

.details-header__company-profile .profile__img {
   margin-bottom: 0;
}

.details-header__company-profile h1.details-header__title {
  font-size: 15px;
  font-weight: normal;
  padding: 15px 26px;
  line-height: initial;
  color: rgba(0, 0, 0, 0.4);
  padding: 0;
  margin-top: 0;
}

.details-body__company-profile .row > .listing-item__info {
  float: left;
  width: 100%;
  padding-left: 15px;
}

.details-body__company-profile .details-body__left {
   width: 100%;
}
   
.details-header__company-profile .profile__image {
   text-align: left;
}

.details-header__company-profile h1.details-header__title {
   display: none;
}*/

/* search applicants button font smaller */
.quick-search__wrapper [action="https://danieltestboard.mysmartjobboard.com/resumes/"] .quick-search__find {
   font-size: 12px;
}

/*.details-header__company-profile .profile__info__description {
  max-height: 100%;
}

.details-header__company-profile .profile__info__description * {
   font-size: 15px;
}*/

.footer .home-intro-text {
   color: #7E7E7E;
   padding-bottom: 10px;
}
.footer .home-intro-text a {
   color: #9E9E9E;
}
.modal-body .form-group__btns {
       margin-bottom: 6px !important;
}

.product-item {
height: 490px !important;
}
.product-item__content {
height: 320px !important;
}
.product-item__description {
height: 300px !important;
padding-bottom: 20px;
}

.btn__yellow.btn-post-job {
background: #FFFFFF;
}</style>
  <script>
    document.addEventListener('DOMContentLoaded', function() {  
     /*if ($('.details-body__company-profile').length) {
        $('.details-header').addClass('details-header__company-profile');
        $('.sidebar').attr('class', 'sidebar');
        $('.sidebar').insertAfter('.details-header .results');
        $('.details-header .listing-item__info').insertBefore('.companies-jobs-list');
     }*/
     
    if ($('.details-body__resume').length && $('.details-body__title:contains("Work Experience")')) {
      $('.details-body__title:contains("Work Experience")').next().remove();
        $('.details-body__title:contains("Work Experience")').remove();
    }
    
       
  });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
$('.product-item__title:contains("Basic Package - Free")').closest('.well').find('.btn__blue').val('Get');
    });
</script>

<script>
        var googleApplied = false;
        function googleApply() {
            if ($('#apply-modal .alert-success').length > 0) {
                if (!googleApplied) {
                    ga('send', 'event', 'User', 'apply');
                    googleApplied = true;
                }
            }
        };

        window.addEventListener("DOMContentLoaded", function () {
            document.documentElement.addEventListener('DOMSubtreeModified', googleApply, false);
            document.documentElement.addEventListener('DOMNodeInserted', googleApply, false);
            document.documentElement.addEventListener('DOMNodeRemoved', googleApply, false);
        }, false);
</script>


<script>
  var callback = function() {
    //$('.modal-body .link').last().parent('div').css( "display", "none" );
  //$('.modal-body .login-help').css( "display", "none" );
  var el = $('.modal-body .login-help:not(.replaced)');
     if (el.length) {
     el.addClass('replaced');
     el.html("<a class='btn btn__blue btn__bold' href='/registration/?user_group_id=JobSeeker'>Register</a>");
     }
     

  };
window.addEventListener("DOMContentLoaded", function () {

  document.documentElement.addEventListener('DOMSubtreeModified', callback, false);
  document.documentElement.addEventListener('DOMNodeInserted', callback, false);
  document.documentElement.addEventListener('DOMNodeRemoved', callback, false);
}, false);

</script>

   




<meta name="google-site-verification" content="ZIEYA9i4KKxFczQN1rf8INLTtpXWKuHvD8V-8GdVpps" />
   
   
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if ($('.form-control__google-location').val() == '') {
            $('#radius').val('2000');
        }
        $('.refine-search__block .dropdown-menu')
        var refineCallback = function () {
            var dd = $('.refine-search__block .dropdown-menu');
            if (dd.length == 1 && !dd.data('inited')) {
                dd.data('inited', true);
                dd.append(
                        '<a class="refine-search__item refine-search__item-radius" href="#" data-value="500"><span class="refine-search__value">500 miles</span></a>' +
                        '<a class="refine-search__item refine-search__item-radius" href="#" data-value="1000"><span class="refine-search__value">1000 miles</span></a>' +
                        '<a class="refine-search__item refine-search__item-radius" href="#" data-value="2000"><span class="refine-search__value">2000 miles</span></a>'
                );
            }
       /*
            $('.modal-body .link').last()
                    .attr('target', '_blank')
                    .click(function () {
                        $('#apply-modal').modal('hide');
                    });
       */
       
      
        };
        document.documentElement.addEventListener('DOMSubtreeModified', refineCallback, false);
        document.documentElement.addEventListener('DOMNodeInserted', refineCallback, false);
        document.documentElement.addEventListener('DOMNodeRemoved', refineCallback, false);
    });
</script>

<!--  redirect after registration -->
   

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script>
   
   

var url = window.location.href;
if (~url.indexOf("/job/")) {
   var clickApplyNowButton = $.cookie("clickApplyNowButton");

   if (clickApplyNowButton == 'clickit') {
      $(document).ready(function() {
        $(".details-footer__btn-apply").trigger("click");
      });
      $.removeCookie('clickApplyNowButton', { path: '/' });
      
   } else {
      $.cookie("jobUrl", window.location.href, { path: '/', expires: 1 });
   }
}
if (~url.indexOf("/add-listing/?listing_type_id=Resume")) {
   var redirecturl = $.cookie("jobUrl");
   if (~redirecturl.indexOf("/job/")) {
      $.removeCookie('jobUrl', { path: '/' });
      $.cookie("clickApplyNowButton", 'clickit', { path: '/', expires: 1 });
      window.location.href = redirecturl;
   }
}

</script>
<!--  redirect after registration -->
   
<script>
   document.addEventListener('DOMContentLoaded', function() {
      var appSettings = $('#application-settings').closest('.form-group');
      if (appSettings.length) {
         appSettings.hide();
         $.get('/edit-profile/', function(data) {
          if ($(data).find('input[type="email"][value="aurora@coinbase.com"]').length) {
             appSettings.show();
          }
         });
      }
       $('#application-settings').closest('.form-group').hide();
   });
</script>

<script>
  (function (w,i,d,g,e,t,s) {w[d] = w[d]||[];t= i.createElement(g);
    t.async=1;t.src=e;s=i.getElementsByTagName(g)[0];s.parentNode.insertBefore(t, s);
  })(window, document, '_gscq','script','//widgets.getsitecontrol.com/93363/script.js');
</script>

<script>
  window.addEventListener("DOMContentLoaded", function () {
    var callback = function() {
      $('#apply-modal .modal-body a').last()
        //.attr('target', '_blank')
        .click(function() {
           $('#apply-modal').modal('hide');
        });
  };
document.documentElement.addEventListener('DOMSubtreeModified', callback, false);
document.documentElement.addEventListener('DOMNodeInserted', callback, false);
document.documentElement.addEventListener('DOMNodeRemoved', callback, false);
}, false);
</script>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    var url = window.location.href;
    if (~url.indexOf("/job/")) {
      if ( $( ".alert-bought-now" ).length ) {

        $('#apply-modal').modal('toggle');
        $('#apply-modal .modal-title').html("Share your job with your community to get more responses and we'll promote it to thousands of followers too!");
        $('#apply-modal .modal-body').html($( ".social-share" ).clone());
        $('#apply-modal .modal-body').css("text-align", "center");
        $("#apply-modal .social-share__title").remove();
        $("#apply-modal .social-share").removeClass("pull-right");

//         $( ".alert-bought-now" ).append("<br>");
//         $( ".social-share" ).clone().appendTo( ".alert-bought-now" );
//         $(".alert-bought-now .social-share__title").remove();
//         $(".alert-bought-now .social-share").removeClass("pull-right");
      }
    }
    if (~url.indexOf("/jobs/")) {
      if ($(".current-search").length) {
        setTimeout( function(){ 
          $(".create-job-alert").click();
        }  , 10000 );
      }
    }
  });
</script>
</head>

<body data-spy="scroll" data-target=".navbar"  align = 'center'>
  <br><br><br>
<?php
	include ('dbconnect.php');


	if(isset($_GET['page'])){
		$page = $_GET['page'];
		include($page.'.php');
	}

?>	
  
  
    <nav id="topnav" class="navbar navbar-fixed-top navbar-default" role="navigation" bgcolor="#E6E6FA">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
  				  <span class="icon-bar"></span>
  				  <span class="icon-bar"></span>
  				  <span class="icon-bar"></span>
  				</button>
  			  <a class="navbar-brand" href="index.php">BlockMart</a>
        </div>
  	<!-- Collect the nav links, forms, and other content for toggling -->
  			<div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav navbar-right">
				    <li><a href="index.php?page=jobs">Blockchain Jobs</a></li>
  				  <li><a href="index.php?page=companies">Blockchain Companies</a></li>
  				  <li><a href="index.php?page=post">Post Job</a></li>
            <li><a href="index.php?page=applicants">Applicant Search</a></li>
				    <li><a href="index.php?page=login">Log in</a></li>
				    <li><a href="index.php?page=signup">Sign up</a></li>
			      <li><a href="index.php?page=account">MyAccount</a></li>
			
			      
  			  </ul>
        </div>
		
  	<!-- /.navbar-collapse -->

  		</div>
  	</nav>
	
	
	
<?php
	if(!isset($_GET['page'])){
			?>
			<!--section2 -->
    <div class="section2">
      <div class="container-fluid">
        <div class="row">
			<br><br><br>
				<h1>About us</h1>
          <p><center>
            <p>Maintenance notices here Maintenance notices here Our party was a great success and the marquee was
              perfect for the occasion and so fortunately was the weather! Thank you to you
               and your team for erecting it so smoothly and professionally.</p>
          </center>
		  </p>
        </div>
      </div>
    </div><?php
	}
	
?>
<?php
	if(isset($_GET['page'])){
		?><br><br><br><?php
	}
?>
<!--Footer-->
    <div class="footer">
      <div class="container">
        <div class="row">
          <h4>Official Facebook Page</h4>
          <a href="#"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x" style="color:#fff;"></i>
                                                   <i class="fa fa-facebook fa-stack-1x"></i></a>
          <p>© 2017. All Rights Reserved<br>Towards Blockchain</p>
		  <p>Developed by: Vaibhav Saini
      	</div>
      </div>
    </div>

<script type="text/javascript">
      function ActivatePlacesSearch(){
        var input = document.getElementById('GooglePlace');
        var autocomplete = new google.maps.places.Autocomplete(input);
      }

    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5Gye4OvNxw-0ZEm3h_t7k8XutepCydlc&libraries=places&callback=ActivatePlacesSearch"></script>

  </body>
</html>
