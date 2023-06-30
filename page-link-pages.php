<?php
/**
 * Template Name: Link Pages
 */

get_header(); 
$placeholder = THEMEURI . 'images/rectangle.png';
?>

<div id="primary" data-post="<?php echo get_the_ID()?>" class="content-area-full activities-parent">
		<?php while ( have_posts() ) : the_post(); ?>
				<div class="intro-text-wrap">
					<div class="wrapper">
						<h1 class="page-title"><span><?php the_title(); ?></span></h1>
						<div class="intro-text"><?php the_content(); ?></div>
					</div>
				</div>
		<?php endwhile;  ?>

		<?php
		$postype = 'page';
		$perpage = -1;
		$pId = get_the_ID();
		if ( have_rows('tiles') ) { ?>
		<section id="section-activities" data-section="Activities" class="section-content camp-activities activities-parent-page">
			<div class="entryList flexwrap">

				<?php $i=1; while ( have_rows('tiles') ) : the_row();  
					$thumbnail = get_sub_field('image');
					
					$title = get_sub_field('title');
					$pagelink = get_sub_field('link');
					?>
					<div id="entryBlock<?php echo $i?>" class="fbox <?php echo ($thumbnail) ? 'hasImage':'noImage'; ?>">
						<div class="inside text-center">
							<div class="imagediv <?php echo ($thumbnail) ? 'hasImage':'noImage'?>">
								<?php if($pagelink){ ?><a href="<?php echo $pagelink['url']; ?>" class="link"><?php } ?>
									<?php if ($thumbnail) { ?>
										<span class="img" style="background-image:url('<?php echo $thumbnail['url']; ?>')"></span>
									<?php } ?>
									<img src="<?php echo $placeholder ?>" alt="" aria-hidden="true" class="placeholder">
								<?php if($pagelink){ ?></a><?php } ?>
							</div>
							<div class="titlediv">
								<?php if($title) { ?>
									<p class="name"><?php echo $title ?></p>
								<?php } ?>
								<?php if($pagelink){ ?>
									<div class="buttondiv">
										<a href="<?php echo $pagelink['url']; ?>" target="?php echo $pagelink['target']; ?>" class="btn-sm xs"><span><?php echo $pagelink['title']; ?></span></a>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				<?php $i++; endwhile; wp_reset_postdata(); ?>

			</div>
		</section>
		<?php } ?>

</div><!-- #primary -->

<?php
get_footer();
