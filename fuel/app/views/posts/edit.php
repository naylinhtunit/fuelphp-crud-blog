<h1>Edit Post</h1>
<?php echo Form::open('posts/edit/<?php echo $post->id; ?>'); ?>
<div class="form-group">
    <?php echo Form::label('Title', 'title', array('class' => 'form-label')); ?>
    <?php echo Form::input('title', Input::post('title', isset($post) ? $post->title : ''), array('class' => 'form-control')); ?>
</div>
<div class="form-group">
    <?php echo Form::label('Category', 'category', array('class' => 'form-label')); ?>
    <?php echo Form::select('category', $post->category, array(
        '0' => 'Select Category',
        'Web Design' => 'Web Design',
        'Programming' => 'Programming',
        'Graphic Design' => 'Graphic Design',
    ), array('class' => 'form-control')); ?>
</div>
<div class="form-group">
    <?php echo Form::label('Body', 'body', array('class' => 'form-label')); ?>
    <?php echo Form::textarea('body', Input::post('body', isset($post) ? $post->body : ''), array('class' => 'form-control')); ?>
</div>
<div class="form-group mb-3">
    <?php echo Form::label('Tags', 'tags', array('class' => 'form-label')); ?>
    <?php echo Form::input('tags', Input::post('tags', isset($post) ? $post->tags : ''), array('class' => 'form-control')); ?>
</div>
<input type="hidden" name="post_id" value="<?php echo $post->id; ?>">
<?php echo Form::submit('send'); ?>
<?php echo Form::close(); ?>