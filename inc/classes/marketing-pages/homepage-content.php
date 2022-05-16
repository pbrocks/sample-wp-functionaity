<?php
/**
 * [$homepage_content]
 *
 * @var string
 * @package sample_wp_functionality
 */

$homepage_content = '
<!-- wp:cover {"url":"' . WP_CONTENT_URL . '/uploads/2021/06/home-banner-1.png","id":161,"dimRatio":0,"overlayColor":"white","focalPoint":{"x":"0.50","y":"0.50"},"minHeight":500,"contentPosition":"center center","align":"full","className":"hero-section","style":{"spacing":{"padding":{"top":"150px","right":"20px","bottom":"100px","left":"20px"}}}} -->
<div class="wp-block-cover alignfull has-white-background-color hero-section" style="padding-top:150px;padding-right:20px;padding-bottom:100px;padding-left:20px;min-height:500px"><img class="wp-block-cover__image-background wp-image-161" alt="" src="' . WP_CONTENT_URL . '/uploads/2021/06/home-banner-1.png" style="object-position:50% 50%" data-object-fit="cover" data-object-position="50% 50%"/><div class="wp-block-cover__inner-container"><!-- wp:image {"align":"center","id":957,"width":345,"height":162,"sizeSlug":"large","linkDestination":"none","className":"hero-section-logo"} -->
<div class="wp-block-image hero-section-logo"><figure class="aligncenter size-large is-resized"><img src="' . WP_CONTENT_URL . '/uploads/2021/09/sample-logo.svg" alt="" class="wp-image-957" width="345" height="162"/></figure></div>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center","className":"hero-section-sub-heading","fontSize":"normal"} -->
<p class="has-text-align-center hero-section-sub-heading has-normal-font-size"><strong>Nearly 2,500</strong> independent pharmacies and counting.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","className":"hero-section-heading","fontSize":"extra-large"} -->
<h2 class="has-text-align-center hero-section-heading has-extra-large-font-size">The <strong>Member-Owned</strong> Co-op Advantage:</h2>
<!-- /wp:heading -->

<!-- wp:columns {"align":"wide","className":"hero-section-callout-wrapper"} -->
<div class="wp-block-columns alignwide hero-section-callout-wrapper"><!-- wp:column {"className":"hero-section-callout"} -->
<div class="wp-block-column hero-section-callout"><!-- wp:heading {"textAlign":"center","level":3,"style":{"color":{"text":"#1b75bb"}},"fontSize":"normal"} -->
<h3 class="has-text-align-center has-text-color has-normal-font-size" style="color:#1b75bb"><strong>SAVINGS &gt;</strong></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"extra-small"} -->
<p class="has-text-align-center has-extra-small-font-size">Putting profit back into independent pharmacies.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"hero-section-callout"} -->
<div class="wp-block-column hero-section-callout"><!-- wp:heading {"textAlign":"center","level":3,"style":{"color":{"text":"#1b75bb"}},"fontSize":"normal"} -->
<h3 class="has-text-align-center has-text-color has-normal-font-size" style="color:#1b75bb">FREEDOM &gt;</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"extra-small"} -->
<p class="has-text-align-center has-extra-small-font-size">Freedom from long-term vendor contracts</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"hero-section-callout"} -->
<div class="wp-block-column hero-section-callout"><!-- wp:heading {"textAlign":"center","level":3,"style":{"color":{"text":"#1b75bb"}},"fontSize":"normal"} -->
<h3 class="has-text-align-center has-text-color has-normal-font-size" style="color:#1b75bb"><strong>FLEXIBILITY &gt;</strong></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"extra-small"} -->
<p class="has-text-align-center has-extra-small-font-size">Better inventory selection, tools and support.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:buttons {"contentJustification":"center"} -->
<div class="wp-block-buttons is-content-justification-center"><!-- wp:button {"className":"free-benefits-assessment"} -->
<div class="wp-block-button free-benefits-assessment"><a class="wp-block-button__link" href="#get-your-free-benefits-assessment">Get your free benefits assessment</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"full","style":{"color":{"background":"#f7f7f8"}},"className":"membership-callout-section-one"} -->
<div class="wp-block-group alignfull membership-callout-section-one has-background" style="background-color:#f7f7f8"><!-- wp:media-text {"align":"full","mediaId":616,"mediaLink":"' . WP_CONTENT_URL . '/home/team-collage/","mediaType":"image","mediaSizeSlug":"full","imageFill":true,"style":{"color":{"background":"#f7f7f8"}}} -->
<div class="wp-block-media-text alignfull is-stacked-on-mobile is-image-fill has-background" style="background-color:#f7f7f8"><figure class="wp-block-media-text__media" style="background-image:url(' . WP_CONTENT_URL . '/uploads/2021/07/team-collage.png);background-position:50% 50%"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/team-collage.png" alt="" class="wp-image-616 size-full"/></figure><div class="wp-block-media-text__content"><!-- wp:heading {"level":3,"className":"callout-h3"} -->
<h3 class="callout-h3">Built and governed by <strong>people like you</strong>.</h3>
<!-- /wp:heading -->

