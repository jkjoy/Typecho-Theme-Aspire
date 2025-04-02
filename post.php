<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
  <div class="o-grid">
    <div class="o-grid__col o-grid__col--center o-grid__col--2-3-m">
      <article class="c-post page">
        <h1 class="c-post__title"><?php $this->title() ?></h1>
        <hr>
        <div class="c-content">
          <p><?php _e('发布时间: '); ?><time datetime="<?php $this->date('Y-m-d H:i:s'); ?>" itemprop="datePublished"><?php $this->date('Y-m-d H:i:s'); ?></time>
            <?php _e('最后更新: '); ?><time datetime="<?php echo date('Y-m-d H:i:s', $this->modified); ?>" itemprop="datePublished"><?php echo date('Y-m-d H:i:s', $this->modified); ?></time>  
          <?php _e('分类: '); ?><?php $this->category(' , '); ?>
          <?php _e('评论: '); ?><a href="#comments"><?php $this->commentsNum('去评论', '1条评论', '%d条评论'); ?></a>
        </p>

          <?php $this->content(); ?>
        </div>
        <div class="c-tags">
            <?php $this->tags('', true, 'none'); ?>
          </div>
        <hr>
        <?php $this->need('comments.php'); ?>
      </article>
    </div>
  </div>
<?php $this->need('footer.php'); ?>