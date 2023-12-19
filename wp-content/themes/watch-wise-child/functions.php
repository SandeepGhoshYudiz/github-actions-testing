<?php

/**SVg Image upload enabling in wordpress */
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {
   $filetype = wp_check_filetype($filename, $mimes);
   return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
   ];
}, 10, 4);

function cc_mime_types($mimes)
{
   $mimes['svg'] = 'image/svg+xml';
   return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/*Custom Style and Script*/

function watch_wise_custom_add_styles()
{
   wp_enqueue_style('bootstrap-css', get_stylesheet_directory_uri() . '/css/bootstrap.css');
   wp_enqueue_style('slick-css', get_stylesheet_directory_uri() . '/css/slick.css');
   wp_enqueue_style('slick-theme-css', get_stylesheet_directory_uri() . '/css/slick-theme.css');
   wp_enqueue_style('fancybox-css', get_stylesheet_directory_uri() . '/css/jquery.fancybox.css');
   wp_enqueue_style('simplebar-css', get_stylesheet_directory_uri() . '/css/simplebar.css');

   //traders Dashboard CSS
   wp_enqueue_style('my-subscription-css', get_stylesheet_directory_uri() . '/traders/css/my-subscription.css');
   wp_enqueue_style('traders-marketplace-profile-css', get_stylesheet_directory_uri() . '/traders/css/marketplace-profile.css');
   wp_enqueue_style('traders-profile-css', get_stylesheet_directory_uri() . '/traders/css/profile.css');
   wp_enqueue_style('marketplace-css', get_stylesheet_directory_uri() . '/traders/css/marketplace.css');
   wp_enqueue_style('traders-dashboard-css', get_stylesheet_directory_uri() . '/traders/css/dashboard.css');
   wp_enqueue_style('traders-authentications-css', get_stylesheet_directory_uri() . '/traders/css/authentications.css');

   //Customer Dashboard CSS
   wp_enqueue_style('profile-css', get_stylesheet_directory_uri() . '/customers/css/profile.css');
   wp_enqueue_style('messages-css', get_stylesheet_directory_uri() . '/customers/css/messages.css');
   wp_enqueue_style('myselling-css', get_stylesheet_directory_uri() . '/customers/css/my-selling.css');
   wp_enqueue_style('sellwatch-css', get_stylesheet_directory_uri() . '/customers/css/sell-watch.css');
   wp_enqueue_style('dashboard-css', get_stylesheet_directory_uri() . '/customers/css/dashboard.css');
   wp_enqueue_style('authentications-css', get_stylesheet_directory_uri() . '/customers/css/authentications.css');

   //Other Css
   wp_enqueue_style('privacy-terms-css', get_stylesheet_directory_uri() . '/css/template-css/privacy-terms.css');
   wp_enqueue_style('contact-css', get_stylesheet_directory_uri() . '/css/template-css/contact-us.css');
   wp_enqueue_style('faqs-css', get_stylesheet_directory_uri() . '/css/template-css/faqs.css');
   wp_enqueue_style('blog-css', get_stylesheet_directory_uri() . '/css/template-css/blog.css');
   wp_enqueue_style('traders-css', get_stylesheet_directory_uri() . '/css/template-css/traders.css');
   wp_enqueue_style('customer-css', get_stylesheet_directory_uri() . '/css/template-css/customer.css');
   wp_enqueue_style('about-css', get_stylesheet_directory_uri() . '/css/template-css/about-us.css');
   wp_enqueue_style('home-css', get_stylesheet_directory_uri() . '/css/template-css/home.css');
   wp_enqueue_style('child-style', get_stylesheet_uri());

   wp_enqueue_script("jquery");
   wp_enqueue_script('slick-js', get_stylesheet_directory_uri() . '/js/slick.js', array(), NULL, TRUE);
   wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array(), NULL, TRUE);
   wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array(), NULL, TRUE);
   wp_enqueue_script('popper-js', get_stylesheet_directory_uri() . '/js/popper.min.js', array(), NULL, TRUE);
   wp_enqueue_script('fancybox-js', get_stylesheet_directory_uri() . '/js/jquery.fancybox.js', array(), NULL, TRUE);
   wp_enqueue_script('simplebar-js', get_stylesheet_directory_uri() . '/js/simplebar.min.js', array(), NULL, TRUE);
}

