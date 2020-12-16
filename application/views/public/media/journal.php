<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <ol>
      <li><a href="index.html">Home</a></li>
      <li>Media</li>
    </ol>
    <h2>Media</h2>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container" data-aos="fade-up">   
    <ul class="nav nav-pills">
    <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>media">News</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>media/book">Books</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo base_url()?>media/journal">Journal</a>
        </li>
    </ul>

    <table class="table table-striped" style="margin-top:20px">
        <thead>
            <tr>
                <th>No</th>
                <th>Paper Title</th>
                <th>Author(s)</th>
                <th>Presented and/or Published</th>
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
