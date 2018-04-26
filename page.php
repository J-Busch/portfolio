<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Joel_Busch_Portfolio
 */


/*	VARIABLES  */
$about_image = get_field('about_image');
$about_your_profession = get_field('about_your_profession');
$about_title = get_field('about_title');
$availability = get_field('availability');
$about_subtitle = get_field('about_subtitle');
$about_content = get_field('about_content');

$resume_button = get_field('resume_button');
$resume_link = get_field('resume_link');
$linkedin_button = get_field('linkedin_button');
$linkedin_link = get_field('linkedin_link');

$testimonial_title = get_field('testimonial_title');
$testimonial_leader = get_field('testimonial_leader');

$work_title = get_field('work_title');
$project_feature = get_field('project_feature');

$contact_title = get_field('contact_title');
$contact_content = get_field('contact_content');


get_header(); ?>

<!-- ABOUT SECTION -->
<section id="about">
	<article>
		<div class="container clearfix">
			<div class="row">
				<div class="col-sm-5">
					<div class="portrait">
						<?php if( !empty($about_your_profession) ) : ?>
							<h4>Joel Busch<br /><small><?php echo $about_your_profession; ?></small></h4>
						<?php endif; ?>
						<img src="<?php echo $about_image; ?>" />

					</div>
				</div>
				<div class="col-sm-7">
					<h1><?php echo $about_title; ?></h1>
					<div class="ava-wrap">
						<?php if( !empty($availability) ) { ?>
							<span class="ava ava-open">Availability: <span>Open</span> <span class="fa fa-check-circle-o"></span></span>
						<?php } else { ?>
							<span class="ava ava-none">Availability: <span>None</span> <span class="fa fa-ban"></span></span>
						<?php } ?>
					</div>

					<?php if( !empty($about_subtitle) ) : ?>
						<h3 style="margin-top: 0;"><?php echo $about_subtitle; ?></h3>
					<?php endif; ?>
					<?php echo $about_content ?>

					<?php if ( !empty( $resume_button ) ) : ?>
						<a href="<?php echo $resume_link; ?>" class="btn btn-lg btn-primary" target="_blank"><?php echo $resume_button; ?></a>
					<?php endif; ?>
					<?php if ( !empty( $linkedin_button ) ) : ?>
						<a href="<?php echo $linkedin_link; ?>" class="btn btn-lg btn-primary" target="_blank"><?php echo $linkedin_button; ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</article>
</section>

<!-- TESTIMONIALS SECTION -->

<?php $query = new WP_Query( array( 'post_type' => 'testimonial', 'orderby' => 'post_id', 'order' => 'ASC' ) ); ?>

<?php if ( $query->have_posts() ) : ?>

<section id="testimonials">
	<div class="container clearfix">
		<div class="row">
			<div class="col-sm-12 col-md-10 col-md-offset-1">
				<h1><?php echo $testimonial_title; ?></h1>
				<?php if( !empty($testimonial_leader) ) : ?>
					<p class="lead"><?php echo $testimonial_leader; ?></p>
				<?php endif; ?>

				<?php while( $query->have_posts() ) : $query->the_post(); ?>

				<div class="quote-wrap">
					<div class="row is-table-row">
						<div class="col-xs-12 col-sm-4">
							<div class="card">
								<?php
									if ( has_post_thumbnail() ) {
										the_post_thumbnail('post-thumbnail', ['class' => 'card-image img-responsive']);
									}
								?>
								<div class="card-text">
									<h4><?php the_title(); ?><br /><small><?php the_field('testimonial_profession'); ?></small></h4>
								</div>
							</div>
						</div>
						<blockquote class="col-xs-12 col-sm-8">
							<?php the_content(); ?>
						</blockquote>
					</div>
				</div>

				<?php endwhile; ?>
			</div>
		</div>
	</div>
</section>

<?php endif; ?>
<?php wp_reset_query(); ?>

