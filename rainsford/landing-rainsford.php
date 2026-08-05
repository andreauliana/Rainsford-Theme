<?php
/**
 * Template Name: Landing Rainsford
 *
 * Copy this file into the active theme (or child theme) root.
 * Structure below mirrors the hardcoded reference HTML exactly —
 * update markup here first if the design changes, fields stay the same.
 */

get_header();

$post_id = get_the_ID();

/** Get a meta value without any HTML processing */
function medman_meta( $post_id, $key ) {
	return get_post_meta( $post_id, "_medman_{$key}", true );
}

/** Echo a rich text field through the_content filter (adds paragraphs, allows lists) */
function medman_rich( $post_id, $key ) {
	echo apply_filters( 'the_content', medman_meta( $post_id, $key ) );
}
?>

<main id="main-content" class="landing-rainsford">

	<!-- HERO -->
	<section id="hero" class="hero">
		<div class="container">
			<div class="row">
				<div class="col s10">
					<h1><?php echo esc_html( medman_meta( $post_id, 'hero_h1' ) ); ?></h1>
				</div>
			</div>
		</div>
		

		<div class="parallax-wrap hero-parallax" data-parallax data-parallax-speed-mobile="0.08" data-parallax-speed-desktop="0.18">
			<?php
			$hero_image = medman_meta( $post_id, 'hero_image' );
			if ( $hero_image ) echo wp_get_attachment_image( $hero_image, 'large' );
			?>
		</div>

		<div class="hero-boxes">
			<div class="box1">
				<div class="container">
					<div class="row">
						<div class="col s10">
							<h4><?php echo esc_html( medman_meta( $post_id, 'hero_text_1' ) ); ?></h4>
						</div>
					</div>
				</div>
			</div>

			<div class="box2">
				<div class="container">
					<div class="row">
						<div class="col s10">
							<h2><?php echo esc_html( medman_meta( $post_id, 'hero_text_2' ) ); ?></h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ABOUT  -->
	<section id="about" class="about">

		<div class="container">
			<div class="about-grid">
				<div class="about-left">
					<h5>ABOUT US</h5>
					<h4><?php echo esc_html( medman_meta( $post_id, 'about_intro' ) ); ?></h4>
				</div>
				<div class="about-right">
					<?php medman_rich( $post_id, 'about_content' ); ?>
					<h3><?php echo esc_html( medman_meta( $post_id, 'workwith_intro' ) ); ?></h3>
				</div>
			</div>
		</div>

		<!-- 4 SECTORS -->
		<div class="sectors">
			<div class="container">
				<div class="row">
					<div class="sectors-container">
						<?php for ( $i = 1; $i <= 4; $i++ ) :
							$icon_id = medman_meta( $post_id, "workwith_{$i}_image" );
							$text    = medman_meta( $post_id, "workwith_{$i}_text" );
							if ( empty( $text ) ) continue;
							$icon_url = $icon_id ? wp_get_attachment_image_url( $icon_id, 'thumbnail' ) : '';
							?>
							<div class='col s12 m3' <?php echo $icon_url ? ' style="background-image: url(' . esc_url( $icon_url ) . ');"' : ''; ?>  >
								<p><?php echo esc_html( $text ); ?></p>
							</div>
						<?php endfor; ?>
					</div>					
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col s12 m6 offset-m6">
					<p><?php echo esc_html( medman_meta( $post_id, 'workwith_outro' ) ); ?></p>
				</div>
			</div>
		</div>
	</section>

	<!-- WHY US -->
	<section id="why-us" class="why-us">


		<div class="parallax-wrap why-top-parallax" data-parallax data-parallax-speed-mobile="0.08" data-parallax-speed-desktop="0.15">
			<?php
			$bottom = medman_meta( $post_id, 'why_us_image_top' );
			if ( $bottom ) echo wp_get_attachment_image( $bottom, 'large' );
			?>
		</div>


		<div class="container">
			<div class="row">
				<div class="col s12">
					<div class="intro-title">
						<h5>WHY RAINSFORD DEVELOPMENTS</h5>
					</div>
					<h2><?php echo esc_html( medman_meta( $post_id, 'why_us_intro' ) ); ?></h2>
				</div>
			</div>

			<div class="why-grid">
				<div class="why-left">
					<?php medman_rich( $post_id, 'why_us_content' ); ?>
				</div>

				<div class="why-right">
					<ul class="collapsible">
						<?php for ( $i = 1; $i <= 4; $i++ ) :
							$title = medman_meta( $post_id, "why_blocks_{$i}_title" );
							if ( empty( $title ) ) continue;
							?>
							<li<?php echo $i === 1 ? ' class="active"' : ''; ?>>
								<div class="collapsible-header">
									<div class="collapsible-header-inner">
										<h4><?php echo esc_html( $title ); ?></h4>
										<i class="collapsible-icon">
											<img src="<?php echo esc_url( get_template_directory_uri() . '/inc/collapsable-icon.svg' ); ?>" alt="">
										</i>
									</div>
								</div>
								<div class="collapsible-body">
									<?php medman_rich( $post_id, "why_blocks_{$i}_text" ); ?>
								</div>
							</li>
						<?php endfor; ?>
					</ul>
				</div>
			</div>
		</div>

		<div class="parallax-wrap why-bottom-parallax" data-parallax data-parallax-speed-mobile="0.08" data-parallax-speed-desktop="0.18">
			<?php
			$bottom = medman_meta( $post_id, 'why_us_image_bottom' );
			if ( $bottom ) echo wp_get_attachment_image( $bottom, 'large' );
			?>
		</div>
	</section>

	<!-- TEAM -->
	<section id="team" class="team">
		<div class="container">
			<div class="row">
				<div class="col s12">
					<div class="intro-title">
						<h5>MEET OUR DIRECTORS</h5>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<?php for ( $i = 1; $i <= 2; $i++ ) :
					$img_id = medman_meta( $post_id, "team_{$i}_image" );
					$name   = medman_meta( $post_id, "team_{$i}_name" );
					$role   = medman_meta( $post_id, "team_{$i}_role" );
					if ( empty( $name ) ) continue;
					?>
					<div class="col s12 m6">
						<div class="team-single">
							<?php if ( $img_id ) echo wp_get_attachment_image( $img_id, 'medium' ); ?>
							<h3><?php echo esc_html( $name ); ?></h3>
							<h4><?php echo esc_html( $role ); ?></h4>
							<?php medman_rich( $post_id, "team_{$i}_bio" ); ?>
						</div>
					</div>
				<?php endfor; ?>
			</div>
		</div>
	</section>

	<!-- SIX REASONS -->
	<section id="reasons" class="reasons">
		<div class="full-width">
			<?php
			$reasons_img = medman_meta( $post_id, 'reasons_image' );
			if ( $reasons_img ) echo wp_get_attachment_image( $reasons_img, 'large' );
			?>
		</div>

		<div class="container">
			<div class="row">
				<div class="col s12">
					<div class="intro-title">
						<h5>Six reasons to choose Rainsford Developments</h5>
					</div>
					<?php for ( $i = 1; $i <= 6; $i++ ) :
					$title = medman_meta( $post_id, "reasons_{$i}_title" );
					if ( empty( $title ) ) continue;
					?>
					<div class="reason-card" data-index="0<?php echo esc_attr( $i ); ?>">
						<span class="reason-number"><?php echo esc_html( sprintf( '%02d', $i ) ); ?></span>
						<h4><?php echo esc_html( $title ); ?></h4>
						<?php medman_rich( $post_id, "reasons_{$i}_text" ); ?>
					</div>
					<?php endfor; ?>
				</div>
			</div>
		</div>

	</section>

	<!-- WORK -->
	<section id="work" class="work">

		<div class="container">
			<div class="row">
				<div class="s12">
					<div class="intro-title">
						<h5>TOTAL TURNKEY DELIVERY</h5>
					</div>
					<h1><?php echo esc_html( medman_meta( $post_id, 'work_intro' ) ); ?></h1>
					<h4><?php medman_rich( $post_id, 'work_content' ); ?></h4>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row work-cards-row">
				<div class="col s12 m6">
					<div class="card">
						<div class="card-content">
				          	<div class="card-title">
				          		<p><?php echo esc_html( medman_meta( $post_id, 'work_card1_title' ) ); ?></p>
				          	</div>
				          	<?php medman_rich( $post_id, 'work_card1_text' ); ?>
			        	</div>
					</div>
				</div>
				<div class="col s12 m6">
					<div class="card">
						<div class="card-content">
				          	<div class="card-title">
				          		<p><?php echo esc_html( medman_meta( $post_id, 'work_card2_title' ) ); ?></p>
				          	</div>
				          	<?php medman_rich( $post_id, 'work_card2_text' ); ?>
			        	</div>
					</div>
				</div>
			</div>
		</div>
		<div class="closing-content">
			<div class="container">
				<div class="row">
					<div class="col s12 m6 offset-m6">
						<p>We have a record of success in working with lenders, insolvency practitioners, receivers and other stakeholders to recover distressed assets – replacing contractors, restarting stalled sites and driving part‑built schemes through to successful completion.</p>
					</div>
				</div>
			</div>			
		</div>
	</section>

	<!-- CASE STUDIES (repeater) -->
	<section id="case-studies" class="case-studies">
		<div class="container">
			<div class="row">
				<div class="col s12">
					<div class="intro-title">
						<h5>CASE STUDIES</h5>
					</div>

					<?php
					$case_studies = get_post_meta( $post_id, '_medman_case_studies', true );
					if ( is_array( $case_studies ) && ! empty( $case_studies ) ) :
						foreach ( $case_studies as $case ) :
							if ( empty( $case['title'] ) ) continue;
							?>
							<div class="case-study-item">
								<div class="case-study-image">
									<?php if ( ! empty( $case['image'] ) ) echo wp_get_attachment_image( $case['image'], 'large' ); ?>
								</div>
								<div class="case-study-content">
									<h2><?php echo esc_html( $case['title'] ); ?></h2>
									<h5><?php echo esc_html( $case['subtitle'] ); ?></h5>
									<?php echo apply_filters( 'the_content', $case['description'] ); ?>
								</div>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>


	</section>


</main>

<?php get_footer(); ?>
