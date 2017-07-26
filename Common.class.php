<?php
namespace Simplecov;

/**
 * Class CF - Common Functions
 * @package Simplecov
 */
class CF{

    /**
     * @var object;
     */
    private static $CF;

    /**
     * Singleton
     * @return CF
     */
    public static function getInstance()
    {
        if(is_null(self::$CF))
            self::$CF = new CF();

        return self::$CF;
    }

    /**
     * Collect category
     */
    public function excludedCategoryString($data)
    {
        $string = '';
        if(is_array($data))
        {
            foreach ($data as $key => $item)
            {
                if($key == 0)
                    $string .= '-' . get_cat_ID($item);
                else
                    $string .= ', -' . get_cat_ID($item);
            }
        }
        else if(is_string($data))
            $string .= '-' . get_cat_ID($data);

        return $string;
    }

    /**
     * @param $int - array || object
     */
    public function deb($int)
    {
        echo '<pre style="display: block; position: relative; margin-top: 0; margin-bottom: 1rem; font-size: 90%; color: #292b2c; background: white;">';
        print_r($int);
        echo '</pre>';
        echo "\r\n";
    }

    /**
     * Get attached to page image
     * @param $id - int
     * @return string / false
     */
    public function getPageImage($id)
    {
        $img = get_the_post_thumbnail_url($id);

        if($img)
            return $img;
        else
            return false;
    }

    /**
     * Resize image. Source is here -> http://elsper.ru/2013/03/vyvod-kartinok-v-vordpress-avtomaticheskoe-sozdanie-i-vyvod-miniatyur/
     */
    private function catch_that_image() {
        global $post, $posts;
        $first_img = '';
        ob_start();
        ob_end_clean();
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
        $first_img = $matches [1] [0];

        if(empty($first_img)){ //Defines a default image
            $first_img = "/images/default.jpg";
        }
        return $first_img;
    }

    public function resizeImage( $url, $width, $height = null, $crop = null, $single = true ) {

        //validate inputs
        if(!$url OR !$width ) return false;

        //define upload path & dir
        $upload_info = wp_upload_dir();
        $upload_dir = $upload_info['basedir'];
        $upload_url = $upload_info['baseurl'];

        //check if $img_url is local
        if(strpos( $url, home_url() ) === false) return false;

        //define path of image
        $rel_path = str_replace( $upload_url, '', $url);
        $img_path = $upload_dir . $rel_path;

        //check if img path exists, and is an image indeed
        if( !file_exists($img_path) OR !getimagesize($img_path) ) return false;

        //get image info
        $info = pathinfo($img_path);
        $ext = $info['extension'];
        list($orig_w,$orig_h) = getimagesize($img_path);

        //get image size after cropping
        $dims = image_resize_dimensions($orig_w, $orig_h, $width, $height, $crop);
        $dst_w = $dims[4];
        $dst_h = $dims[5];

        //use this to check if cropped image already exists, so we can return that instead
        $suffix = "{$dst_w}x{$dst_h}";
        $dst_rel_path = str_replace( '.'.$ext, '', $rel_path);
        $destfilename = "{$upload_dir}{$dst_rel_path}-{$suffix}.{$ext}";

        //if orig size is smaller
        if($width >= $orig_w) {

            if(!$dst_h) :
                //can't resize, so return original url
                $img_url = $url;
                $dst_w = $orig_w;
                $dst_h = $orig_h;

            else :
                //else check if cache exists
                if(file_exists($destfilename) && getimagesize($destfilename)) {
                    $img_url = "{$upload_url}{$dst_rel_path}-{$suffix}.{$ext}";
                }
                //else resize and return the new resized image url
                else {
                    $resized_img_path = image_resize( $img_path, $width, $height, $crop );
                    $resized_rel_path = str_replace( $upload_dir, '', $resized_img_path);
                    $img_url = $upload_url . $resized_rel_path;
                }

            endif;

        }
        //else check if cache exists
        elseif(file_exists($destfilename) && getimagesize($destfilename)) {
            $img_url = "{$upload_url}{$dst_rel_path}-{$suffix}.{$ext}";
        }
        //else, we resize the image and return the new resized image url
        else {
            $resized_img_path = image_resize( $img_path, $width, $height, $crop );
            $resized_rel_path = str_replace( $upload_dir, '', $resized_img_path);
            $img_url = $upload_url . $resized_rel_path;
        }

        //return the output
        if($single) {
            //str return
            $image = $img_url;
        } else {
            //array return
            $image = array (
                0 => $img_url,
                1 => $dst_w,
                2 => $dst_h
            );
        }

        return $image;
    }

    /**
     * Get post attachment images
     *
     * @param $id - int. If not set use get_the_ID();
     * @return array | bool. Keeps images url.
     */
    public function getPostImages($id)
    {
        $images = [];

        /**
         * Query for image objects
         */
        $arImages = get_attached_media('image', $id);

        /**
         * Rewrite obj in array
         */
        foreach ($arImages as $key => $image)
        {
            $images[$key]['src'] = $image->guid;
            $images[$key]['alt'] = $image->post_content;
            $images[$key]['title'] = $image->post_excerpt;
        }

        if(count($images) > 0)
            return $images;
        else
            return false;
    }

    public function viewContactModalButton()
    {
        echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">Заказать себе<br>дизайн проект</button>';
    }

    public function getImage($imageName, $expansion, $directory = '')
    {
        $imageFolder = get_theme_file_uri() . '/assets/images/';

        if(strlen($directory) > 0)
            $imageFolder .= $directory . '/';

        $image = $imageFolder . $imageName . '.' . $expansion;

        echo $image;
    }
}