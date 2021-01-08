<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ appName() }}</title>
    <meta name="description" content="@yield('meta_description', appName())">
    <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
    @yield('meta')
@include('includes.partials.head')
@include('includes.partials.ga')
</head>
<body>
    <!-- LOADER -->
    <div id="loader">
      <div class="position-center-center">
        <div class="loader"></div>
    </div>
</div>
<!-- Page Wrapper -->
<div id="wrap"> 
    @include('includes.partials.messages')
    <!-- Header -->
    @include('includes.partials.header')
    <!-- Nav -->
    @include('includes.partials.flynav')
    <!-- Slider -->
    <section class="home-slider">
        <div class="tp-banner-container">
          <div class="tp-banner">
            <ul>
              <!-- SLIDE  -->
              <li data-transition="random" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" > 
                <!-- MAIN IMAGE --> 
                <img src="images/slider-bg-1-1.jpg"  alt="slider"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"> 
                <!-- LAYERS --> 

                <!-- LAYER NR. 1 -->
                <div class="tp-caption sfr tp-resizeme"
                data-x="center" data-hoffset="0" 
                data-y="center" data-voffset="-90" 
                data-speed="500" 
                data-start="800" 
                data-easing="Power3.easeInOut" 
                data-splitin="chars" 
                data-splitout="none" 
                data-elementdelay="0.06" 
                data-endelementdelay="0.1" 
                data-endspeed="300"
                style="z-index: 5; font-weight:bold; font-size:56px; color:#000;">Welcome to Creative BIZTO</div>

                <!-- LAYER NR. 2 -->
                <div class="tp-caption sfr tp-resizeme" 
                data-x="center" data-hoffset="0" 
                data-y="center" data-voffset="-30" 
                data-speed="500" 
                data-start="1200" 
                data-easing="Power3.easeInOut" 
                data-splitin="chars" 
                data-splitout="none" 
                data-elementdelay="0.07" 
                data-endelementdelay="0.1" 
                data-endspeed="300" 
                style="z-index: 6; font-weight:bold; max-width: auto; font-size:36px; color:#000;">Creative Design & Online Marketing </div>

                <!-- LAYER NR. 3 -->
                <div class="tp-caption font-crimson font-italic sfb tp-resizeme" 
                data-x="center" data-hoffset="0" 
                data-y="center" data-voffset="20" 
                data-speed="500" 
                data-start="1600" 
                data-easing="Power3.easeInOut" 
                data-splitin="none" 
                data-splitout="none" 
                data-elementdelay="0.1" 
                data-endelementdelay="0.1" 
                data-endspeed="300" 
                style="z-index: 7; font-size:16px; color:#000; max-width: auto; max-height: auto; white-space: nowrap;">We are Based in London - UK </div>

                <!-- LAYER NR. 3 -->
                <div class="tp-caption sfb tp-resizeme" 
                data-x="center" data-hoffset="0" 
                data-y="center" data-voffset="100" 
                data-speed="500" 
                data-start="2000" 
                data-easing="Power3.easeInOut" 
                data-splitin="none" 
                data-splitout="none" 
                data-elementdelay="0.1" 
                data-endelementdelay="0.1" 
                data-endspeed="300" 
                style="z-index: 7; font-size:16px; color:#000; max-width: auto; max-height: auto; white-space: nowrap;"><a href="#." class="btn">BUY NOW</a></div>
            </li>

            <!-- SLIDE  -->
            <li data-transition="random" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" > 
                <!-- MAIN IMAGE --> 
                <img src="images/slider-bg-1-2.jpg"  alt="slider"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"> 
                <!-- LAYERS --> 

                <!-- LAYER NR. 1 -->
                <div class="tp-caption sfr tp-resizeme"
                data-x="center" data-hoffset="0" 
                data-y="center" data-voffset="-90" 
                data-speed="500" 
                data-start="800" 
                data-easing="Power3.easeInOut" 
                data-splitin="chars" 
                data-splitout="none" 
                data-elementdelay="0.06" 
                data-endelementdelay="0.1" 
                data-endspeed="300"
                style="z-index: 5; font-weight:bold; font-size:56px; color:#fff;">Creative Agency & MultiConcept </div>

                <!-- LAYER NR. 2 -->
                <div class="tp-caption sfr tp-resizeme " 
                data-x="center" data-hoffset="0" 
                data-y="center" data-voffset="-30" 
                data-speed="500" 
                data-start="1200" 
                data-easing="Power3.easeInOut" 
                data-splitin="chars" 
                data-splitout="none" 
                data-elementdelay="0.07" 
                data-endelementdelay="0.1" 
                data-endspeed="300" 
                style="z-index: 6; font-weight:bold; max-width: auto; font-size:36px; color:#fff;">Clean & Minimal Template </div>

                <!-- LAYER NR. 3 -->
                <div class="tp-caption font-crimson font-italic sfb tp-resizeme" 
                data-x="center" data-hoffset="0" 
                data-y="center" data-voffset="20" 
                data-speed="500" 
                data-start="1600" 
                data-easing="Power3.easeInOut" 
                data-splitin="none" 
                data-splitout="none" 
                data-elementdelay="0.1" 
                data-endelementdelay="0.1" 
                data-endspeed="300" 
                style="z-index: 7; font-size:16px; color:#fff; max-width: auto; max-height: auto; white-space: nowrap;">We are Based London - UK </div>

                <!-- LAYER NR. 3 -->
                <div class="tp-caption sfb tp-resizeme" 
                data-x="center" data-hoffset="0" 
                data-y="center" data-voffset="100" 
                data-speed="500" 
                data-start="2000" 
                data-easing="Power3.easeInOut" 
                data-splitin="none" 
                data-splitout="none" 
                data-elementdelay="0.1" 
                data-endelementdelay="0.1" 
                data-endspeed="300" 
                style="z-index: 7; font-size:16px; color:#000; max-width: auto; max-height: auto; white-space: nowrap;"><a href="#." class="btn btn-inverse">PURCHASE NOW</a></div>
            </li>

            <!-- SLIDE  -->
            <li data-transition="random" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off"> 
                <!-- MAIN IMAGE --> 
                <img src="images/slider-bg-1-3.jpg"  alt="slider"  data-bgposition="center bottom" data-bgfit="cover" data-bgrepeat="no-repeat"> 
                <!-- LAYERS --> 

                <!-- LAYER NR. 1 -->
                <div class="tp-caption sfr tp-resizeme"
                data-x="center" data-hoffset="0" 
                data-y="center" data-voffset="-90" 
                data-speed="500" 
                data-start="800" 
                data-easing="Power3.easeInOut" 
                data-splitin="chars" 
                data-splitout="none" 
                data-elementdelay="0.06" 
                data-endelementdelay="0.1" 
                data-endspeed="300"
                style="z-index: 5; font-weight:bold; font-size:56px; color:#000;">Creative - Minimal - Clean </div>

                <!-- LAYER NR. 2 -->
                <div class="tp-caption sfr tp-resizeme" 
                data-x="center" data-hoffset="0" 
                data-y="center" data-voffset="-30" 
                data-speed="500" 
                data-start="1200" 
                data-easing="Power3.easeInOut" 
                data-splitin="chars" 
                data-splitout="none" 
                data-elementdelay="0.07" 
                data-endelementdelay="0.1" 
                data-endspeed="300" 
                style="z-index: 6; font-weight:bold; max-width: auto; font-size:36px; color:#000;">Multipurpose html Template </div>

                <!-- LAYER NR. 3 -->
                <div class="tp-caption font-crimson  sfb tp-resizeme" 
                data-x="center" data-hoffset="0" 
                data-y="center" data-voffset="20" 
                data-speed="500" 
                data-start="1600" 
                data-easing="Power3.easeInOut" 
                data-splitin="none" 
                data-splitout="none" 
                data-elementdelay="0.1" 
                data-endelementdelay="0.1" 
                data-endspeed="300" 
                style="z-index: 7; font-size:16px; color:#000; max-width: auto; max-height: auto; white-space: nowrap;">Well Layered and ready to use </div>

                <!-- LAYER NR. 3 -->
                <div class="tp-caption sfb tp-resizeme" 
                data-x="center" data-hoffset="0" 
                data-y="center" data-voffset="100" 
                data-speed="500" 
                data-start="2000" 
                data-easing="Power3.easeInOut" 
                data-splitin="none" 
                data-splitout="none" 
                data-elementdelay="0.1" 
                data-endelementdelay="0.1" 
                data-endspeed="300" 
                style="z-index: 7; font-size:16px; color:#000; max-width: auto; max-height: auto; white-space: nowrap;"><a href="#." class="btn">CONATCT NOW</a></div>
            </li>
        </ul>
        </div>
     </div>
    </section>

