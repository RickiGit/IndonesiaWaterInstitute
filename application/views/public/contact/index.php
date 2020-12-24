  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="<?php echo base_url()?>home">Home</a></li>
          <li><?php echo $this->lang->line('contact') ?></li>
        </ol>
        <h2><?php echo $this->lang->line('contact') ?></h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2><?php echo $this->lang->line('contact') ?></h2>
        </div>

        <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">

          <div class="col-lg-5">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4><?php echo $this->lang->line('location') ?>:</h4>
                <p><?php echo $contact['address']?></p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4><?php echo $this->lang->line('email') ?>:</h4>
                <p><?php echo $contact['email']?></p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4><?php echo $this->lang->line('phone') ?>:</h4>
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
                <input name="captcha" id="captcha" type="text" class="form-control" placeholder="Masukan Captcha" aria-label="Username" aria-describedby="basic-addon1" style="height:50px" required>
              </div>
              <input type="hidden" id="valueCaptcha" value="<?php echo $captcha['word'] ?>" name="code">
<!-- 
              <div class="mb-3">
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
