
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Project</li>
        </ol>
        <h2>Project</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">

          <?php
            foreach($project as $p){
          ?>
            <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
              <article class="entry">

                <div class="entry-img">
                  <img src="<?php echo base_url()?>assets/images/projectcover/<?php echo $p->cover?>" alt="" class="img-fluid">
                </div>

                <h2 class="entry-title">
                  <a href="blog-single.html"><?php echo $p->title?></a>
                </h2>

                <div class="entry-meta">
                  <ul>
                    <li class="d-flex align-items-center"><i class="icofont-user"></i><?php echo $p->createdby?></li>
                    <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i><time><?php echo date("j F Y", strtotime($p->created))?></time></li>
                  </ul>
                </div>

                <div class="entry-content">
                  <p>
                    <?php 
                      $content = $p->content;
                      if(strlen($content) > 150){
                        $content = substr($content, 0, 350);
                        $content .= "...";
                      }

                      echo $content;
                    ?>
                  </p>
                  <div class="read-more">
                    <a href="<?php echo base_url()?>project/detail/<?php echo rawurlencode($p->title)?>">Read More</a>
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
          <!-- <ul class="justify-content-center">
            <li class="disabled"><i class="icofont-rounded-left"></i></li>
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
          </ul> -->
        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
