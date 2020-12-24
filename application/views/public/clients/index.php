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
              $indexCollapse = 0;
              foreach($country as $c){
            ?>
              <li data-aos="fade-up" data-aos="fade-up" data-aos-delay="100">
              <a data-toggle="collapse" class="collapse" href="<?php echo '#faq-list-'.$indexCollapse?>"><?php echo $c['name']?> <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="<?php echo "faq-list-".$indexCollapse?>" class="collapse" data-parent=".faq-list">
                  <table class="table table-striped" style="margin-top:20px">
                    <thead>
                      <tr><td>No</td><td>Logo</td><td>Client Name</td></td>
                    </thead>
                    <tbody>
                      <?php
                        $counter = 1;
                        foreach($client as $i){
                          if($i['country'] == $c['name']){
                            echo "<tr><td>".$counter."</td><td><img src='".base_url()?>assets/images/clients/<?php echo $i['image']."' style='height:40px;'></td><td>".$i['name']."</td></tr>";
                            $counter++;
                          }
                        }
                      ?>
                    </tbody>
                  </table>
              </div>
              </li>
            <?php
                $indexCollapse++;
              }
            ?>
        </ul>
        </div>

        </div>
      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
