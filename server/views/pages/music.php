<?php
require APPROOT . '/views/includes/head.php';
require APPROOT . '/views/includes/header.php';
?>


<main>
  <section class="landing"></section>

  <section class="music">

    <?php require APPROOT . '/views/includes/musicAdd.php'; ?>
    <?php require APPROOT . '/views/includes/musicModify.php'; ?>
    <?php require APPROOT . '/views/includes/musician.php'; ?>

    <div class="search">
      <div class="search-by-name">
        <div class="logo-img"><img src="<?php echo URLROOT ?>/public/assets/logo/Logo/Chronical_Decades__2_-removebg-preview.png" alt="">
        </div>
        <div class="search-bar">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input type="text" placeholder="Search By Name">
        </div>
      </div>

      <div class="keywords">
        <h3>keywords: </h3>
        <div class="keywords-wrapper">
          <p class="keyword">pop</p>
          <p class="keyword">jazz</p>
          <p class="keyword">rock</p>
          <p class="keyword">classic</p>
          <p class="keyword">slow</p>
        </div>
      </div>

      <!-- TODO: add more filters -->
      <!-- <div class="filters">
        <h3>more Filtres: </h3>
        <div class="filters-toggle">
          <i class="fa-solid fa-caret-down"></i>
          <div class="filters-wrapper">
            <div class="input-wrapper">
              <label>filtre by year</label>
              <input type="number" placeholder="Enter Year" min="1950" step="10" max="2020" value="1950">
            </div>
            <div class="input-wrapper">
              <label>sort by date of creation</label>
              <select>
                <option value="ascending">ascending</option>
                <option value="descending">descending</option>
              </select>
            </div>
          </div>
        </div>
      </div> -->

      <?php if ($data["admin"]) {
        echo '<button class="add-music">Add Music</button>';
        echo '<button class="add-musician">Manage Musicians</button>';
      }
      ?>
    </div>

    <div class="result">

      <div class="records-wrapper">
        <div class="scroll-up">
          <i class="fa-solid fa-angles-up"></i>
        </div>

        <div class="records-container">

        </div>
      </div>

      <div class="load-more-wrapper">
        <div class="load-more">
          <h3>load more</h3>
          <i class="fa-solid fa-circle-plus"></i>
        </div>
      </div>

      <div class="playing">



      </div>

    </div>


  </section>


</main>


</body>

</html>