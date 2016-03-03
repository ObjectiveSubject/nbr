<?php
$featured = '';
if ( get_field('award_featured') ) {
    $featured = get_field('award_featured');
    $featured = $featured[0];
}
$post_award_years = get_the_terms( get_the_ID(), 'award-years' );
foreach ( $post_award_years as $post_award_year ) {
    $this_year_slug = $post_award_year->slug;
    $this_year_name = $post_award_year->name;
} ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $featured ); ?>>
    <div class="wrapper">
        <h6 class="award-name"><a href="<?php echo(site_url('/award-years/' . $this_year_slug)); ?>"><?php echo $this_year_name; ?></a>&nbsp;<?php the_field('award_name'); ?></h6>
        <?php
        if ( get_field('award_recipients') ) { ?>
            <p class="recipients">
            <?php while (has_sub_field('award_recipients')) {
            $recipient = get_sub_field('recipient_name');
            ?>
            <a href="<?php echo(site_url('/?s=' . $recipient)); ?>"><?php echo($recipient); ?></a>&nbsp;
            <?php } ?>
            </p>
        <?php }
        if ( get_field('films') ) { ?>
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