<!-- Content -->
<div id="content"> 

    <!-- About Sec -->
<section class="about-ser pad-t-b-130">
      <div class="container"> 

        <!-- Heading -->
        <div class="heading-block margin-bottom-20">
          <h4>- Best Solution for Creative Website - </h4>
          <h2>AWESOME MULTICONCEPT THEME</h2>
      </div>
      <div class="intro-small col-md-10 center-auto">
          <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
      </div>
      <div class="row"> 

          <!-- Our Mission -->
          <div class="col-sm-4">
            <article> <i class="flaticon-light-bulb animate fadeInLeft" data-wow-delay="0.4s"></i>
              <h3>Our Creativity</h3>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Typesetting and dummy text of the printing and typesetting industry.</p>
              <a href="#.">Read More</a> </article>
          </div>
          
          <!-- Our Mission -->
          <div class="col-sm-4">
            <article> <i class="flaticon-targeting animate fadeInLeft" data-wow-delay="0.4s"></i>
              <h3>Our Passion</h3>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Typesetting and dummy text of the printing and typesetting industry.</p>
              <a href="#.">Read More</a> </article>
          </div>
          
          <!-- Our Mission -->
          <div class="col-sm-4">
            <article> <i class="flaticon-layers-1 animate fadeInLeft" data-wow-delay="0.4s"></i>
              <h3>Our Expertise</h3>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Typesetting and dummy text of the printing and typesetting industry.</p>
              <a href="#.">Read More</a> </article>
          </div>
       </div>
     </div>
