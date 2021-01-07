<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

      <ol>
        <li><a href="<?php echo base_url()?>home">Home</a></li>
        <li><?php echo $this->lang->line('media') ?></li>
      </ol>
      <h2><?php echo $this->lang->line('media') ?></h2>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container" data-aos="fade-up">   
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>media/news">News</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo base_url()?>media/event">Events</a>
        </li>
    </ul>
  </div>
</section><!-- End Contact Section -->

<section id="blog" class="blog">
      <div class="container">

        <div class="row">

          <?php
            foreach($event as $n){
          ?>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up">
              <article class="entry">

                <div class="entry-img">
                  <img src="<?php echo base_url()?>assets/images/events/<?php echo $n->cover?>" class="img-fluid center-cropped">
                </div>

                <h2 class="entry-title">
                  <a href="<?php echo base_url()?>news/detail/<?php echo rawurlencode($n->title)?>"><?php echo $n->title?></a>
                </h2>

                <div class="entry-meta">
                  <ul>
                    <li class="d-flex align-items-center"><i class="icofont-user"></i><?php echo $n->createdby?></li>
                    <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i><time><?php echo date("j F Y", strtotime($n->created))?></time></li>
                  </ul>
                </div>

                <div class="entry-content">
                  <!-- <p>
                    <?php 
                      $content = $n->content;
                      if(strlen($content) > 350){
                        $content = substr($content, 0, 350);
                        $content .= "...";
                      }

                      echo $content;
                    ?>
                  </p> -->
                  <div class="read-more">
                    <a href="<?php echo base_url()?>media/detailevent/<?php echo rawurlencode($n->title)?>"><?php echo $this->lang->line('readmore') ?></a>
                  </div>
                </div>

              </article><!-- End blog entry -->
            </div>
          <?php
            }
          ?>

        </div>

        <div class="blog-pagination" data-aos="fade-up">
          <?php 
            echo $this->pagination->create_links();
          ?>
        </div>

      </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->
