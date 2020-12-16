<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Anyar</span></h2>
          <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Kami berkomitmen perbaiki sumber daya air di Indonesia.</h2>
          <p class="animate__animated animate__fadeInUp">Indonesia Water Institute (IWI) adalah bentuk integritas, keilmuan, serta tanggung jawab para ahli keairan di Indonesia terhadap lingkungan dan masa depan peradaban karena buruknya tata kelola dan sumber daya air</p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Sequi ea ut et est quaerat</h2>
          <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
        </div>
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </section><!-- End Hero -->
<main id="main">
    <!-- ======= Icon Boxes Section ======= -->
    <section id="icon-boxes" class="icon-boxes">
      <div class="container">

        <div class="row">
          <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up">
            <div class="icon-box">
            <h2 class="header-title">40+</h2>
              <h4 class="title"><a href="">Partner dan Klien</a></h4>
              <p class="description">Telah bekerjasama dengan Indonesia Water Institute</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
            <h2 class="header-title">16+</h2>
              <h4 class="title"><a href="">Proyek Selesai</a></h4>
              <p class="description">Diselesaikan Indonesia Water Institute dengan baik</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <!-- <div class="icon"><i class="bx bx-tachometer"></i></div> -->
              <h2 class="header-title">12</h2>
              <h4 class="title"><a href="">Tahun berdiri</a></h4>
              <p class="description">Diinisiasi tahun 2007 dan berbadan hukum tahun 2012</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Icon Boxes Section -->

    <!-- ======= About Us Section ======= -->
    <!-- <div style ='margin:0 auto; text-align:center'>
      <a href="<?php echo base_url()?>home/switchLang/english">English</a> |
      <a href="<?php echo base_url()?>home/switchLang/indonesia">Indonesia</a>
    </div> -->

    <section id="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Tentang IWI</h2>
          <p>IWI adalah lembaga konsultasi sumber daya air di Indonesia. Mulai diinisiasi tahun 2007, IWI adalah lembaga konsultasi yang fokus pada pengkajian, inovasi, kebijakan, perencanaan, serta pengembangan sumber daya air dan lingkungan</p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <section id="skill">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2 style="color:white">Pelayanan</h2>
          <p>Kami memiliki keahlian serta pengalaman di bidang air dan lingkungan</p>
        </div>

        <div class="row content">

          <?php
            $index = 0;
            foreach($services as $s){
              if($index % 2 == 0){
          ?>
                <div class="col-lg-6">
                  <ul>
                    <li></i> <?php echo $s['name']?></li>
                  </ul>
                </div>
          <?php
              }else{
          ?>
                <div class="col-lg-6">
                  <ul>
                    <li></i> <?php echo $s['name']?></li>
                  </ul>
                </div>
          <?php
              }
              $index++;
            }
         ?>


      </div>
    </section>

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
        
      <div class="container" data-aos="zoom-in">

        <div class="section-title">
          <h2>Proyek</h2>
          <p>Selalu dilandasi oleh tiga hal: mengkaji secara sistematis masalah-masalah yang terkait, membangun jembatan komunikasi dengan para pemangku kepentingan, dan berkomitmen untuk terus memperkuat serta meningkatkan kapasitas pemangku kepentingan SDA di Indonesia.</p>
        </div>

        <div class="owl-carousel clients-carousel">
          <img src="<?php echo base_url()?>assets/public/img/clients/client-1.png" alt="">
          <img src="<?php echo base_url()?>assets/public/img/clients/client-2.png" alt="">
          <img src="<?php echo base_url()?>assets/public/img/clients/client-3.png" alt="">
          <img src="<?php echo base_url()?>assets/public/img/clients/client-4.png" alt="">
          <img src="<?php echo base_url()?>assets/public/img/clients/client-5.png" alt="">
          <img src="<?php echo base_url()?>assets/public/img/clients/client-6.png" alt="">
          <img src="<?php echo base_url()?>assets/public/img/clients/client-7.png" alt="">
          <img src="<?php echo base_url()?>assets/public/img/clients/client-8.png" alt="">
        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container-fluid">

        <div class="row">

          <div class="col-lg-5 align-items-stretch video-box" style='background-image: url("assets/img/why-us.jpg");' data-aos="fade-right">
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch" data-aos="fade-left">

            <div class="content">
              <h3><strong>Pimpinan</strong></h3>
              <h4><strong>Ir.Firdaus Ali, MSc, PhD.</strong></h4>
              <p>
                Pendiri dan Pimpinan Indonesia Water Institute
              </p>
              <p>
              Beliau berkiprah sebagai pendidik dan peneliti pada Program Studi Teknik Lingkungan Fakultas Teknik Universitas Indonesia (1988-sekarang). Saat ini beliau juga menjabat sebagai Staf Khusus Menteri Pekerjaan Umum dan Perumahan Rakyat bidang Sumber Daya Air (2015-2019 & 2019-2024), serta menjabat sebagai Wakil Presiden Dewan Air Asia (Vice President of Asia Water Council) 2016-2020.
              </p>
              <p>Specialty: </br> Environmental Engineering</p>
            </div>

          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact Us</h2>
        </div>

        <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">

          <div class="col-lg-5">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p><?php echo $contact['address']?></p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p><?php echo $contact['email']?></p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p><?php echo $contact['phone']?></p>
              </div>

            </div>

          </div>

          <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="100">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->