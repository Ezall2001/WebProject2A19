<?php
require APPROOT . '/views/includes/head.php';
require APPROOT . '/views/includes/header.php';
?>

<nav class="logo">
  <div class="logo-container">
    <div class="outer-frame"></div>
    <div class="outer-mask"></div>
    <div class="inner-frame"></div>
    <div class="inner-mask"></div>
    <img src="../assets/icons/sandClock.png">
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

        <div class="drop-nav-wrapper nav-item">

          <li>
            <a href="#explore">explore<span class="mask">explore</span></a>
          </li>

          <ul class="drop-nav">
            <li class="nav-film"><a href="./films.html">films</a></li>
            <li class="nav-music"><a href="./music.html">music</a></li>
          </ul>

        </div>

        <li class="nav-item">
          <a href="#about">about<span class="mask">about</span></a>
        </li>

        <li class="nav-item">
          <a href="#contact">contact<span class="mask">contact</span></a>
        </li>

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

<main>
  <section class="landing"></section>

  <section class="music">

    <div class="search">
      <div class="search-by-name">
        <div class="logo-img"><img src="../assets/logo/Logo/Chronical_Decades__2_-removebg-preview.png" alt="">
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

      <div class="filters">
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
      </div>
    </div>

    <div class="result">

      <div class="records-wrapper">
        <div class="scroll-up">
          <i class="fa-solid fa-angles-up"></i>
        </div>

        <div class="records-container">
          <div class="record">
            <div class="thumbnail">
              <div class="play">
                <i class="fa-solid fa-circle-play"></i>
              </div>
              <p class="error"></p>
            </div>
            <h4>1952</h4>
            <h3>Lorem Ipsum</h3>
          </div>
          <div class="record">
            <div class="thumbnail">
              <div class="play">
                <i class="fa-solid fa-circle-play"></i>
              </div>
              <p class="error"></p>
            </div>
            <h4>1952</h4>
            <h3>Lorem Ipsum</h3>
          </div>
          <div class="record">
            <div class="thumbnail">
              <div class="play">
                <i class="fa-solid fa-circle-play"></i>
              </div>
              <p class="error"></p>
            </div>
            <h4>1952</h4>
            <h3>Lorem Ipsum</h3>
          </div>
          <div class="record">
            <div class="thumbnail">
              <div class="play">
                <i class="fa-solid fa-circle-play"></i>
              </div>
              <p class="error"></p>
            </div>
            <h4>1952</h4>
            <h3>Lorem Ipsum</h3>
          </div>
          <div class="record">
            <div class="thumbnail">
              <div class="play">
                <i class="fa-solid fa-circle-play"></i>
              </div>
              <p class="error"></p>
            </div>
            <h4>1952</h4>
            <h3>Lorem Ipsum</h3>
          </div>
          <div class="record">
            <div class="thumbnail">
              <div class="play">
                <i class="fa-solid fa-circle-play"></i>
              </div>
              <p class="error"></p>
            </div>
            <h4>1952</h4>
            <h3>Lorem Ipsum</h3>
          </div>
          <div class="record">
            <div class="thumbnail">
              <div class="play">
                <i class="fa-solid fa-circle-play"></i>
              </div>
              <p class="error"></p>
            </div>
            <h4>1952</h4>
            <h3>Lorem Ipsum</h3>
          </div>
          <div class="record">
            <div class="thumbnail">
              <div class="play">
                <i class="fa-solid fa-circle-play"></i>
              </div>
              <p class="error"></p>
            </div>
            <h4>1952</h4>
            <h3>Lorem Ipsum</h3>
          </div>
        </div>
      </div>

      <div class="load-more-wrapper">
        <div class="load-more">
          <h3>load more</h3>
          <i class="fa-solid fa-circle-plus"></i>
        </div>
      </div>

      <div class="playing">

        <div class="playing-record-wrapper">

          <iframe src="https://www.youtube.com/embed/Q8Tiz6INF7I" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>



          <div class="interactions">
            <div class="like"><i class="fa-regular fa-heart"></i></div>
            <div class="save"><i class="fa-regular fa-bookmark"></i></div>
            <div class="share"><i class="fa-regular fa-share-from-square"></i></div>
            <p class="views"><span class="number-views">41.205</span> views</p>
          </div>

          <div class="artists-wrapper">

            <div class="artist">
              <div class="info">
                <h4>Band Name</h4>
                <h3>Full Name</h3>
              </div>
            </div>
            <div class="artist">
              <div class="info">
                <h4>Band Name</h4>
                <h3>Full Name</h3>
              </div>
            </div>
            <div class="artist">
              <div class="info">
                <h4>Band Name</h4>
                <h3>Full Name</h3>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div>


  </section>


</main>

<script>
  const activeVideo = $('.playing')

  const videos = $('.record')
  videos.on('click', () => {
    activeVideo.addClass('active')
  })

  activeVideo.on('click', () => {
    activeVideo.removeClass('active')
  })
</script>

</body>

</html>