<div class="container">
    <h3><?php echo 'Update data'; ?></h3>

    <?php echo validation_errors(); ?>

    <?php echo form_open('news/edit/'.$news_item['id']); ?>

        <div class="form-group">
            <label for="title">Title</label>
            <?php echo form_input(array('type'=>'text', 'class'=>'form-control', 'id'=>'title','name'=>'title','value'=>set_value('title', $news_item['title']))); ?>
        </div>

        <div class="form-group">
            <label for="text">Text</label>
            <?php echo form_textarea(array('name'=>'text', 'class'=>'form-control','value'=>set_value('text', $news_item['text']))); ?>
        </div>

        <input type="submit" name="submit" class="btn btn-primary" value="Update news item" />
    </form>
</div>