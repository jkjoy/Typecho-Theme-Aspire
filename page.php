<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
	<div class="o-grid">
    <div class="o-grid__col o-grid__col--center o-grid__col--2-3-m">
      <article class="c-post page">
        <h1 class="c-post__title"><?php $this->title() ?></h1>
        <div class="c-content">
          <?php $this->content(); ?>
        </div>
        <hr>
        <?php $this->need('comments.php'); ?>
      </article>
    </div>
  </div>
<?php $this->need('footer.php'); ?>