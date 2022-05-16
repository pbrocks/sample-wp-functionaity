<?php
/**
 * [$section_content]
 *
 * @var string
 * @package sample_wp_functionality
 */

$sections['membership_map_locked'] = '
<!-- wp:group {"align":"full","className":"regional-reps-map","um_is_restrict":true,"um_who_access":"1","um_roles_access":["um_territory-manager"]} -->
<div class="wp-block-group alignfull regional-reps-map"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="has-text-align-center">Regional Representatives</h2>
<!-- /wp:heading -->
<!-- wp:group {"align":"full"} -->
<div class="wp-block-group alignfull"><!-- wp:shortcode -->
[mapsvg id="709"]
<!-- /wp:shortcode --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
';

$sections['membership_map_starter'] = '
 <!-- wp:group {"align":"full","className":"regional-reps-map"} -->
<div class="wp-block-group alignfull regional-reps-map"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="has-text-align-center">Regional Representatives</h2>
<!-- /wp:heading -->
<!-- wp:group {"align":"full"} -->
<div class="wp-block-group alignfull"><!-- wp:shortcode -->
[mapsvg id="709"]
<!-- /wp:shortcode --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
 ';

$sections['membership_media_left'] = '
<!-- wp:group {"align":"full","style":{"color":{"background":"#f7f7f8"}},"className":"membership-callout-section-one"} -->
<div class="wp-block-group alignfull membership-callout-section-one has-background" style="background-color:#f7f7f8"><!-- wp:media-text {"align":"full","mediaId":616,"mediaLink":"' . WP_CONTENT_URL . '/home/team-collage/","mediaType":"image","mediaSizeSlug":"full","imageFill":true,"style":{"color":{"background":"#f7f7f8"}}} -->
<div class="wp-block-media-text alignfull is-stacked-on-mobile is-image-fill has-background" style="background-color:#f7f7f8"><figure class="wp-block-media-text__media" style="background-image:url(' . WP_CONTENT_URL . '/wp-content/uploads/2021/07/team-collage.png);background-position:50% 50%"><img src="' . WP_CONTENT_URL . '/wp-content/uploads/2021/07/team-collage.png" alt="" class="wp-image-616 size-full"/></figure><div class="wp-block-media-text__content"><!-- wp:heading {"level":3,"className":"callout-h3"} -->
<h3 class="callout-h3">Built and governed by <strong>people like you</strong>.</h3>
<!-- /wp:heading -->

<!-- wp:heading {"level":4,"className":"callout-h4"} -->
<h4 class="callout-h4">What <strong>if your suppliers and vendors actively supported your business</strong>?</h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"callout-p","fontSize":"small"} -->
<p class="callout-p has-small-font-size">Sample offers competitive prices with collective buying power through our prime vendor agreement and independent warehouse, API. We have also negotiated discounts and favorable terms with top vendors and industry partners. <a href="' . home_url() . '/become-an-api-customer/" target="_blank" rel="noreferrer noopener">more</a></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":4,"className":"callout-h4"} -->
<h4 class="callout-h4">What if you had all <strong>business metrics</strong> at your fingertips?</h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"callout-p","fontSize":"small"} -->
<p class="callout-p has-small-font-size">Our proprietary business intelligence tool, ProfitAmp, gives you easy-to-use business analytics to make the best operational decisions for your store. <a href="' . home_url() . '/profitamp/" target="_blank" rel="noreferrer noopener">more</a></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":4,"className":"callout-h4"} -->
<h4 class="callout-h4">What if you had access to <strong>expert support </strong>and know-how?</h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"callout-p","fontSize":"small"} -->
<p class="callout-p has-small-font-size">We offer a free purchasing analysis, <a href="https://www.retailplanograms.com/" target="_blank" rel="noreferrer noopener">Retail Plan-O-Grams</a>, <a href="https://store.apirx.com/customer/account/login/" target="_blank" rel="noreferrer noopener">product recommendations</a>, and more based on your pharmacy and your customer base. <a href="' . home_url() . '/sample-membership/" target="_blank" rel="noreferrer noopener">more</a></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"contentJustification":"left"} -->
<div class="wp-block-buttons is-content-justification-left"><!-- wp:button {"fontSize":"small"} -->
<div class="wp-block-button has-custom-font-size has-small-font-size"><a class="wp-block-button__link" href="' . WP_CONTENT_URL . '/sample-membership/#get-started-now">Become an Sample Member</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:media-text --></div>
<!-- /wp:group -->
';

