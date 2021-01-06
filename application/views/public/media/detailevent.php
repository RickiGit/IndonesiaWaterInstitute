<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
        <li><a href="<?php echo base_url()?>home">Home</a></li>
        <li><?php echo $this->lang->line('media') ?></li>
      </ol>
        <h2><?php echo $event['title']?></h2>

    </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 entries">

                <article class="entry entry-single">

                <div class="entry-img">
                    <img style="width:100%" src="<?php echo base_url()?>assets/images/events/<?php echo $event['cover']?>" alt="" class="img-fluid">
                </div>

                <h2 class="entry-title">
                    <a href="#"><?php echo $event['title']?></a>
                </h2>

                <div class="entry-meta">
                    <ul>
                    <li class="d-flex align-items-center"><i class="icofont-user"></i><?php echo $event['createdby']?></li>
                    <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i><time><?php echo date("j F Y", strtotime($event['created']))?></time></li>
                    </ul>
                </div>

                <div class="entry-content">
                    <?php echo $event['content']?>
                </div>

                <div class="entry-footer clearfix">
                    <div class="float-right share">
                        <a href="http://twitter.com/share?url=<?php echo base_url()?>media/detail/<?php echo rawurlencode($event['title'])?>" target="_blank" title="Share on Twitter"><i class="icofont-twitter"></i></a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url()?>media/detail/<?php echo rawurlencode($event['title'])?>" target="_blank" title="Share on Facebook"><i class="icofont-facebook"></i></a>
                        <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo base_url()?>media/detail/<?php echo rawurlencode($event['title'])?>" target="_blank" title="Share on Linkedin"><i class="icofont-linkedin"></i></a>
                    </div>
                </div>

                </article><!-- End blog entry -->

            </div><!-- End blog entries list -->
        </div>
    </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->
