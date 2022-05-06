<div class="music-add-wrapper music-modify-wrapper">
  <div class="filter"></div>
  <div class="music-input">
    <h2><i class="fa-solid fa-screwdriver-wrench"></i> Modify Music</h2>
    <form action="<?php echo URLROOT ?>/musics/modify" method="POST">

      <input type="text" name="id" class="music-id" style="display: none;">

      <div class="input-wrapper">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" required>
        <p class="name-err"></p>
      </div>

      <div class="input-wrapper">
        <label for="year">Year: </label>
        <input type="number" name="year" id="year" min="1950" max="2020" required>
        <p class="year-err"></p>
      </div>

      <div class="input-wrapper">
        <label for="genre">Genre: </label>
        <select id="genre" name="genre" required>
          <option value="pop">Pop</option>
          <option value="jazz">Jazz</option>
          <option value="rock">Rock</option>
          <option value="classic">Classic</option>
          <option value="slow">Slow</option>
        </select>
        <p class="genre-err"></p>
      </div>

      <div class="input-wrapper">
        <label for="URL">URL: </label>
        <input type="text" name="url" id="url" required>
        <p class="url-err"></p>
      </div>

      <div class="input-wrapper musicians">
        <label>Musicians: </label>
        <div class="multiple-inputs">
          <button type="" class="add-input">Add Musician</button>
        </div>
        <p class="musician-err"></p>
      </div>

      <input type="submit" value="Modify">
      <input type="submit" value="Delete">

    </form>
  </div>
</div>