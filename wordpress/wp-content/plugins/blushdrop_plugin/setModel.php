<?php
/**
 * Created by PhpStorm.
 * User: ricardobandala
 *
 * Date: 2016-08-25
 * Time: 22:38
 */

function loadData($bdp, $userID)
{ $settings = $bdp['settings'];
	$user = get_user_by($userID);

	$extraminutes = getExtraMinutes($bdp, $user);
	?>
	<script>
		//model.currentTotalTime = 0<?php echo $extraminutes;?>;
		<?php $url = get_site_url(); ?>;
		model.url = "<?php echo $url ?>";
		model.products = {
			main: <?php echo getProduct($settings['prodID_EditingPacakage'], $userID)?>,
			minute: <?php echo getProduct($settings['prodID_ExtraMinute'],  $userID)?>,
			raw: <?php echo getProduct($settings['prodID_RawMaterial'], $userID)?>,
			url: <?php echo getProduct($settings['prodID_URL'], $userID)?>,
			disc: <?php echo getProduct($settings['prodID_Disc'], $userID)?>,
			music: <?php echo getMusic($settings['prodID_Disc'], $userID)?>,
		};<?php
}
function getProduct($bdp, $userID)
{
	$product = null;
	isBought($prodID, $userID);





	return $product;
	//Return a json string with product data, call to is bougth
}
function getMusic($category, $userID)
{

	//Return an array of json with product data, call to is bougth
}
function isBought($prodID, $userID)
{
	$founded = false;
	//get the data of the shoping cart return true if boughted
	return $founded;
}
function getExtraMinutes($bdp, $user)
{
	$minutes = 0;
	$path = $bdp->path.$user.login;
	$minutes = $bdp->bdp_dpx->getVideoMinutes($path);
	return $minutes;
}











/**
//<?php $current_user = wp_get_current_user();
			$ifBought = isBoughted($current_user, 51) ? "1" : "0"?>
			model.isBoughtMainProduct = <?php echo $ifBought ?>;
	<?php
	getMusic(); //Get the music







}
echo "adios";



$args = [
    "path" => null,
];
$bdp = new Blushdrop_dropbox();?>

    };

function getMusic(){
    $params = array(
        'post_type' => 'product',
        'product_cat' => 'music'
    );
    $wc_query = new WP_Query($params);
    if ($wc_query->have_posts()):
        while($wc_query->have_posts()):
            $wc_query->the_post();
            $thisProductID = $wc_query->post->ID;
            $_product = wc_get_product( $thisProductID );?>
            var track = {
            'id': <?php echo $thisProductID ?>,
            'title':'<?php the_title() ?>',
            <?php
            $inCart = isInCart($thisProductID)? "1" : "0";
            $ifBought = isBoughted($current_user, $thisProductID)? "1" : "0"?>
            'inCart': <?php echo $inCart ?>,
            'excerpt':'<?php echo $wc_query->post->post_excerpt;
            $wewe = $_product->get_price();?>',
            'price':'<?php echo $_product->get_price(); ?>',
            'reg-price':'<?php echo $_product->get_regular_price(); ?>',
            'sale-price':'<?php echo $_product->get_sale_price(); ?>'
            }
            model.musicTrack.push(track);
            console.log(track.title);
            <?php
        endwhile;
    endif;
    wp_reset_postdata();
 }
function getProduct($productTag){
    $res = "";
    $params = array(
        'post_type' => 'product',
        'product_cat' => $productTag
    );
    $wc_query = new WP_Query($params);
    if ($wc_query->have_posts()):
        while($wc_query->have_posts()):
            $wc_query->the_post();
            $thisProductID = $wc_query->post->ID;
            $_product = wc_get_product( $thisProductID );
            $inCart = isInCart($thisProductID)? "1" : "0";

            $res .=  '{id:'.$thisProductID.', '
                .'title:'.the_title().','
                .'inCart:'.$inCart.','
                .'image:'.$_product->get_image_id().','
                .'excerpt:'.$wc_query->post->post_excerpt.','
                .'price:'.$_product->get_price().','
                .'reg-price:'.$_product->get_regular_price().','
                .'sale-price:'.$_product->get_sale_price()
                .'};';
        endwhile;
    endif;
    wp_reset_postdata();
    return $res;
}


**/