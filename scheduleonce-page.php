	<?php
	/**
		Template Name: ScheduleOnce Page
	**/
	get_header();
	?>




	<section class="business-section-generic scheduleonce-lead lead-section">
	
			<div class="container">
            <h3><?php echo the_title();?></h3>
            	<div align="center" style="height:100%;margin:auto;">
<div id="SOIDIV_TouchBistro"></div>
<script type="text/javascript">
ScheduleOnceEmbedLink = "//secure.scheduleonce.com/TouchBistro&thm=blue&dt=&em=1"; pageName = 'TouchBistro';id="SOI_TouchBistro"; h = "635px"; w = "100% !important";
</script>

<script src="//static.scheduleonce.com/mergedjs/ScheduleOnceEmbed.js" type="text/javascript"></script><script type="text/javascript">
soe.AddEventListners();
</script>

<script type="text/javascript">
function SOAfterConfirmationFunction() { 
ga('set', 'page', '/thank-you-live-tour/');
ga('send', 'pageview');
 }
 </script>
    </section>



<?php the_content(); ?>

<?php get_footer(); ?>