$sections['membership_media_right'] = '
<!-- wp:group {"align":"full","style":{"color":{"background":"#282828"}},"textColor":"white","className":"member-callout-section-two"} -->
<div class="wp-block-group alignfull member-callout-section-two has-white-color has-text-color has-background" style="background-color:#282828"><!-- wp:media-text {"align":"full","mediaPosition":"right","mediaId":473,"mediaLink":"' . home_url() . '/discounts-rebates-service/","mediaType":"image","imageFill":true,"focalPoint":{"x":"0.00","y":"0.50"}} -->
<div class="wp-block-media-text alignfull has-media-on-the-right is-stacked-on-mobile is-image-fill"><figure class="wp-block-media-text__media" style="background-image:url(' . WP_CONTENT_URL . '/uploads/2021/07/discounts-rebates-service.png);background-position:0% 50%"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/discounts-rebates-service.png" alt="" class="wp-image-473 size-full"/></figure><div class="wp-block-media-text__content"><!-- wp:heading {"level":3,"className":"callout-h3"} -->
<h3 class="callout-h3">API, the member-owned warehouse advantage.</h3>
<!-- /wp:heading -->

<!-- wp:heading {"level":4,"className":"callout-h4"} -->
<h4 class="callout-h4">Do you <strong>expect competitive prices and rebates?</strong></h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"callout-p","fontSize":"small"} -->
<p class="callout-p has-small-font-size">API Warehouse offers competitive prices on leading products, including Brand Rx, Generic Rx and OTCs. </p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":4,"className":"callout-h4"} -->
<h4 class="callout-h4">Does your <strong>secondary wholesaler help optimize your budget?</strong></h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"callout-p","fontSize":"small"} -->
<p class="callout-p has-small-font-size">Don\'t waste time hunting for "bargains" and risking issues with compliance. Streamline your purchasing with API Warehouse and maximize your monthly rebates on inventory. </p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":4,"className":"callout-h4"} -->
<h4 class="callout-h4">Wouldn\'t you prefer <strong>flexibility over contract commitment?</strong></h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"callout-p","fontSize":"small"} -->
<p class="callout-p has-small-font-size">Flex during changing market forces with the ability to split your purchases between our prime vendor and independent warehouse and fully maintain compliance... all while optimizing your budget.  </p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"contentJustification":"left"} -->
<div class="wp-block-buttons is-content-justification-left"><!-- wp:button {"textColor":"gray","className":"button-secondary-alt-gray"} -->
<div class="wp-block-button button-secondary-alt-gray"><a class="wp-block-button__link has-gray-color has-text-color" href="' . home_url() . '/become-an-api-customer/#get-your-api-account">Become an API Customer</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:media-text --></div>
<!-- /wp:group -->
';

