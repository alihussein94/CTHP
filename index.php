<?php require_once('data/initialize.php') ?>
<?php include('data/adminheader.php') ?>
<?php login_check_user(); ?>


    <section id="title">

<!-- navigation Bar -->

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <a class="navbar-brand h1" href="#">Drugs Availability Checker</a>&nbsp; &nbsp; &nbsp; <a href="<?php echo url_for('/logout.php'); ?>">Logout</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <form class="form-inline" action="<?php echo url_for('/search.php') ?>" method="get">
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

      <div class="box-1">
        <div class="search-title">
          <h2>Search Drug To Check Availability</h2>
        </div>

        <div class="form-center">
          <form id="search-form" class="form" action="<?php echo url_for('/search.php') ?>" method="get">
            <input id="search" class="form-control form-control-lg" type="search" name="search" placeholder="Search" aria-label="Search" autocomplete="off">
            <button class="btn btn-danger btn-lg" type="submit"><i class="fas fa-search"></i></button>
          </form>
          <div class="suggestions-div">
            <ul id="suggestions">
              <!-- <li><a href="#">test</a></li> -->
            </ul>
          </div>
        </div>
        <div class="buton">
          <a href="<?php echo url_for('/browse.php') ?>"><button type="button" class="btn btn-warning btn-lg ">Browse All Drugs</button></a>
        </div>
      </div>

      <div class="box-1">
        <div class="search-title">
          <h2>Send Daily Report For Drug Availability</h2>
        </div>
        <div class="form-center">
          <form class="form" action="<?php echo url_for('/addWardReport.php') ?>" method="post">
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="wards">
              <!-- <option selected>Select Ward</option> -->
              <option value="1">RCU</option>
              <option value="2">الوحدة الاولى</option>
              <option value="3">الوحدة الثانية</option>
              <option value="4">الوحدة الثالثة</option>
              <option value="5">الوحدة الرابعة</option>
              <option value="6">الوحدة الخامسة</option>
              <option value="7">الوحدة الرابعة (كيمو)</option>
              <option value="8">الوحدة الخامسة (كيمو)</option>
              <option value="9">الوحدة السادسة</option>
              <option value="10">الخدج</option>
              <option value="11">الخاص</option>
              <option value="12">الكلى</option>
              <option value="13">الجراحية</option>
              <option value="14">الانتقالية</option>
            </select>
            <button class="btn btn-danger btn-lg" type="submit"><i class="fas fa-calendar-plus"></i></button>
          </form>
        </div>
        <div class="buton">
          <a href="<?php echo url_for('/reports/index.php') ?>"><button type="button" class="btn btn-warning btn-lg ">Browse All Reports</button></a>
        </div>
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
