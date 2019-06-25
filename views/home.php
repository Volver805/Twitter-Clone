 <?php 
    if($_GET['page'] == 'explore') {
    $type = 'public';
    }
    else if($_GET['page'] == 'timeline') {
      $type = 'followed'; 
    }
    else if ($_GET['page'] == 'search') {
      $type = 'search';
    }
    else {
      $type = 'profile';
    }
 ?>
 
  <div class="row">
   <div id="tweets" class="col-sm-8">
        <?php displayTweets($type); ?>
    </div>
    <div class="col-sm-4">
        <h4>Search</h4>
        <?php displaySearchbox() ?>
        <hr>
        <?php displayTweetBox() ?>
    </div>
  </div>