$sections['preferred_partners'] = '
<!-- wp:group {"align":"full","className":"is-style-default preferred-partner-section"} -->
<div class="wp-block-group alignfull is-style-default preferred-partner-section"><!-- wp:heading {"textAlign":"center","align":"wide","className":"preferred-partners-h2","fontSize":"extra-large"} -->
<h2 class="alignwide has-text-align-center preferred-partners-h2 has-extra-large-font-size"><strong>Sample Preferred Partners</strong></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"normal"} -->
<p class="has-text-align-center has-normal-font-size">We have partnerships with many of the best vendors in the industry for pharmacy efficiency, customer service and savings. Your membership gives you access to these tools and the support of our network\'s expertise. Here are just a few examples of our Preferred Partners.</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}}} -->
<div class="wp-block-column" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:image {"align":"center","id":1614,"sizeSlug":"full","linkDestination":"none"} -->
<div class="wp-block-image"><figure class="aligncenter size-full"><img src="' . WP_CONTENT_URL . '/wp-content/uploads/2021/09/altium.jpg" alt="" class="wp-image-1614"/></figure></div>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":5} -->
<h5 class="has-text-align-center">Altium Healthcare</h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"extra-small"} -->
<p class="has-text-align-center has-extra-small-font-size">With 50+ patents awarded and more pending, AHC has the innovation, size, and presence to serve your packaging needs, whatever they may be.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}}} -->
<div class="wp-block-column" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:image {"align":"center","id":1615,"sizeSlug":"full","linkDestination":"none"} -->
<div class="wp-block-image"><figure class="aligncenter size-full"><img src="' . WP_CONTENT_URL . '/wp-content/uploads/2021/09/best-rx.jpg" alt="" class="wp-image-1615"/></figure></div>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":5} -->
<h5 class="has-text-align-center">BestRx</h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"extra-small"} -->
<p class="has-text-align-center has-extra-small-font-size">BestRx is not just a pharmacy software solution; they are a community partner committed to your success as an independent pharmacy owner.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}}} -->
<div class="wp-block-column" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:image {"align":"center","id":1616,"sizeSlug":"full","linkDestination":"none"} -->
<div class="wp-block-image"><figure class="aligncenter size-full"><img src="' . WP_CONTENT_URL . '/wp-content/uploads/2021/09/biolyte.jpg" alt="" class="wp-image-1616"/></figure></div>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":5} -->
<h5 class="has-text-align-center">Biolyte</h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"extra-small"} -->
<p class="has-text-align-center has-extra-small-font-size">BIOLYTE, the IV in a bottle, contains the same amount of electrolytes as a Lactated IV bag, plus additional vitamins and minerals.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}}} -->
<div class="wp-block-column" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:image {"align":"center","id":1617,"sizeSlug":"full","linkDestination":"none"} -->
<div class="wp-block-image"><figure class="aligncenter size-full"><img src="' . WP_CONTENT_URL . '/wp-content/uploads/2021/09/Live-Oak-bank.jpg" alt="" class="wp-image-1617"/></figure></div>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":5} -->
<h5 class="has-text-align-center">LiveOakBank</h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"extra-small"} -->
<p class="has-text-align-center has-extra-small-font-size">Since 2010, Live Oak Bank has lent over one billion dollars to more than 660 independent pharmacists.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}}} -->
<div class="wp-block-column" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:image {"align":"center","id":1619,"sizeSlug":"full","linkDestination":"none"} -->
<div class="wp-block-image"><figure class="aligncenter size-full"><img src="' . WP_CONTENT_URL . '/wp-content/uploads/2021/09/rms-logo.jpg" alt="" class="wp-image-1619"/></figure></div>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":5} -->
<h5 class="has-text-align-center">RMS</h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"extra-small"} -->
<p class="has-text-align-center has-extra-small-font-size">With 20+ years of experience RMS is the absolute leader in the pharmacy point-of-sale services space.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link">Learn more about Sample\'s Preferred Partner network</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
';