</section>

<!-- Left Background -->
<div class="main-page-section half_left_layout">
  <div class="main-half-layout half_left_layout studio-bg"></div>

  <!-- Right Content -->
  <div class="main-half-layout-container half_left_layout">
    <div class="about-us-con">
      <div class="heading">
        <h3 class="v-hr">We are Creative</h3>
    </div>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nibh dolor, efficitur eget pharetra ac, cursus sed sapien. Cras posuere ligula ut blandit varius. Nunc consectetur scelerisque felis, et volutpat massa aliquam in. Curabitur sodales porttitor tortor sit amet malesuada.</p>
    <p>Consectetur adipiscing elit. Maecenas nibh dolor, efficitur eget pharetra ac, cursus sed sapien. Cras posuere ligula ut blandit varius. Nunc consectetur scelerisque felis, et volutpat massa aliquam in.</p>
    <div class="skills padding-top-30"> 

        <!-- Skills Bars -->
        <div class="progress-bars"> 
          <!-- Photoshop -->
          <div class="bar">
            <p>Photoshop </p>
            <div class="progress" data-percent="95%">
              <div class="progress-bar"> <span class="progress-bar-tooltip">95%</span></div>
          </div>
      </div>

      <!-- digital marketing -->
      <div class="bar">
        <p>Digital Marketing</p>
        <div class="progress" data-percent="100%">
          <div class="progress-bar"><span class="progress-bar-tooltip">100%</span> </div>
      </div>
  </div>

  <!-- HTML5 CSS3 -->
  <div class="bar">
    <p>Front End Development</p>
    <div class="progress" data-percent="50%">
      <div class="progress-bar"><span class="progress-bar-tooltip">50%</span> </div>
  </div>
</div>

<!-- Development -->
<div class="bar">
    <p>WordPress</p>
    <div class="progress" data-percent="99%">
      <div class="progress-bar"><span class="progress-bar-tooltip">99%</span> </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Counter -->
<div class="counters nolist-style">
  <ul class="row">

    <!-- PROPOSALS SENT -->
    <li class="col-sm-3"> <span class="counter" >2087</span> <span>k</span>
      <p>Lines Of codes</p>
  </li>

  <!-- PROPOSALS SENT -->
  <li class="col-sm-3"> <span class="counter">750</span>
      <p>Cups of Coffee</p>
  </li>

  <!-- AWARDS WON -->
  <li class="col-sm-3"> <span class="counter">10</span>
      <p>Awards Won</p>
  </li>
  <li class="col-sm-3"> <span class="counter">550</span>
      <p>Teamplates</p>
  </li>
</ul>
</div>

