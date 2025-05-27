<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<style>
#toc{font-size:14px;padding:5px 5px;background-color:rgba(250,250,250,1);border-radius:10px;margin-bottom:1px}
#toc  summary{cursor:pointer}
#toc toc-title{font-weight:600}
#toc  ul{padding-left:5px;margin-bottom:-10px}
#toc  ul li::before{content:"";margin-right:5px;}
#toc  ul li>ul{margin-left:10px;font-size:12px}
#toc ul li{margin-bottom:-10px;margin-top:-10px;}
</style>
  <div class="o-grid">
    <div class="o-grid__col o-grid__col--center o-grid__col--2-3-m">
      <article class="c-post page">
        <h1 class="c-post__title"><?php $this->title() ?></h1>
        <hr>
        <div class="c-content">
          <p>
            <time datetime="<?php $this->date('Y-m-d'); ?>" itemprop="datePublished"><?php $this->date('Y-m-d'); ?></time>
<span class="middotDivider"></span>
            <?php $this->category(' , '); ?>
<span class="middotDivider"></span>
<a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('去评论', '1条评论', '%d条评论'); ?></a> 
<?php if($this->user->hasLogin() && $this->user->pass('editor', true)): ?>    
<span class="middotDivider"></span>
<a href="<?php $this->options->adminUrl('write-post.php?cid=' . $this->cid); ?>" target="_blank" title="编辑文章">Edit</a>
<?php endif; ?> 
          </p><div class="showtoc"></div>
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
<script>
document.addEventListener('DOMContentLoaded', (event) => {
    const targetClassElement = document.querySelector('.showtoc');
    const postContent = document.querySelector('.c-content');
    if (!postContent) return;
    let found = false;
    for (let i = 1; i <= 6 &&!found; i++) {
        if (postContent.querySelector(`h${i}`)) {
            found = true;
        }
    }
    if (!found) return;
    const heads = postContent.querySelectorAll('h1, h2, h3, h4, h5, h6');
    const toc = document.createElement('div');
    toc.id = 'toc';
    toc.innerHTML = '<details class="coffin--toc" open><summary>目录</summary><nav id="TableOfContents"><ul></ul></nav></details>';
    // 插入到指定 class 元素之后
    if (targetClassElement) {
        targetClassElement.parentNode.insertBefore(toc, targetClassElement.nextSibling);
    }
    let currentLevel = 0;
    let currentList = toc.querySelector('ul');
    let levelCounts = [0];
    heads.forEach((head, index) => {
        const level = parseInt(head.tagName.substring(1));
        if (levelCounts[level] === undefined) {
            levelCounts[level] = 1;
        } else {
            levelCounts[level]++;
        }
        // 重置下级标题的计数器
        levelCounts = levelCounts.slice(0, level + 1);
        if (currentLevel === 0) {
            currentLevel = level;
        }
        while (level > currentLevel) {
            let newList = document.createElement('ul');
            if (!currentList.lastElementChild) {
                currentList.appendChild(newList);
            } else {
                currentList.lastElementChild.appendChild(newList);
            }
            currentList = newList;
            currentLevel++;
            levelCounts[currentLevel] = 1;
        }
        while (level < currentLevel) {
            currentList = currentList.parentElement;
            if (currentList.tagName.toLowerCase() === 'li') {
                currentList = currentList.parentElement;
            }
            currentLevel--;
        }
        const anchor = head.textContent.trim().replace(/\s+/g, '-');
        head.id = anchor;
        const item = document.createElement('li');
        const link = document.createElement('a');
        link.href = `#${anchor}`;
        link.textContent = `${head.textContent}`;
        link.style.textDecoration = 'none';
        item.appendChild(link);
        currentList.appendChild(item);
    });
});
</script>
<?php $this->need('footer.php'); ?>