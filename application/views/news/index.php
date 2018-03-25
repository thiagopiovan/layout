<div class="container">
    <?php foreach ($news as $news_item): ?>
        <div class="border">
            <div class="row">
                <div class="col-auto" style="padding-right: 0">
                    <img src="http://via.placeholder.com/250x250">
                </div>
                <div class="col-9" style="padding: 10px 20px;">
                    <h3><?php echo $news_item['title']; ?></h3>
                    <div class="more text-justify">
                        <?php echo $news_item['text']; ?>
                        <?php echo form_hidden('id', $news_item['id']); ?>
                    </div>
                    <!-- <p><a href="<?php echo site_url('news/'.$news_item['id']); ?>">View article</a></p> -->
                </div>
            </div>
        </div>
    <?php endforeach; ?> 
    <?php echo anchor('news/create', '<i></i>', array('class' => 'btn btn-primary rounded-circle fa fa-plus toTop', 'title' => 'Create a news!')); ?>
</div>