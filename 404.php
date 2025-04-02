<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
    <div class="o-grid">
      <div class="o-grid__col o-grid__col--full">
        <div class="c-archive">
          <h4 class="c-archive__title">404 - <?php _e('页面没找到'); ?></h4>
            <p class="c-archive__description">
              <?php _e('你想查看的页面已被转移或删除了'); ?>
            </p>
        </div>
      </div>
    </div>
<?php $this->need('footer.php'); ?>