$sections['member_benefits'] = '
<!-- wp:group {"align":"full","className":"member-benefits-section"} -->
<div class="wp-block-group alignfull member-benefits-section"><!-- wp:heading {"textAlign":"center","style":{"color":{"text":"#1b75bb"}}} -->
<h2 class="has-text-align-center has-text-color" style="color:#1b75bb">As an Sample member you\'ll receive:</h2>
<!-- /wp:heading -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"align":"center","id":1579,"sizeSlug":"full","linkDestination":"none"} -->
<div class="wp-block-image"><figure class="aligncenter size-full"><img src="' . WP_CONTENT_URL . '/uploads/2021/09/6112fb72c341e56b24afa2b2_savings-big-p-130x130q80.png" alt="" class="wp-image-1579"/></figure></div>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":4} -->
<h4 class="has-text-align-center"><strong>Savings</strong></h4>
<!-- /wp:heading -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"id":392,"width":86,"height":75,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/check-mark.png" alt="" class="wp-image-392" width="86" height="75"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":5} -->
<h5>Annual Patronage Dividends</h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"normal"} -->
<p class="has-normal-font-size">Millions in board-declared Annual Patronage Dividends are returned to our Members each year.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"id":392,"width":86,"height":75,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/check-mark.png" alt="" class="wp-image-392" width="86" height="75"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":5} -->
<h5>ProfitAmp</h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Exclusive to Sample, ProfitAmp offers an easy-to-use dashboard and data analytics tools to both increase your profit and enhance patient care.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"id":392,"width":86,"height":75,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/check-mark.png" alt="" class="wp-image-392" width="86" height="75"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":5} -->
<h5>Associated Pharmacies, Inc. (API)</h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"normal"} -->
<p class="has-normal-font-size">Associated Pharmacies, Inc. (API) is Sample’s distribution warehouse offering Brand Rx, Generic Rx and OTCs at competitive prices and substantial rebates.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"id":392,"width":86,"height":75,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/check-mark.png" alt="" class="wp-image-392" width="86" height="75"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":5} -->
<h5>Preferred Partner Programs</h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Sample offers and extensive network of more than 60 Preferred Partners offering our Members discounted services and products to support operations, profitability and patient care in their pharmacies.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"align":"center","id":1580,"sizeSlug":"full","linkDestination":"none"} -->
<div class="wp-block-image"><figure class="aligncenter size-full"><img src="' . WP_CONTENT_URL . '/uploads/2021/09/6112e7be361dcb59b24ac20e_freedom-icon.png" alt="" class="wp-image-1580"/></figure></div>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":4} -->
<h4 class="has-text-align-center"><strong><meta charset="utf-8"><strong>Empowerment</strong></strong></h4>
<!-- /wp:heading -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"id":392,"width":86,"height":75,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/check-mark.png" alt="" class="wp-image-392" width="86" height="75"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":5} -->
<h5>Simplified Purchasing Agreements</h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"normal"} -->
<p class="has-normal-font-size">On behalf of its Members, Sample negotiates and manages major agreements, including the Prime Vendor Agreement with a national wholesaler, empowering you with discounts like the high-volume chain pharmacies.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"id":392,"width":86,"height":75,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/check-mark.png" alt="" class="wp-image-392" width="86" height="75"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":5} -->
<h5>Member Networking Opportunities</h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Nearly 2,500 members strong, Sample Members enjoy an abundance of shared industry expertise and opportunities to network with peers throughout the year. </p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"id":392,"width":86,"height":75,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/check-mark.png" alt="" class="wp-image-392" width="86" height="75"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":5} -->
<h5>Store-Specific Purchasing Analysis</h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Get a store-specific purchasing analysis from our team of experts to optimize your buying strategy and profit margin.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"id":392,"width":86,"height":75,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/check-mark.png" alt="" class="wp-image-392" width="86" height="75"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":5} -->
<h5>Proprietary Business Tools</h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Enjoy access to proprietary business tools only from Sample, like ProfitAmp business intelligence, Scan &amp; Toss ordering solution, free OTC Retail Plan-O-Grams and more!</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"id":392,"width":86,"height":75,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/check-mark.png" alt="" class="wp-image-392" width="86" height="75"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":5} -->
<h5>Continuing Education</h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Earn CEs and take your knowledge to the next level by participating in webinars and CE sessions, shared regularly through our <a href="https://www.facebook.com/groups/membersaap" target="_blank" rel="noreferrer noopener">Members-only Facebook group</a> and weekly newsletters.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"align":"center","id":1581,"sizeSlug":"full","linkDestination":"none"} -->
<div class="wp-block-image"><figure class="aligncenter size-full"><img src="' . WP_CONTENT_URL . '/uploads/2021/09/6112e7be541e51f4d92f4446_flexibility-icon.png" alt="" class="wp-image-1581"/></figure></div>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":4} -->
<h4 class="has-text-align-center"><strong>Flexibility</strong></h4>
<!-- /wp:heading -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"id":392,"width":86,"height":75,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/check-mark.png" alt="" class="wp-image-392" width="86" height="75"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":5} -->
<h5>No Long-Term Vendor Contracts</h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"normal"} -->
<p class="has-normal-font-size">Get competitive prices, high-volume buying power and access to innovative products and services... all with no long-term vendor contracts.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"id":392,"width":86,"height":75,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/check-mark.png" alt="" class="wp-image-392" width="86" height="75"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"left","level":5} -->
<h5 class="has-text-align-left">Free OTC Plan-O-Grams</h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Optimize your retail space with access to FREE OTC Retail Plan-O-Grams, developed from comprehensive sources of retail data, including Point-of-Sale (POS) data from independent pharmacies.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"id":392,"width":86,"height":75,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/check-mark.png" alt="" class="wp-image-392" width="86" height="75"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":5} -->
<h5>Flexible Options</h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Quickly adapt to changing market forces with our flexible purchasing options between our prime vendor and Sample\'s independent warehouse, API. This is designed to help you easily maintain compliance requirements while enjoying buying agility.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
';