add_action('wp_enqueue_scripts', 'watch_wise_custom_add_styles', PHP_INT_MAX);

/*Widget*/
function watch_wise_widgets_init()
{
   register_sidebar(
      array(
         'name'          => esc_html__('Custom Header Btns', 'twentytwentyone'),
         'id'            => 'header-widget-btns',
         'description'   => esc_html__('Add widgets here to appear in your footer.', 'twentytwentyone'),
         'before_widget' => '<section id="%1$s" class="widget %2$s">',
         'after_widget'  => '</section>',
         'before_title'  => '<h2 class="widget-title">',
         'after_title'   => '</h2>',
      )
   );
   register_sidebar(
      array(
         'name'          => esc_html__('Join Newsletter', 'twentytwentyone'),
         'id'            => 'join-our-newsletter',
         'description'   => esc_html__('Add widgets here to appear in your footer.', 'twentytwentyone'),
         'before_widget' => '<section id="%1$s" class="widget %2$s">',
         'after_widget'  => '</section>',
         'before_title'  => '<h2 class="widget-title">',
         'after_title'   => '</h2>',
      )
   );
   register_sidebar(
      array(
         'name'          => esc_html__('Footer Widget 1', 'twentytwentyone'),
         'id'            => 'footer-widget-1',
         'description'   => esc_html__('Add widgets here to appear in your footer.', 'twentytwentyone'),
         'before_widget' => '<section id="%1$s" class="widget %2$s">',
         'after_widget'  => '</section>',
         'before_title'  => '<h2 class="widget-title">',
         'after_title'   => '</h2>',
      )
   );
   register_sidebar(
      array(
         'name'          => esc_html__('Footer Widget 2', 'twentytwentyone'),
         'id'            => 'footer-widget-2',
         'description'   => esc_html__('Add widgets here to appear in your footer.', 'twentytwentyone'),
         'before_widget' => '<section id="%1$s" class="widget %2$s">',
         'after_widget'  => '</section>',
         'before_title'  => '<h2 class="widget-title">',
         'after_title'   => '</h2>',
      )
   );
   register_sidebar(
      array(
         'name'          => esc_html__('Footer Widget 3', 'twentytwentyone'),
         'id'            => 'footer-widget-3',
         'description'   => esc_html__('Add widgets here to appear in your footer.', 'twentytwentyone'),
         'before_widget' => '<section id="%1$s" class="widget %2$s">',
         'after_widget'  => '</section>',
         'before_title'  => '<h2 class="widget-title">',
         'after_title'   => '</h2>',
      )
   );
   register_sidebar(
      array(
         'name'          => esc_html__('Footer Widget 4', 'twentytwentyone'),
         'id'            => 'footer-widget-4',
         'description'   => esc_html__('Add widgets here to appear in your footer.', 'twentytwentyone'),
         'before_widget' => '<section id="%1$s" class="widget %2$s">',
         'after_widget'  => '</section>',
         'before_title'  => '<h2 class="widget-title">',
         'after_title'   => '</h2>',
      )
   );
   register_sidebar(
      array(
         'name'          => esc_html__('Social Menu', 'twentytwentyone'),
         'id'            => 'social-menu',
         'description'   => esc_html__('Add widgets here to appear in your footer.', 'twentytwentyone'),
         'before_widget' => '<section id="%1$s" class="widget %2$s">',
         'after_widget'  => '</section>',
         'before_title'  => '<h2 class="widget-title">',
         'after_title'   => '</h2>',
      )
   );
   register_sidebar(
      array(
         'name'          => esc_html__('Footer Bottom Widget 1', 'twentytwentyone'),
         'id'            => 'footer-bottom-widget-1',
         'description'   => esc_html__('Add widgets here to appear in your footer.', 'twentytwentyone'),
         'before_widget' => '<section id="%1$s" class="widget %2$s">',
         'after_widget'  => '</section>',
         'before_title'  => '<h2 class="widget-title">',
         'after_title'   => '</h2>',
      )
   );
   register_sidebar(
      array(
         'name'          => esc_html__('Footer Bottom Widget 2', 'twentytwentyone'),
         'id'            => 'footer-bottom-widget-2',
         'description'   => esc_html__('Add widgets here to appear in your footer.', 'twentytwentyone'),
         'before_widget' => '<section id="%1$s" class="widget %2$s">',
         'after_widget'  => '</section>',
         'before_title'  => '<h2 class="widget-title">',
         'after_title'   => '</h2>',
      )
   );
}
add_action('widgets_init', 'watch_wise_widgets_init');

