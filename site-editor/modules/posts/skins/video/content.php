<div class="omid-featured-video">

    <?php 

    $self_hosted_video = get_field("self_hosted_video_url");

	$poster_url = get_the_post_thumbnail_url( get_the_ID() , "full" );

	if ( ! $poster_url ) {
	    $poster_url = "";
	}

    if (!empty($self_hosted_video)) {

        echo do_shortcode('[video src="' . $self_hosted_video["url"] . '" poster="' . $poster_url . '"]');

    } else {

        $external_video_code = get_field("external_video_url");

        echo $external_video_code;

    }

    ?>

</div>