$sections['testimonials'] = '
<!-- wp:group {"align":"full","className":"testimonial-section"} -->
<div class="wp-block-group alignfull testimonial-section"><!-- wp:heading {"textAlign":"center","align":"full"} -->
<h2 class="alignfull has-text-align-center">What our members are saying about Sample:</h2>
<!-- /wp:heading -->

<!-- wp:columns {"align":"full"} -->
<div class="wp-block-columns alignfull"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"align":"center","id":910,"sizeSlug":"medium","linkDestination":"none","className":"is-style-rounded"} -->
<div class="wp-block-image is-style-rounded"><figure class="aligncenter size-medium"><img src="' . WP_CONTENT_URL . '/uploads/2021/09/MG_1528edited-Copy-300x300.jpg" alt="" class="wp-image-910"/></figure></div>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">"I know I\’m really getting a good price because Sample is member-owned. In a way, I\’m buying from myself. At the end of the&nbsp;day&nbsp;I know I\’m getting the best price possible to improve my bottom line.&nbsp;"</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">– Jeff Stewart,<em> Big C Drugs</em>&nbsp;</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"align":"center","id":911,"sizeSlug":"medium","linkDestination":"none","className":"is-style-rounded"} -->
<div class="wp-block-image is-style-rounded"><figure class="aligncenter size-medium"><img src="' . WP_CONTENT_URL . '/uploads/2021/09/Lipofsky-926520edited-Copy-300x300.jpg" alt="" class="wp-image-911"/></figure></div>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">“Do your homework- we\’ve done it all and tried it all- this really is the best route and I believe it really works. Honesty and credibility are important, and I feel like they have my back.”&nbsp;</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">– Ray Dinno, <em>Keyes Pharmacy</em></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"align":"center","id":671,"sizeSlug":"medium","linkDestination":"none","className":"is-style-rounded"} -->
<div class="wp-block-image is-style-rounded"><figure class="aligncenter size-medium"><img src="' . WP_CONTENT_URL . '/uploads/2021/08/Matthew-Epling-300x300.webp" alt="" class="wp-image-671"/></figure></div>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">“Being a member of Sample has brought in a greater revenue stream because of the deeply discounted&nbsp;generics. In the last three years we\’ve seen a huge increase in revenue, and our rebates continue to&nbsp;increase.”</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">– Matt Epling, <em>Jonesborough Medicine Shoppe</em></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"align":"center","id":1726,"sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<div class="wp-block-image is-style-rounded"><figure class="aligncenter size-full"><img src="' . WP_CONTENT_URL . '/uploads/2021/09/Jeff-Hetrick-member-Copy-1.jpg" alt="" class="wp-image-1726"/></figure></div>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">“Frankly, you can\’t maintain proper cost of goods or buying situation on a wholesale or direct deal anymore - you have to be in a buying group...Sample is the&nbsp;<strong>simplest</strong>&nbsp;and most&nbsp;<strong>cost effective</strong>&nbsp;in the industry..”</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">– Jeff Hetrick, <em>McDonald Pharmacy</em></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"align":"center","id":1728,"sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
<div class="wp-block-image is-style-rounded"><figure class="aligncenter size-full"><img src="' . WP_CONTENT_URL . '/uploads/2021/09/Michelle-Callahan-member-Copy.jpg" alt="" class="wp-image-1728"/></figure></div>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">“In the end you see a big giant number, you go ‘this company\’s saved me in the hundreds of thousands of dollars\’; it\’s huge..”</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">– Michelle Calahan, <em>Rogers Pharmacy</em></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
';

