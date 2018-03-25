<div class="container">
    <?php
    echo '<h2>'.$news_item['title'].'</h2>';
    echo $news_item['text'];
    echo anchor('news/edit/'.$news_item['id'], '<i></i>', array('class' => 'btn btn-primary rounded-circle fa fa-edit toTop', 'title' => 'Edit a news!'));
    ?>
</div>