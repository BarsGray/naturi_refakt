<div class="news_item">
    <div class="news_item_img">
        <?php 
               $url = '/wp-content/uploads/woocommerce-placeholder.png'; // адрес по-умолчанию
               if (get_the_post_thumbnail_url()) {
                   $url = get_the_post_thumbnail_url();
               }
        ?> 
        <img src="<?php echo $url;?>" alt="">
    </div>
    <a href="<?php the_permalink();?>" class="news_item_info">
        <div class="news_item_info_date">
            <? echo get_the_date();?> 
        </div>
        <h2>
            <? the_title();?>
        </h2>
        <button class="news_item_info_btn btn">
            Перейти в новость
        </button>
    </a>
</div>