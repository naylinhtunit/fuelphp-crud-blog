<article class="blog-post">
    <h2 class="blog-post-title"><?php echo $post->title; ?></h2>
    <p class="blog-post-meta"><?php echo $post->create_date; ?></p>
    <?php echo $post->body; ?>
    <ul>
        <li><?php echo $post->category; ?></li>
        <li><?php echo $post->tags; ?></li>
    </ul>
</article>

<a href="/posts/edit/<?php echo $post->id; ?>" class="btn btn-info btn-sm">Edit</a>
<a href="/posts/delete/<?php echo $post->id; ?>" class="btn btn-danger btn-sm">Delete</a>