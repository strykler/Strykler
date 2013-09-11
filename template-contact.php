<?php
/*Template Name:Contact*/
get_header();
?>

<div class="container contact-page left-space">
	<div class="row">
		<div class="col-sm-12">
			<h5 class="section-title">Contact Us</h5>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 contact-intro">
			<h1>Get in touch with us</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 map">
			<div style="height: 400px;" id="map"></div>
		</div>
	</div>
		<script type="text/javascript">
	    	function initialize() {
		        var map;
				var brooklyn = new google.maps.LatLng(40.6743890, -73.9455);

				var stylez = [
				    {
				      featureType: "all",
				      elementType: "all",
				      stylers: [
				        { saturation: -100 } // <-- THIS
				      ]
				    }
				];

				var mapOptions = {
				    zoom: 11,
				    center: brooklyn,
				    mapTypeControlOptions: {
				         mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'tehgrayz']
				    }
				};

				map = new google.maps.Map(document.getElementById("map"), mapOptions);

				var mapType = new google.maps.StyledMapType(stylez, { name:"Grayscale" });    
				map.mapTypes.set('tehgrayz', mapType);
				map.setMapTypeId('tehgrayz');
	      	}
	    	google.maps.event.addDomListener(window, 'load', initialize);
	    </script>
	<div class="row contact-info">
		<div class="contact-from col-sm-8">
			<div class="row">
				<div class="col-sm-12"><h5 class="section-title">Contact Us</h5></div>
			</div>
			<div class="row">
				<form action="#" class="col-sm-12">
					<div class="row">
						<p class="col-sm-6"><input type="text" name="name" id="name" placeholder="Name"></p>
						<p class="col-sm-6"><input type="email" name="email" id="email" placeholder="Email"></p>
						<p class="col-sm-12"><textarea name="message" id="message" placeholder="Message"></textarea></p>
						<p class="col-sm-12"><input type="submit" name="send" id="send" value="Send"></p>
					</div>
				</form>
			</div>
		</div>
		<div class="address col-sm-4">
			<div class="row">
				<div class="col-sm-12"><h5 class="section-title">Address</h5></div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit</p>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>