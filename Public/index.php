<?php require_once('../private/initialize.php') ?>
<?php include('../private/adminheader.php') ?>
<?php login_check_user(); ?>


    <section id="title">

<!-- navigation Bar -->

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <a class="navbar-brand h1" href="#">Drugs Availability Checker</a>&nbsp; &nbsp; &nbsp; <a href="<?php echo url_for('/logout.php'); ?>">Logout</a>

        <!-- change CPTH => True in order to not give information -->
        <?php if ($_SESSION['user_name_user'] == 'CPTH') { ?> &nbsp; &nbsp; &nbsp; <a href="<?php echo url_for('/admin/index.php'); ?>">Admin Panel</a> <?php } ?>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <form class="form-inline" action="<?php echo url_for('/search.php') ?>" method="post">
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search" onkeydown="searchq();">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>


      <!-- Title -->
      <div class="title-com">
        <div class="row">
          <div class="col-lg-6">
            <h1>Central Pediatric Teaching Hospital</h1>
            <p>Online Drug Availability Checker</p>
          </div>
          <div class="col-lg-6">
            <img src="images/drug-check.png" class="img-fluid" alt="drug-check">
          </div>
        </div>
      </div>

    </section>



    <section id="content">

      <!-- <div class="form-center">
        <form class="form" action="<?php echo url_for('/search.php') ?>" method="post">
          <div class="row">
            <div class="col-9">
              <input class="form-control form-control-lg" type="search" name="search" placeholder="Search" aria-label="Search">
            </div>
            <div class="col-3">
            <button class="btn btn-dark btn-lg" type="submit">Search</button>
            </div>
          </div>
        </form>
      </div> -->

      <div id="custom-search-input">
                            <div class="input-group col-md-12">
                                <input type="search" class="  search-query form-control" placeholder="jfkf" />
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>




      <div class="buton">
        <a href="<?php echo url_for('/browse.php') ?>"><button type="button" class="btn btn-warning btn-lg ">Browse All</button></a>

      </div>

    </section>

    <section id="useful">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Useful sites</h3>
              <ul class="list-group">
                <a href="https://www.medscape.com/"><li class="list-group-item">Medscape</li></a>
                <a href="https://www.drugbank.ca/"><li class="list-group-item">DrugBank</li></a>
                <a href="https://www.fda.gov/"><li class="list-group-item">FDA</li></a>
                <a href="https://www.drugs.com/"><li class="list-group-item">Drugs.com</li></a>
                <a href="https://www.uptodate.com/"><li class="list-group-item">UpToDate</li></a>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Useful books</h3>
              <ul class="list-group">
                <a href="https://drive.google.com/open?id=1mGbfU-JU8GHqBG7bMG7wyp7dY8TzL-kG"><li class="list-group-item">Lippincott Pharmacology</li></a>
                <a href="https://drive.google.com/open?id=1y3vXhFVZdYHEynb4gVkg04wjGLQzL4WM"><li class="list-group-item">BNF for children</li></a>
                <a href="https://drive.google.com/open?id=10J3G7bJE0S9nn0MLCWyvz6-eMA9nAxvB"><li class="list-group-item">Nelson Antimicrobial </li></a>
                <a href="https://drive.google.com/open?id=1lwfx6jM_hxrtOGcRC0QBA25n03n0Iqga"><li class="list-group-item">Nelson Textbook of Pediatrics</li></a>
                <a href="https://drive.google.com/open?id=13qcWHIuFOgsyA9RMUqBTXF3l7aJ4yk0X"><li class="list-group-item">Martindale</li></a>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </section>



    <!-- Footer -->

    <footer id="footer">

      <p><?php echo $copyright; ?></p>

    </footer>

  </div>

</body>

</html>