//Social Menu Add Icon
add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects($items, $args)
{
   // loop
   foreach ($items as &$item) {
      // vars
      $icon = get_field('menu_icon', $item);
      // append icon
      if ($icon) {
         $item->title = ' <img class="menu-icon" src=' . $icon . ' alt="icon"/>' . '<span>' . $item->title . '</span>';
      }
   }
   // return
   return $items;
}

add_filter('get_avatar', 'change_user_avatar', 10, 5);
function change_user_avatar($avatar, $id_or_email, $size, $default, $alt)
{
   $user = '';
   if (is_numeric($id_or_email)) {
      $id   = (int) $id_or_email;
      $user = get_user_by('id', $id);
   } elseif (is_object($id_or_email)) {
      if (!empty($id_or_email->user_id)) {
         $id   = (int) $id_or_email->user_id;
         $user = get_user_by('id', $id);
      }
   } else {
      $user = get_user_by('email', $id_or_email);
   }
   if (!$user) {
      return $avatar;
   }
   $user_id = $user->ID;
   $image_id = get_user_meta($user_id, 'user_image', true); // CHANGE TO YOUR FIELD NAME
   if (!$image_id) {
      return $avatar;
   }
   $image_url  = wp_get_attachment_image_src($image_id, 'thumbnail'); // Set image size by name
   $avatar_url = $image_url[0];
   $avatar = '<img alt="' . $alt . '" src="' . $avatar_url . '" class="avatar avatar-' . $size . '" height="' . $size . '" width="' . $size . '"/>';
   return $avatar;
}

//! ////////////////////////////////////////////////////////////////////////////////////// !//
//! ///////////////////////// C O M M O N  F U N C T I O N S ///////////////////////////// !//
//! ////////////////////////////////////////////////////////////////////////////////////// !//

//=======> Common function to get media file ID <=======//
function upload_image_to_media_library($file)
{
   // it allows us to use wp_handle_upload() function
   require_once(ABSPATH . 'wp-admin/includes/file.php');

   // Get the type of the uploaded file. This is returned as "type/extension"
   $arr_file_type = wp_check_filetype(basename($file['name']));
   $uploaded_file_type = $arr_file_type['type'];

   // Set an array containing a list of acceptable formats
   $allowed_file_types = array('image/jpg', 'image/jpeg', 'image/png', 'application/pdf');

   // Maximum size in bytes
   $max_image_size = 2 * 1024 * 1024; // 2 MB (approx)

   $return = [];

   if ($file['size'] <= $max_image_size) {

      // If the uploaded file is the right format
      if (in_array($uploaded_file_type, $allowed_file_types)) {
         $upload = wp_handle_upload(
            $file,
            array('test_form' => false)
         );

         if (!empty($upload['error'])) {
            $return = $upload['error'];
         }

         // it is time to add our uploaded image into WordPress media library
         $attachment_id = wp_insert_attachment(
            array(
               'guid'           => $upload['url'],
               'post_mime_type' => $upload['type'],
               'post_title'     => basename($upload['file']),
               'post_content'   => '',
               'post_status'    => 'inherit',
            ),
            $upload['file']
         );

         if (
            is_wp_error($attachment_id) || !$attachment_id
         ) {
            $return = array(
               "status" => "error",
               "msg" => 'Upload error',
            );
         }

         // update medatata, regenerate image sizes
         require_once(ABSPATH . 'wp-admin/includes/image.php');

         wp_update_attachment_metadata(
            $attachment_id,
            wp_generate_attachment_metadata($attachment_id, $upload['file'])
         );

         $return = array(
            "status" => true,
            "attachment_id" => $attachment_id,
         );
      } else {
         $return = array(
            "status" => "error",
            "msg" => 'Please upload only these allowed files (jpg/ png/ pdf).',
         );
      }
   } else {
      $return =  array(
         "status" => "error",
         "msg" => 'You are not allowed to upload file size more then 2mb.',
      );
   }
   return $return;
}