<!-- wp:heading {"level":4,"className":"callout-h4"} -->
<h4 class="callout-h4">What <strong>if your suppliers and vendors actively supported your business</strong>?</h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"callout-p","fontSize":"small"} -->
<p class="callout-p has-small-font-size">Sample offers competitive prices with collective buying power through our prime vendor agreement and independent warehouse, API. We have also negotiated discounts and favorable terms with top vendors and industry partners. <a href="//aapcontentdev.wpengine.com/become-an-api-customer/" target="_blank" rel="noreferrer noopener">more</a></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":4,"className":"callout-h4"} -->
<h4 class="callout-h4">What if you had all <strong>business metrics</strong> at your fingertips?</h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"callout-p","fontSize":"small"} -->
<p class="callout-p has-small-font-size">Our proprietary business intelligence tool, ProfitAmp, gives you easy-to-use business analytics to make the best operational decisions for your store. <a href="//aapcontentdev.wpengine.com/profitamp/" target="_blank" rel="noreferrer noopener">more</a></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":4,"className":"callout-h4"} -->
<h4 class="callout-h4">What if you had access to <strong>expert support </strong>and know-how?</h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"callout-p","fontSize":"small"} -->
<p class="callout-p has-small-font-size">We offer a free purchasing analysis, <a href="https://www.retailplanograms.com/" target="_blank" rel="noreferrer noopener">Retail Plan-O-Grams</a>, <a href="https://store.apirx.com/customer/account/login/" target="_blank" rel="noreferrer noopener">product recommendations</a>, and more based on your pharmacy and your customer base. <a href="//aapcontentdev.wpengine.com/sample-membership/" target="_blank" rel="noreferrer noopener">more</a></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"contentJustification":"left"} -->
<div class="wp-block-buttons is-content-justification-left"><!-- wp:button {"fontSize":"small"} -->
<div class="wp-block-button has-custom-font-size has-small-font-size"><a class="wp-block-button__link" href="' . WP_CONTENT_URL . '/sample-membership/#get-started-now">Become an Sample Member</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:media-text --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"color":{"background":"#282828"}},"textColor":"white","className":"member-callout-section-two"} -->
<div class="wp-block-group alignfull member-callout-section-two has-white-color has-text-color has-background" style="background-color:#282828"><!-- wp:media-text {"align":"full","mediaPosition":"right","mediaId":473,"mediaLink":"' . WP_CONTENT_URL . '/discounts-rebates-service/","mediaType":"image","imageFill":true,"focalPoint":{"x":"0.00","y":"0.50"}} -->
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
<div class="wp-block-button button-secondary-alt-gray"><a class="wp-block-button__link has-gray-color has-text-color" href="' . WP_CONTENT_URL . '/become-an-api-customer/#get-your-api-account">Become an API Customer</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:media-text --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","className":"member-benefits-callout"} -->
<div class="wp-block-group alignfull member-benefits-callout"><!-- wp:columns {"verticalAlignment":"center","align":"full"} -->
<div class="wp-block-columns alignfull are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"align":"center","id":704,"sizeSlug":"full","linkDestination":"custom","className":"is-style-sample-member-benefits"} -->
<div class="wp-block-image is-style-sample-member-benefits"><figure class="aligncenter size-full"><a href="' . WP_CONTENT_URL . '/profitamp/"><img src="' . WP_CONTENT_URL . '/uploads/2021/08/graph-img-1.png" alt="" class="wp-image-704"/></a></figure></div>
<!-- /wp:image -->

