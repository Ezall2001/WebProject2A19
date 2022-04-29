<div class="musician-add-wrapper">
  <div class="filter"></div>
  <div class="musician-input">
    <h2><i class="fa-solid fa-circle-plus"></i>Musicians Manager</h2>
    <form action="#" method="POST" class="add">

      <div class="input-wrapper">
        <label for="add-name">Name: </label>
        <input type="text" name="name" id="add-name" required>
        <p class="name-err"></p>
      </div>

      <div class="input-wrapper">
        <label for="add-band">Band Name: </label>
        <input type="text" name="band" id="add-band">
        <p class="band-err"></p>
      </div>

      <input type="submit" value="Add">

    </form>

    <br>
    <br>
    <hr>

    <form action="#" method="POST" class="modify">

      <div class="input-wrapper">
        <label for="modify-id">ID: </label>
        <input type="text" name="id" id="modify-id" required>
        <p class="id-err"></p>
      </div>

      <div class="input-wrapper">
        <label for="modify-name">Name: </label>
        <input type="text" name="name" id="modify-name" required>
        <p class="name-err"></p>
      </div>

      <div class="input-wrapper">
        <label for="modify-band">Band Name: </label>
        <input type="text" name="band" id="modify-band">
        <p class="band-err"></p>
      </div>

      <input type="submit" value="Modify">

    </form>

    <br>
    <br>
    <hr>

    <form action="" class="delete">
      <div class="input-wrapper">
        <label for="delete-name">Name: </label>
        <input type="text" name="name" id="delete-name">
        <p class="name-err"></p>
      </div>
      <input type="submit" value="Delete">
    </form>
  </div>
</div>