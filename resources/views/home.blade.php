@extends('layouts.navbar')

@section('content')


  <!-- ***** Header Area End ***** -->

  <div class="main-banner" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="caption header-text">
            <h6>Free Blog Post</h6>
            <div class="line-dec"></div>
            <h4>Increase <em>The SEO</em> Rank <span>Here </span></h4>
            <p>Free Post is the best SEO website here you can Uplaod & increse your website rank on Goggle. It is a free blog Upload website for you. There are many pages, <a href="/dashboard">Home</a>, <a href="/about">Post</a>, and <a href="/faq">FAQ</a>.</p>
            <div class="main-button scroll-to-section"><a href="#services">Discover More</a></div>
            <span>or</span>
            <div class="second-button"><a href="/faqs">Check our FAQs</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="projects section" id="">

    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h2>Latest  <em>Blog</em> &amp; <span>Upload</span></h2>
            <div class="line-dec"></div>
            {{-- <p>this is the latest blgo post here you can easily </p> --}}
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
            <div class="owl-features owl-carousel">
                @foreach ($blogPosts as $blogPost)
                    <div class="item">
                        <img src="{{ asset('images/' . $blogPost->image) }}" alt="Image" max-height="150px" onclick="showDetails('{{ $blogPost->title }}', '{{ $blogPost->description }}', '{{ $blogPost->url }}')">
                        <div class="down-content">
                            <h4>{{ Str::limit($blogPost->title, 50) }}</h4>
                            <p>{{ Str::limit($blogPost->description, 50) }}</p>
                            @if (strlen($blogPost->description) > 150)
                                <a href="#" onclick="showDetails('{{ $blogPost->title }}', '{{ $blogPost->description }}', '{{ $blogPost->url }}')">Read More</a>
                            @endif
                            <a href="{{ $blogPost->url }}"><i class="fa fa-link"></i> </a>
                        </div>
                    </div>
                @endforeach
            </div>



        </div>
      </div>
    </div>

  </div>

  <div class="services section" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-6">
          <div class="row">
            <div class="col-lg-12">
              <div class="section-heading">
                <h2>We Provide <em>Different Services</em> &amp;
                  <span>Features</span> For Your Agency</h2>
                  <div class="line-dec"></div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doers eiusmod.</p>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6">
              <div class="service-item">
                <div class="icon">
                  <img src="{{url('images/services-01.jpg')}}" alt="discover SEO" class="templatemo-feature">
                </div>
                <h4>Discover More on Latest SEO Trends</h4>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6">
              <div class="service-item">
                <div class="icon">
                  <img src="{{url('images/services-02.jpg')}}" alt="data analysis" class="templatemo-feature">
                </div>
                <h4>Real-Time Big Data Analysis</h4>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6">
              <div class="service-item">
                <div class="icon">
                  <img src="{{url('images/services-03.jpg')}}" alt="precise data" class="templatemo-feature">
                </div>
                <h4>Precise Data Analysis &amp; Prediction</h4>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6">
              <div class="service-item">
                <div class="icon">
                  <img src="{{url('images/services-04.jpg')}}" alt="SEO marketing" class="templatemo-feature">
                </div>
                <h4>SEO Marketing &amp; Social Media</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="infos section" id="infos">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="main-content">
            <div class="row">
              <div class="col-lg-6">
                <div class="left-image">
                  <img src="{{url('images/left-infos.jpg')}}" alt="">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="section-heading">
                  <h2>More <em>About Us</em> &amp; What <span>We Offer</span></h2>
                  <div class="line-dec"></div>
                  <p>You are free to use this template for any purpose. You are not allowed to redistribute the downloadable ZIP file of Tale SEO Template on any other template website. Please contact us. Thank you.</p>
                </div>
                <div class="skills">
                  <div class="skill-slide marketing">
                    <div class="fill"></div>
                    <h6>Marketing</h6>
                    <span>90%</span>
                  </div>
                  <div class="skill-slide digital">
                    <div class="fill"></div>
                    <h6>Ditigal Media</h6>
                    <span>80%</span>
                  </div>
                  <div class="skill-slide media">
                    <div class="fill"></div>
                    <h6>Social Media Managing</h6>
                    <span>95%</span>
                  </div>
                </div>
                <p class="more-info">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doers eiusmod tempor incididunt ut labore et dolore dolor dolor sit amet, consectetur adipiscing elit, sed doers eiusmod.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-us section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="contact-us-content">
            <div class="row">
              <div class="col-lg-4">
                <div id="map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12469.776493332698!2d-80.14036379941481!3d25.907788681148624!2m3!1f357.26927939317244!2f20.870722720054623!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x88d9add4b4ac788f%3A0xe77469d09480fcdb!2sSunny%20Isles%20Beach!5e1!3m2!1sen!2sth!4v1642869952544!5m2!1sen!2sth" width="100%" height="670px" frameborder="0" style="border:0; border-radius: 23px;" allowfullscreen=""></iframe>
                </div>
              </div>
              <div class="col-lg-8">
                <form id="contact-form" action="" method="post">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="section-heading">
                        <h2><em>Contact Us</em> &amp; Get In <span>Touch</span></h2>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="name" name="name" id="name" placeholder="Your Name..." autocomplete="on" required>
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="surname" name="surname" id="surname" placeholder="Your Surname..." autocomplete="on" required>
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail..." required="">
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="subject" name="subject" id="subject" placeholder="Subject..." autocomplete="on" >
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <textarea name="message" id="message" placeholder="Your Message"></textarea>
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="orange-button">Send Message Now</button>
                      </fieldset>
                    </div>
                  </div>
                </form>
                <div class="more-info">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="info-item">
                        <i class="fa fa-phone"></i>
                        <h4><a href="#">9045526654</a></h4>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="info-item">
                        <i class="fa fa-envelope"></i>
                        <h4><a href="#">ps.s100697@company.com</a></h4>
                        {{-- <h4><a href="#">hello@company.com</a></h4> --}}
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="info-item">
                        <i class="fa fa-map-marker"></i>
                        <h4><a href="#">Delhi Ncr</a></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p>Copyright © 2023 <a href="#">Free post Website</a>. All rights reserved.

        {{-- <br>Design: <a href="/" target="_blank">TemplateMo</a></p> --}}
      </div>
    </div>
  </footer>
  <script>
    function showDetails(title, description, url) {
        // Display the blog post details and URL in a modal or any other desired way
        // You can use JavaScript frameworks like Bootstrap Modal or create a custom solution
        // Example using Bootstrap Modal:
        $('#myModal').modal('show'); // Show the modal
        $('#modalTitle').text(title); // Set the title in the modal
        $('#modalDescription').text(description); // Set the description in the modal
        $('#modalLink').attr('href', url); // Set the URL as the link in the modal
    }
</script>

@endsection