$sections['profitamp_callout_one'] = '
<!-- wp:group {"align":"full","className":"profitamp-callout-section-one"} -->
<div class="wp-block-group alignfull profitamp-callout-section-one"><!-- wp:cover {"url":"' . WP_CONTENT_URL . '/wp-content/uploads/2021/07/ProfitAmpFINAL.mp4","id":488,"dimRatio":71,"overlayColor":"gray","backgroundType":"video","minHeight":100,"minHeightUnit":"vh","align":"full","className":"mb-0 mt-0"} -->
<div class="wp-block-cover alignfull has-background-dim-70 has-gray-background-color has-background-dim mb-0 mt-0" style="min-height:100vh"><video class="wp-block-cover__video-background intrinsic-ignore" autoplay muted loop playsinline src="' . WP_CONTENT_URL . '/wp-content/uploads/2021/07/ProfitAmpFINAL.mp4" data-object-fit="cover"></video><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","textColor":"white"} -->
<h2 class="has-text-align-center has-white-color has-text-color">Actionable data &amp; meaningful reporting</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"white"} -->
<p class="has-text-align-center has-white-color has-text-color">Through an easy-to-use dashboard, ProfitAmp provides customizable reports with immediately actionable data that pharmacies can use to improve patient care, increase revenue, adherence and more.</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->
';