<!-- OUR SERVICES -->
<section class="our-main-ser pad-t-b-130 padding-bottom-90">
  <div class="container"> 

    <!-- Heading -->
    <div class="heading-block margin-bottom-20">
      <h4>- Our Best Solution - </h4>
      <h2>WHAT WE OFFER</h2>
  </div>
  <div class="intro-small col-md-8 center-auto">
      <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout..</p>
  </div>

  <!-- OUR SERVICES LIST -->
  <div class="nolist-style">
      <ul class="row">

        <!-- OUR SERVICES LIST -->
        <li class="col-sm-4"> <i class="icon-tools animate fadeInUp" data-wow-delay="0.4s"></i>
          <h6>Branding Design</h6>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been indust.</p>
      </li>

      <!-- Unlimited Features -->
      <li class="col-sm-4"> <i class="flaticon-connection animate fadeInUp" data-wow-delay="0.6s"></i>
          <h6>Digital Marketing</h6>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been indust.</p>
      </li>

      <!-- Ultra Responsive -->
      <li class="col-sm-4"> <i class="flaticon-cogwheel-1 animate fadeInUp" data-wow-delay="0.4s"></i>
          <h6>Web Develpment</h6>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been indust.</p>
      </li>

      <!-- Discuss Idea -->
      <li class="col-sm-4"> <i class="flaticon-android animate fadeInUp" data-wow-delay="0.6s"></i>
          <h6>Mobile Applications</h6>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been indust.</p>
      </li>

      <!-- Discuss Idea -->
      <li class="col-sm-4"> <i class="flaticon-technology-2 animate fadeInUp" data-wow-delay="0.6s"></i>
          <h6>Photography</h6>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been indust.</p>
      </li>

      <!-- Discuss Idea -->
      <li class="col-sm-4"> <i class="flaticon-search animate fadeInUp" data-wow-delay="0.6s"></i>
          <h6>Digital Art</h6>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been indust.</p>
      </li>
  </ul>
</div>
</div>
</section>

<!-- Portfolio -->
<section class="portfolio port-wrap pad-t-b-130">
  <div class="container"> 

    <!-- Heading -->
    <div class="heading-block margin-bottom-30">
      <h3>our Latest Portfolio</h3>
      <hr>
  </div>
  <div class="intro-small col-md-8 center-auto">
      <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout..</p>
  </div>

  <!-- PORTOFLIO ITEMS FILTER -->
  <ul class="portfolio-filter">
      <li><a class="active" href="#." data-filter="*">All</a></li>
      <li><a href="#." data-filter=".brand">Branding </a></li>
      <li><a href="#." data-filter=".web">Web Design</a></li>
      <li><a href="#." data-filter=".mob-app">Mobile App</a></li>
      <li><a href="#." data-filter=".photo">Photography </a></li>
  </ul>

  <!-- Item Start -->
  <div class="items with-space col-3 popup-gallery"> 

      <!-- ITEM -->
      <div class="cbp-item portfolio-item web mob-app photo ui">
        <article>
          <div class="portfolio-image"> <img alt="" src="images/img1-1.jpg">
            <div class="portfolio-overlay"></div>
            <div class="position-bottom"> <a href="images/img1-1.jpg" class="img-pop icon" title=""><i class="icon-magnifier"></i></a>
              <h4><a href="single_project_1.html">Creative Design Layout</a></h4>
              <p>Design & Fun</p>
          </div>
      </div>
  </article>
</div>

<!-- Item -->
<div class="cbp-item portfolio-item brand web mob-app">
    <article>
      <div class="portfolio-image"> <img alt="" src="images/img1-2.jpg">
        <div class="portfolio-overlay"></div>
        <div class="position-bottom"> <a href="images/img1-2.jpg" class="img-pop icon" title=""><i class="icon-magnifier"></i></a>
          <h4><a href="single_project_2.html">Creative Design Layout</a></h4>
          <p>Photoshop</p>
      </div>
  </div>
</article>
</div>

<!-- Item -->
<div class="cbp-item portfolio-item web photo ui">
    <article>
      <div class="portfolio-image"> <img alt="" src="images/img1-3.jpg">
        <div class="portfolio-overlay"></div>
        <div class="position-bottom"> <a href="images/img1-3.jpg" class="img-pop icon" title=""><i class="icon-magnifier"></i></a>
          <h4><a href="single_project_3.html">Back to School</a></h4>
          <p>Fashion & Style</p>
      </div>
  </div>
</article>
</div>

<!-- Item -->
<div class="cbp-item portfolio-item mob-app photo ui">
    <article>
      <div class="portfolio-image"> <img alt="" src="images/img1-4.jpg">
        <div class="portfolio-overlay"></div>
        <div class="position-bottom"> <a href="images/img1-4.jpg" class="img-pop icon" title=""><i class="icon-magnifier"></i></a>
          <h4><a href="single_project_4.html">Creative Design Layout</a></h4>
          <p>Photography</p>
      </div>
  </div>
