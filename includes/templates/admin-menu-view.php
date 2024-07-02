<div class="wrap">
    <h1 class="wp-heading-inline">Custom Post View</h1>
    <div class="tablenav top">
        <form method="get">
        <input type="hidden" name="page" value="post-view-dashboard" />
        <div class="alignleft actions">
            <label class="screen-reader-text" for="post_view_cat">Filter by category</label>
            <select name="post_view_cat" id="post_view_cat" class="postform">
                <option value="0" <?php selected( $selected_category, '0' ); ?> >All Categories</option>

                <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category->cat_ID; ?>" <?php selected( $selected_category, $category->cat_ID ); ?> ><?php echo $category->name; ?></option>
                <?php endforeach; ?>
                
            </select>
            <input type="submit" class="button" value="Filter">
        </div>
        </form>
    </div>
    <table class="wp-list-table widefat fixed striped posts">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Categories</th>
                <th>Tags</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($posts as $post) : ?>
            <tr>
                <td><?php echo $post->post_title; ?></td>
                <td><?php echo get_the_author_meta( 'display_name', $post->post_author ); ?></td>
                <td>
                    <?php
                    $categories = get_the_category( $post->ID );
                    $cat_count = count($categories);
                    foreach ($categories as $key => $category) {
                        $key += 1;
                        $sep = '';

                        if ($key != $cat_count) {
                            $sep = ', ';
                        }

                        echo $category->cat_name . $sep;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $tags = wp_get_post_tags( $post->ID );
                    $tag_count = count($tags);
                    if( $tag_count < 1 ) {
                        echo '----';
                    } else {
                        foreach ($tags as $key => $tag) {
                            $key += 1;
                            $sep = '';
    
                            if ($key != $tag_count) {
                                $sep = ', ';
                            }
    
                            echo $tag->name . $sep;
                        }
                    }
                    ?>
                </td>
                <td><?php echo $post->post_status; ?> <br> <?php echo $post->post_date; ?></td>
            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>
