<?php
if ( get_field('award_featured') ) {
    $featured = get_field('award_featured');
    $featured = $featured[0];
} else {
    $featured = '';
}

if (get_the_terms( get_the_ID(), 'award-names' )) {
    $post_award_names = get_the_terms( get_the_ID(), 'award-names' );
    foreach ( $post_award_names as $post_award_name ) {
        $this_award_name_slug = $post_award_name->slug;
        $this_award_name_name = $post_award_name->name;
    }
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('format-standard ' . $featured); ?>>
    <div class="wrapper">
        <h6 class="award-name"><a href="<?php echo(site_url('/award-names/' . $this_award_name_slug)); ?>"><?php the_field('award_name'); ?></a></h6>
        <?php
        if (get_field('award_recipients')) { ?>
            <p class="recipients">
            <?php while (has_sub_field('award_recipients')) {
            $recipient = get_sub_field('recipient_name');
            ?>
            <a href="<?php echo(site_url('/?s=' . $recipient)); ?>"><?php echo($recipient); ?></a>&nbsp;
            <?php } ?>
            </p>
        <?php }
        if (get_field('films')) { ?>
            <p class="films">
            <?php while (has_sub_field('films')) {
            $film = get_sub_field('film_title');
            ?>
            <a href="<?php echo(site_url('/?s=' . $film)); ?>"><?php echo($film) ?></a>&nbsp;
            <?php } ?>
            </p>
        <?php } ?>
    </div>
</article>
