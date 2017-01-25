<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package outfocusred
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="article-each">
	<header class="entry-header">	
		
		<?php 
		if ( has_post_thumbnail() ) { ?>
			<figure class="featured-image">
				<a href="<?php echo esc_url( get_permalink() ); ?>" data-type="page-transition" rel="bookmark">
					<?php the_post_thumbnail(); ?>
				</a>
			</figure>
		<?php }
		?>
		<div class="entry-combo">
			<div class="entry-title">
				<?php
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
				?>
			</div>
			<div class="entry-meta">
				<?php
				outfocusred_posted_on();
				?>
			</div><!-- .entry-meta -->
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content index-excerpt">
		<?php
			the_excerpt();
		?>
		<div class="continue-reading">
		<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
			<?php
				printf(
					/* Translators: %s = Name of the current post. */
					wp_kses( __( 'Continue reading %s', 'outfocusred' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				);
			?>
		</a>
		</div>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
