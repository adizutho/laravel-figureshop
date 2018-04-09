<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Anime Figure Paradise</title>
<link type="text/css" href="/theme/css/bootstrap.css" rel="stylesheet"/>
<link type="text/css" href="/theme/css/font-awesome.css" rel="stylesheet" />
<link type="text/css" href="/theme/css/style.css" rel="stylesheet"/>
<script type="text/javascript" src="/theme/js/jquery-1.11.3.js"></script>

<style>
.greyBg{ margin-top:20px}
.inner_msg{
	clear: both;
	padding: 10px;
	margin: 0 auto;
	width:99%;
	background-color:#efefef;
	border:1px solid #ccc;
	min-height: 150px;
}
.inner_msg p{
	color:#000; font-size:15px;
	text-align: center;

}
.list option{
	margin-top: 10px
}
.inboxMain{
	min-height:400px; background-color:#fff; padding:10px;
	border:1px solid #ccc
}
.inboxRow{
	border-bottom:1px solid #ccc; padding:10px
}

</style>
</head>
<body>
<header id="header" class="hidden-xs">
	<div class="topbar">
		<div class="container">
			<div class="row">
				<div class="col-sm-6"><div class="tollNum">Email us : figure.shop.paradise@gmail.com</div></div>
				<div class="col-sm-6">

					<div class="account-link ">

						<ul>
							@if(Auth::check())
							<!-- <li><a href="{{url('/inbox')}}" >INBOX(0)</a></li> -->
							<li><a href="{{url('/user_profile')}}">MY ACCOUNT</a></li>
							<li><a href="{{url('/User_logout')}}">LOGOUT</a></li>
							@else
							<li><a href="{{url('/user_login')}}">LOGIN</a></li>
							@endif
							<li><a onclick="javascript:showDiv('slidingDiv');"
								 href="javascript:;">SEARCH</a>
								<div id="slidingDiv" class="srchBox">
									<form action="{{url('search-product')}}">
									 <input type="text" name="searchData" />
						            <i class="fa fa-search"></i>
											</form>
						        </div>
							</li>

						</ul>
					</div>
				</div>
		    </div>
	    </div>
    </div>
    <div class="container">
    	<div class="row">
    		<div class="col-sm-2">
					<div class="logo">
						<a href="{{url('/')}}" class="logo-container"><img src="/theme/images/logo.png" /></a></div></div>
    		<div class="col-sm-8">
				<div class="nav-link">
					<ul>
						<li><a href="{{url('/product-list')}}">FIGURE LIST</a>
							<?php /*<ul class="dropdown">
								@foreach(App\Category::all() as $category)
								 <li>
									<a href="{{url('/product-list')}}/{{$category->category_name}}">
										<p>{{$category->category_name}}</p></a>
								 </li>
								 @endforeach

				        	</ul><*/?>
						</li>

					</ul>
				</div>
		    </div>
		    <div class="col-sm-2">
				<div class="nav-btns">
					<div class="nav-cart">
						<a href="#"><img src="/theme/images/cart.png"/>
						 
					 </a>
					</div>
				</div>
		    </div>
		</div>
	</div>
