<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
    <div class="o-grid">
      <div class="o-grid__col o-grid__col--full">
        <div class="c-archive">
          <h4 class="c-archive__title"><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ''); ?></h4>
             <p class="c-archive__description">
            <?php echo $this->getDescription(); ?>
            </p> 
        </div>
      </div>
    </div>
        <div class="o-grid js-grid">
    <?php while($this->next()): ?>
            <div class="o-grid__col o-grid__col--4-4-s o-grid__col--2-4-m o-grid__col--1-3-l c-post-card-wrap js-post-card-wrap ">
                <div class="c-post-card ">
                    <div class="c-post-card__media">
                        <a href="<?php $this->permalink() ?>" class="js-fadein c-post-card__image" style="background-image: url(<?php if (array_key_exists('img',unserialize($this->___fields()))): ?><?php $this->fields->img(); ?>_580x330.jpg<?php else: ?><?php
preg_match_all("/\<img.*?src\=(\'|\")(.*?)(\'|\")[^>]*>/i", $this->content, $matches);
$imgCount = count($matches[0]);
if($imgCount >= 1){
$img = $matches[2][0];
echo <<<Html
{$img}
Html;
}
?><?php endif; ?>)">
                        <?php if (array_key_exists('star',unserialize($this->___fields()))): ?><span title="Featured Post">
                        <div class="icon icon--ei-star icon--s c-post-card--featured__icon">
                            <svg class="icon__cnt"><use xlink:href="#ei-star-icon"></use></svg>
                        </div>
                        </span><?php endif; ?>
                        </a>
                    </div>
                    <div class="c-post-card__meta">
                        <?php $this->category(' '); ?> - 
                        <div class="c-post-card__date">
                            <time datetime="<?php $this->date('c'); ?>"><?php $this->date(); ?></time>
                        </div>
                        <h2 class="c-post-card__title">
                        <a href="<?php $this->permalink() ?>" class="c-post-card__link"><?php $this->title() ?></a>
                        </h2>
                    </div>
                </div>
            </div>
    <?php endwhile; ?>
        </div>
        <div class="o-grid">
            <div class="o-grid__col o-grid__col--2-4-s">
                第<?php if($this->_currentPage>1) echo $this->_currentPage;  else echo 1;?>页 / 共<?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?>页
            </div>
            <div class="o-grid__col o-grid__col--end o-grid__col--2-4-s u-text-right">
                <?php $this->pageLink('下一页','next'); ?>
            </div>
        </div>
	<?php $this->need('footer.php'); ?>