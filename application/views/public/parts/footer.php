<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-links">
            <h4><?php echo $this->lang->line('usefullinks') ?></h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url()?>home"><?php echo $this->lang->line('home') ?></a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url()?>about"><?php echo $this->lang->line('about') ?></a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url()?>client"><?php echo $this->lang->line('client') ?></a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url()?>project"><?php echo $this->lang->line('project') ?></a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url()?>media/news"><?php echo $this->lang->line('media') ?></a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url()?>contact"><?php echo $this->lang->line('contact') ?></a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-contact">
            <h4><?php echo $this->lang->line('contactfooter') ?></h4>
            <p>
              <?php echo $contact['address']?>
              <br>
              <br>
              <strong><?php echo $this->lang->line('phone') ?>:</strong> <?php echo $contact['phone']?><br>
              <strong><?php echo $this->lang->line('email') ?>:</strong> <?php echo $contact['email']?><br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3><?php echo $this->lang->line('aboutfooter') ?></h3>
            <p>
              <?php 
                $content = $home['about'];
                if(strlen($content) > 220){
                  $content = substr($content, 0, 220)."...";
                }

                echo $content;
              ?>
            </p>
            <div class="social-links mt-3">
              <a href="<?php echo $contact['twitter']?>" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="<?php echo $contact['facebook']?>" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="<?php echo $contact['instagram']?>" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="<?php echo $contact['linkedin']?>" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Indonesia Water Institute</span></strong>. All Rights Reserved
      </div>
      <!-- <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div> -->
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url()?>assets/public/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url()?>assets/public/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url()?>assets/public/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo base_url()?>assets/public/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?php echo base_url()?>assets/public/vendor/venobox/venobox.min.js"></script>
  <script src="<?php echo base_url()?>assets/public/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url()?>assets/public/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url()?>assets/public/js/main.js"></script>
  <script src="<?php echo base_url()?>assets/public/js/function.js"></script>

</body>

</html>