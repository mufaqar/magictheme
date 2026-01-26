<style>
    .profile_side {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .profile_side h4 {
        font-weight: 700;
        font-size: 15px;
        line-height: 1.1;
        color: #000;
    }

    .profile_side ul {
        display: flex;
        flex-direction: column;
        gap: 10px;
        padding-left: 0;
        list-style: none;
    }

    .profile_side ul li a {
        font-weight: 500;
        font-size: 15px;
        line-height: 1.1;
        color: #868686;
        position: relative;
        display: inline-flex;
        width: fit-content;
        padding-bottom: 5px;
        text-decoration: none;
    }

    .profile_side ul li a::before {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, #2EB2FA 0%, #8078D1 57.55%, #3DAFED 113.18%);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.3s ease;
    }

    .profile_side ul li a:hover::before,
    .profile_side ul li a.active::before {
        transform: scaleX(1);
    }

    .profile_side ul li a.active {
        color: #404040;
    }
</style>

<aside class="profile_side">
    <h4>Artist Tools</h4>
    <ul>
        <li>
            <a href="<?php echo site_url('/artist-dashboard'); ?>" class="<?php echo is_page('dashboard') ? 'active' : ''; ?>">
                Dashboard
            </a>
        </li>

        <li>
            <a href="<?php echo site_url('/shop-setting'); ?>"
                class="<?php echo is_page('shop-setting') ? 'active' : ''; ?>">
                Shop Setting
            </a>
        </li>

        <li>
            <a href="<?php echo site_url('/view-store'); ?>"
                class="<?php echo is_page('view-store') ? 'active' : ''; ?>">
                View Store
            </a>
        </li>

        <li>
            <a href="<?php echo site_url('/manage-portfolio'); ?>"
                class="<?php echo is_page('manage-portfolio') ? 'active' : ''; ?>">
                Manage Portfolio
            </a>
        </li>

        <li>
            <a href="<?php echo site_url('/orders'); ?>" class="<?php echo is_page('orders') ? 'active' : ''; ?>">
                Order
            </a>
        </li>

        <li>
            <a href="<?php echo site_url('/purchase-history'); ?>"
                class="<?php echo is_page('purchase-history') ? 'active' : ''; ?>">
                Purchase History
            </a>
        </li>
    </ul>

    <h4>Account Settings</h4>
    <ul>
        <li>
            <a href="<?php echo site_url('/edit-profile'); ?>"
                class="<?php echo is_page('edit-profile') ? 'active' : ''; ?>">
                Edit Profile
            </a>
        </li>

        <li>
            <a href="<?php echo site_url('/payment-details'); ?>"
                class="<?php echo is_page('payment-details') ? 'active' : ''; ?>">
                Edit Payment Details
            </a>
        </li>

        <li>
            <a href="<?php echo site_url('/change-password'); ?>"
                class="<?php echo is_page('change-password') ? 'active' : ''; ?>">
                Change Password
            </a>
        </li>

        <li>
            <a href="<?php echo site_url('/close-account'); ?>"
                class="<?php echo is_page('close-account') ? 'active' : ''; ?>">
                Close Account
            </a>
        </li>
    </ul>

</aside>