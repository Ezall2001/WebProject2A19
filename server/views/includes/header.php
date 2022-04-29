  <body>


    <nav class="logo">
      <div class="logo-container">
        <div class="outer-frame"></div>
        <div class="outer-mask"></div>
        <div class="inner-frame"></div>
        <div class="inner-mask"></div>
        <img src="<?php echo URLROOT ?>/public/assets/icons/sandClock.png">
        <div class="name"><span>decades chronicals</span></div>
        <div class="background"></div>
      </div>
    </nav>


    <header>

      <div class="logo-placeholder"></div>

      <div class="nav-wrapper">
        <nav>
          <ul class="page-nav">
            <!-- TODO: do a smooth scrolling -->

            <?php

            if ($data['pageName'] == 'home') {
              echo '<div class="drop-nav-wrapper nav-item">

              <li>
                <a href="#explore">explore<span class="mask">explore</span></a>
              </li>

              <ul class="drop-nav">
                <li class="nav-film"><a href="' . URLROOT . '/pages/films">films</a></li>
                <li class="nav-music"><a href="' . URLROOT . '/pages/music">music</a></li>
              </ul>

            </div>

            <li class="nav-item">
              <a href="#about">about<span class="mask">about</span></a>
            </li>

            <li class="nav-item">
              <a href="#contact">contact<span class="mask">contact</span></a>
            </li>';
            } else {

              echo '<li class="nav-item">
              <a href="' . URLROOT . '/pages/index">Home<span class="mask">Home</span></a>
            </li>

              <li class="nav-item">
              <a href="' . URLROOT . '/pages/films">Films<span class="mask">Films</span></a>
            </li>

            <li class="nav-item">
              <a href="' . URLROOT . '/pages/music">Music<span class="mask">Music</span></a>
            </li>';
            }

            ?>




          </ul>
        </nav>
      </div>



      <!-- TODO: add the account info if logged in -->
      <div class="account-nav-wrapper">
        <div class="account-nav">

          <div class="logged-out">
            <button class="registre">registre</button>
            <button class="login">login</button>
            <div class="mask"></div>
          </div>

          <div class="logged-in">

          </div>

        </div>
      </div>

    </header>