<h2><?php echo Utils::t('Welcome to Portable-CMS'); ?></h2>
<div class="well well-sm">
  <?php
  if (strlen($description) > 0) {
    echo '<p>' . Utils::t($description) . '</p>';
  }
  ?>
  <div class="row text-center big-links">
    <div class="col-xs-4">
      <a href="video/" class="btn btn-default">
        <span class="glyphicon glyphicon-film"></span><br />
        <?php echo Utils::t('Watch'); ?>
      </a>
    </div>
    <div class="col-xs-4">
      <a href="audio/" class="btn btn-default">
        <span class="glyphicon glyphicon-headphones"></span><br />
        <?php echo Utils::t('Listen'); ?>
      </a>
    </div>
    <div class="col-xs-4">
      <a href="text/" class="btn btn-default">
        <span class="glyphicon glyphicon-book"></span><br />
        <?php echo Utils::t('Read'); ?>
      </a>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <a href="signup/">
      <span class="glyphicon glyphicon-envelope"></span>
      <?php echo Utils::t('Sign up for newsletter'); ?>
    </a>
  </div>
</div>