//=======> Common function to handle image upload (Returns attachment ID) <=======//
function base_MultiImageUpload()
{
   $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
   require_once(ABSPATH . 'wp-admin/includes/image.php');
   require_once(ABSPATH . 'wp-admin/includes/file.php');
   require_once(ABSPATH . 'wp-admin/includes/media.php');
   $file_to_uploads = $_FILES;
   $image_ids = [];
   // $selected_gallary = (isset($_REQUEST['selected_gallary']) && !empty($_REQUEST['selected_gallary'])) ? explode(",", $_REQUEST['selected_gallary']) : array();
   foreach ($file_to_uploads as $filekey => $file) {
      if (!is_array($file['name']) && !empty($file['name'])) {
         $attachment_id = media_handle_upload($filekey, 0);
         $image_ids[$filekey] = $attachment_id;
      } else {
         foreach ($file['name'] as $key => $value) {
            if ($file['name'][$key]) {
               $file_test = array(
                  'name' => $file['name'][$key],
                  'type' => $file['type'][$key],
                  'tmp_name' => $file['tmp_name'][$key],
                  'error' => $file['error'][$key],
                  'size' => $file['size'][$key]
               );
               $_FILES = array("upload_file" => $file_test);
               $attachment_id = media_handle_upload("upload_file", 0);
               $image_ids[$filekey][] = $attachment_id;
            }
         }
      }
   }
   return $image_ids;
}

//=======> TO UPDATE EXISTING PROFILE PICTURE, AND FOUR DOCUMENTS <=======//
function update_existing_trader_attachments($new_file_field, $old_file_field, $new_value_meta_key)
{
   $upload_file = !empty($_FILES[$new_file_field]['name']) ? upload_image_to_media_library($_FILES[$new_file_field]) : $_REQUEST[$old_file_field];

   $user_id = get_current_user_id();

   update_user_meta(
      $user_id,
      $new_value_meta_key,
      !empty($_FILES[$new_file_field]['name']) ? $upload_file['attachment_id'] : $upload_file
   );
}
/* ------------------------------------------------------------------
----------------------- ADDING CUSTOM USER ROLES --------------------
------------------------------------------------------------------- */
function watch_wise_add_custom_roles()
{
   add_role('customer', 'Customer', array('read' => true, 'edit_posts' => true, 'delete_posts' => false));
   add_role('trader', 'Trader', array('read' => true, 'edit_posts' => true, 'delete_posts' => false));
}
add_action('init', 'watch_wise_add_custom_roles'); //Add More User Roles In Wordpress

//! ////////////////////////////////////////////////////////////////////////////////////// !//
//! ////////////////////// T R A D E R  R E G I S T R A T I O N ////////////////////////// !//
//! ////////////////////////////////////////////////////////////////////////////////////// !//

