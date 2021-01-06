<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

        <ol>
        <li><a href="<?php echo base_url()?>home">Home</a></li>
        <li><?php echo $this->lang->line('publication') ?></li>
      </ol>
      <h2><?php echo $this->lang->line('publication') ?></h2>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container" data-aos="fade-up">   
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo base_url()?>publication/book"><?php echo $this->lang->line('book')?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>publication/journal"><?php echo $this->lang->line('journal')?></a>
        </li>
    </ul>

    <table class="table table-striped" style="margin-top:20px">
        <thead>
            <tr>
                <th><?php echo $this->lang->line('nomor')?></th>
                <th><?php echo $this->lang->line('booktitle')?></th>
                <th><?php echo $this->lang->line('author')?></th>
                <th><?php echo $this->lang->line('publisher')?></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $nomor = 1;
                foreach($books as $b){
            ?>
                <tr>
                    <td><?php echo $nomor?></td>
                    <td><?php echo $b['title']?></td>
                    <td><?php echo $b['author']?></td>
                    <td><?php echo $b['publisher']?></td>
                    <td><a href="<?php echo base_url()?>publication/request/<?php echo $b['id']?>" class="btn btn-primary">Request Download</a></td>
                </tr>
            <?php
                    $nomor++;
                }
            ?>
        </tbody>
    </table>
  </div>
</section><!-- End Contact Section -->

</main><!-- End #main -->
