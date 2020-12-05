<div id="help-background">
	<span>Click anywhere to close overlay</span>

	<span>Click anywhere to close overlay</span>
</div>

<div id="force-help" class="postbox postbox--help">
	<h2>How does "Force attribute" work?</h2>
	<strong>If the setting is disabled:</strong><br>
	The plugin will only set the attribute to images that don't have one.<br>
	This is useful if you wish to set your own attributes for individual images.<br>
	<hr>
	<strong>If the setting is enabled:</strong><br>
	The plugin will set the attribute to all images, even if they already have one.<br>
	This is especially useful for the "title" attribute because WordPress generates title attributes automatically using the file name.<br>
	Example:<br>
	You upload an image with the file name "pic3.jpg".<br>
	WordPress will automatically set a title attribute of "pic3".<br>
	<img src="<?php echo WOO_IMAGE_SEO['assets_url'] . 'force-help.png'; ?>"><br>
	This isn't great if you have not optimized your image file names.<br>
	However, if you have manually set proper titles you may want to disable the setting.
</div>
<div id="attribute-builder-help" class="postbox postbox--help">
	<h2>How does the Attribute builder work?</h2>
	The attribute builder let's you customize the attributes that the plugin will set to your product images.<br>
	Example:<br>
	You have a product called "Amazing Avengers Shirt", with main category called "Movie-Inspired Clothing" and two tags "men's clothing" and "avengers".<br>
	By default, the plugin will build the image attribute using only the Product Name, so your images will have "Amazing Avengers Shirt" as attributes.<br>
	If you wish, you can choose to change this by using the drop-down options.<br>
	There are three drop-down positions that allows you to order the way your attribute is formed.<br>
	Let's say you want to include the product's category before its name.<br>
	You would need to change the first option to "First Category", so the setting look like this:<br>
	<img src="<?php echo WOO_IMAGE_SEO['assets_url'] . 'attribute-builder-help.png'; ?>"><br>
	This will result in the following attribute: "Movie-Inspired Clothing Amazing Avengers Shirt".<br>
	You can also choose to include the first tag in the end, resulting in: "Movie-Inspired Clothing Amazing Avengers Shirt men's clothing".
</div>