<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

        <ol>
        <li><a href="<?php echo base_url()?>home">Home</a></li>
        <li><a href="<?php echo base_url()?>publication/book"><?php echo $this->lang->line('publication') ?></a></li>
        <li>Request Form</li>  
    </ol>
      <h2>Request Form</h2>

  </div>
</section><!-- End Breadcrumbs -->

<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Request Form</h2>
        </div>
        <div class="row">
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="100">
                <table class="table table-striped">
                    <tr><td><?php echo $this->lang->line('bookjournal')?></td><td>:</td><td><?php echo $book['title']?></td></tr>
                    <tr><td><?php echo $this->lang->line('author')?></td><td>:</td><td><?php echo $book['author']?></td></tr>
                    <tr><td><?php echo $this->lang->line('publisher')?></td><td>:</td><td><?php echo $book['publisher']?></td></tr>
                </table>
            </div>

            <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="100">
                <form id="submitRequest" enctype="multipart/form-data" class="php-email-form">
                    <input type="hidden" name="bookid" value="<?php echo $book['id']?>">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo $this->lang->line('yourname')." *" ?>" required />
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="<?php echo $this->lang->line('phone')." *" ?>" required maxlength='12'/>
                        </div>
                        <div class="col-md-6 form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo $this->lang->line('youremail')." *" ?>" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="company" id="company" placeholder="<?php echo $this->lang->line('company')." *" ?>" required />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="position" id="position" placeholder="<?php echo $this->lang->line('position')." *"?>" required />
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><?php echo $captcha['image']?></span>
                        </div>
                        <input name="captcha" id="captcha" type="text" class="form-control" placeholder="<?php echo $this->lang->line('captcha')?>" aria-label="Username" aria-describedby="basic-addon1" style="height:50px" required>
                    </div>
                    <input type="hidden" id="valueCaptcha" value="<?php echo $captcha['word'] ?>" name="code">
                    
                    <div class="text-center"><button type="submit"><?php echo $this->lang->line('sentrequest') ?></button></div>
                </form>

            </div>
        </div>
    </div>
</section>

</main><!-- End #main -->
