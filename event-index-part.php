<?php
/**
 * Created by IntelliJ IDEA.
 * User: kazuhiro
 * Date: 12/18/15
 * Time: 2:48 PM
 */
    global $event_data;
    global $event_num;
?>
<?php foreach ($event_data as $event) : ?>
    <div class="event" id="event-content-<?php echo $event_num; ?>">
        <div class="graphic">
            <?php $graphic = get_field('image', $event->ID)?>
            <?php if ($graphic['url']) : ?>
                <img src="<?php echo $graphic['url'] ?>">
            <?php endif; ?>
        </div>
        <div class="event-intro">
            <h3><?php echo $event->post_title; ?></h3>
            <ul class="event-info">
                <?php if (get_field('start_date', $event->ID) || get_field('end_date', $event->ID)) : ?>
                    <li>Date: <?php echo TbHelper::getDateTermStrign(get_field('start_date', $event->ID), get_field('end_date', $event->ID)); ?></li>
                <?php endif; ?>
                <?php if (get_field('time', $event->ID)) : ?>
                    <li>Time: <?php the_field('time', $event->ID); ?></li>
                <?php endif; ?>
                <?php if (get_field('location', $event->ID)) : ?>
                    <li>Location: <?php the_field('location', $event->ID); ?></li>
                <?php endif; ?>
                <?php if (get_field('booth', $event->ID)) : ?>
                    <li>Booth #: <?php the_field('booth', $event->ID); ?></li>
                <?php endif; ?>
                <?php if (get_field('event_website', $event->ID)) : ?>
                    <li>Event Website: <a href="<?php the_field('event_website', $event->ID) ?>" target="_blank" class="site"><?php the_field('event_website', $event->ID) ?></a></li>
                <?php endif; ?>
            </ul>
            <p>
                <?php the_field('description', $event->ID); ?>
            </p>
            <?php if (get_field('button_link', $event->ID)) : ?>
            <a href="<?php the_field('button_link', $event->ID) ?>" class="register" target="_blank">
			<?php if (get_field('button_text', $event->ID)){ echo the_field('button_text', $event->ID);} else { echo 'Register Now';} ?></a>
            <?php endif; ?>
        </div>
    </div>
    <?php $event_num++; ?>
<?php endforeach; ?>

