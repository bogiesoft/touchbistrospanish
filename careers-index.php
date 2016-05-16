	<?php
		/**
		 	Template Name: Careers Index
		**/

$xml = simplexml_load_file('https://app.jazz.co/feeds/export/jobs/touchbistro');
global $locations;
foreach ($xml->job as $job) {
			$country = $job->country;
			$city = $job->city;
			$state = $job->state;
			$title = $job->title;
			$department = $job->department;
			$url = $job->url;
			$button = $job->buttons;
			$jobinfo['city'] = (string)$city;
			$jobinfo['state'] = (string)$state;
			$jobinfo['url'] = (string)$url;
			$jobinfo['button'] = (string)$button;
			$locations[(string)$country][(string)$department][(string)$title] = $jobinfo;
		}
		get_header();
	?>

<section class="business-section-generic careers-index-lead lead-section">
	<div class="container">
    	<h1 class="lead-title">We Are Hiring</h1>
        <p>Looking for a job where you can kick your feet up, relax, and passively collect a paycheck?<br>
		You’re in the wrong place.</p>

		<p>We’re a team of passionate, hard working, and driven individuals who are proud to be part of a growing and innovative tech company. We make a true difference in every aspect of TouchBistro, from the product, to the marketing, to the support- this product has our names written all over it.</p>

		<p>So tell us...do you have what is takes to join TouchBistro’s rockstar team?</p>
	</div>
</section>

<section class="business-section-generic careers-index">
	<div class="container">
    <?php //foreach ($locations as $jobcountry => $location) : ?>
    	<div class="country toronto <?php //echo TbHelper::convertSubNaviMenuId($jobcountry); ?>">
			<h3>Toronto<?php //echo $jobcountry; ?></h3>
            <?php foreach ($locations['Canada'] as $jobdepertmentkey => $jobdepartment) : ?>
				<div class="jobs">
                	<h5><?php echo $jobdepertmentkey; ?></h5>
					<ul>
						<?php foreach ($jobdepartment as $jobtitle => $career) : ?>
							<li><a href="<?php echo $career['url']; ?>"><h6><?php echo $jobtitle; ?></h6></a><?php //echo $career['button']; ?></li>
						<?php endforeach; ?>
					</ul>
            	</div>
            <?php endforeach; ?>
            <?php if (!$locations['Canada']) : ?>
				<div class="jobs no-jobs">No current job postings for this location.</div>
			<?php endif; ?>
		</div>
	<?php //endforeach; ?>
    	<div class="country new-york">
			<h3>New York</h3>
            <?php foreach ($locations['United States'] as $jobdepertmentkey => $jobdepartment) : ?>
				<div class="jobs">
                	<h5><?php echo $jobdepertmentkey; ?></h5>
					<ul>
						<?php foreach ($jobdepartment as $jobtitle => $career) : ?>
							<li><a href="<?php echo $career['url']; ?>"><h6><?php echo $jobtitle; ?></h6></a></li>
						<?php endforeach; ?>
					</ul>
            	</div>
            <?php endforeach; ?>
            <?php if (!$locations['United States']) : ?>
				<div class="jobs no-jobs">No current job postings for this location.</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php the_content(); ?>

<?php get_footer(); ?>
