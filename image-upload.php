<?php

/*
Plugin Name: image-upload
Plugin URI: http://github.com/daniiltserin/image-upload
Description: Learn how o work with media upload in wordpress
Version: 1.0.0
Author: Lama @Override Bobby Bryant
Author URI: http://www.vk.com/daniiltserin
License: GPLv2
*/

/* 
Copyright (C) 2016 Lama

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

namespace image_uploader;

function register_metaboxes() {
    add_meta_box("Image_metabox", "Image Uploader", __NAMESPACE__ . '\image_uploader_callback');
}

add_action("add_meta_boxes", __NAMESPACE__ . "\\register_metaboxes");

function register_admin_script() {
    wp_enqueue_script("wp_img_upload", plugin_dir_url(__FILE__) . 'image_upload.js', array('jquery', 'media-upload'), WPIMGUP_VERSION, true);
}



function image_uploader_callback($post_id) {
    ?>
    <div id="metabox-wrapper">
        <img src="" id="image-tag">
        <input type="hidden" id="img-hidden-field" name="custom_image_data">
                <input type="button" id="image-upload-button" class="button" value="Add image">
            <input type="button" id="image-delete-button" class="button" value="Remove Image">
        </div>

    <?php
}
add_action("admin_enqueue_scripts", __NAMESPACE__ . '\register_admin_script');
