<div class="container">
    <h3><?php echo 'Create a news'; ?></h3>

    <?php echo validation_errors(); ?>

    <?php echo form_open('news/create'); ?>

        <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title">
        </div>

        <div class="form-group">
            <label for="text">Text</label>
            <textarea class="form-control" name="text"></textarea>
        </div>

        <input type="submit" class="btn btn-primary" name="submit" value="Create a news" />
    </form>
</div>