</header>
<header id="header" class=" hidden-sm hidden-md hidden-lg">
	<div class="nav-toggle"><div class="icon-menu"> <span class="line line-1"></span> <span class="line line-2"></span> <span class="line line-3"></span> </div></div>
	<div class="logo"><a href="index.php"><img src="/theme/images/logo.png" alt=""  /></a></div>
	<div class="m-cart">
		<div class="nav-btns">
			<div class="nav-cart">
				<img src="/theme/images/cart.png"/>
				<span>0</span>
			</div>
		</div>
	</div>
	<div class="nav-container">
		<div class="mob-srch">
           <input type="text" placeholder="Search here..." />
        </div>
		<div>
		    <ul class="topnav">

		        <li><a href="#">Products</a>
		            <ul>
								<li><a href="#">Suspendisse semper</a></li>
				                <li><a href="#">lorem gravida</a></li>
				                <li><a href="#">Vestibulum</a></li>
				                <li><a href="#">Tincidunt </a></li>
				    </ul>
		        </li>


		    </ul>
	        <div class="mob-nav">
	        	<ul>
	        		<li><a href="business-enquiry.php"> <i class="fa fa-th"></i> Bulk Buying</a></li>
                    <li><a href="faq.php"><i class="fa fa-question-circle"></i> Faq's</a></li>
                    <li><a href="testimonials.php"><i class="fa fa-users"></i> Testimonials</a></li>
                    <li><a href="shipping-policy.php"><i class="fa fa-paper-plane"></i> Shipping Policy</a></li>
                    <li><a href="return-policy.php"><i class="fa fa-refresh"></i> Return Policy</a></li>
		          	<div class="clearfix"></div>
		        </ul>
	        </div>
        </div>
	</div>
	<div class="clearfix"></div>
</header>
  @yield('content')

<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="col-sm-3 col-lg-3 hidden-xs">
          <h5>CATEGORIES</h5>
          <div class="ft-link">
            <ul>
            @foreach(App\Category::all() as $category)
              <li><a href="{{url('/product-list')}}/{{$category->category_name}}">{{$category->category_name}}</a></li>
            @endforeach
            </ul>
          </div>
        </div>
        <div class="col-sm-5 col-lg-4">
          <h5>Follow Us</h5>
          <div class="newsletter">
            <ul class="social">
              <li><a href="https://www.facebook.com/lapak.figure.miina" class="facebook"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://www.twitter.com/aditrf" class="twitter"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://www.youtube.com/channel/UCMO_xEWx2SSQyiCS3FjWgYQ" class="youtube"><i class="fa fa-play"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="copyrt">
          &copy; 2017 Anime Figure Paradise. All Rights Reserved. <a href="terms-conditions.php">Terms &amp; Conditions</a>
        </div>
      </div>
    </div>
  </div>
</footer>
<script type="text/javascript" src="/theme/js/html5.js"></script>
<script type="text/javascript" src="/theme/js/bootstrap.js"></script>
<script type="text/javascript" src="/theme/js/multiple-accordion.js"></script>
<script type="text/javascript" src="/theme/js/jquery.nice-select.js"></script>
<script type="text/javascript" src="/theme/js/jquery.bootstrap-responsive-tabs.js"></script>
<script>
$(function() {
    var html = $('html, body'),
        navContainer = $('.nav-container'),
        navToggle = $('.nav-toggle'),
        navDropdownToggle = $('.has-dropdown');
    // Nav toggle
    navToggle.on('click', function(e) {
        var $this = $(this);
        e.preventDefault();
        $this.toggleClass('is-active');
        navContainer.toggleClass('is-visible');
        html.toggleClass('nav-open');
    });
});
</script>
<script language="JavaScript">
  $(document).ready(function() {
    $(".topnav").accordion({
      accordion:false,
      speed: 500,
      closedSign: '+',
      openedSign: '-'
    });
  });
</script>
<script type="text/javascript">

    $(document).ready(function() {
      $('select').niceSelect();
    //  FastClick.attach(document.body);
    });
</script>
<script>
$('.responsive-tabs').responsiveTabs({
  accordionOn: ['xs', 'sm']
});
</script>
<script type="text/javascript">
  function showDiv(divname){
    closealldivs(divname);
    $("#"+divname).slideToggle();
  }
  function closeMe(trgt)
  {
   $("#slidingDiv"+trgt).toggle();
  }
  function closealldivs(divname){
    for(var i=1; i<=3; i++){
      var abc="slidingDiv"+i;
      if(divname!=abc){
     $("#slidingDiv"+i).hide(); }
  }}
</script>
<script type="text/javascript">
  $('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
</script>
</body>
</html>
