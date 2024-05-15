<?php
include "include/header.php";
$count_orders = mysqli_query($con, "select count(id) as count from orders where `userId` = '" . $_SESSION['id'] . "' ");
$fetch_count_orders = mysqli_fetch_array($count_orders);
?>

<main id="MainContent" class="content-for-layout focus-none" role="main" tabindex="-1">
    <link rel="stylesheet" href="cdn/shop/t/130/assets/main-cart.aio.min.css" media="all">
    <link rel="stylesheet" href="cdn/shop/t/130/assets/main-cart-page-new.css" media="all">
    <link href="cdn/shop/t/130/assets/track-orders.css" rel="stylesheet" type="text/css" media="all">


    <?php if ($fetch_count_orders['count'] <= 0) { ?>

        <div class="no-orders-placed">
            <div class="default-no-order-wrapper">
                <div><svg width="226" height="178" viewBox="0 0 226 178" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M117.509 142.917C149.711 142.917 175.815 116.815 175.815 84.6165C175.815 52.4183 149.711 26.3164 117.509 26.3164C85.3074 26.3164 59.2029 52.4183 59.2029 84.6165C59.2029 116.815 85.3074 142.917 117.509 142.917Z" fill="#DBE8EC"></path>
                        <path d="M199.778 77.7913V71.4953C199.778 70.2948 199.301 69.1434 198.452 68.2944C197.603 67.4455 196.452 66.9686 195.251 66.9686H175.794C175.2 66.9686 174.611 66.8515 174.062 66.624C173.513 66.3965 173.014 66.063 172.593 65.6427C172.173 65.2223 171.839 64.7233 171.612 64.1741C171.384 63.6249 171.267 63.0362 171.267 62.4418V56.1458C171.267 54.9453 171.744 53.7939 172.593 52.9449C173.442 52.096 174.594 51.619 175.794 51.619H183.253C184.454 51.619 185.605 51.1421 186.454 50.2932C187.303 49.4442 187.78 48.2928 187.78 47.0923V40.7963C187.78 39.5957 187.303 38.4443 186.454 37.5954C185.605 36.7465 184.454 36.2695 183.253 36.2695H49.7671C48.5664 36.2695 47.4149 36.7465 46.5658 37.5954C45.7168 38.4443 45.2398 39.5957 45.2398 40.7963V47.0923C45.2398 48.2928 45.7168 49.4442 46.5658 50.2932C47.4149 51.1421 48.5664 51.619 49.7671 51.619C50.9678 51.619 52.1193 52.096 52.9683 52.9449C53.8174 53.7939 54.2943 54.9453 54.2943 56.1458V62.4418C54.2943 63.6424 53.8174 64.7938 52.9683 65.6427C52.1193 66.4916 50.9678 66.9686 49.7671 66.9686H28.7829C27.5822 66.9686 26.4306 67.4455 25.5816 68.2944C24.7326 69.1434 24.2556 70.2948 24.2556 71.4953V77.7913C24.2556 78.9919 24.7326 80.1433 25.5816 80.9922C26.4306 81.8411 27.5822 82.3181 28.7829 82.3181H49.5602C50.1547 82.3181 50.7434 82.4352 51.2927 82.6626C51.8419 82.8901 52.341 83.2236 52.7614 83.6439C53.1818 84.0643 53.5153 84.5633 53.7428 85.1125C53.9703 85.6618 54.0874 86.2504 54.0874 86.8449V93.1408C54.1984 98.902 41.6297 97.6676 39.1294 97.6676H39.1128C37.9121 97.6676 36.7606 98.1446 35.9116 98.9935C35.0625 99.8424 34.5856 100.994 34.5856 102.194V108.49C34.5856 109.691 35.0625 110.842 35.9116 111.691C36.7606 112.54 37.9121 113.017 39.1128 113.017H50.5375C51.7382 113.017 52.8897 113.494 53.7387 114.343C54.5877 115.192 55.0647 116.343 55.0647 117.544V123.84C55.0647 125.04 54.5877 126.192 53.7387 127.041C52.8897 127.89 51.7382 128.367 50.5375 128.367H37.7029C36.5022 128.367 35.3507 128.844 34.5017 129.693C33.6527 130.541 33.1757 131.693 33.1757 132.893V139.189C33.1757 140.39 33.6527 141.541 34.5017 142.39C35.3507 143.239 36.5022 143.716 37.7029 143.716H182.206C183.407 143.716 184.559 143.239 185.408 142.39C186.257 141.541 186.734 140.39 186.734 139.189V132.893C186.734 131.693 186.257 130.541 185.408 129.693C184.559 128.844 183.407 128.367 182.206 128.367H174.804C173.604 128.367 172.452 127.89 171.603 127.041C170.754 126.192 170.277 125.04 170.277 123.84V117.544C170.277 116.343 170.754 115.192 171.603 114.343C172.452 113.494 173.604 113.017 174.804 113.017H187.537C188.737 113.017 189.889 112.54 190.738 111.691C191.587 110.842 192.064 109.691 192.064 108.49V102.194C192.064 100.994 191.587 99.8424 190.738 98.9935C189.889 98.1446 188.737 97.6676 187.537 97.6676H181.252C180.051 97.6676 178.9 97.1907 178.051 96.3418C177.202 95.4928 176.725 94.3414 176.725 93.1408V86.8449C176.725 86.2504 176.842 85.6618 177.069 85.1125C177.297 84.5633 177.63 84.0643 178.051 83.6439C178.471 83.2236 178.97 82.8901 179.52 82.6626C180.069 82.4352 180.658 82.3181 181.252 82.3181H195.251C196.452 82.3181 197.603 81.8411 198.452 80.9922C199.301 80.1433 199.778 78.9919 199.778 77.7913Z" fill="#DBE8EC"></path>
                        <path d="M118.451 67.9712C127.468 67.9712 134.778 60.662 134.778 51.6458C134.778 42.6295 127.468 35.3203 118.451 35.3203C109.434 35.3203 102.124 42.6295 102.124 51.6458C102.124 60.662 109.434 67.9712 118.451 67.9712Z" fill="#3086A3"></path>
                        <path d="M112.67 48.243C112.67 48.2228 112.67 48.2026 112.67 48.1824C112.67 47.0428 113.007 45.9286 113.639 44.9799C114.27 44.0312 115.168 43.2903 116.219 42.8504C117.271 42.4105 118.429 42.2911 119.548 42.5074C120.667 42.7236 121.697 43.2658 122.509 44.0657C123.32 44.8657 123.877 45.8877 124.11 47.0034C124.342 48.119 124.24 49.2785 123.815 50.3361C123.39 51.3936 122.663 52.302 121.723 52.9471C120.784 53.5922 119.674 53.9452 118.535 53.9618V59.2103" stroke="#F9AE2B" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M145.915 40.6562H157.147" stroke="#3086A3" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"></path>
                        <path d="M145.915 43.8906H157.147" stroke="#3086A3" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"></path>
                        <path d="M145.915 47.1289H157.147" stroke="#3086A3" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"></path>
                        <path d="M41.4287 102.129H52.6602" stroke="#3086A3" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"></path>
                        <path d="M41.4287 105.363H52.6602" stroke="#3086A3" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"></path>
                        <path d="M41.4287 108.602H52.6602" stroke="#3086A3" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"></path>
                        <path d="M167.463 125.211H178.694" stroke="#3086A3" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"></path>
                        <path d="M167.463 128.449H178.694" stroke="#3086A3" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"></path>
                        <path d="M167.463 131.684H178.694" stroke="#3086A3" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"></path>
                        <path d="M181.001 109.268C183.652 109.268 185.801 107.119 185.801 104.468C185.801 101.817 183.652 99.668 181.001 99.668C178.349 99.668 176.2 101.817 176.2 104.468C176.2 107.119 178.349 109.268 181.001 109.268Z" fill="#B9D4DB"></path>
                        <path d="M168.332 110.423C169.707 110.423 170.822 109.309 170.822 107.934C170.822 106.56 169.707 105.445 168.332 105.445C166.957 105.445 165.843 106.56 165.843 107.934C165.843 109.309 166.957 110.423 168.332 110.423Z" fill="#B9D4DB"></path>
                        <path d="M174.653 96.2794C176.617 96.2794 178.209 94.6874 178.209 92.7237C178.209 90.7599 176.617 89.168 174.653 89.168C172.689 89.168 171.097 90.7599 171.097 92.7237C171.097 94.6874 172.689 96.2794 174.653 96.2794Z" fill="#B9D4DB"></path>
                        <path d="M71.7612 141.184C74.9158 141.184 77.4731 138.627 77.4731 135.473C77.4731 132.319 74.9158 129.762 71.7612 129.762C68.6066 129.762 66.0493 132.319 66.0493 135.473C66.0493 138.627 68.6066 141.184 71.7612 141.184Z" fill="#B9D4DB"></path>
                        <path d="M60.8466 134.38C62.4897 134.38 63.8218 133.048 63.8218 131.405C63.8218 129.762 62.4897 128.43 60.8466 128.43C59.2034 128.43 57.8713 129.762 57.8713 131.405C57.8713 133.048 59.2034 134.38 60.8466 134.38Z" fill="#B9D4DB"></path>
                        <path d="M63.5792 123.01C64.527 123.01 65.2954 122.242 65.2954 121.294C65.2954 120.346 64.527 119.578 63.5792 119.578C62.6314 119.578 61.863 120.346 61.863 121.294C61.863 122.242 62.6314 123.01 63.5792 123.01Z" fill="#B9D4DB"></path>
                        <path d="M73.0797 126.622C75.3518 126.622 77.1938 124.78 77.1938 122.508C77.1938 120.236 75.3518 118.395 73.0797 118.395C70.8075 118.395 68.9656 120.236 68.9656 122.508C68.9656 124.78 70.8075 126.622 73.0797 126.622Z" fill="#B9D4DB"></path>
                        <path d="M75.9441 55.446C79.0986 55.446 81.6559 52.889 81.6559 49.7347C81.6559 46.5805 79.0986 44.0234 75.9441 44.0234C72.7895 44.0234 70.2322 46.5805 70.2322 49.7347C70.2322 52.889 72.7895 55.446 75.9441 55.446Z" fill="#B9D4DB"></path>
                        <path d="M76.1759 41.067C77.8191 41.067 79.1511 39.7351 79.1511 38.0921C79.1511 36.4491 77.8191 35.1172 76.1759 35.1172C74.5327 35.1172 73.2007 36.4491 73.2007 38.0921C73.2007 39.7351 74.5327 41.067 76.1759 41.067Z" fill="#B9D4DB"></path>
                        <path d="M95.9925 42.4035C97.4147 42.4035 98.5676 41.2507 98.5676 39.8287C98.5676 38.4067 97.4147 37.2539 95.9925 37.2539C94.5704 37.2539 93.4175 38.4067 93.4175 39.8287C93.4175 41.2507 94.5704 42.4035 95.9925 42.4035Z" fill="#B9D4DB"></path>
                        <path d="M86.6244 39.0414C87.5722 39.0414 88.3406 38.2731 88.3406 37.3254C88.3406 36.3777 87.5722 35.6094 86.6244 35.6094C85.6766 35.6094 84.9082 36.3777 84.9082 37.3254C84.9082 38.2731 85.6766 39.0414 86.6244 39.0414Z" fill="#B9D4DB"></path>
                        <path d="M88.6187 50.8055C90.8909 50.8055 92.7328 48.9637 92.7328 46.6918C92.7328 44.4199 90.8909 42.5781 88.6187 42.5781C86.3466 42.5781 84.5046 44.4199 84.5046 46.6918C84.5046 48.9637 86.3466 50.8055 88.6187 50.8055Z" fill="#B9D4DB"></path>
                        <path d="M167.191 81.0899H70.4499L67.2954 73.0938H167.191C167.315 73.0937 167.438 73.1182 167.553 73.1658C167.668 73.2133 167.772 73.283 167.86 73.3709C167.948 73.4588 168.017 73.5631 168.065 73.6779C168.112 73.7927 168.137 73.9157 168.137 74.04V80.1437C168.137 80.268 168.112 80.391 168.065 80.5058C168.017 80.6206 167.948 80.7249 167.86 80.8128C167.772 80.9007 167.667 80.9704 167.553 81.0179C167.438 81.0655 167.315 81.0899 167.191 81.0899Z" fill="#409CB5"></path>
                        <path d="M153.097 123.103H87.3148C86.9939 123.103 86.6805 123.005 86.4167 122.822C86.1528 122.639 85.951 122.38 85.8382 122.08L70.45 81.0898H163.822L154.636 121.872C154.557 122.222 154.362 122.534 154.082 122.757C153.802 122.981 153.455 123.103 153.097 123.103Z" fill="#F9AE2B"></path>
                        <path d="M159.091 102.097C152.361 102.529 145.632 102.754 138.902 102.908C135.537 103.004 132.173 103.025 128.808 103.082L118.713 103.139C111.984 103.146 105.254 103.069 98.5247 102.911C91.7951 102.758 85.0655 102.531 78.3359 102.097C85.0655 101.663 91.7951 101.436 98.5247 101.283C105.254 101.132 111.984 101.056 118.713 101.055L128.808 101.112C132.173 101.169 135.537 101.19 138.902 101.286C145.632 101.44 152.361 101.665 159.091 102.097Z" fill="#3086A3"></path>
                        <path d="M145.928 81.0898C145.544 84.7562 144.958 88.3769 144.312 91.9839C143.656 95.589 142.925 99.177 142.118 102.748C141.315 106.32 140.438 109.875 139.488 113.413C139.008 115.182 138.511 116.946 137.98 118.703C137.706 119.579 137.445 120.459 137.16 121.332L136.94 121.996C136.853 122.24 136.713 122.461 136.529 122.643C136.356 122.814 136.148 122.944 135.918 123.023C135.689 123.103 135.444 123.13 135.203 123.103C135.421 123.077 135.631 123.004 135.818 122.89C136.005 122.775 136.165 122.622 136.288 122.439C136.402 122.271 136.477 122.08 136.508 121.879L136.595 121.205C136.712 120.294 136.853 119.387 136.981 118.478C137.255 116.663 137.563 114.856 137.887 113.053C138.543 109.448 139.275 105.86 140.084 102.29C140.889 98.7184 141.767 95.1634 142.717 91.6247C143.679 88.0888 144.702 84.5665 145.928 81.0898Z" fill="#3086A3"></path>
                        <path d="M108.336 123.103C108.085 123.13 107.831 123.098 107.594 123.01C107.357 122.922 107.144 122.78 106.972 122.596C106.802 122.402 106.667 122.18 106.57 121.942L106.258 121.296C105.843 120.435 105.451 119.565 105.047 118.7C104.255 116.964 103.495 115.215 102.751 113.461C101.269 109.95 99.8606 106.411 98.5248 102.846C97.1849 99.2813 95.9161 95.6903 94.7183 92.0727C93.5306 88.4513 92.4028 84.8074 91.4712 81.0898C93.2162 84.5021 94.765 87.988 96.254 91.4963C97.7354 95.0075 99.1432 98.5463 100.477 102.113C101.815 105.678 103.082 109.269 104.281 112.887C104.876 114.697 105.454 116.514 106 118.342C106.265 119.26 106.543 120.172 106.796 121.094L106.987 121.785C107.03 122.002 107.108 122.21 107.218 122.402C107.34 122.596 107.504 122.759 107.697 122.88C107.891 123.001 108.109 123.078 108.336 123.103Z" fill="#3086A3"></path>
                        <path d="M103.649 155.333C107.248 155.333 110.166 152.416 110.166 148.817C110.166 145.218 107.248 142.301 103.649 142.301C100.05 142.301 97.1318 145.218 97.1318 148.817C97.1318 152.416 100.05 155.333 103.649 155.333Z" fill="#409CB5"></path>
                        <path d="M103.649 151.824C105.31 151.824 106.657 150.477 106.657 148.816C106.657 147.155 105.31 145.809 103.649 145.809C101.988 145.809 100.641 147.155 100.641 148.816C100.641 150.477 101.988 151.824 103.649 151.824Z" fill="#DBE8EC"></path>
                        <path d="M141.241 155.333C144.84 155.333 147.758 152.416 147.758 148.817C147.758 145.218 144.84 142.301 141.241 142.301C137.642 142.301 134.724 145.218 134.724 148.817C134.724 152.416 137.642 155.333 141.241 155.333Z" fill="#409CB5"></path>
                        <path d="M141.241 151.824C142.902 151.824 144.249 150.477 144.249 148.816C144.249 147.155 142.902 145.809 141.241 145.809C139.58 145.809 138.233 147.155 138.233 148.816C138.233 150.477 139.58 151.824 141.241 151.824Z" fill="#DBE8EC"></path>
                        <path d="M119.291 81.0898C119.93 84.5653 120.362 88.053 120.732 91.5445C121.094 95.0365 121.377 98.5331 121.583 102.034C121.794 105.535 121.928 109.041 121.987 112.551C122.035 116.061 122.019 119.576 121.794 123.103C121.152 119.628 120.719 116.14 120.35 112.648C119.988 109.156 119.706 105.66 119.501 102.158C119.294 98.6572 119.16 95.1516 119.1 91.6417C119.053 88.131 119.068 84.6166 119.291 81.0898Z" fill="#3086A3"></path>
                        <path d="M152.268 138.994H93.3151C93.104 138.994 92.898 138.93 92.7241 138.81C92.5503 138.691 92.4167 138.521 92.3412 138.324L58.1984 49.332H40.1136C39.837 49.332 39.5717 49.2221 39.3761 49.0266C39.1805 48.831 39.0706 48.5657 39.0706 48.2891C39.0706 48.0124 39.1805 47.7472 39.3761 47.5516C39.5717 47.356 39.837 47.2461 40.1136 47.2461H58.9154C59.1264 47.2461 59.3325 47.3101 59.5063 47.4296C59.6802 47.5492 59.8137 47.7186 59.8893 47.9156L94.0321 136.908H152.268C152.544 136.908 152.81 137.018 153.005 137.213C153.201 137.409 153.311 137.674 153.311 137.951C153.311 138.227 153.201 138.493 153.005 138.688C152.81 138.884 152.544 138.994 152.268 138.994Z" fill="#409CB5"></path>
                        <path d="M49.1838 45.2812H36.806C36.4219 45.2812 36.1106 45.5926 36.1106 45.9766V50.9689C36.1106 51.3529 36.4219 51.6642 36.806 51.6642H49.1838C49.5679 51.6642 49.8792 51.3529 49.8792 50.9689V45.9766C49.8792 45.5926 49.5679 45.2812 49.1838 45.2812Z" fill="#409CB5"></path>
                        <path d="M118.451 63.3773C118.97 63.3773 119.39 62.9571 119.39 62.4387C119.39 61.9203 118.97 61.5 118.451 61.5C117.933 61.5 117.512 61.9203 117.512 62.4387C117.512 62.9571 117.933 63.3773 118.451 63.3773Z" fill="#F9AE2B"></path>
                    </svg>
                </div>
                <div class="head-text">No Shopping Spree Yet!</div>
                <div class="sub-text">You have not placed any orders</div>
                <a href="../index.php" class="t4s_btn_black order-button" id="no-order-button" type="button">
                    Start Shopping
                </a>
            </div>
        </div>

    <?php } else { ?>

        <div class="t4s-cartPage__form t4s-pr t4s-oh t4s-d-flex t4s-align-items-center t4s-justify-content-center">
            <div class="cart-page-product-list">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="cart-romove item">#</th>
                            <th class="cart-description item">Image</th>
                            <th class="cart-product-name item">Product Name</th>

                            <th class="cart-qty item">Quantity</th>
                            <th class="cart-sub-total item">Price Per unit</th>
                            <th class="cart-sub-total item">Shipping Charge</th>
                            <th class="cart-total item">Grandtotal</th>
                            <th class="cart-total item">Payment Method</th>
                            <th class="cart-description item">Order Date</th>
                            <th class="cart-total last-item">Action</th>
                        </tr>
                    </thead><!-- /thead -->

                    <tbody>

                        <?php $query = mysqli_query($con, "select products.productImage1 as pimg1,products.productName as pname,products.id as proid,orders.productId as opid,orders.quantity as qty,products.productPrice as pprice,products.shippingCharge as shippingcharge,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as orderid from orders join products on orders.productId=products.id where orders.userId='" . $_SESSION['id'] . "' and orders.paymentMethod is not null");
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $cnt; ?></td>
                                <td class="cart-image">
                                    <a class="entry-thumbnail" href="detail.html">
                                        <img src="../admin/productimages/<?php echo $row['proid']; ?>/<?php echo $row['pimg1']; ?>" alt="" width="84" height="146">
                                    </a>
                                </td>
                                <td class="cart-product-name-info">
                                    <h4 class='cart-product-description'><a href="product-details.php?pid=<?php echo $row['opid']; ?>">
                                            <?php echo $row['pname']; ?></a></h4>


                                </td>
                                <td class="cart-product-quantity">
                                    <?php echo $qty = $row['qty']; ?>
                                </td>
                                <td class="cart-product-sub-total"><?php echo $price = $row['pprice']; ?> </td>
                                <td class="cart-product-sub-total"><?php echo $shippcharge = $row['shippingcharge']; ?> </td>
                                <td class="cart-product-grand-total"><?php echo (($qty * $price) + $shippcharge); ?></td>
                                <td class="cart-product-sub-total"><?php echo $row['paym']; ?> </td>
                                <td class="cart-product-sub-total"><?php echo $row['odate']; ?> </td>

                                <td>
                                    <a href="javascript:void(0);" onClick="popUpWindow('track-order.php?oid=<?php echo htmlentities($row['orderid']); ?>');" title="Track order">
                                        Track
                                </td>
                            </tr>
                        <?php $cnt = $cnt + 1;
                        } ?>

                    </tbody><!-- /tbody -->
                </table>

            </div>
        </div>

    <?php } ?>

</main>
<script language="javascript" type="text/javascript">
    var popUpWin = 0;

    function popUpWindow(URLStr, left, top, width, height) {
        if (popUpWin) {
            if (!popUpWin.closed) popUpWin.close();
        }
        popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 600 + ',height=' + 600 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
    }
</script>


<?php
include "include/footer.php";
?>