<!-- MY WORK SECTION -->
<section id="work">
	<div class="container clearfix">
		<div class="row">
			<h1><?php echo $work_title; ?></h1>
			<hr />

			<?php $query = new WP_Query( array( 'post_type' => 'freelance', 'orderby' => 'post_id', 'order' => 'ASC' ) ); ?>

			<?php if ( $query->have_posts() ) : ?>

				<!-- FREELANCE -->
				<div class="col-sm-12 col-md-10 col-md-offset-1 work-type-block">
					<h2>Freelance</h2>

					<div class="row">
						<?php while( $query->have_posts() ) : $query->the_post(); ?>

						<?php if ( $query->current_post == 0 ) { ?>

							<div class="col-sm-12">
								<div class="card card-spaced">
									<?php
										if ( has_post_thumbnail() ) {
											the_post_thumbnail('post-thumbnail', ['class' => 'card-image img-responsive']);
										}
									?>

									<div class="card-text">
										<h4><?php the_title(); ?></h4>

										<?php if ( get_field('item_description') ) : ?>
											<p><?php the_field('item_description'); ?></p>
										<?php endif; ?>

										<?php if ( get_field('website_button') ) : ?>
											<a href="<?php the_field('website_button_link') ?>" class="btn btn-lg btn-info" target="_blank"><?php the_field('website_button_text') ?></a>
										<?php endif; ?>
										<?php if ( get_field('github_button') ) : ?>
											<a href="<?php the_field('github_button_link') ?>" class="btn btn-lg btn-info" target="_blank"><?php the_field('github_button_text') ?></a>
										<?php endif; ?>
									</div>
								</div>
							</div>

						<?php } else { ?>

							<div class="col-sm-6">
								<div class="card card-spaced">
									<?php
										if ( has_post_thumbnail() ) {
											the_post_thumbnail('post-thumbnail', ['class' => 'card-image img-responsive']);
										}
									?>

									<div class="card-text">
										<h4><?php the_title(); ?></h4>

										<?php if ( get_field('item_description') ) : ?>
											<p><?php the_field('item_description'); ?></p>
										<?php endif; ?>

										<?php if ( get_field('website_button') ) : ?>
											<a href="<?php the_field('website_button_link') ?>" class="btn btn-info" target="_blank"><?php the_field('website_button_text') ?></a>
										<?php endif; ?>
										<?php if ( get_field('github_button') ) : ?>
											<a href="<?php the_field('github_button_link') ?>" class="btn btn-info" target="_blank"><?php the_field('github_button_text') ?></a>
										<?php endif; ?>
									</div>
								</div>
							</div>

						<?php } ?>

						<?php endwhile; ?>
					</div>
				</div>

			<?php endif; ?>
			<?php wp_reset_query(); ?>

			<?php $query = new WP_Query( array( 'post_type' => 'project', 'orderby' => 'post_id', 'order' => 'ASC' ) ); ?>

			<?php if ( $query->have_posts() ) : ?>

			<!-- PROJECTS -->
			<div class="col-sm-12 col-md-10 col-md-offset-1 work-type-block">
				<h2>Projects</h2>
				<div class="row">

					<?php if( !empty($project_feature) ) : ?>
						<div class="hidden-xs col-sm-12 pen-container">
							<?php echo $project_feature; ?>
						</div>
					<?php endif; ?>

					<?php while( $query->have_posts() ) : $query->the_post(); ?>

					<div class="col-sm-6">
						<div class="card card-spaced">
							<?php
								if ( has_post_thumbnail() ) {
									the_post_thumbnail('post-thumbnail', ['class' => 'card-image img-responsive']);
								}
							?>

							<div class="card-text">
								<h4><?php the_title(); ?></h4>

								<?php if ( get_field('item_description') ) : ?>
									<p><?php the_field('item_description'); ?></p>
								<?php endif; ?>

								<?php if ( get_field('website_button') ) : ?>
									<a href="<?php the_field('website_button_link') ?>" class="btn btn-info" target="_blank"><?php the_field('website_button_text') ?></a>
								<?php endif; ?>
								<?php if ( get_field('github_button') ) : ?>
									<a href="<?php the_field('github_button_link') ?>" class="btn btn-info" target="_blank"><?php the_field('github_button_text') ?></a>
								<?php endif; ?>
							</div>
						</div>
					</div>

					<?php endwhile; ?>
				</div>
			</div

			<?php endif; ?>
			<?php wp_reset_query(); ?>

			<?php $query = new WP_Query( array( 'post_type' => 'lesson', 'orderby' => 'post_id', 'order' => 'ASC' ) ); ?>

			<?php if ( $query->have_posts() ) : ?>

			<!-- LESSONS -->
			<div class="col-sm-12 col-md-10 col-md-offset-1 work-type-block">
				<h2>Lessons</h2>
				<div class="row">
					<?php while( $query->have_posts() ) : $query->the_post(); ?>

					<div class="col-sm-4">
						<div class="card card-spaced">
							<?php
								if ( has_post_thumbnail() ) {
									the_post_thumbnail('post-thumbnail', ['class' => 'card-image img-responsive']);
								}
							?>

							<div class="card-text">
								<h4><?php the_title(); ?></h4>

								<?php if ( get_field('item_description') ) : ?>
									<p><?php the_field('item_description'); ?></p>
								<?php endif; ?>

								<?php if ( get_field('website_button') ) : ?>
									<a href="<?php the_field('website_button_link') ?>" class="btn btn-info" target="_blank"><?php the_field('website_button_text') ?></a>
								<?php endif; ?>
								<?php if ( get_field('github_button') ) : ?>
									<a href="<?php the_field('github_button_link') ?>" class="btn btn-info" target="_blank"><?php the_field('github_button_text') ?></a>
								<?php endif; ?>
							</div>
						</div>
					</div>

					<?php endwhile; ?>
				</div>
			</div

			<?php endif; ?>
			<?php wp_reset_query(); ?>
		</div>
	</div>
</section>

<!-- CONTACT SECTION -->
<section id="contact">
	<div class="container clearfix">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
				<h1><?php echo $contact_title; ?></h1>

				<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Contact')) : ?><?php endif; ?>
			</div>
			<div class="col-sm-12">
				<br />
				<h1>OR</h1>
				<h3><?php echo $contact_content; ?><br /><?php echo bloginfo('admin_email') ?></h3>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