$sections['plan_comparison'] = '
<!-- wp:group {"align":"full","className":"member-benefits-section"} -->
<div class="wp-block-group alignfull member-benefits-section"><!-- wp:heading {"textAlign":"center","style":{"color":{"text":"#1b75bb"}}} -->
<h2 class="has-text-align-center has-text-color" style="color:#1b75bb">As an Sample member you\'ll receive:</h2>
<!-- /wp:heading -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"align":"center","id":1579,"sizeSlug":"full","linkDestination":"none"} -->
<div class="wp-block-image"><figure class="aligncenter size-full"><img src="' . WP_CONTENT_URL . '/uploads/2021/09/6112fb72c341e56b24afa2b2_savings-big-p-130x130q80.png" alt="" class="wp-image-1579"/></figure></div>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":4} -->
<h4 class="has-text-align-center"><strong>Savings</strong></h4>
<!-- /wp:heading -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"id":392,"width":86,"height":75,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/check-mark.png" alt="" class="wp-image-392" width="86" height="75"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":5} -->
<h5>Annual Patronage Dividends</h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"normal"} -->
<p class="has-normal-font-size">Millions in board-declared Annual Patronage Dividends are returned to our Members each year.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"id":392,"width":86,"height":75,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/check-mark.png" alt="" class="wp-image-392" width="86" height="75"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":5} -->
<h5>ProfitAmp</h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Exclusive to Sample, ProfitAmp offers an easy-to-use dashboard and data analytics tools to both increase your profit and enhance patient care.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"id":392,"width":86,"height":75,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/check-mark.png" alt="" class="wp-image-392" width="86" height="75"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":5} -->
<h5>Associated Pharmacies, Inc. (API)</h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"normal"} -->
<p class="has-normal-font-size">Associated Pharmacies, Inc. (API) is Sample’s distribution warehouse offering Brand Rx, Generic Rx and OTCs at competitive prices and substantial rebates.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"id":392,"width":86,"height":75,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/check-mark.png" alt="" class="wp-image-392" width="86" height="75"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":5} -->
<h5>Preferred Partner Programs</h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Sample offers and extensive network of more than 60 Preferred Partners offering our Members discounted services and products to support operations, profitability and patient care in their pharmacies.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"align":"center","id":1580,"sizeSlug":"full","linkDestination":"none"} -->
<div class="wp-block-image"><figure class="aligncenter size-full"><img src="' . WP_CONTENT_URL . '/uploads/2021/09/6112e7be361dcb59b24ac20e_freedom-icon.png" alt="" class="wp-image-1580"/></figure></div>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":4} -->
<h4 class="has-text-align-center"><strong><meta charset="utf-8"><strong>Empowerment</strong></strong></h4>
<!-- /wp:heading -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"id":392,"width":86,"height":75,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/check-mark.png" alt="" class="wp-image-392" width="86" height="75"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":5} -->
<h5>Simplified Purchasing Agreements</h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"normal"} -->
<p class="has-normal-font-size">On behalf of its Members, Sample negotiates and manages major agreements, including the Prime Vendor Agreement with a national wholesaler, empowering you with discounts like the high-volume chain pharmacies.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"id":392,"width":86,"height":75,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/check-mark.png" alt="" class="wp-image-392" width="86" height="75"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":5} -->
<h5>Member Networking Opportunities</h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Nearly 2,500 members strong, Sample Members enjoy an abundance of shared industry expertise and opportunities to network with peers throughout the year. </p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"id":392,"width":86,"height":75,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/check-mark.png" alt="" class="wp-image-392" width="86" height="75"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":5} -->
<h5>Store-Specific Purchasing Analysis</h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Get a store-specific purchasing analysis from our team of experts to optimize your buying strategy and profit margin.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"id":392,"width":86,"height":75,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/check-mark.png" alt="" class="wp-image-392" width="86" height="75"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":5} -->
<h5>Proprietary Business Tools</h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Enjoy access to proprietary business tools only from Sample, like ProfitAmp business intelligence, Scan &amp; Toss ordering solution, free OTC Retail Plan-O-Grams and more!</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"id":392,"width":86,"height":75,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/check-mark.png" alt="" class="wp-image-392" width="86" height="75"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":5} -->
<h5>Continuing Education</h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Earn CEs and take your knowledge to the next level by participating in webinars and CE sessions, shared regularly through our <a href="https://www.facebook.com/groups/membersaap" target="_blank" rel="noreferrer noopener">Members-only Facebook group</a> and weekly newsletters.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"align":"center","id":1581,"sizeSlug":"full","linkDestination":"none"} -->
<div class="wp-block-image"><figure class="aligncenter size-full"><img src="' . WP_CONTENT_URL . '/uploads/2021/09/6112e7be541e51f4d92f4446_flexibility-icon.png" alt="" class="wp-image-1581"/></figure></div>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":4} -->
<h4 class="has-text-align-center"><strong>Flexibility</strong></h4>
<!-- /wp:heading -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"id":392,"width":86,"height":75,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/check-mark.png" alt="" class="wp-image-392" width="86" height="75"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":5} -->
<h5>No Long-Term Vendor Contracts</h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"normal"} -->
<p class="has-normal-font-size">Get competitive prices, high-volume buying power and access to innovative products and services... all with no long-term vendor contracts.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"id":392,"width":86,"height":75,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/check-mark.png" alt="" class="wp-image-392" width="86" height="75"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"left","level":5} -->
<h5 class="has-text-align-left">Free OTC Plan-O-Grams</h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Optimize your retail space with access to FREE OTC Retail Plan-O-Grams, developed from comprehensive sources of retail data, including Point-of-Sale (POS) data from independent pharmacies.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"id":392,"width":86,"height":75,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/check-mark.png" alt="" class="wp-image-392" width="86" height="75"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":5} -->
<h5>Flexible Options</h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Quickly adapt to changing market forces with our flexible purchasing options between our prime vendor and Sample\'s independent warehouse, API. This is designed to help you easily maintain compliance requirements while enjoying buying agility.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
';

$sections['api_discounts'] = '
<!-- wp:group {"align":"full","style":{"color":{"background":"#282828"}},"className":"api-discounts-callout"} -->
<div class="wp-block-group alignfull api-discounts-callout has-background" style="background-color:#282828"><!-- wp:media-text {"align":"full","mediaId":599,"mediaLink":"https://rxsample-dev.local/become-an-api-customer/big-store-background2/","mediaType":"image","className":"api-discount-callout"} -->
<div class="wp-block-media-text alignfull is-stacked-on-mobile api-discount-callout"><figure class="wp-block-media-text__media"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/big-store-background2.png" alt="" class="wp-image-599 size-full"/></figure><div class="wp-block-media-text__content"><!-- wp:group {"className":"media-text-right"} -->
<div class="wp-block-group media-text-right"><!-- wp:heading {"textColor":"white","fontSize":"extra-large"} -->
<h2 class="has-white-color has-text-color has-extra-large-font-size">Bringing high-volume discounts <strong>to your pharmacy</strong></h2>
<!-- /wp:heading -->

