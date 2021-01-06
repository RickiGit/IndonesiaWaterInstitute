<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">

      <?php
        $index = 0;
        foreach($slide as $s){
      ?>
        <div class="carousel-item <?php echo ($index == 0) ? 'active':''?>">
          <div class="carousel-container">
            <h2 class="animate__animated animate__fadeInDown" style="font-size: 30px"><?php echo $s['title']?></h2>
            <p class="animate__animated animate__fadeInUp" style="font-size: 15px"><?php echo $s['description']?></p>
            <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto"><?php echo $this->lang->line('readmore') ?></a>
          </div>
        </div>
      <?php
          $index++;
        }
      ?>

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
          <div class="col-md-4 col-lg-4 align-items-stretch mb-5 mb-lg-0" data-aos="fade-up">
            <div class="icon-box">
            <h2 class="header-title">40+</h2>
              <h4 class="title"><a href=""><?php echo $this->lang->line('client') ?></a></h4>
              <p class="description"><?php echo $this->lang->line('descclient') ?></p>
            </div>
          </div>

          <div class="col-md-4 col-lg-4 align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
            <h2 class="header-title">16+</h2>
              <h4 class="title"><a href=""><?php echo $this->lang->line('finishproject') ?></a></h4>
              <p class="description"><?php echo $this->lang->line('descproject') ?></p>
            </div>
          </div>

          <div class="col-md-4 col-lg-4 align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <!-- <div class="icon"><i class="bx bx-tachometer"></i></div> -->
              <h2 class="header-title">12</h2>
              <h4 class="title"><a href=""><?php echo $this->lang->line('since') ?></a></h4>
              <p class="description"><?php echo $this->lang->line('descsince') ?></p>
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
          <h2><?php echo $this->lang->line('aboutiwi') ?></h2>
          <p><?php echo $home['about']?></p>
          <a href="<?php echo base_url()?>about" class="btn-get-started animate__animated animate__fadeInUp scrollto"><?php echo $this->lang->line('readmore') ?></a>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <section id="skill">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2 style="color:white;"><?php echo $this->lang->line('service') ?></h2>
          <p><?php echo $home['services']?></p>
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
          <h2><?php echo $this->lang->line('client') ?></h2>
          <p><?php echo $home['project']?></p>
        </div>

        <div class="owl-carousel clients-carousel">
          <?php
            foreach($client as $c){
          ?>
            <img src="<?php echo base_url()?>assets/images/clients/<?php echo $c['image']?>" alt="">
          <?php
            }
          ?>
          
          <!-- <img src="<?php echo base_url()?>assets/public/img/clients/client-2.png" alt="">
          <img src="<?php echo base_url()?>assets/public/img/clients/client-3.png" alt="">
          <img src="<?php echo base_url()?>assets/public/img/clients/client-4.png" alt="">
          <img src="<?php echo base_url()?>assets/public/img/clients/client-5.png" alt="">
          <img src="<?php echo base_url()?>assets/public/img/clients/client-6.png" alt="">
          <img src="<?php echo base_url()?>assets/public/img/clients/client-7.png" alt="">
          <img src="<?php echo base_url()?>assets/public/img/clients/client-8.png" alt=""> -->
        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container-fluid">

        <div class="row">

          <div class="col-lg-5 align-items-stretch video-box" style='background-image: url("<?php echo base_url()?>assets/images/<?php echo $home['image']?>");' data-aos="fade-right">
          </div>

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch" data-aos="fade-left">

            <div class="content">
              <h3><strong><?php echo $this->lang->line('leader') ?></strong></h3>
              <h4><strong><?php echo $home['name']?></strong></h4>
              <p><?php echo $home['position']?></p>
              <p><?php echo $home['aboutlead']?></p>
            </div>

          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2><?php echo $this->lang->line('contactus') ?></h2>
        </div>

        <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">

          <div class="col-lg-5">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4><?php echo $this->lang->line('location') ?></h4>
                <p><?php echo $contact['address']?></p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4><?php echo $this->lang->line('email') ?></h4>
                <p><?php echo $contact['email']?></p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4><?php echo $this->lang->line('phone') ?></h4>
                <p><?php echo $contact['phone']?></p>
              </div>

            </div>

          </div>

          <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="100">

            <form id="submitInbox" enctype="multipart/form-data" class="php-email-form">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="<?php echo $this->lang->line('yourname') ?>" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo $this->lang->line('youremail') ?>" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="<?php echo $this->lang->line('subject') ?>" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="<?php echo $this->lang->line('message') ?>"></textarea>
                <div class="validate"></div>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><?php echo $captcha['image']?></span>
                </div>
                <input name="captcha" id="captcha" type="text" class="form-control" placeholder="<?php echo $this->lang->line('captcha')?>" aria-label="Username" aria-describedby="basic-addon1" style="height:50px" required>
              </div>
              <input type="hidden" id="valueCaptcha" value="<?php echo $captcha['word'] ?>" name="code">
              <!-- <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div> -->
              <div class="text-center"><button type="submit"><?php echo $this->lang->line('sendmessage') ?></button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->