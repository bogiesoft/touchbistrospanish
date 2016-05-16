<?php
	/**
Template Name: One Box
 **/
 	get_header();
	
	$img = get_field('header_background_image');
	
	if ($img){
		?>
		<section class="business-section-generic one-box-lead lead-section" style="background-image:url('<?php  echo $img; ?>')">
		<?php
 } else { ?>
		<section class="business-section-generic one-box-lead lead-section">
		<?php
 } ?>
 <div class="container">
	<img alt="one-box-banner2" class="alignnone size-full wp-image-3325" height=
"318" src=
"<?php echo get_template_directory_uri() . '/assets/images/one-box-banner2.png' ?>" width="1280">
<h1 class="goldribbon">Thank You for Choosing TouchBistro OneBox</h1>
<h3>TouchBistro OneBox is your POS solution in a box.</h3>
        <div>
            <p class="copy">TouchBistro OneBox is your POS solution in a box.
            It contains everything you need for a café or quick service
            restaurant. The OneBox page is here to help supplement the Get
            Started document that accompanies your OneBox hardware. See
            Important Resources below for supplementary documentation to help
            you setup TouchBistro Standard. The Setup Video is a live setup
            tutorial that covers the steps found in your Get Started
            document.</p>
            <p class="copy"><img alt="OneBoxDesign" class=
            "alignright size-full wp-image-4626" height="364" src=
            "<?php echo get_template_directory_uri() . '/assets/images/OneBoxDesign.png' ?>"
            width="800"></p>
            <section class="video">
            <h2>Standard Set Up Video</h2>
            <iframe class="wistia_embed"
            frameborder="0" height="304" id="wistia_embed" name="wistia_embed"
            scrolling="no" src=
            "http:///fast.wistia.net/embed/iframe/kmdjv3ojul?playerColor=b89a5b&amp;videoHeight=304&amp;videoWidth=540&amp;videoFoam=true"
            width="540"></iframe> 
            <script src="//fast.wistia.com/static/iframe-api-v1.js">
            </script>
            </section>
        </div>
        <div>
            <a class="resourcelinks gold" href=
            "/wp-content/uploads/2014/12/OneBox_guide_Booklet.pdf" target=
            "_blank"><span class="h3">OneBox Get Started Guide</span> Download
            printable PDF of the OneBox Get Started Guide&nbsp;<img alt=
            "download" class="alignright size-full wp-image-3296" height="26"
            src="<?php echo get_template_directory_uri() . '/assets/images/download-arrow.png' ?>" width=
            "17"></a>
        </div>
<h2>Setting Up Your TouchBistro Software</h2>
        <div>
            <a class="resourcelinks" href=
            "/help/video/setting-up-your-restaurant/"><span class="h3">Setting
            Up Your Restaurant Videos</span> Step by step video help for
            setting up your floor plan, staff, and menu</a> <a class=
            "resourcelinks" href="/help/article/payment-gateways/"><span class=
            "h3">Setting Up Your Payment Gateways</span> Step by step help for
            setting up your integrated payment processor of choice</a>
            <a class="resourcelinks" href=
            "/help/article/guides-for-administrators/"><span class=
            "h3">Administrator's Guide</span> A guide on setting up your
            restaurant: your menus, floor plan, staff, and more</a>
        </div>
        <div>
            <h2>TouchBistro Software License</h2><a class="resourcelinks" href=
            "http://www.touchbistro.com/help/articles/applying-your-touchbistro-software-license/"><span class="h3">Applying
            your TouchBistro Software License</span></a>
            <h2>Setting Up Your Hardware</h2><a class="resourcelinks" href=
            "/help/articles/loading-an-sp700-impact-printer/"><span class=
            "h3">Loading Your Kitchen&nbsp;Impact Printer</span> How to load
            your kitchen printer with paper and ink ribbon</a> <a class=
            "resourcelinks" href=
            "/help/articles/put-star-sp700-epson-mode/"><span class=
            "h3">Connect Your Kitchen Impact Printer</span> How to set your dip
            switches to put&nbsp;your kitchen printer into Epson Mode</a>
        </div>
        <div>
            <h2>Going Live with TouchBistro</h2><a class="resourcelinks" href=
            "/help/articles/opening-day-steps-walk/"><span class="h3">Opening
            Day Walk Through</span> Step by step instructions on how to clear
            your testing data, open your restaurant and then close your
            restaurant</a> <a class="resourcelinks" href=
            "/help/articles/touchbistro-server-guide/"><span class="h3">Server
            Training Guide</span> Guide for training your serving staff and
            other "front of the house" staff members</a> <a class=
            "resourcelinks" href="/help/"><span class="h3">Support and
            Training</span> TouchBistro Support &amp; Training Website</a>
        </div>
<h2>Star Micronics Printer Manuals</h2>
        <div>
            <a class="resourcelinks" href=
            "http://www.starmicronics.com/support/mannualfolder/tsp100lan_hm_en.pdf">
            <span class="h3">Star Thermal Printer Manual</span>Opens as a
            PDF</a>
        </div>
</div>
</section>
<?php  the_content(); ?>

<?php  get_footer(); ?>