
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="<?php echo base_url()?>home">Home</a></li>
          <li><?php echo $this->lang->line('about') ?></li>
        </ol>
        <h2><?php echo $this->lang->line('about') ?></h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">

        <div class="faq-list">
        <ul>
            <li data-aos="fade-up" data-aos="fade-up" data-aos-delay="100">
            <a data-toggle="collapse" class="collapse" href="#faq-list-1"><?php echo $this->lang->line('vision') ?> <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
            <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                <p>
                <?php echo $about['vision']?>
                </p>
            </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
            <a data-toggle="collapse" href="#faq-list-2" class="collapsed"><?php echo $this->lang->line('mission') ?> <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
            <div id="faq-list-2" class="collapse" data-parent=".faq-list">
                <p>
                <?php echo $about['mission']?>
                </p>
            </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
           <a data-toggle="collapse" href="#faq-list-3" class="collapsed"><?php echo $this->lang->line('history') ?> <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
            <div id="faq-list-3" class="collapse" data-parent=".faq-list">
                <p>
                <?php echo $about['history']?>
                </p>
            </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
            <a data-toggle="collapse" href="#faq-list-4" class="collapsed"><?php echo $this->lang->line('strategy') ?> <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
            <div id="faq-list-4" class="collapse" data-parent=".faq-list">
                <p>
                <?php echo $about['strategy']?>
                </p>
            </div>
            </li>

        </ul>
        </div>

        </div>
      </div>
    </section><!-- End Blog Section -->

    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
          <p><?php echo $home['teams']?></p>
        </div>

        <div class="row">

          <?php
            foreach($teams as $t){
          ?>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100" style="margin-top: 15px">
              <div class="member d-flex align-items-start">
                <div class="pic"><img src="<?php echo base_url()?>assets/images/teams/<?php echo ($t['images'] != "" ? $t['images'] : 'avatar.jpg') ?>" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4><?php echo $t['name']?></h4>
                  <span><?php echo $t['position']?></span>
                  <p><?php echo $t['graduate']?></p>
                  <div class="social">
                    <a href="<?php echo $t['twitter']?>"><i class="ri-twitter-fill"></i></a>
                    <a href="<?php echo $t['facebook']?>"><i class="ri-facebook-fill"></i></a>
                    <a href="<?php echo $t['instagram']?>"><i class="ri-instagram-fill"></i></a>
                    <a href="<?php echo $t['linkedin']?>"> <i class="ri-linkedin-box-fill"></i> </a>
                  </div>
                </div>
              </div>
            </div>
          <?php
            }
          ?>

        </div>

      </div>
    </section><!-- End Team Section -->
  </main><!-- End #main -->
