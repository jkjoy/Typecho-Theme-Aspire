<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <meta name="keywords" content="<?php $this->options->keywords(); ?>">
    <meta name="description" content="<?php $this->options->description(); ?>">
    <link rel='icon' href='<?php $this->options->faviconUrl(); ?>' type='image/x-icon' />
    <!-- 使用url函数转换相关路径 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">
    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header('wlw=&xmlrpc=&rss2=&atom=&rss1=&template=&pingback=&generator'); ?>
</head>
<body>
<div class="js-off-canvas-container c-off-canvas-container">
    <header class="c-header ">
    <div class="o-grid">
        <div class="o-grid__col o-grid__col--3-4-s o-grid__col--1-4-l">
            <div class="c-logo">
                <a class="c-logo__link" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
            </div>
        </div>
        <div class="o-grid__col o-grid__col--1-4-s o-grid__col--3-4-l">
            <div class="c-off-canvas-content js-off-canvas-content">
                <label class="js-off-canvas-toggle c-off-canvas-toggle c-off-canvas-toggle--close">
                <span class="c-off-canvas-toggle__icon"></span>
                </label>
                <div class="o-grid">
                    <div class="o-grid__col o-grid__col--4-4-s o-grid__col--4-4-l">
                        <ul class="c-nav o-plain-list">
                            <li class="c-nav__item">
                            <a href="<?php $this->options->siteUrl(); ?>" class="c-nav__link"><?php _e('首页'); ?></a>
                            </li>                           
                    <!--显示所有页面-->
                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while($pages->next()): ?>
                    <li class="c-nav__item"><a class="c-nav__link" href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
                    <?php endwhile; ?>
                    <!--显示所有分类-->
                    <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
                    <?php while ($category->next()): ?>
                    <li class="c-nav__item"><a class="c-nav__link" href="<?php $category->permalink(); ?>" title="<?php $category->name(); ?>"><?php $category->name(); ?></a></li>
                    <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <label class="js-off-canvas-toggle c-off-canvas-toggle">
            <span class="c-off-canvas-toggle__icon"></span>
            </label>
        </div>
    </div>
    </header>
    <div class="o-wrapper">