<?php
	/**
		Template Name: Events Index
	**/


	$event_post_data = TbEventLogic::getEventData();

	$event_total_num = $event_post_data['total_post_num'];
	global $event_data;
	$event_data = $event_post_data['event_data'];
	global $event_num;
	$event_num = 1;
	get_header();
?>
<?php $section_class = is_page('events') ? 'events-index-lead' : 'events-past-lead'?>
<section class="business-section-generic lead-section <?php echo $section_class; ?>">
	<div class="container">
		<h1 class="lead-title"><?php the_field('title'); ?></h1>
		<?php if (get_field('introduction')) : ?>
		<p class="intro-text"><?php the_field('introduction'); ?></p>
		<?php endif; ?>
	</div>
</section>

<section class="business-section-generic events-index">
	<div class="container">
		<?php if (is_page('events')) : ?>
		<a href="<?php home_url(); ?>/past-events/" class="view-more">View Past Events &gt;</a>
		<?php else : ?>
		<a href="<?php home_url(); ?>/events/" class="view-upcoming">View Upcoming Events</a>
		<?php endif; ?>
		<?php get_template_part('event-index', 'part' ); ?>
	</div>
</section>
<?php if ($event_total_num > TbEventLogic::EVENT_POSTS_PER_PAGE) : ?>
<section class="business-section-generic view-more-events-section">
	<div class="container">
		<?php if (is_page('events')) : ?>
			<a href="#" class="scroll view-more-events">View More Events</a>
		<?php else : ?>
			<a href="#" class="scroll view-more-events">View Earlier Events</a>
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>
<?php the_content(); ?>
<script>
jQuery(function(){
	var paged = 1;
	var total_post_num = <?php echo $event_total_num; ?>;
	var post_per_page = <?php echo TbEventLogic::EVENT_POSTS_PER_PAGE?>;
	jQuery('.view-more-events').on('click', function(e){
		e.preventDefault();
		paged = paged + 1;
		var url = '<?php echo admin_url('admin-ajax.php'); ?>';
		jQuery.post(url, {
			'paged' : paged,
			'action' : 'ajaxLoadMoreEventContents',
			'template_name' : '<?php echo TbHelper::getTemplateFileName(); ?>'
		}, function(data) {
			jQuery('.events-index .container').append(data);
			if (total_post_num <= post_per_page * paged) {
				jQuery('.view-more-events-section').hide();
			}
		}, 'html');
	});
});
</script>
<?php get_footer(); ?>