<!-- wp:heading {"level":3,"textColor":"white","fontSize":"normal"} -->
<h3 class="has-white-color has-text-color has-normal-font-size">Our flexible buying programs make saving easy and are designed to lower inventory costs, regardless of monthly volume.</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"white","fontSize":"extra-small"} -->
<p class="has-white-color has-text-color has-extra-small-font-size">With multiple buyer-focused programs available, we have the perfect fit for your pharmacy\'s buying strategy. Focused on Brand Rx? Or perhaps Generic Rx is more of a priority. Or maybe you\'d like a program built to match your actual dispensing data. Don\'t worry! API has you covered.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"textColor":"white","fontSize":"normal"} -->
<h3 class="has-white-color has-text-color has-normal-font-size">Our member-owned warehouse offers competitive prices and innovative ordering tools.</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"white","fontSize":"extra-small"} -->
<p class="has-white-color has-text-color has-extra-small-font-size">API Warehouse would like to be your "primary secondary" supplier! We have competitive pricing on more than 2,000 SKUs. With easy-to-use ordering solutions, like our very own Scan &amp; Toss program, you\'ll restock your shelves more efficiently than ever before.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"textColor":"white","fontSize":"normal"} -->
<h3 class="has-white-color has-text-color has-normal-font-size">The "Friday Five" special at API allows you to save even more on<br>top Generic Rx items.</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"white","fontSize":"extra-small"} -->
<p class="has-white-color has-text-color has-extra-small-font-size">Each week, get an additional 5% off already low invoice prices on five select items. Featured products change every Friday and discounts are valid through the following Thursday.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:media-text --></div>
<!-- /wp:group -->
';

$sections['api_bargain'] = '
<!-- wp:group {"align":"full","style":{"color":{"background":"#f7f7f8"}},"className":"api-bargain-callout"} -->
<div class="wp-block-group alignfull api-bargain-callout has-background" style="background-color:#f7f7f8"><!-- wp:media-text {"align":"full","mediaPosition":"right","mediaId":600,"mediaLink":"https://rxsample-dev.local/become-an-api-customer/bargain-pic/","mediaType":"image"} -->
<div class="wp-block-media-text alignfull has-media-on-the-right is-stacked-on-mobile"><figure class="wp-block-media-text__media"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/bargain-pic.png" alt="" class="wp-image-600 size-full"/></figure><div class="wp-block-media-text__content"><!-- wp:group {"align":"full","className":"media-text-left"} -->
<div class="wp-block-group alignfull media-text-left"><!-- wp:heading {"fontSize":"extra-large"} -->
<h2 class="has-extra-large-font-size">Don\'t start out on a bargain hunt and end up in a wild goose chase.</h2>
<!-- /wp:heading -->

<!-- wp:heading {"level":3,"textColor":"black","fontSize":"normal"} -->
<h3 class="has-black-color has-text-color has-normal-font-size">When you know you are getting the best prices, you can<br>focus on your business.</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"extra-small"} -->
<p class="has-extra-small-font-size">Many independent pharmacists spend a lot of time chasing discounts or "sale" prices on inventory items, in hopes of improving profitability.<br><br>Is it worth it? Let\'s take a closer look.<br><br>If you are buying from multiple suppliers, you risk dropping a tier with your primary and secondary suppliers. If that happens, you\'re not optimizing rebates and credits from them, negating the "bargain" you may have found elsewhere. Additionally, what does it cost your pharmacy to fragment purchasing like this? Consider the time taken away from patient care in your pharmacy, and hourly rates for owners, pharmacists or other staff to make calls, process invoices and make payments to multiple suppliers each month. This quickly erodes any savings, too.<br><br>Streamline. Simplify. Save. </p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"fontSize":"small"} -->
<div class="wp-block-button has-custom-font-size has-small-font-size"><a class="wp-block-button__link" href="#get-your-api-account">Become an API Customer</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:media-text --></div>
<!-- /wp:group -->
';

$sections['api_testimonial'] = '
<!-- wp:group {"align":"full","className":"api-testimonial-section"} -->
<div class="wp-block-group alignfull api-testimonial-section"><!-- wp:shortcode -->
[metaslider id="944"]
<!-- /wp:shortcode --></div>
<!-- /wp:group -->
';
