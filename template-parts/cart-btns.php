<?php
$user_id = get_current_user_id();
$favorites = $user_id ? get_user_meta($user_id, 'favorite_products', true) : [];
$favorites = is_array($favorites) ? $favorites : [];

$is_fav = in_array(get_the_ID(), $favorites);
?>


<div class="cart_btn position-absolute top-2 end-0 d-flex flex-column gap-2 pt-2 pe-2">
    <button class="btn wishlist-btn <?php echo $is_fav ? 'active' : ''; ?>"
        data-product-id="<?php echo get_the_ID(); ?>">
        <i class="<?php echo $is_fav ? 'fa-solid' : 'fa-regular'; ?> fa-heart"></i>
    </button>
    <button class="btn">
        <i class="fa-regular fa-eye"></i>
    </button>
</div>