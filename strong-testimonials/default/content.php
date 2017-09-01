<?php
/**
 * Template Name: Default
 * Description: The default template.
 */
?>
<?php do_action( 'wpmtst_before_view' ); ?>

<div class="strong-view testimonial-wrapper <?php wpmtst_container_class(); ?>"<?php wpmtst_container_data(); ?>>

	<?php do_action( 'wpmtst_view_header' ); ?>

	<div class="testimonial-wrapper-inner">

		<div class="testimonial-slider-wrapper strong-content <?php wpmtst_content_class(); ?>">

			<?php do_action( 'wpmtst_before_content' ); ?>

			<?php while ( $query->have_posts() ) : $query->the_post(); ?>

				<div class="testimonial-slider-item <?php wpmtst_post_class(); ?>">

					<?php do_action( 'wpmtst_before_testimonial' ); ?>

					<div class="tme-wrapper">

						<div class="tme-content">
							<div class="tme-content-inner">

								<?php wpmtst_the_content(); ?>

								<?php do_action( 'wpmtst_after_testimonial_content' ); ?>

							</div>
						</div>

						<div class="tme-name">
							<h5> <?php wpmtst_the_client(); ?> </h5>
						</div>

					</div>

					<?php do_action( 'wpmtst_after_testimonial' ); ?>


				</div>

			<?php endwhile; ?>

			<?php do_action( 'wpmtst_after_content' ); ?>

		</div>

		<div class="divider-link">
			<span class="divider-content">
				<button><a href="" class=""><?php echo __("Enter To Testimonial Form");?></a></button>
			</span>
		</div>

	</div>

	<?php do_action( 'wpmtst_view_footer' ); ?>

</div>

<?php do_action( 'wpmtst_after_view' ); ?>
