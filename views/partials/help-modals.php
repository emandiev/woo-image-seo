<div id="help-background">
	<span>Click anywhere to close overlay</span>

	<span>Click anywhere to close overlay</span>
</div>

<div id="force-help" class="postbox postbox--help">
	<h2>Force attributes</h2>
	<strong>If the setting is disabled:</strong><br>
	The plugin will only set the attribute to images that don't have one.<br>
	This is useful if you wish to set your own attributes for individual images.<br>
	<hr>
	<strong>If the setting is enabled:</strong><br>
	The plugin will set the attribute to all images, even if they already have one.<br>
	This is especially useful for the "title" attribute because WordPress generates title attributes automatically using the file name.<br>
	<hr>
	Example:<br>
	You upload an image with the file name "pic3.jpg".<br>
	WordPress will automatically set a title attribute of "pic3".<br>
	<img src="<?php echo WOO_IMAGE_SEO['assets_url'] . 'force-help.png' ?>">
</div>

<div id="attribute-builder-help" class="postbox postbox--help">
	<h2>Attribute builder</h2>
	The attribute builder let's you change how the image attributes are generated.<br>
	You can use the three dropdown fields to include the product's name, first category, first tag, or a custom text in any order.<br><br>
	Example:<br>
	Let's say we have a product called "Amazing Avengers Shirt", with main category "Movie-Inspired Clothing".<br>
	By default, the plugin will build the image attribute using only the Product Name.<br>
	If you want to include the product's category, you can use the following configuration:<br>
	<img src="<?php echo WOO_IMAGE_SEO['assets_url'] . 'attribute-builder-help-1.png' ?>"><br>
	This will result in the attribute "Amazing Avengers Shirt Movie-Inspired Clothing".<br>
	<hr>
	The Custom Text option allows you to enter your own texts.<br>
	For example, the following configuration will result in "Amazing Avengers Shirt Movie-Inspired Clothing Free Shipping":<br>
	<img src="<?php echo WOO_IMAGE_SEO['assets_url'] . 'attribute-builder-help-2.png' ?>">
</div>