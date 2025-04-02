<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    $faviconUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'faviconUrl',
        null,
        null,
        _t('站点 Favicon 地址'),
        _t('在这里填入一个图片 URL 地址, 以在浏览器网站标题前加上一个 Favicon')
    );
    $form->addInput($faviconUrl);

    $telegram = new \Typecho\Widget\Helper\Form\Element\Text(
        'telegram',
        null,
        null,
        _t('Telegram 链接'),
        _t('在这里填入一个 Telegram 链接')
    );
    $form->addInput($telegram);

    $mastodon = new \Typecho\Widget\Helper\Form\Element\Text(
        'mastodon',
        null,
        null,
        _t('Mastodon 链接'),
        _t('在这里填入一个 Mastodon 链接')
    );
    $form->addInput($mastodon);

    $github = new \Typecho\Widget\Helper\Form\Element\Text(
        'github',
        null,
        null,
        _t('Github 链接'),
        _t('在这里填入一个 Github 链接')
    );
    $form->addInput($github);

    $soundcloud = new \Typecho\Widget\Helper\Form\Element\Text(
        'soundcloud',
        null,
        null,
        _t('cloud 链接'),
        _t('在这里填入一个 cloud 链接')
    );
    $form->addInput($soundcloud);

    $footerinfo = new \Typecho\Widget\Helper\Form\Element\Textarea(
        'footerinfo',
        null,
        null,
        _t('站点描述'),
        _t('在这里填入一段文字, 将显示在网站标题后')
    );
    $form->addInput($footerinfo);

    $cnavatar = new \Typecho\Widget\Helper\Form\Element\Text(
        'cnavatar',
        null,
        null,
        _t('Gravatar 镜像'),
        _t('在这里填入一个 Gravatar 镜像')
    );
    $form->addInput($cnavatar);

    $icpbeian = new Typecho_Widget_Helper_Form_Element_Text('icpbeian', NULL, NULL, _t('备案号码'), _t('不填写则不显示'));
    $form->addInput($icpbeian);
    $tongji = new Typecho_Widget_Helper_Form_Element_Textarea('tongji', NULL, NULL, _t('Footer代码'), _t('在footer中插入代码支持HTML'));
    $form->addInput($tongji);
    
}

/**
* Gravatar镜像
*/
// 获取Typecho的选项
$options = Typecho_Widget::widget('Widget_Options');
// 检查cnavatar是否已设置，如果未设置或为空，则使用默认的Gravatar前缀
$gravatarPrefix = empty($options->cnavatar) ? 'https://cravatar.cn/avatar/' : $options->cnavatar;
// 定义全局常量__TYPECHO_GRAVATAR_PREFIX__，用于存储Gravatar前缀
define('__TYPECHO_GRAVATAR_PREFIX__', $gravatarPrefix);