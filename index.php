<?php
/**
 * 这是老孙修改的一款主题，主要区分为3个列表展示效果，用来做博客挺好
 * 添加了一些常用功能后台设置
 * @package Typecho Aspire Theme 修改版
 * @author Typecho Team & 老孙
 * @version 2025.04.02
 * @link https://www.imsun.org
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
?>
<div class="o-grid js-grid">
	<?php while($this->next()): ?>
		<div class="o-grid__col o-grid__col--4-4-s o-grid__col--2-4-m o-grid__col--1-3-l c-post-card-wrap js-post-card-wrap ">
			<div class="c-post-card ">
				<div class="c-post-card__media">
					<a href="<?php $this->permalink() ?>" class="js-fadein c-post-card__image" style="background-image: url(<?php
                       preg_match_all("/\<img.*?src\=(\'|\")(.*?)(\'|\")[^>]*>/i", $this->content, $matches);
                       $imgCount = count($matches[0]);
                       if($imgCount >= 1){
                       $img = $matches[2][0];
                       echo <<<Html
                       {$img}
                       Html;
                       }?>)">
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