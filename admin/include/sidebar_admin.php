<?php isAdmin(); ?>

<div class="sidebar-wrapper">
    <div id="sidebarEffect"></div>
    <div>
        <div class="logo-wrapper logo-wrapper-center">
            <a href="index.php" data-bs-original-title="" title="">
                <img class="img-fluid for-white" src="../img/logo.webp" style="width: 30%" alt="logo">
            </a>
            <div class="back-btn">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="toggle-sidebar">
                <i class="ri-apps-line status_toggle middle sidebar-toggle"></i>
            </div>
        </div>
        <div class="logo-icon-wrapper">
            <a href="index.php">
                <img class="img-fluid main-logo main-white" src="../assets/images/favicon/favicon.png" alt="logo">
                <img class="img-fluid main-logo main-dark" src="../assets/images/favicon/favicon.png" alt="logo">
            </a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow">
                <i data-feather="arrow-left"></i>
            </div>

            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"></li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="index.php">
                            <i class="ri-home-line"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <!-- <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="all-orders.php">
                            <i class="ri-archive-line"></i>
                            <span>Orders</span>
                        </a>
                    </li> -->
                    <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-list-check-2"></i>
                            <span>Packages</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="all-package.php">All Packages</a>
                            </li>

                            <li>
                                <a href="add-package.php">Add New Packages</a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-list-check-2"></i>
                            <span>Category</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="all-category.php">All Category</a>
                            </li>

                            <li>
                                <a href="add-category.php">Add New Category</a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-list-check-2"></i>
                            <span>Brands</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="all-brand.php">All Brands</a>
                            </li>

                            <li>
                                <a href="add-brand.php">Add New Brands</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-list-check-2"></i>
                            <span>Material</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="all-material.php">All Material</a>
                            </li>

                            <li>
                                <a href="add-material.php">Add New Material</a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-list-check-2"></i>
                            <span>Sub Category</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="all-subcategory.php">All Sub Category</a>
                            </li>

                            <li>
                                <a href="add-subcategory.php">Add New Sub Category</a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-store-3-line"></i>
                            <span>Product</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="all-product.php">All Products</a>
                            </li>

                            <li>
                                <a href="add-product.php">Add New Products</a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-store-3-line"></i>
                            <span>Price</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="all-price.php">All Price</a>
                            </li>

                            <li>
                                <a href="add-price.php">Add New Price</a>
                            </li>
                        </ul>
                    </li> -->
                    <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-list-check-2"></i>
                            <span>Blogs</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="all-blog.php">All Blogs</a>

                            <li>
                                <a href="add-blog.php">Add New Blog</a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-price-tag-3-line"></i>
                            <span>Video</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="all-video.php">All Video</a>

                            <li>
                                <a href="add-video.php">Add New Video</a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-price-tag-3-line"></i>
                            <span>Banner</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="all-banner.php">All Banner</a>

                            <li>
                                <a href="add-banner.php">Add New Banner</a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-list-check-2"></i>
                            <span>Testimonial</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="all-testimonial.php">All Testimonial</a>
                            </li>

                            <li>
                                <a href="add-testimonial.php">Add New Testimonial</a>
                            </li>
                        </ul>
                    </li> -->
                    <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-list-settings-line"></i>
                            <span>Content</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="about.php">About</a>
                            <li>
                                <a href="contact.php">Contact</a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="product-review.php">
                            <i class="ri-star-line"></i>
                            <span>Product Review</span>
                        </a>
                    </li> -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-user-3-line"></i>
                            <span>Users</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="all-users.php">All Users</a>
                            </li>
                            <li>
                                <a href="user_query.php">User Query</a>
                            </li>
                            <li>
                                <a href="newsletter.php">Emails</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-settings-line"></i>
                            <span>Settings</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="profile-setting.php">Profile Setting</a>
                            </li>
                        </ul>
                    </li>

                    <!-- <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="list-page.php">
                            <i class="ri-list-check"></i>
                            <span>List Page</span>
                        </a>
                    </li> -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                            href="javascript:void(0)">
                            <b><i style="color: white;" data-feather="log-out"></i></b>
                            <span>Logout</span>
                        </a>
                    </li>


                    <!-- <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-store-3-line"></i>
                            <span>Product</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="products.html">Prodcts</a>
                            </li>

                            <li>
                                <a href="add-new-product.html">Add New Products</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-list-check-2"></i>
                            <span>Category</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="category.html">Category List</a>
                            </li>

                            <li>
                                <a href="add-new-category.html">Add New Category</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-list-settings-line"></i>
                            <span>Attributes</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="attributes.html">Attributes</a>
                            </li>

                            <li>
                                <a href="add-new-attributes.html">Add Attributes</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-user-3-line"></i>
                            <span>Users</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="all-users.html">All users</a>
                            </li>
                            <li>
                                <a href="add-new-user.html">Add new user</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-user-3-line"></i>
                            <span>Roles</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="role.html">All roles</a>
                            </li>
                            <li>
                                <a href="create-role.html">Create Role</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="media.html">
                            <i class="ri-price-tag-3-line"></i>
                            <span>Media</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-archive-line"></i>
                            <span>Orders</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="order-list.html">Order List</a>
                            </li>
                            <li>
                                <a href="order-detail.html">Order Detail</a>
                            </li>
                            <li>
                                <a href="order-tracking.html">Order Tracking</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-focus-3-line"></i>
                            <span>Localization</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="translation.html">Translation</a>
                            </li>

                            <li>
                                <a href="currency-rates.html">Currency Rates</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-price-tag-3-line"></i>
                            <span>Coupons</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="coupon-list.html">Coupon List</a>
                            </li>

                            <li>
                                <a href="create-coupon.html">Create Coupon</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="taxes.html">
                            <i class="ri-price-tag-3-line"></i>
                            <span>Tax</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="product-review.html">
                            <i class="ri-star-line"></i>
                            <span>Product Review</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="support-ticket.html">
                            <i class="ri-phone-line"></i>
                            <span>Support Ticket</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-settings-line"></i>
                            <span>Settings</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="profile-setting.html">Profile Setting</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="reports.html">
                            <i class="ri-file-chart-line"></i>
                            <span>Reports</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="list-page.html">
                            <i class="ri-list-check"></i>
                            <span>List Page</span>
                        </a>
                    </li> -->
                </ul>
            </div>

            <div class="right-arrow" id="right-arrow">
                <i data-feather="arrow-right"></i>
            </div>
        </nav>
    </div>
</div>