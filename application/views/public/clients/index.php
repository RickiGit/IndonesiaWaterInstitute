  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="<?php echo base_url()?>home">Home</a></li>
          <li><?php echo $this->lang->line('client') ?></li>
        </ol>
        <h2><?php echo $this->lang->line('client') ?></h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">

        <div class="faq-list">
        <ul>
            <?php
              $counter = 1;
              foreach($country as $c){
            ?>
              <li data-aos="fade-up" data-aos="fade-up" data-aos-delay="100">
              <a data-toggle="collapse" class="collapse" href="<?php echo '#faq-list-'.$counter?>"><?php echo $c['name']?> <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="<?php echo "faq-list-".$counter?>" class="collapse" data-parent=".faq-list">
                  <table class="table table-striped" style="margin-top:20px">
                    <thead>
                      <tr><td>No</td><td>Client Name</td></td>
                    </thead>
                    <tbody>
                      <?php
                        foreach($client as $i){
                          if($i['country'] == $c['name']){
                            echo "<tr><td>".$counter."</td><td>".$i['name']."</td></tr>";
                          }else{
                            $counter = 1;
                          }
                        }
                      ?>
                    </tbody>
                  </table>
              </div>
              </li>
            <?php
                $counter++;
              }
            ?>
        </ul>
        </div>

        </div>
      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
