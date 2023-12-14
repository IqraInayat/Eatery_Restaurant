<!DOCTYPE html>
<html lang="en">
<head>

     <title>Eatery Cafe and Restaurant Template</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="{{ asset("web/css/bootstrap.min.css") }}">
     <link rel="stylesheet" href="{{ asset("web/css/font-awesome.min.css") }}">
     <link rel="stylesheet" href="{{ asset("web/css/animate.css") }}">
     <link rel="stylesheet" href="{{ asset("web/css/owl.carousel.css") }}">
     <link rel="stylesheet" href="{{ asset("web/css/owl.theme.default.min.css") }}"> 
     <link rel="stylesheet" href="{{ asset("web/css/magnific-popup.css") }}">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="{{ asset("web/css/templatemo-style.css") }}">

</head>
<body>

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>


     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="index.html" class="navbar-brand">Eatery <span>.</span> Cafe</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="#home" class="smoothScroll">Home</a></li>
                         <li><a href="#about" class="smoothScroll">About</a></li>
                         <li><a href="#team" class="smoothScroll">Chef</a></li>
                         <li><a href="#menu" class="smoothScroll">Menu</a></li>
                         <li><a href="#contact" class="smoothScroll">Contact</a></li>
                         <li>
                         @if (Route::has('login'))
                         
                              @auth
                                   @if(auth()->user()->usertype === 'user')
                                        <li><a href="{{ url('/user/profile') }}">Dashboard</a></li>
                                   @elseif(auth()->user()->usertype === 'admin')
                                        <li><a href="{{ url('/user/logged') }}">Dashboard</a></li>
                                   @endif    
                         @else
                                   <li><a href="{{ route('login') }}">Log in</a></li>

                                   @if (Route::has('register'))
                                        <li><a href="{{ route('register') }}">Register</a></li>
                                   @endif
                              @endauth
                
                         @endif
                         </li>

                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                         {{-- <li><a href="#">Call Now! <i class="fa fa-phone"></i> 010 020 0340</a></li> --}}
                         <a href="#contact-form" class="section-btn">Reserve a table</a>
                    </ul>
               </div>

          </div>
     </section>


     <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="row">

                    <div class="owl-carousel owl-theme">
                         <div class="item item-first">
                              <div class="caption">
                                   <div class="container">
                                        <div class="col-md-8 col-sm-12">
                                             <h3>Eatery Cafe &amp; Restaurant</h3>
                                             <h1>Our mission is to provide an unforgettable experience</h1>
                                             <a href="#team" class="section-btn btn btn-default smoothScroll">Meet our chef</a>
                                        </div>
                                   </div>
                              </div>
                         </div>

                         <div class="item item-second">
                              <div class="caption">
                                   <div class="container">
                                        <div class="col-md-8 col-sm-12">
                                             <h3>Your Perfect Breakfast</h3>
                                             <h1>The best dinning quality can be here too!</h1>
                                             <a href="#menu" class="section-btn btn btn-default smoothScroll">Discover menu</a>
                                        </div>
                                   </div>
                              </div>
                         </div>

                         <div class="item item-third">
                              <div class="caption">
                                   <div class="container">
                                        <div class="col-md-8 col-sm-12">
                                             <h3>New Restaurant in Town</h3>
                                             <h1>Enjoy our special menus every Sunday and Friday</h1>
                                             <a href="#contact" class="section-btn btn btn-default smoothScroll">Reservation</a>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>

          </div>
     </section>


     <!-- ABOUT -->
     <section id="about" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-12">
                         <div class="about-info">
                              <div class="section-title wow fadeInUp" data-wow-delay="0.2s">
                                   <h4>Read our story</h4>
                                   <h2>We've been Making The Delicious Foods Since 1999</h2>
                              </div>

                              <div class="wow fadeInUp" data-wow-delay="0.4s">
                                   <p>Fusce hendrerit malesuada lacinia. Donec semper semper sem vitae malesuada. Proin scelerisque risus et ipsum semper molestie sed in nisi. Ut rhoncus congue lectus, rhoncus venenatis leo malesuada id.</p>
                                   <p>Sed elementum vel felis sed scelerisque. In arcu diam, sollicitudin eu nibh ac, posuere tristique magna. You can use this template for your cafe or restaurant website. Please tell your friends about <a href="https://plus.google.com/+templatemo" target="_parent">templatemo</a>. Thank you.</p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                         <div class="wow fadeInUp about-image" data-wow-delay="0.6s">
                              <img src="{{ asset("web/images/about-image.jpg") }}" class="img-responsive" alt="">
                         </div>
                    </div>
                    
               </div>
          </div>
     </section>


     <!-- TEAM -->
     <section id="team" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>Meet our chefs</h2>
                              <h4>They are nice &amp; friendly</h4>
                         </div>
                    </div>

                    <div id="chefCarousel" class="carousel slide col-md-12 col-sm-12" data-ride="carousel">
                         <div class="carousel-inner">
                             @foreach ($chef->chunk(3) as $key => $chunk)
                                 <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                     <div class="row">
                                         @foreach ($chunk as $chef)
                                             <div class="col-md-4 col-sm-4">
                                                  <div class="team-thumb wow fadeInUp" data-wow-delay="0.2s">
                                                 <img src="{{ asset('./admin/chefimages/' . $chef->image) }}"
                                                     height="300px" width="80%" alt="">
                                                  <div class="team-hover">
                                                       <div class="team-item">
                                                            <h4>{{ $chef->speciality }}</h4> 
                                                            <ul class="social-icon">
                                                                 <li><a href="#" class="fa fa-linkedin-square"></a></li>
                                                                 <li><a href="#" class="fa fa-envelope-o"></a></li>
                                                            </ul>
                                                       </div>
                                                  </div>
                                                 </div>
                                                 <div class="team-info">
                                                     <h3>{{ $chef->name }}</h3>
                                                     <p>{{ $chef->nationality }}</p>
     
                                                 </div>
                                             </div>
                                         @endforeach
                                     </div>
                                 </div>
                             @endforeach
                         </div>
     
                         <!-- Add navigation buttons -->
                         <a class="carousel-control-prev" href="#chefCarousel" role="button" data-slide="prev">
                             <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                             <span class="sr-only">Previous</span>
                         </a>
                         <a class="carousel-control-next" href="#chefCarousel" role="button" data-slide="next">
                             <span class="carousel-control-next-icon" aria-hidden="true"></span>
                             <span class="sr-only">Next</span>
                         </a>
                    </div>
                    
               </div>
          </div>
     </section>


     <!-- MENU-->
     <section id="menu" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>Our Menus</h2>
                              <h4>Tea Time &amp; Dining</h4>
                         </div>
                    </div> 

                    @foreach ($menu as $show_menu)
                    <div class="col-md-4 col-sm-6">
                         <!-- MENU THUMB -->
                         <div class="menu-thumb">
                              <a href="{{ asset('./admin/images/' . $show_menu->image) }}" class="image-popup" title="American Breakfast">
                                   <img src="{{ asset('./admin/images/' . $show_menu->image)}} " height="250px" width="30%"  alt="">

                                   <div class="menu-info">
                                        <div class="menu-item">
                                             <h3>{{ $show_menu->name }}</h3>
                                             <p>{{ $show_menu->chef }}</p>
                                        </div>
                                        <div class="menu-price">
                                             <span>{{ $show_menu->price}}</span>
                                        </div>
                                   </div>
                              </a>
                         </div>
                    </div>
                    @endforeach

                    <div class="col-md-12">
                         <!-- Pagination Links -->
                         {{ $menu->links() }}
                    </div>
               </div>
          </div>
     </section>


     <!-- TESTIMONIAL -->
     <section id="testimonial" data-stellar-background-ratio="0.5">
          <div class="overlay"></div>
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>Testimonials</h2>
                         </div>
                    </div>  

                    <div class="col-md-offset-2 col-md-8 col-sm-12">
                         <div class="owl-carousel owl-theme">
                              <div class="item">
                                   <p>Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Maecenas faucibus mollis interdum ullamcorper nulla non.</p>
                                        <div class="tst-author">
                                             <h4>Digital Carlson</h4>
                                             <span>Pharetra quam sit amet</span>
                                        </div>
                              </div>

                              <div class="item">
                                   <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed vestibulum orci quam.</p>
                                        <div class="tst-author">
                                             <h4>Johnny Stephen</h4>
                                             <span>Magna nisi porta ligula</span>
                                        </div>
                              </div>

                              <div class="item">
                                   <p>Vivamus aliquet felis eu diam ultricies congue. Morbi porta lorem nec consectetur porta quis dui elit habitant morbi.</p>
                                        <div class="tst-author">
                                             <h4>Jessie White</h4>
                                             <span>Vitae lacinia augue urna quis</span>
                                        </div>
                              </div>

                         </div>
                    </div>

               </div>
          </div>
     </section>  


     <!-- CONTACT -->
     <section id="contact" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">
	<!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
	-->
                    <div class="wow fadeInUp col-md-6 col-sm-12" data-wow-delay="0.4s">
                         <div id="google-map">
                              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3647.3030413476204!2d100.5641230193719!3d13.757206847615207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf51ce6427b7918fc!2sG+Tower!5e0!3m2!1sen!2sth!4v1510722015945" allowfullscreen></iframe>
                         </div>
                    </div>    

                    <div class="col-md-6 col-sm-12">

                         <div class="col-md-12 col-sm-12">
                              <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                                   <h2>Reserve Table</h2>
                              </div>
                         </div>

                         <!-- CONTACT FORM -->
                         <form action="{{ route('add_reserve')}}" method="post" class="wow fadeInUp" id="contact-form" role="form" data-wow-delay="0.8s">
                              @csrf
                              <!-- IF MAIL SENT SUCCESSFUL  // connect this with custom JS -->
                              <h6 class="text-success">Your message has been sent successfully.</h6>
                              
                              <!-- IF MAIL NOT SENT -->
                              <h6 class="text-danger">E-mail must be valid and message must be longer than 1 character.</h6>

                              <div class="col-md-6 col-sm-6">
                                   <input type="text" class="form-control" id="cf-name" name="name"
                                       placeholder="Full name">
                                       <p class="text-danger">
                                             @error('name')
                                                  {{$message}}
                                             @enderror
                                       </p>
                              </div>
       
                              <div class="col-md-6 col-sm-6">
                                   <input type="email" class="form-control" id="cf-email" name="email"
                                       placeholder="Email address">
                                       <p class="text-danger">
                                        @error('email')
                                             {{$message}}
                                        @enderror
                                  </p>
                              </div>
                               <div class="col-md-6 col-sm-6">
                                   <input type="datetime-local" class="form-control"  name="reserve_time">
                                   <p class="text-danger">
                                        @error('reserve_time')
                                             {{$message}}
                                        @enderror
                                  </p>
                               </div>
                               <div class="col-md-6 col-sm-6">
                                   <input type="number" class="form-control" id="cf-name" name="nog"
                                       placeholder="Number of Guests">
                                       <p class="text-danger">
                                        @error('nog')
                                             {{$message}}
                                        @enderror
                                  </p>
                               </div>
                               <div class="col-md-12 col-sm-12">
                                   <input type="number" class="form-control" id="cf-name" name="contact_number"
                                       placeholder="Enter Your Contact number">
                                       <p class="text-danger">
                                        @error('contact_number')
                                             {{$message}}
                                        @enderror
                                  </p>
                               </div>
                               <div class="col-md-12 col-sm-12">
                                  
       
                                   <textarea class="form-control" rows="6" id="cf-message" name="message" placeholder="Write Special requirement"></textarea>
                                 
                                   <button type="submit" class="form-control" id="cf-submit" name="submit">Send  Message</button>
                         </form>
                    </div>

               </div>
          </div>
     </section>          


     <!-- FOOTER -->
     <footer id="footer" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-3 col-sm-8">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2 class="wow fadeInUp" data-wow-delay="0.2s">Find us</h2>
                              </div>
                              <address class="wow fadeInUp" data-wow-delay="0.4s">
                                   <p>123 nulla a cursus rhoncus,<br> augue sem viverra 10870<br>id ultricies sapien</p>
                              </address>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-8">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2 class="wow fadeInUp" data-wow-delay="0.2s">Reservation</h2>
                              </div>
                              <address class="wow fadeInUp" data-wow-delay="0.4s">
                                   <p>090-080-0650 | 090-070-0430</p>
                                   <p><a href="mailto:info@company.com">info@company.com</a></p>
                                   <p>LINE: eatery247 </p>
                              </address>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-8">
                         <div class="footer-info footer-open-hour">
                              <div class="section-title">
                                   <h2 class="wow fadeInUp" data-wow-delay="0.2s">Open Hours</h2>
                              </div>
                              <div class="wow fadeInUp" data-wow-delay="0.4s">
                                   <p>Monday: Closed</p>
                                   <div>
                                        <strong>Tuesday to Friday</strong>
                                        <p>7:00 AM - 9:00 PM</p>
                                   </div>
                                   <div>
                                        <strong>Saturday - Sunday</strong>
                                        <p>11:00 AM - 10:00 PM</p>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-2 col-sm-4">
                         <ul class="wow fadeInUp social-icon" data-wow-delay="0.4s">
                              <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                              <li><a href="#" class="fa fa-twitter"></a></li>
                              <li><a href="#" class="fa fa-instagram"></a></li>
                              <li><a href="#" class="fa fa-google"></a></li>
                         </ul>

                         <div class="wow fadeInUp copyright-text" data-wow-delay="0.8s"> 
                              <p><br>Copyright &copy; 2018 <br>Your Company Name 
                              
                              <br><br>Design: <a rel="nofollow" href="http://templatemo.com" target="_parent">TemplateMo</a></p>
                         </div>
                    </div>
                    
               </div>
          </div>
     </footer>


     <!-- SCRIPTS -->
     <script src="{{ asset("web/js/bootstrap.min.js") }}"></script>
     <script src="{{ asset("web/js/jquery.js") }}"></script>
     <script src="{{ asset("web/js/jquery.stellar.min.js") }}"></script>
     <script src="{{ asset("web/js/wow.min.js") }}"></script>
     <script src="{{ asset("web/js/owl.carousel.min.js") }}"></script>
     <script src="{{ asset("web/js/jquery.magnific-popup.min.js") }}"></script>
     <script src="{{ asset("web/js/smoothscroll.js") }}"></script>
     <script src="{{ asset("web/js/custom.js") }}"></script>

</body>
</html>