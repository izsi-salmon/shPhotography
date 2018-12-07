<?php


function admin_my_enqueue() {
    wp_enqueue_media();
    wp_enqueue_style('CustomFieldStyle', get_template_directory_uri() . '/assets/css/customFields.css', array(), '1.0.0', 'all');
    wp_enqueue_script('CustomFieldScript', get_template_directory_uri() . '/assets/js/customFields.js', array(), '1.0.0', true);
}
add_action('admin_enqueue_scripts', 'admin_my_enqueue');

$metaboxes = array(
    'service_images' => array(
        'title' => __('Upload image', 'shPhotography'),
        'applicableto' => 'servicesimages',
        'location' => 'normal',
        'priority' => 'high',
        'fields' => array(
            'service_image' => array(
                'title' => __('Upload Image: ', 'shPhotography'),
                'type' => 'image',
                'description' => 'Upload an image to a service page.'
            )
        )
    ),
    'service-type' => array(
      'title' => __('Service list', 'shPhotography'),
      'applicableto' => 'servicesimages',
      'location' => 'normal',
      'priority' => 'high',
      'fields' => array(
          'service_type' => array(
              'title' => __('Select service: ', 'shPhotography'),
              'type' => 'type-list',
              'description' => 'Upload an image to a service page.'
          )
      )
    ),
    'service-type' => array(
      'title' => __('Service list', 'shPhotography'),
      'applicableto' => 'testimonials',
      'location' => 'normal',
      'priority' => 'high',
      'fields' => array(
          'service_type' => array(
              'title' => __('Add testimonial: ', 'shPhotography'),
              'type' => 'type-list',
              'description' => 'Add a testimonial to a service.'
          )
      )
    ),
    'contact-links' => array(
      'title' => __('Social media', 'shPhotography'),
      'applicableto' => 'page',
      'location' => 'normal',
      'priority' => 'high',
      'fields' => array(
          'social_link' => array(
              'title' => __('Link to Instagram: ', 'shPhotography'),
              'type' => 'link',
          )
      )
    )
);

function add_post_format_metabox() {
    global $metaboxes;
    if ( ! empty( $metaboxes ) ) {
        foreach ( $metaboxes as $id => $metabox ) {
            add_meta_box( $id, $metabox['title'], 'show_metaboxes', $metabox['applicableto'], $metabox['location'], $metabox['priority'], $id );
        }
    }
}

add_action( 'admin_init', 'add_post_format_metabox' );

function show_metaboxes( $post, $args ) {
    global $metaboxes;

    $custom = get_post_custom( $post->ID );
    $fields = $tabs = $metaboxes[$args['id']]['fields'];

    $output = '<input type="hidden" name="post_format_meta_box_nonce" value="' . wp_create_nonce( basename( __FILE__ ) ) . '" />';

    if ( sizeof( $fields ) ) {
        foreach ( $fields as $id => $field ) {
            switch ( $field['type'] ) {
                case 'type-list':
                    $args = array(
                        'post_type' => 'services',
                        'posts_per_page' => -1
                    );
                    $serviceTypes = new WP_Query($args);

                    if( $serviceTypes->have_posts() ):
                      $output .= '<label for="' . $id . '">' . $field['title'] . '</label><br>';
                     while($serviceTypes->have_posts()): $serviceTypes->the_post();
                         $postTitle = get_the_title();
                          if($postTitle === $custom['service_type'][0]){
                            $output .= '<input type="radio" name="' . $id . '" value="'.$postTitle.'" checked=checked> '. $postTitle .'<br>';
                          } else{
                            $output .= '<input type="radio" name="' . $id . '" value="'.$postTitle.'"> '. $postTitle .'<br>';
                          }
                     endwhile;
                    endif;

                break;
                case 'link':
                    $output .= '<div class="form-group"><label for="' . $id . '">' . $field['title'] . '</label><input class="customInput" id="' . $id . '" type="text" name="' . $id . '" value="' . $custom[$id][0] . '" style="width: 100%;" /></div>';

                break;
                case 'image':
                    $image =  get_post_meta( $post->ID, $id, true );
                    if($image){
                        $imagesrc = wp_get_attachment_image_url($image, 'header_image', false);
                        $removeClasses = "remove_custom_images button";
                    } else{
                        $removeClasses = "remove_custom_images button hidden";
                    }
                    $output .= '<div class="image-form-group">';
                        $output .= '<label for="'.$id.'" class="customLabel">'.$field['title'].'</label><br>';
                        $output .= '<p>'.$field['description'].'</p><br>';
                        $output .= '<img class="custom_image" src="'.$imagesrc.'">';
                        $output .= '<input type="hidden" value="' . $custom[$id][0] . '" class="customInput regular-text process_custom_images" name="'.$id.'" max="" min="1" step="1" readonly style="display:block">';
                        $output .= '<button class="set_custom_images button">Add Image</button>';
                        $output .= '<button class="'.$removeClasses.'">Remove Image</button>';
                    $output .= '</div>';
                break;
                default:
                    $output .= '<div class="form-group"><label for="' . $id . '">' . $field['title'] . '</label><input class="customInput" id="' . $id . '" type="text" name="' . $id . '" value="' . $custom[$id][0] . '" style="width: 100%;" /></div>';
                break;
            }
        }
    }
    echo $output;
}


function save_metaboxes( $post_id ) {
    global $metaboxes;

    if ( ! wp_verify_nonce( $_POST['post_format_meta_box_nonce'], basename( __FILE__ ) ) )
        return $post_id;

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return $post_id;

    if ( 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) )
            return $post_id;
    } elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }
    $post_type = get_post_type();

    foreach ( $metaboxes as $id => $metabox ) {
        if ( $metabox['applicableto'] == $post_type ) {
            $fields = $metaboxes[$id]['fields'];

            foreach ( $fields as $id => $field ) {
                $old = get_post_meta( $post_id, $id, true );
                $new = $_POST[$id];


                if ( $new && $new != $old ) {
                    update_post_meta( $post_id, $id, $new );
                }
                elseif ( '' == $new && $old || ! isset( $_POST[$id] ) ) {
                    delete_post_meta( $post_id, $id, $old );
                }
            }
        }
    }

}
add_action( 'save_post', 'save_metaboxes' );