add_filter('init', 'watch_wise_trader_registration');
function watch_wise_trader_registration()
{
   if (isset($_POST['cus-reg-submit'])) {
      //p1  
      $firstname = isset($_POST['first-name']) ? $_POST['first-name'] : '';
      $lastname = isset($_POST['last-name']) ? $_POST['last-name'] : '';;
      $email = isset($_POST['email-address']) ? $_POST['email-address'] : '';;
      $phone = isset($_POST['phone-number']) ? $_POST['phone-number'] : '';;

      //p2
      $password = isset($_POST['password']) ? $_POST['password'] : '';;

      //p3
      $address_line1 = isset($_POST['address-line1']) ? $_POST['address-line1'] : '';;
      $address_line2 = isset($_POST['address-line2']) ? $_POST['address-line2'] : '';;
      $city = isset($_POST['city']) ? $_POST['city'] : '';;

      //p4
      $country = isset($_POST['country']) ? $_POST['country'] : '';;
      $postcode = isset($_POST['postcode']) ? $_POST['postcode'] : '';;

      //p5
      $upload_files_doc1 = upload_image_to_media_library($_FILES['upload-files-doc1']);
      $upload_files_doc2 = upload_image_to_media_library($_FILES['upload-files-doc2']);
      $upload_files_doc3 = upload_image_to_media_library($_FILES['upload-files-doc3']);
      $upload_files_doc4 = upload_image_to_media_library($_FILES['upload-files-doc4']);
      $company_url = isset($_POST['cmp-url']) ? $_POST['cmp-url'] : '';

      $reg_user_data = array(
         'first_name' => $firstname,
         'last_name' => $lastname,
         'user_login' => $email,
         'user_email' => $email,
         'user_pass' => $password,
         'user_url' => $company_url,
         'role' => 'trader'
      );

      // Reg user
      $registered_user_id = wp_insert_user($reg_user_data);

      if (!is_wp_error($registered_user_id)) {
         add_user_meta($registered_user_id, 'first_name', $firstname);
         add_user_meta($registered_user_id, 'last_name', $lastname);
         add_user_meta($registered_user_id, 'email', $email);
         add_user_meta($registered_user_id, 'phone_number', $phone);
         add_user_meta($registered_user_id, 'password', $password);
         add_user_meta($registered_user_id, 'address_line1', $address_line1);
         add_user_meta($registered_user_id, 'address_line2', $address_line2);
         add_user_meta($registered_user_id, 'city', $city);
         add_user_meta($registered_user_id, 'country', $country);
         add_user_meta($registered_user_id, 'postcode', $postcode);
         add_user_meta($registered_user_id, 'traders_confirmation_statement', $upload_files_doc1['attachment_id']);
         add_user_meta($registered_user_id, 'traders_proof_of_address', $upload_files_doc2['attachment_id']);
         add_user_meta($registered_user_id, 'traders_incorporation', $upload_files_doc3['attachment_id']);
         add_user_meta($registered_user_id, 'traders_company_logo', $upload_files_doc4['attachment_id']);

         //Sending Mail To the Trader and Admin
         define('WW_TRADER_EMAIL', $email);
         define('WW_ADMIN_EMAIL', "wordpressprojects1947@gmail.com");

         $subject_trader = 'Thank You';
         $subject_admin = 'Trader Registeration Inquiry';

         ob_start();
         include get_stylesheet_directory() . "/email-templates/trader/user-email.php";
         $body_trader = ob_get_clean();

         ob_start();
         include get_stylesheet_directory() . "/email-templates/trader/admin-email.php";
         $body_admin = ob_get_clean();

         $headers = array(
            'Content-Type: text/html; charset=UTF-8',
            'Reply-To: ' . get_option('admin_email')
         );

         $sent_to_trader = wp_mail(WW_TRADER_EMAIL, $subject_trader, $body_trader, $headers);
         $sent_to_admin = wp_mail(WW_ADMIN_EMAIL, $subject_admin, $body_admin, $headers);

         if ($sent_to_trader && $sent_to_admin) {
            wp_redirect(home_url('/traders/waiting-approval/'));
            exit;
         } else {
            echo "Error sending emails.";
            wp_redirect(home_url('/traders/create-account/?status=reg-email-err'));
            exit;
         }
      } else {
         echo "Error in registration!!";
         wp_redirect(home_url('/traders/create-account/?status=reg-err'));
         exit;
      }
   }
}

function my_custom_function()
{
   // Your actual function code goes here
   return 'expected_result_2121';
}
