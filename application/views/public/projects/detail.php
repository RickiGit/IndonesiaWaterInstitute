<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
        <li><a href="<?php echo base_url()?>home">Home</a></li>
        <li><?php echo $this->lang->line('project') ?></li>
      </ol>
        <h2><?php echo $project['title']?></h2>

    </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
    <div class="container">

        <div class="row">

        <div class="col-lg-8 entries">

            <article class="entry entry-single">

            <div class="entry-img">
                <img style="width:100%" src="<?php echo base_url()?>assets/images/projectcover/<?php echo $project['cover']?>" alt="" class="img-fluid">
            </div>

            <h2 class="entry-title">
                <a href="#"><?php echo $project['title']?></a>
            </h2>

            <div class="entry-meta">
                <ul>
                <li class="d-flex align-items-center"><i class="icofont-user"></i><?php echo $project['createdby']?></li>
                <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i><time><?php echo date("j F Y", strtotime($project['created']))?></time></li>
                </ul>
            </div>

            <div class="entry-content">
                <?php echo $project['content']?>
            </div>

            <div class="entry-footer clearfix">
                <div class="float-right share">
                    <a href="http://twitter.com/share?url=<?php echo base_url()?>project/detail/<?php echo rawurlencode($project['title'])?>" target="_blank" title="Share on Twitter"><i class="icofont-twitter"></i></a>
                    <a href="http://www.facebook.com/sharer.php?href=<?php echo base_url()?>project/detail/<?php echo rawurlencode($project['title'])?>" target="_blank" title="Share on Facebook"><i class="icofont-facebook"></i></a>
                    <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo base_url()?>project/detail/<?php echo rawurlencode($project['title'])?>" target="_blank" title="Share on Linkedin"><i class="icofont-linkedin"></i></a>
                </div>
            </div>

            </article><!-- End blog entry -->

        </div><!-- End blog entries list -->

        <div class="col-lg-4">

            <div class="sidebar">

                <h3 class="sidebar-title">Recent Posts</h3>
                <hr>

                <?php
                    foreach($recent as $r){
                ?>
                    <div class="sidebar-item recent-posts">
                        <div class="post-item clearfix">
                        <img src="<?php echo base_url()?>assets/images/projectcover/<?php echo $r['cover']?>" alt="">
                        <h4><a href="<?php echo base_url()?>project/detail/<?php echo rawurlencode($r['title'])?>"><?php echo $r['title']?></a></h4>
                        <time><?php echo date("j F Y", strtotime($r['created']))?></time>
                    </div>
                </div>
                <?php
                    }
                ?>
                <!-- End sidebar recent posts-->

            </div><!-- End sidebar -->

        </div><!-- End blog sidebar -->

        </div>

    </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->