</article>
</div>

<!-- Item -->
<div class="cbp-item portfolio-item mob-app photo">
    <article>
      <div class="portfolio-image"> <img alt="" src="images/img1-6.jpg">
        <div class="portfolio-overlay"></div>
        <div class="position-bottom"> <a href="images/img1-6.jpg" class="img-pop icon" title=""><i class="icon-magnifier"></i></a>
          <h4><a href="single_project_1.html">Creative Unique Ideas</a></h4>
          <p>Interior</p>
      </div>
  </div>
</article>
</div>

<!-- Item -->
<div class="cbp-item portfolio-item mob-app photo ui">
    <article>
      <div class="portfolio-image"> <img alt="" src="images/img1-5.jpg">
        <div class="portfolio-overlay"></div>
        <div class="position-bottom"> <a href="images/img1-5.jpg" class="img-pop icon" title=""><i class="icon-magnifier"></i></a>
          <h4><a href="single_project_2.html">Creative Design Layout</a></h4>
          <p>Photography</p>
      </div>
  </div>
</article>
</div>
</div>

<!-- LOAD MORE -->
<div class="text-center margin-top-50 animate fadeInUp" data-wow-delay="0.4s"> <a href="portfolio_1-4-col.html" class="btn btn-inverse">CHECK OUT MORE PORTFOLIO</a> </div>
</div>
</section>

<!-- Tesm Text -->
<section class="lookin-pro" data-stellar-background-ratio="0.5">
  <div class="container"> 

    <!-- Heading -->
    <div class="heading-block white margin-bottom-20">
      <h4>- We are Professionals - </h4>
      <h3>Start a New Project With us</h3>
      <hr>
  </div>
  <div class="intro-small col-md-11 center-auto margin-bottom-0">
      <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been indust.</p>
  </div>
  <div class="text-center"> <a href="#." class="btn animate fadeInUp" data-wow-delay="0.4s">Contact Us</a> <a href="#." class="btn animate fadeInUp" data-wow-delay="0.4s">Get a Quote</a> </div>
</div>
</section>

<!-- OUR TEAM -->
<section class="our-team pad-t-b-130 padding-bottom-80">
  <div class="container"> 

    <!-- Heading -->
    <div class="heading-block margin-bottom-30">
      <h3>our team Members</h3>
      <hr>
  </div>
  <div class="intro-small col-md-8 center-auto">
      <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout..</p>
  </div>

  <!-- Team  -->
  <div class="team-part">
      <div class="row"> 

        <!-- Team Member -->
        <div class="col-sm-4">
          <article> 
            <!-- Team Img -->
            <div class="team-img animate"> <img class="img-responsive" src="images/team-img-1.jpg" alt=""> 

              <!-- Social -->
              <div class="team-hover">
                <div class="position-center-center"> <a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-behance"></i></a> </div>
            </div>
        </div>

        <!-- Team Name -->
        <div class="team-name">
          <h6>M_Adnan Arif</h6>
          <p>CEO Founder</p>
      </div>
  </article>
</div>

<!-- Team Member -->
<div class="col-sm-4">
  <article> 
    <!-- Team Img -->
    <div class="team-img animate"> <img class="img-responsive" src="images/team-img-2.jpg" alt=""> 

      <!-- Social -->
      <div class="team-hover">
        <div class="position-center-center">
          <p>It is a long established fact that a reader will be distracted</p>
          <a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-behance"></i></a> </div>
      </div>
  </div>

  <!-- Team Name -->
  <div class="team-name">
      <h6>Adnan Arif</h6>
      <p>Web Designer</p>
  </div>
</article>
</div>

<!-- Team Member -->
<div class="col-sm-4">
  <article> 
    <!-- Team Img -->
    <div class="team-img animate"> <img class="img-responsive" src="images/team-img-3.jpg" alt=""> 

      <!-- Social -->
      <div class="team-hover">
        <div class="position-center-center"> <a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-behance"></i></a> </div>
    </div>
</div>

<!-- Team Name -->
<div class="team-name">
  <h6>Ali Jaun</h6>
  <p>Web Developer</p>
</div>
</article>
</div>
</div>
</div>
</div>
</section>

