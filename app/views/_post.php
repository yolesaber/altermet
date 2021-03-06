<article id="<?php echo "post_$post->id"; ?>" class="post <?php echo $class; ?>" data-colors="<?php echo get_colors($post->user_id); ?>">
  <?php
  
  if (!empty($post->attachment) && strpos($class, 'topic') !== false) {
    $hide_attachment_link = show_attachment($post);
  }
  
  ?>
  <div class="container" ontouchstart="">
    <div class="text-only hidden">
      <?php echo htmlentities($post->content, ENT_COMPAT, 'UTF-8'); ?>
    </div>
    <div class="content">
      <?php echo nl2br(htmlentities($post->content)); ?>
    </div>
    <?php
    
    if (!empty($post->attachment) &&
        empty($hide_attachment_link) &&
        substr($post->attachment->name, -5, 5) != '.json') {
      show_attachment_link($post->attachment);
    }
    
    ?>
  </div>
  <div class="author">
    <a href="u/<?php echo $post->user_id; ?>" class="id"><span class="color"></span><?php echo get_username($post->user_id); ?></a>
    <a class="replies-link" href="<?php
      
      $url = "p/$post->id";
      if ($post->reply_count == 0) {
        echo "$url#reply\">post a reply";
      } else if ($post->reply_count == 1) {
        echo "$url\">1 reply";
      } else {
        echo "$url\">$post->reply_count replies";
      }
      
      ?></a>
      <?php if (!empty($_SESSION['is_admin'])) { ?>
      <a href="#" class="delete" data-id="<?php echo $post->id; ?>">delete</a>
    <?php } ?>
  </div>
  <div class="when">
    <?php echo "<a href=\"$url\" class=\"permalink\">" . elapsed_time($post->created) . "</a>"; ?>
  </div>
  <div class="clear"></div>
</article>