<!-- wp:image {"align":"center","id":496,"sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
<div class="wp-block-image is-style-default"><figure class="aligncenter size-full"><img src="' . WP_CONTENT_URL . '/uploads/2021/07/profit-amp-logo-color.png" alt="" class="wp-image-496"/></figure></div>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">ProfitAmp is a comprehensive business intelligence tool that delivers a deeper look into your pharmacy operations.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"align":"center","id":930,"sizeSlug":"full","linkDestination":"custom","className":"is-style-sample-member-benefits"} -->
<div class="wp-block-image is-style-sample-member-benefits"><figure class="aligncenter size-full"><a href="' . WP_CONTENT_URL . '/five-common-blunders/"><img src="' . WP_CONTENT_URL . '/uploads/2021/09/pharmacist-img.png" alt="" class="wp-image-930"/></a></figure></div>
<!-- /wp:image -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","fontSize":"extra-large"} -->
<h2 class="has-text-align-center has-extra-large-font-size"><strong>5 Common Blunders</strong></h2>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center","level":3} -->
<h3 class="has-text-align-center">that Hurt Independent Pharmacies</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">As an independent pharmacy owner, your responsibilities are vast. You have patients, employees, regulatory ...</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"color":{"background":"#1b75bb"}},"textColor":"white","className":"gravity-form-section has-blue-background"} -->
<div class="wp-block-group alignfull gravity-form-section has-blue-background has-white-color has-text-color has-background" style="background-color:#1b75bb"><!-- wp:paragraph {"align":"center","placeholder":"You need a keyword-rich sound bite with numbers in it, e.g. tripled revenue or cut production time in half.","textColor":"white","fontSize":"extra-large"} -->
<p class="has-text-align-center has-white-color has-text-color has-extra-large-font-size" id="get-your-free-benefits-assessment"> Get your free benefits assessment!</p>
<!-- /wp:paragraph -->

<!-- wp:gravityforms/form {"formId":"8","title":false} /--></div>
<!-- /wp:group -->

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
<div class="wp-block-image"><figure class="aligncenter size-full"><img src="' . WP_CONTENT_URL . '/uploads/2021/09/altium.jpg" alt="" class="wp-image-1614"/></figure></div>
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
<div class="wp-block-image"><figure class="aligncenter size-full"><img src="' . WP_CONTENT_URL . '/uploads/2021/09/best-rx.jpg" alt="" class="wp-image-1615"/></figure></div>
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
<div class="wp-block-image"><figure class="aligncenter size-full"><img src="' . WP_CONTENT_URL . '/uploads/2021/09/biolyte.jpg" alt="" class="wp-image-1616"/></figure></div>
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
<div class="wp-block-image"><figure class="aligncenter size-full"><img src="' . WP_CONTENT_URL . '/uploads/2021/09/Live-Oak-bank.jpg" alt="" class="wp-image-1617"/></figure></div>
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
<div class="wp-block-image"><figure class="aligncenter size-full"><img src="' . WP_CONTENT_URL . '/uploads/2021/09/rms-logo.jpg" alt="" class="wp-image-1619"/></figure></div>
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