<!-- Clients -->
<section class="testimonial" data-stellar-background-ratio="0.5">
  <div class="container"> 

    <!-- Heading -->
    <div class="heading-block white">
      <h3>What Our Customers Say</h3>
      <hr>
  </div>

  <!-- Slider -->
  <div class="slider-sec">
      <div id="testi-slide"> 

        <!-- Slide -->
        <div class="item">
          <div class="tesi-text">
            <div class="avatar"> <img src="images/comments-avatar-2.jpg" alt="" > </div>
            <p>The design is great, the code is easy to modify. 
              As a developer it was easy for me to understand and modify the code - it was organised, well documented, and used correct conventions.

          It was delightful to see such a professional job. </p>
          <h6>- OliverKraus -</h6>
          <span>Themeforest</span> </div>
      </div>
      <div class="item">
          <div class="tesi-text">
            <div class="avatar"> <img src="images/comments-avatar-2.jpg" alt="" > </div>
            <p>Superb customer support! I have purchased a few themes and M_Adnan is very fast and polite. Great template, author is very helpful, best customer support ever! Very nice looking theme and easy to customise once you get hang of page builder.

            Highly recommend! </p>
            <h6>- Websonic75 -</h6>
            <span>ThemeForest</span> </div>
        </div>
    </div>
</div>
</div>
</section>

<!-- OUR SERVICES -->
<section class="new-main pad-t-b-130">
  <div class="container"> 

    <!-- Heading -->
    <div class="heading-block">
      <h3>Our Latest News</h3>
      <hr>
  </div>

  <!-- News Post -->
  <div class="news-post">
      <div class="row">
        <div class="col-md-4">
          <article > <img class="img-responsive"  src="images/blog-img-1.jpg" alt="" > <span>By Admin</span> <span>10 Nov, 2018</span> <a href="#." class="news-tittle">The Best Blog Tittle</a>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been indust.</p>
            <a href="#." class="red-more">Read More</a> </article>
        </div>
        <div class="col-md-4">
          <article> <img class="img-responsive" src="images/blog-img-2.jpg" alt="" > <span>By Admin</span> <span>10 Nov, 2018</span> <a href="#." class="news-tittle">The Best Blog Tittle</a>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been indust.</p>
            <a href="#." class="red-more">Read More</a> </article>
        </div>
        <div class="col-md-4">
          <article> <img class="img-responsive" src="images/blog-img-3.jpg" alt="" > <span>By Admin</span> <span>10 Nov, 2018</span> <a href="#." class="news-tittle">The Best Blog Tittle</a>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been indust.</p>
            <a href="#." class="red-more">Read More</a> </article>
        </div>
    </div>
</div>
</div>
</section>

<!-- OUR SERVICES -->
<section class="client-sec">
  <div class="container"> 

    <!-- Heading -->
    <div class="heading-block margin-bottom-30">
      <h3>our Best Partherns</h3>
      <hr>
  </div>
  <div class="intro-small col-md-8 center-auto">
      <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout..</p>
  </div>
  <div class="slide-5 text-center">
      <div><img src="/images/client-img-1.png" alt="" ></div>
      <div><img src="/images/client-img-2.png" alt="" ></div>
      <div><img src="/images/client-img-3.png" alt="" ></div>
      <div><img src="/images/client-img-4.png" alt="" ></div>
      <div><img src="/images/client-img-5.png" alt="" ></div>
      <div><img src="/images/client-img-3.png" alt="" ></div>
      <div><img src="/images/client-img-4.png" alt="" ></div>
      <div><img src="/images/client-img-5.png" alt="" ></div>
  </div>
</div>
</section>
</div>
<!-- End Content --> 
@include('includes.partials.read-only')
@include('includes.partials.logged-in-as')
{{--         @include('includes.partials.announcements') --}}

{{-- <div id="app" class="flex-center position-ref full-height">
    <div class="top-right links">
        @auth
        @if ($logged_in_user->isUser())
        <a href="{{ route('frontend.user.dashboard') }}">@lang('Dashboard')</a>
        @endif

        <a href="{{ route('frontend.user.account') }}">@lang('Account')</a>
        @else
        <a href="{{ route('frontend.auth.login') }}">@lang('Login')</a>

        @if (config('boilerplate.access.user.registration'))
        <a href="{{ route('frontend.auth.register') }}">@lang('Register')</a>
        @endif
        @endauth
    </div><!--top-right-->


</div><!--app--> --}}


@include('includes.partials.footer')

<!-- GO TO TOP  --> 
<a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a> 
<!-- GO TO TOP End --> 
</div>
<!-- End Page Wrapper --> 
@stack('before-scripts')
<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
<script src="{{ mix('js/frontend.js') }}"></script>

@include('includes.footerscripts')
@stack('after-scripts')
</body>
</html>
