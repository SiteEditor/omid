<div class="omid-featured-video">

    <?php 

    $self_hosted_video = get_field("self_hosted_video_url");

    if (!empty($self_hosted_video)) {

        echo do_shortcode('[video src="' . $self_hosted_video["url"] . '"]');

    } else {

        $external_video_code = get_field("external_video_url");

        echo $external_video_code;

    }

    ?>

</div>

