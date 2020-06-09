<div class="box fade-in one">
  <div class="container-field">
      <ul class="flex-outer">
        <li>
          <label for="name-of-song">Artist</label>
          <input type="text" name="artist" id="artist" placeholder="artist here..."> 
        </li>
        <li>
          <label for="name-of-song">Name Of Music</label>
          <input type="text" name="mname" id="mname" placeholder="name of music here + name of artist here..."> 
        </li>
        <li>
          <label for="name-of-singer">Name Of Singer</label>
          <input type="text" id="sname" name="sname" placeholder="name of singer here..."> 
        </li>
        <li>
          <label for="publish-year">Released</label>
          <input type="text" id="publishyear" name="publishyear" placeholder="released year here..."> 
        </li>
        <li>
          <label for="genre">Genres</label>
          <input type="text" id="genre" name="genre" placeholder="genre of music here..."> 
        </li>
        <li>
          <label for="album">Album</label>
          <input type="text" id="album" name="album" placeholder="album here..."> 
        </li>
        <li>
          <button id="FormSubmit">Add Lyrics Info</button>
        </li>
         
         <img src="<?php echo base_url();?>assets/images/loading.gif" id="LoadingImage" style="display:none" />
      </ul>
  </div>
</div>

