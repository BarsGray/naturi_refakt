<?php
/**
 * The template for displaying 404 pages (not found).
 */

get_header(); ?>
<main>
	<section class="breadcrumbs">
		<div class="container">
			<?php
			if (function_exists('yoast_breadcrumb')) {
				yoast_breadcrumb('<div class="breadcrumbs_list">', '</div>');
			}
			?>
		</div>
	</section>

	<section class="not_found">
		<div class="container">
			<div class="not_found_inner">
				<div class="not_found_inner_img">
					<img src="<?php bloginfo('template_url'); ?>/assets/img/not-found.svg" alt="">
				</div>

				<h1>Страница не найдена</h1>
				<h2>Такой страницы не существует, введите запрос перейдите по одной из актуальных категорий</h2>

				<a href="/" class="btn">Перейти на главную</a>
			</div>

		</div>
		</div>
	</section>
</main>


<?php get_footer(); ?>