<?php
include "include/header.php";
$page_category = mysqli_query($con, "select id,categoryName, categoryImage  from category where `id`='" . $_GET['cid'] . "'");
$page_category_row = mysqli_fetch_array($page_category);
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $ret = mysqli_query($con, "select * from products where `category` = '" . $_GET['cid'] . "' limit " . $_GET['page'] * 2);
} else {
    $page = 1;
    $ret = mysqli_query($con, "select * from products where `category` = '" . $_GET['cid'] . "' limit 2");
}

?>
<main id="MainContent" class="content-for-layout focus-none" role="main" tabindex="-1">
    <div id="shopify-section-template--16885348434166__41e67383-d98d-47ec-a5d4-87e556f2840d" class="shopify-section t4s-container t4s-heading-container">
        <link rel="stylesheet" href="cdn/shop/t/130/assets/collection-heading.aio.min.css" media="all">
        <div>
            <div class="collection-heading-container">
                <div class="collection-heading-introduction">
                    <h1 class="collection-title"><?= $page_category_row['categoryName']; ?></h1>
                    <div class="collection-description">Grab our varied products styles and design and slumber like a champion.</div>
                </div>
                <div class="collection-sales-count">
                    <div class="collection-sales-count-gif">
                        <!-- <img alt="sales-counter" class="sales-count-gif" height="14px" loading="lazy" src="cdn/shop/t/130/assets/sales_count_live.gif?v=108634221033204322221696354366" width="14px"> -->
                        <span class="sales-count-value sales-count-value-mobile collection-sales-count-text">14699</span>
                    </div>
                    <!-- <div class="collection-sales-count-text">
                        <span class="sales-count-value sales-count-value-desktop">14699</span>
                        <span class="sales-count-text">Bedsheets delivered recently</span>
                    </div> -->
                </div>

            </div>

        </div>
    </div>
    <div id="shopify-section-template--16885348434166__0db95a41-2b33-4aee-a91e-f1355720fe38" class="shopify-section">
        <style>
            .banner-collection--img {
                flex: 1 1 calc(100% / 3);
            }

            .banner-collection--img img {
                min-width: 425px;
                height: 100px;
            }

            .collection-mobile {
                display: none;
            }
        </style>
        <link rel="stylesheet" href="cdn/shop/t/130/assets/collection-banner-with-slider-common.aio.min.css" media="all">
        <link rel="stylesheet" href="cdn/shop/t/130/assets/common-slider-container.aio.min.css" media="all">
        <div id="slider-container-test-container-banner" style="padding-top: 5px;padding-bottom: 20px">
            <div class="slider-sub-container">
                <div class="container-icon-back">
                    <span class="back-icon" style="top: 37%; opacity: 0; display: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 20 20" fill="none">
                            <circle cx="10" cy="10" r="10" fill="black" fill-opacity="0.4"></circle>
                            <path d="M13 16L7 10L13 4" stroke="white" stroke-linejoin="round"></path>
                        </svg>
                    </span>
                </div>
                <div class="main-items-slider collection-desktop" style="gap: 10px"></div>
                <!-- <div class="main-items-slider collection-mobile" style="gap: 10px">
                    <div>
                        <a href="collections.php?cid=summer-bedsheets">
                            <div class="banner-collection--img">
                                <img class="t4s-lz--fadeIn t4s-obj-eff lazyautosizes" width="1330" height="1330" alt="first-glance-banner-1" id="image-with-aspect-ratio-mobile-1" >
                            </div>
                        </a>
                    </div>
                    <div>
                        <a href="collections/bedsheets?filter.p.m.my_fields.material=100%25+Cotton">
                            <div class="banner-collection--img">
                                <img loading="lazy" style="object-position: " class="t4s-lz--fadeIn t4s-obj-eff lazyautosizes lazyloadt4sed" data-widths="[100,200,400,600,700,800]" data-optimumx="2" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" width="1330" height="1330" alt="first-glance-banner-2" id="image-with-aspect-ratio-mobile-2" data-srcset="cdn/shop/files/Bedding_mobile_1.png?v=1692350055&amp;width=100 100w, cdn/shop/files/Bedding_mobile_1.png?v=1692350055&amp;width=200 200w, cdn/shop/files/Bedding_mobile_1.png?v=1692350055&amp;width=400 400w, cdn/shop/files/Bedding_mobile_1.png?v=1692350055&amp;width=600 600w, cdn/shop/files/Bedding_mobile_1.png?v=1692350055&amp;width=700 700w, cdn/shop/files/Bedding_mobile_1.png?v=1692350055&amp;width=800 800w" sizes="320px" srcset="cdn/shop/files/Bedding_mobile_1.png?v=1692350055&amp;width=100 100w, cdn/shop/files/Bedding_mobile_1.png?v=1692350055&amp;width=200 200w, cdn/shop/files/Bedding_mobile_1.png?v=1692350055&amp;width=400 400w, cdn/shop/files/Bedding_mobile_1.png?v=1692350055&amp;width=600 600w, cdn/shop/files/Bedding_mobile_1.png?v=1692350055&amp;width=700 700w, cdn/shop/files/Bedding_mobile_1.png?v=1692350055&amp;width=800 800w">
                            </div>
                        </a>
                    </div>
                    <div>
                        <div class="banner-collection--img">
                            <img loading="lazy" style="object-position: " class="t4s-lz--fadeIn t4s-obj-eff lazyautosizes lazyloadt4sed" data-widths="[100,200,400,600,700,800]" data-optimumx="2" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" width="1330" height="1330" alt="first-glance-banner-3" id="image-with-aspect-ratio-mobile-3" data-srcset="cdn/shop/files/TC_Info_dd2b74df-044a-4421-935c-a31d70e11b8b.png?v=1692364337&amp;width=100 100w, cdn/shop/files/TC_Info_dd2b74df-044a-4421-935c-a31d70e11b8b.png?v=1692364337&amp;width=200 200w, cdn/shop/files/TC_Info_dd2b74df-044a-4421-935c-a31d70e11b8b.png?v=1692364337&amp;width=400 400w, cdn/shop/files/TC_Info_dd2b74df-044a-4421-935c-a31d70e11b8b.png?v=1692364337&amp;width=600 600w, cdn/shop/files/TC_Info_dd2b74df-044a-4421-935c-a31d70e11b8b.png?v=1692364337&amp;width=700 700w, cdn/shop/files/TC_Info_dd2b74df-044a-4421-935c-a31d70e11b8b.png?v=1692364337&amp;width=800 800w" sizes="320px" srcset="cdn/shop/files/TC_Info_dd2b74df-044a-4421-935c-a31d70e11b8b.png?v=1692364337&amp;width=100 100w, cdn/shop/files/TC_Info_dd2b74df-044a-4421-935c-a31d70e11b8b.png?v=1692364337&amp;width=200 200w, cdn/shop/files/TC_Info_dd2b74df-044a-4421-935c-a31d70e11b8b.png?v=1692364337&amp;width=400 400w, cdn/shop/files/TC_Info_dd2b74df-044a-4421-935c-a31d70e11b8b.png?v=1692364337&amp;width=600 600w, cdn/shop/files/TC_Info_dd2b74df-044a-4421-935c-a31d70e11b8b.png?v=1692364337&amp;width=700 700w, cdn/shop/files/TC_Info_dd2b74df-044a-4421-935c-a31d70e11b8b.png?v=1692364337&amp;width=800 800w">
                        </div>
                    </div>
                    <div>
                        <div class="banner-collection--img">
                            <img loading="lazy" style="object-position: " class=" t4s-lz--fadeIn t4s-obj-eff lazyautosizes lazyloadt4sing" data-widths="[100,200,400,600,700,800]" data-optimumx="2" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" width="1330" height="1330" alt="first-glance-banner-4" id="image-with-aspect-ratio-mobile-4" data-srcset="cdn/shop/files/Bedding_mobile_3.png?v=1692350055&amp;width=100 100w, cdn/shop/files/Bedding_mobile_3.png?v=1692350055&amp;width=200 200w, cdn/shop/files/Bedding_mobile_3.png?v=1692350055&amp;width=400 400w, cdn/shop/files/Bedding_mobile_3.png?v=1692350055&amp;width=600 600w, cdn/shop/files/Bedding_mobile_3.png?v=1692350055&amp;width=700 700w, cdn/shop/files/Bedding_mobile_3.png?v=1692350055&amp;width=800 800w" sizes="320px" srcset="cdn/shop/files/Bedding_mobile_3.png?v=1692350055&amp;width=100 100w, cdn/shop/files/Bedding_mobile_3.png?v=1692350055&amp;width=200 200w, cdn/shop/files/Bedding_mobile_3.png?v=1692350055&amp;width=400 400w, cdn/shop/files/Bedding_mobile_3.png?v=1692350055&amp;width=600 600w, cdn/shop/files/Bedding_mobile_3.png?v=1692350055&amp;width=700 700w, cdn/shop/files/Bedding_mobile_3.png?v=1692350055&amp;width=800 800w">
                        </div>
                    </div>
                </div> -->
                <div class="container-icon-next">
                    <span class="next-icon" style="top: 37%; display: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 20 20" fill="none">
                            <circle cx="10" cy="10" r="10" transform="rotate(-180 10 10)" fill="black" fill-opacity="0.4"></circle>
                            <path d="M7 4L13 10L7 16" stroke="white" stroke-linejoin="round"></path>
                        </svg>
                    </span>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var sliderId = "slider-container-test-container-banner"
                var sliderContainer = document.querySelector(`#${sliderId} .slider-sub-container .main-items-slider`);
                var sliderLeftArrow = document.querySelector(`#${sliderId} .container-icon-back .back-icon`);
                var sliderRightArrow = document.querySelector(`#${sliderId} .container-icon-next .next-icon`);
                var sliderScrollStep = 440;

                sliderLeftArrow.style.opacity = '0';
                sliderContainer.addEventListener('scroll', () => {
                    if (sliderContainer.scrollLeft === 0) {
                        sliderLeftArrow.style.opacity = '0';
                    } else {
                        sliderLeftArrow.style.opacity = '1';
                    }

                    if (sliderContainer.scrollLeft + sliderContainer.clientWidth >= sliderContainer.scrollWidth) {
                        sliderRightArrow.style.opacity = '0';
                    } else {
                        sliderRightArrow.style.opacity = '1';
                    }
                });

                sliderLeftArrow.addEventListener("click", function() {
                    sliderContainer.scrollBy({
                        left: -sliderScrollStep,
                        behavior: 'smooth'
                    });
                });
                sliderRightArrow.addEventListener("click", function() {
                    sliderContainer.scrollBy({
                        left: sliderScrollStep,
                        behavior: 'smooth'
                    });
                });

                if (sliderContainer.scrollWidth > sliderContainer.clientWidth) {
                    sliderLeftArrow.style.display = "block";
                    sliderRightArrow.style.display = "block";
                } else {
                    sliderLeftArrow.style.display = "none";
                    sliderRightArrow.style.display = "none";
                }
            });
        </script>

        <script>
            function removeClassOnMediaQueryBanner(mediaQuery, className) {
                var sliderId = "slider-container-test-container-banner"
                var mainContainer = document.querySelector(`#${sliderId}`);
                var parentElement = mainContainer.parentElement;
                var mediaQueryList = window.matchMedia(mediaQuery);

                function handleMediaQueryChange(event) {
                    if (event.matches) {
                        parentElement.classList.remove(className);
                    } else {
                        parentElement.classList.add(className);
                    }
                }
                handleMediaQueryChange(mediaQueryList);
                mediaQueryList.addEventListener('change', handleMediaQueryChange);
            }

            var mediaQuery = '(max-width: 766px)';
            var classNameToRemove = 't4s-container';
            removeClassOnMediaQueryBanner(mediaQuery, classNameToRemove);
        </script>

    </div>
    <div id="shopify-section-template--16885348434166__1575786c-e189-41b8-bf2e-7d8626ddebe2" class="shopify-section">
        <link rel="stylesheet" href="cdn/shop/t/130/assets/sub-collection-with-slider-common.aio.min.css" media="all">
        <link rel="stylesheet" href="cdn/shop/t/130/assets/common-slider-container.aio.min.css" media="all">
        <div id="slider-container-sub-collection-container" style="padding-top: 10px;padding-bottom: 24px">
            <div class="slider-sub-container">
                <div class="container-icon-back">
                    <span class="back-icon" style="top: 43%; opacity: 0; display: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 20 20" fill="none">
                            <circle cx="10" cy="10" r="10" fill="black" fill-opacity="0.4"></circle>
                            <path d="M13 16L7 10L13 4" stroke="white" stroke-linejoin="round"></path>
                        </svg>
                    </span>
                </div>

                <!-- <style>
                    .setsize{
                        width: 180px;
                    }
                </style> -->

                <div class="main-items-slider " id="subcollection-slider" style="gap: 30px; display: flex;">
                    <?php
                    $sql = mysqli_query($con, "select id,categoryName, categoryImage  from category");
                    while ($row = mysqli_fetch_array($sql)) {
                    ?>

                        <div>
                            <a href=" collections.php?cid=<?= $row['id'] ?>" class="collection-image_wrapper flex">
                                <div class="collection--img handle-overlap">
                                    <img class="t4s-obj-eff subcollection-img collection-image-main lazyautosizes" src="<?php echo "admin/uploads/category/" . $row['categoryImage']; ?>" width="800" height="800" alt="subcollection Abstract Patterns ">
                                    <img class="t4s-lz--fadeIn t4s-obj-eff collection-frame" src="https://cdn.shopify.com/s/files/1/0632/2526/6422/files/Category_Icons-24_1_bb87cf2e-e8b4-45b2-814e-5b9229281d11.png?v=1714742226 " alt="subcollection Fabulous Indian ">
                                </div>
                                <div class="collection--text">
                                    <?php echo $row['categoryName']; ?>
                                </div>
                            </a>
                        </div>

                        <!---->

                    <?php } ?>


                </div>
                <div class="container-icon-next">
                    <span class="next-icon" style="top: 43%; display: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 20 20" fill="none">
                            <circle cx="10" cy="10" r="10" transform="rotate(-180 10 10)" fill="black" fill-opacity="0.4"></circle>
                            <path d="M7 4L13 10L7 16" stroke="white" stroke-linejoin="round"></path>
                        </svg>
                    </span>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var sliderId = "slider-container-sub-collection-container"
                var sliderContainer = document.querySelector(`#${sliderId} .slider-sub-container .main-items-slider`);
                var sliderLeftArrow = document.querySelector(`#${sliderId} .container-icon-back .back-icon`);
                var sliderRightArrow = document.querySelector(`#${sliderId} .container-icon-next .next-icon`);
                var sliderScrollStep = 220;

                sliderLeftArrow.style.opacity = '0';
                sliderContainer.addEventListener('scroll', () => {
                    if (sliderContainer.scrollLeft === 0) {
                        sliderLeftArrow.style.opacity = '0';
                    } else {
                        sliderLeftArrow.style.opacity = '1';
                    }

                    if (sliderContainer.scrollLeft + sliderContainer.clientWidth >= sliderContainer.scrollWidth) {
                        sliderRightArrow.style.opacity = '0';
                    } else {
                        sliderRightArrow.style.opacity = '1';
                    }
                });

                sliderLeftArrow.addEventListener("click", function() {
                    sliderContainer.scrollBy({
                        left: -sliderScrollStep,
                        behavior: 'smooth'
                    });
                });
                sliderRightArrow.addEventListener("click", function() {
                    sliderContainer.scrollBy({
                        left: sliderScrollStep,
                        behavior: 'smooth'
                    });
                });

                if (sliderContainer.scrollWidth > sliderContainer.clientWidth) {
                    sliderLeftArrow.style.display = "block";
                    sliderRightArrow.style.display = "block";
                } else {
                    sliderLeftArrow.style.display = "none";
                    sliderRightArrow.style.display = "none";
                }
            });
        </script>

        <script>
            function removeClassOnMediaQueryBanner(mediaQuery, className) {
                var sliderId = "slider-container-sub-collection-container"
                var mainContainer = document.querySelector(`#${sliderId}`);
                var parentElement = mainContainer.parentElement;
                var mediaQueryList = window.matchMedia(mediaQuery);

                function handleMediaQueryChange(event) {
                    if (event.matches) {
                        parentElement.classList.remove(className);
                    } else {
                        parentElement.classList.add(className);
                    }
                }
                handleMediaQueryChange(mediaQueryList);
                mediaQueryList.addEventListener('change', handleMediaQueryChange);
            }

            var mediaQuery = '(max-width: 766px)';
            var classNameToRemove = 't4s-container';
            removeClassOnMediaQueryBanner(mediaQuery, classNameToRemove);
        </script>
        <script>
            var subCollectionSlider = document.getElementById("subcollection-slider");
            var subCollectionSize = 6
            if (window.innerWidth >= 768 && subCollectionSize < 3) {
                subCollectionSlider.style.display = "none";
            } else if (window.innerWidth >= 768 && subCollectionSize >= 3) {
                subCollectionSlider.style.display = "flex";
            }
        </script>


    </div>
    <section id="shopify-section-template--16885348434166__8c4f56e8-411a-4a0d-9354-cacd75a338f3" class="shopify-section t4s-section t4s-section-all t4s_tp_cdt t4s_tp_cd t4s_tp_istope t4s-banner"><!-- section/banner.liquid -->
        <div class="t4s-section-inner t4s_nt_se_template--16885348434166__8c4f56e8-411a-4a0d-9354-cacd75a338f3 t4s_se_template--16885348434166__8c4f56e8-411a-4a0d-9354-cacd75a338f3 t4s-container-wrap " style="--bg-color: ;--bg-gradient: ;--border-cl: ;--mg-top: ;--mg-right: auto;--mg-bottom: 50px;--mg-left:auto;--pd-top: ;--pd-right: ;--pd-bottom: ;--pd-left: ;--mgtb-top: ;--mgtb-right: auto;--mgtb-bottom: 50px;--mgtb-left: auto;--pdtb-top: ;--pdtb-right: ;--pdtb-bottom: ;--pdtb-left: ;--mgmb-top: ;--mgmb-right: auto;--mgmb-bottom: 30px;--mgmb-left: auto;--pdmb-top: ;--pdmb-right: ;--pdmb-bottom: ;--pdmb-left: ;">
            <div class="t4s-container">
                <div class="t4s-banner-holder isotopet4s t4s_position_8 t4s_cover t4s-equal-height-false t4s-row t4s-gx-md-30 t4s-gy-md-30 t4s-gx-10 t4s-gy-10 isotopet4s-enabled" data-isotopet4s-js="{ &quot;itemSelector&quot;: &quot;.t4s-banner-wrap&quot;, &quot;layoutMode&quot;: &quot;packery&quot; }" style="position: relative; height: 0px;"></div>
            </div>
        </div>
    </section>
    <div id="shopify-section-template--16885348434166__70870fb9-5b83-4cf6-ac46-548496a84657" class="shopify-section t4s-container">
        <style>
            .horizontal_divider {
                margin-top: 2px;
                margin-bottom: 2px;
                max-width: 100%;
                border-bottom: 2px dashed var(--horizontal-section-divider);
                height: 1px;
            }
        </style>
        <hr class="horizontal_divider">

    </div>
    <section id="shopify-section-template--16885348434166__main" class="shopify-section t4s-section t4s-section-main t4s-collection-page t4s_bk_flickity t4s_tp_istope t4s_tp_countdown"><!-- sections/main-collection.liquid -->

        <link href="cdn/shop/t/130/assets/collection-pages.aio.min.css?v=8013305485271043971711313785" rel="stylesheet" type="text/css" media="all">

        <link href="cdn/shop/t/130/assets/collection-products-list.aio.min.css?v=63705346789784507521703745383" rel="stylesheet" type="text/css" media="all">
        <link href="cdn/shop/t/130/assets/pagination.aio.min.css?v=136667778103927277341703745401" rel="stylesheet" type="text/css" media="all">

        <div class="t4s-section-inner t4s_nt_se_template--16885348434166__main t4s_se_template--16885348434166__main t4s-se-container " style="--bg-color: ;--bg-gradient: ;--border-cl: ;--mg-top: ;--mg-right: auto;--mg-bottom: 50px;--mg-left:auto;--pd-top: ;--pd-right: ;--pd-bottom: ;--pd-left: ;--mgtb-top: ;--mgtb-right: auto;--mgtb-bottom: 50px;--mgtb-left: auto;--pdtb-top: ;--pdtb-right: ;--pdtb-bottom: ;--pdtb-left: ;--mgmb-top: ;--mgmb-right: auto;--mgmb-bottom: 20px;--mgmb-left: auto;--pdmb-top: ;--pdmb-right: ;--pdmb-bottom: ;--pdmb-left: ;">
            <div class="t4s-container t4s-plp">
                <h2 class="hide collection--title" style="display:none">Bedsheets</h2>
                <div class="t4s-container-inner  ">
                    <div class="t4s-collection-header t4s-d-flex 4s-align-items-center t4s-collection-header-plp sticky-filter-sort-container">

                        <div class="t4s-btn-filter-wrapper t4s-btn-filter-wrapper-button">
                            <button data-btn-as-a="" class="t4s-btn-filter" data-drawer-options="{ &quot;id&quot;:&quot;#t4s-filter-hidden&quot; }" aria-label="Show filters">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="16" height="16">
                                    <path d="M324.4 64C339.6 64 352 76.37 352 91.63C352 98.32 349.6 104.8 345.2 109.8L240 230V423.6C240 437.1 229.1 448 215.6 448C210.3 448 205.2 446.3 200.9 443.1L124.7 385.6C116.7 379.5 112 370.1 112 360V230L6.836 109.8C2.429 104.8 0 98.32 0 91.63C0 76.37 12.37 64 27.63 64H324.4zM144 224V360L208 408.3V223.1C208 220.1 209.4 216.4 211.1 213.5L314.7 95.1H37.26L140 213.5C142.6 216.4 143.1 220.1 143.1 223.1L144 224zM496 400C504.8 400 512 407.2 512 416C512 424.8 504.8 432 496 432H336C327.2 432 320 424.8 320 416C320 407.2 327.2 400 336 400H496zM320 256C320 247.2 327.2 240 336 240H496C504.8 240 512 247.2 512 256C512 264.8 504.8 272 496 272H336C327.2 272 320 264.8 320 256zM496 80C504.8 80 512 87.16 512 96C512 104.8 504.8 112 496 112H400C391.2 112 384 104.8 384 96C384 87.16 391.2 80 400 80H496z"></path>
                                </svg>Filter</button>
                        </div>


                        <link rel="stylesheet" href="cdn/shop/t/130/assets/base_drop.min.css?v=126664663891124449391695367402" media="all">
                        <div class="t4s-filter_sortby_container">
                            <div class="t4s-dropdown t4s-dropdown__sortby">
                                <button class="sort_by_hidden" data-dropdown-open="" data-position="bottom-end" data-id="t4s__sortby"><span class="t4s-d-none t4s-d-md-block" style="display:none!important">Featured</span><span class="t4s-d-mobile-none t4s-d-none t4s-d-md-block">Sort</span><span class="t4s-d-md-none">Sort</span><svg class="t4s-icon-select-arrow" role="presentation" viewBox="0 0 19 12">
                                        <use xlink:href="#t4s-select-arrow"></use>
                                    </svg></button>
                                <div data-dropdown-wrapper="" class="t4s-dropdown__wrapper mm-sort-box t4s-drawer" id="t4s__sortby">
                                    <div class="t4s-dropdown__header">
                                        <span class="t4s-dropdown__title">Sort by:</span>
                                        <button class="sort-close-icon" data-dropdown-close="" aria-label="Close">
                                            <svg role="presentation" class="t4s-iconsvg-close" viewBox="0 0 16 14">
                                                <path d="M15 0L1 14m14 0L1 0" stroke="currentColor" fill="none" fill-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="t4s-dropdown__content">
                                        <div class="sort-by-radio  is--selected ">
                                            <input type="checkbox" id="myCheckbox__1" class="t4s-checkbox-wrapper" name="sort option" checked="">
                                            <label for="myCheckbox"></label>
                                            <button class="sortPopUpClose" data-dropdown-item="" data-sortby-item="" data-value="manual">
                                                Featured</button>
                                        </div>



                                        <div class="sort-by-radio ">
                                            <input type="checkbox" id="myCheckbox__3" class="t4s-checkbox-wrapper" name="sort option">
                                            <label for="myCheckbox"></label>
                                            <button class="sortPopUpClose" data-dropdown-item="" data-sortby-item="" data-value="title-ascending">
                                                Alphabetically, A-Z</button>
                                        </div>


                                        <div class="sort-by-radio ">
                                            <input type="checkbox" id="myCheckbox__4" class="t4s-checkbox-wrapper" name="sort option">
                                            <label for="myCheckbox"></label>
                                            <button class="sortPopUpClose" data-dropdown-item="" data-sortby-item="" data-value="title-descending">
                                                Alphabetically, Z-A</button>
                                        </div>


                                        <div class="sort-by-radio ">
                                            <input type="checkbox" id="myCheckbox__5" class="t4s-checkbox-wrapper" name="sort option">
                                            <label for="myCheckbox"></label>
                                            <button class="sortPopUpClose" data-dropdown-item="" data-sortby-item="" data-value="price-ascending">
                                                Price, low to high</button>
                                        </div>


                                        <div class="sort-by-radio ">
                                            <input type="checkbox" id="myCheckbox__6" class="t4s-checkbox-wrapper" name="sort option">
                                            <label for="myCheckbox"></label>
                                            <button class="sortPopUpClose" data-dropdown-item="" data-sortby-item="" data-value="price-descending">
                                                Price, high to low</button>
                                        </div>


                                        <div class="sort-by-radio ">
                                            <input type="checkbox" id="myCheckbox__7" class="t4s-checkbox-wrapper" name="sort option">
                                            <label for="myCheckbox"></label>
                                            <button class="sortPopUpClose" data-dropdown-item="" data-sortby-item="" data-value="created-ascending">
                                                Date, old to new</button>
                                        </div>


                                        <div class="sort-by-radio ">
                                            <input type="checkbox" id="myCheckbox__8" class="t4s-checkbox-wrapper" name="sort option">
                                            <label for="myCheckbox"></label>
                                            <button class="sortPopUpClose" data-dropdown-item="" data-sortby-item="" data-value="created-descending">
                                                Date, new to old</button>
                                        </div>

                                        <script>
                                            document.querySelectorAll('.sort-by-radio').forEach(ele => {
                                                ele.addEventListener('click', () => {
                                                    document.querySelectorAll('.sort-by-radio').forEach(e => {
                                                        e.querySelector('.t4s-checkbox-wrapper').checked = false;
                                                    })
                                                    ele.querySelector('.t4s-checkbox-wrapper').checked = true;
                                                })
                                            })
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mm-filter-label vaaree-filter-label_mobile">
                            <div class="collection-filter">

                                <div class="collection-filter__label">

                                    <button class="collection-filter__label-button " attr="blockid_1">
                                        Size
                                    </button>

                                    <button class="collection-filter__label-button  hideFilter " attr="blockid_2">
                                        Product type
                                    </button>

                                    <button class="collection-filter__label-button  hideFilter " attr="blockid_3">
                                        Design Style
                                    </button>

                                    <button class="collection-filter__label-button  hideFilter " attr="blockid_4">
                                        Themes
                                    </button>

                                    <button class="collection-filter__label-button " attr="blockid_5">
                                        Material
                                    </button>

                                    <button class="collection-filter__label-button " attr="blockid_6">
                                        Thread Count Range
                                    </button>

                                    <button class="collection-filter__label-button " attr="blockid_7">
                                        Sub Type
                                    </button>

                                    <button class="collection-filter__label-button  hideFilter " attr="blockid_8">
                                        Price
                                    </button>

                                    <button class="collection-filter__label-button  hideFilter " attr="blockid_9">
                                        GSM Range
                                    </button>

                                    <button class="collection-filter__label-button " attr="blockid_10">
                                        Color
                                    </button>

                                    <button class="collection-filter__label-button  hideFilter " attr="blockid_11">
                                        Availability
                                    </button>

                                    <button class="collection-filter__label-button  hideFilter " attr="blockid_12">
                                        FBV
                                    </button>
                                </div>
                            </div>

                        </div>



                    </div>
                    <div class="t4s-row">
                        <div class="t4s-col-item t4s-col-12 t4s-main-area t4s-main-collection-page is--enabled">
                            <div class="t4s_box_pr_grid t4s-products  t4s-text-default t4s_ratio1_1  t4s_position_default t4s_contain t4s-row  t4s-justify-content-center t4s-row-cols-2 t4s-row-cols-md-3 t4s-row-cols-lg-4 t4s-gx-md-30 t4s-gy-md-10 t4s-gx-15 t4s-gy-4">




                                <?php while ($products = mysqli_fetch_array($ret)) { ?>

                                    <div class="t4s-product t4s-pr-grid t4s-pr-style1 t4s-pr-8195757703414 t4s-col-item is-t4s-pr-created" id="8195757703414" style="position: relative;">

                                        <div class="t4s-product-wrapper">
                                            <div class="t4s-product-inner t4s-pr t4s-oh">
                                                <div class="t4s-product-img t4s_ratio" data-style="--aspect-ratioapt: 1.0">
                                                    <!-- <img data-pr-img=class="t4s-product-main-img lazyautosizes lazyloadt4sed" loading="lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-widths="[100,200,330,400,500,600,700,800,900]" data-optimumx="2" data-sizes="auto" width="800" height="800" alt="Buy Evara Floral Bedsheet - Cream Online in India | Bedsheets" data-srcset="cdn/shop/files/BN1A1188.jpg?v=1697644854&amp;width=100 100w, cdn/shop/files/BN1A1188.jpg?v=1697644854&amp;width=200 200w, cdn/shop/files/BN1A1188.jpg?v=1697644854&amp;width=330 330w, cdn/shop/files/BN1A1188.jpg?v=1697644854&amp;width=400 400w, cdn/shop/files/BN1A1188.jpg?v=1697644854&amp;width=500 500w, cdn/shop/files/BN1A1188.jpg?v=1697644854&amp;width=600 600w, cdn/shop/files/BN1A1188.jpg?v=1697644854&amp;width=700 700w, cdn/shop/files/BN1A1188.jpg?v=1697644854&amp;width=800 800w, cdn/shop/files/BN1A1188.jpg?v=1697644854&amp;width=900 900w" sizes="341px" srcset="cdn/shop/files/BN1A1188.jpg?v=1697644854&amp;width=100 100w, cdn/shop/files/BN1A1188.jpg?v=1697644854&amp;width=200 200w, cdn/shop/files/BN1A1188.jpg?v=1697644854&amp;width=330 330w, cdn/shop/files/BN1A1188.jpg?v=1697644854&amp;width=400 400w, cdn/shop/files/BN1A1188.jpg?v=1697644854&amp;width=500 500w, cdn/shop/files/BN1A1188.jpg?v=1697644854&amp;width=600 600w, cdn/shop/files/BN1A1188.jpg?v=1697644854&amp;width=700 700w, cdn/shop/files/BN1A1188.jpg?v=1697644854&amp;width=800 800w, cdn/shop/files/BN1A1188.jpg?v=1697644854&amp;width=900 900w"> -->
                                                    <img class="t4s-product-main-img" src="admin/productimages/<?php echo htmlentities($products['id']); ?>/<?php echo htmlentities($products['productImage1']); ?>" width="800" height="800" alt="Buy <?php echo htmlentities($row['productName']); ?> EraCreatix online | Beautiful Cocktail Tools Set to choose from">

                                                    <span class="lazyloadt4s-loader"></span>
                                                    <noscript><img class="t4s-product-main-img" loading="lazy" src="cdn/shop/files/BN1A1188.jpg?v=1697644854&width=600" alt="Buy Evara Floral Bedsheet - Cream Online in India | Bedsheets on Vaaree"></noscript>
                                                </div>
                                                <div data-product-badge="" data-sort="sale,new,soldout,preOrder,custom" class="t4s-product-badge"><span data-badge-sale="" class="t4s-badge-item t4s-badge-sale">-30%</span></div>
                                                <div class="t4s-product-btns">
                                                </div>
                                                <div class="t4s-product-btns2">
                                                </div><a data-pr-href="" class="t4s-full-width-link is--href-replaced" href="products.php?pid=<?= $products['id'] ?>" aria-label="Product View"></a>
                                            </div>
                                            <div class="t4s-product-info">
                                                <div class="t4s-product-info__inner">
                                                    <h3 class="t4s-product-title"><a data-pr-href="" href="products.php?pid=<?= $products['id'] ?>" class="is--href-replaced"><?= $products['productName']; ?></a></h3>
                                                    <p class="grid-product__material">
                                                        100% Cotton
                                                        - 200 TC
                                                    </p>
                                                    <div class="t4s-product-price" data-pr-price="" data-product-price="">
                                                        <span class="t4s-price-from"><span class="t4s-price-from">From</span> ₹2,204.00</span><del>₹3,149.00</del>
                                                        <span class="t4s-badge-discountprice">30%Off</span>
                                                    </div>
                                                    <div class="delivery_date_wrapper" id="delivery_date_wrapper_8195757703414" style="display: none;">
                                                        <span class="delivery_date_section">Delivery by</span>
                                                        <span id="t4s-end_delivery_8195757703414" class="delivery_date"></span>
                                                    </div>
                                                    <link href="cdn/shop/t/130/assets/delivery_date_fbv.css" rel="stylesheet" type="text/css" media="all">
                                                    <!-- <div class="delivery-info-fbv delivery-info-fbv-plp" id="delivery_date_wrapper_fbv_8195757703414" style="display: flex;">
                                                        <svg width="51" height="20" viewBox="0 0 51 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="fbv-icon">
                                                            <rect width="50.9091" height="20" rx="10" fill="#E8C463"></rect>
                                                            <path d="M16.7308 5.8277C16.7761 5.63729 16.6317 5.45453 16.436 5.45453H11.0139C10.8748 5.45453 10.7536 5.54916 10.7199 5.68406L10.4926 6.59315C10.4448 6.78441 10.5895 6.96968 10.7866 6.96968H16.2197C16.36 6.96968 16.482 6.87332 16.5145 6.73679L16.7308 5.8277Z" fill="#262727"></path>
                                                            <path d="M25.0608 5.45453C25.2494 5.45453 25.3922 5.62493 25.3591 5.8106L25.1561 6.95279C25.1304 7.09742 25.0046 7.20278 24.8577 7.20278H21.6633C21.5157 7.20278 21.3897 7.30901 21.3646 7.45439L21.1323 8.80378C21.1004 8.98897 21.243 9.15823 21.4309 9.15823H23.4785C23.6678 9.15823 23.8108 9.33003 23.7764 9.51627L23.5775 10.5937C23.551 10.7374 23.4257 10.8417 23.2795 10.8417H21.0151C20.8679 10.8417 20.7419 10.9476 20.7166 11.0926L20.1568 14.2946C20.1314 14.4396 20.0055 14.5454 19.8583 14.5454H18.2597C18.0713 14.5454 17.9286 14.3753 17.9613 14.1897L19.4601 5.70485C19.4857 5.56007 19.6115 5.45453 19.7585 5.45453H25.0608Z" fill="#262727"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M33.2167 7.81143C33.1218 8.34669 32.9016 8.79131 32.5563 9.14528C32.3515 9.3552 32.1224 9.52716 31.869 9.66117C31.73 9.73472 31.7349 10.0187 31.8699 10.0995C32.05 10.2072 32.2054 10.3467 32.3361 10.518C32.5865 10.846 32.7117 11.2302 32.7117 11.6705C32.7117 11.8087 32.6987 11.9425 32.6728 12.072C32.5433 12.8317 32.1721 13.4361 31.5591 13.885C30.9462 14.3253 30.1649 14.5454 29.2152 14.5454H25.3418C25.1533 14.5454 25.0106 14.3753 25.0434 14.1897L26.5421 5.70485C26.5677 5.56007 26.6935 5.45453 26.8405 5.45453H30.6785C31.4987 5.45453 32.1333 5.62288 32.5822 5.95958C33.0311 6.29628 33.2556 6.76248 33.2556 7.35818C33.2556 7.50495 33.2426 7.65603 33.2167 7.81143ZM29.5907 9.14528C29.962 9.14528 30.2598 9.06327 30.4843 8.89924C30.7088 8.7352 30.8469 8.49778 30.8987 8.18698C30.9073 8.13519 30.9116 8.06612 30.9116 7.97978C30.9116 7.72942 30.8296 7.53948 30.6656 7.40998C30.5016 7.27185 30.2598 7.20278 29.9404 7.20278H28.745C28.5976 7.20278 28.4716 7.30883 28.4464 7.45406L28.2148 8.7905C28.1827 8.97579 28.3253 9.14528 28.5134 9.14528H29.5907ZM30.4713 11.7741C30.4886 11.6705 30.4972 11.5928 30.4972 11.541C30.4972 11.2907 30.4066 11.0964 30.2253 10.9583C30.044 10.8115 29.7936 10.7381 29.4742 10.7381H28.1224C27.9755 10.7381 27.8497 10.8436 27.8241 10.9883L27.5689 12.4283C27.536 12.614 27.6787 12.7842 27.8672 12.7842H29.1375C29.5174 12.7842 29.8195 12.6979 30.044 12.5252C30.2685 12.3526 30.4109 12.1022 30.4713 11.7741Z" fill="#262727"></path>
                                                            <path d="M38.2691 11.4707C38.1363 11.7343 37.7435 11.6719 37.6989 11.3802L36.8326 5.71178C36.81 5.56382 36.6827 5.45453 36.533 5.45453H34.7981C34.6095 5.45453 34.4667 5.62499 34.4998 5.81068L36.0106 14.2955C36.0364 14.4401 36.1621 14.5454 36.309 14.5454H38.6443C38.7564 14.5454 38.8593 14.4836 38.9119 14.3846L43.4202 5.89975C43.5275 5.69791 43.3812 5.45453 43.1526 5.45453H41.4865C41.3721 5.45453 41.2674 5.51901 41.2159 5.62122L38.2691 11.4707Z" fill="#262727"></path>
                                                            <path d="M11.3986 9.48854C11.426 9.34571 11.5509 9.24241 11.6963 9.24241H15.6508C15.8436 9.24241 15.9874 9.42019 15.9471 9.60879L15.7528 10.5179C15.7229 10.6577 15.5994 10.7576 15.4564 10.7576H11.5225C11.3323 10.7576 11.1892 10.5844 11.2249 10.3976L11.3986 9.48854Z" fill="#262727"></path>
                                                            <path d="M15.2604 13.3856C15.2929 13.2002 15.1502 13.0303 14.962 13.0303H7.98358C7.84453 13.0303 7.72332 13.1249 7.68959 13.2598L7.46232 14.1689C7.41451 14.3602 7.55916 14.5454 7.7563 14.5454H14.8026C14.9497 14.5454 15.0756 14.4397 15.101 14.2947L15.2604 13.3856Z" fill="#262727"></path>
                                                        </svg>
                                                        <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="thundering-icon">
                                                            <path d="M6.85918 1L0.90918 9.4H5.80918L4.75918 15L10.7092 6.6H5.80918L6.85918 1Z" fill="#E8C463" stroke="#262727" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>

                                                        <span class="t4s-end_delivery-fbv" id="t4s-end_delivery_fbv_8195757703414">Delivery Tomorrow</span>

                                                    </div> -->
                                                    <div id="t4s-end_delivery_8195757703414"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>




                            </div>
                            <div class="t4s-row t4s-prs-footer t4s-has-btn-infinite t4s-text-center">
                                <div class="t4s-pagination-wrapper t4s-w-100 hdt-reveal--offscreen">
                                    <a href="collections.php?cid=<?= $_GET['cid']; ?>&page=<?=$page+1;?>" class="t4s-pr t4s-loadmore-btn t4s-btn-loading__svg t4s-btn t4s-btn-base t4s-btn-style-outline t4s-btn-size-large t4s-btn-icon-false t4s-btn-color-primary t4s-btn-effect-rectangle-out t4s-lm-onscroll-init">
                                        <span class="t4s-btn-atc_text">Load More</span>

                                        <div class="t4s-loading__spinner t4s-dn">
                                            <svg width="16" height="16" aria-hidden="true" focusable="false" role="presentation" class="t4s-svg__spinner" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
                                                <circle class="t4s-path" fill="none" stroke-width="6" cx="33" cy="33" r="30"></circle>
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <aside data-sidebar-content="" class="t4s-col-item t4s-col-12 t4s-col-lg-3 t4s-sidebar t4s-dn">
                            <div class="t4s-loading--bg"></div>
                        </aside>
                    </div>
                    <div id="t4s-desc-collection" class="t4s-desc-collection t4s-desc-before">
                        <h2 data-mce-fragment="1">Transform Your Bedroom with Stylish Vaaree Bedsheets</h2>
                        <p>A dull and boring bedroom doesn’t need a makeover, it just needs a new set of bedsheets to spice up the decor! Bedsheets are no longer just ‘essentials’, they are a key element in brightening your interiors and infusing freshness. How fun is it to just change the sheets and enjoy a new&nbsp;<strong>bedroom</strong>&nbsp;look anytime you want!</p>
                        <p data-mce-fragment="1">Vaaree understands the importance of bedsheets for a good night’s sleep and in maintaining the aesthetics of your pretty bedroom. This is why you should go for&nbsp;<strong>Vaaree bedsheets</strong>&nbsp;online, here you will find a large choice of top&nbsp;<a href="blogs/vaaree-journals/tips-to-pick-the-best-bedsheet-design-for-your-bed" data-mce-href="blogs/vaaree-journals/tips-to-pick-the-best-bedsheet-design-for-your-bed"><strong>bedsheet design</strong></a>&nbsp;to help you decorate your place. Top-notch quality and premium fabric are what we promise you at prices that come as a pleasant surprise. You will love our affordably priced bedsheet collection and the wide range of designs we bring to you!<br></p>
                        <h2 data-mce-fragment="1"><a href="blogs/vaaree-journals/how-to-care-for-your-bedsheets-tips-and-tricks-for-longevity" data-mce-href="blogs/vaaree-journals/how-to-care-for-your-bedsheets-tips-and-tricks-for-longevity" data-mce-fragment="1">How to Care for Your Bed Sheets</a></h2>
                        <p data-mce-fragment="1">We're all aware that bedsheets play an important role in our sleep patterns. But did you know that bedsheets can have an impact on the quality of your skin, hair, and even your health? This is precisely why we prepared this detailed bedding maintenance guide.</p>
                        <h2 data-mce-fragment="1">The Types of Bed Sheets Available at Vaaree</h2>
                        <p data-mce-fragment="1">Besides an eclectic range of bedsheets, Vaaree also offers complete ease of shopping for&nbsp;<a href="blogs/vaaree-journals/luxurious-designer-bed-sheets-adding-elegance-to-your-bedroom-decor" data-mce-href="blogs/vaaree-journals/luxurious-designer-bed-sheets-adding-elegance-to-your-bedroom-decor" data-mce-fragment="1"><strong data-mce-fragment="1">luxurious designer bed sheets</strong></a><strong data-mce-fragment="1">&nbsp;online</strong>. You can browse the collection by style as well as by size making it simpler and time-saving to purchase your desired pattern.</p>
                        <div class="t4s-table-res-df">
                            <table style="max-width: 500px;" width="471" data-mce-style="max-width: 500px;">
                                <tbody>
                                    <tr>
                                        <td width="160">
                                            <p><strong>Exclusive Range</strong></p>
                                        </td>
                                        <td width="321">
                                            <p><strong>Features</strong></p>
                                        </td>
                                        <td width="158">
                                            <p><strong>Price Starting at</strong></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="160">
                                            <p><a href="collections/solid-bedsheet">Solid Bedsheets</a></p>
                                        </td>
                                        <td width="321">
                                            <p>Simplicity and versatility. suit various preferences and bedroom decor styles</p>
                                        </td>
                                        <td width="158">
                                            <p>₹ 398.00</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="160">
                                            <p><a href="collections/abstract-bedsheets">Abstract Bedsheets</a></p>
                                        </td>
                                        <td width="321">
                                            <p>Unconventional patterns, shapes, and color. Its add unique and eye-catching element to your bedroom decor</p>
                                        </td>
                                        <td width="158">
                                            <p>₹ 556.50</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="160">
                                            <p><a href="collections/floral-bedsheet">Floral Bedsheets</a></p>
                                        </td>
                                        <td width="321">
                                            <p>These sheets feature various floral patterns, which can range from subtle and delicate to bold and vibrant.</p>
                                        </td>
                                        <td width="158">
                                            <p>₹ 521.00</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="160">
                                            <p><a href="collections/geometric-bedsheet">Geometric Bedsheets</a></p>
                                        </td>
                                        <td width="321">
                                            <p>These sheet have feature patterns and designs based on geometric shapes, lines, and symmetrical arrangements.</p>
                                        </td>
                                        <td width="158">
                                            <p>₹ 556.50</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="160">
                                            <p><a href="collections/fabulous-indian-prints">Printed Bed Sheets</a></p>
                                        </td>
                                        <td width="321">
                                            <p>These sheet have various decorative patterns and designs that can add a unique and personalized touch to your bedroom decor.</p>
                                        </td>
                                        <td width="158">
                                            <p>₹ 537.00</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="160">
                                            <p><a href="collections/kids">Kids Bedsheets</a></p>
                                        </td>
                                        <td width="321">
                                            <p>Our Kids bedsheets are designed specifically for children and come with features that cater to their needs and preferences.</p>
                                        </td>
                                        <td width="158">
                                            <p>₹ 495.00</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <h2 data-mce-fragment="1">
                            <br data-mce-fragment="1">Some Different Types of Bed Sheets:<br data-mce-fragment="1">
                        </h2>
                        <p>There are various types of bed sheets, each with its own characteristics and materials. Here are some common types:</p>
                        <ol data-mce-fragment="1">
                            <li data-mce-fragment="1">
                                <strong data-mce-fragment="1"></strong><a href="blogs/vaaree-journals/designer-bed-sheets-for-every-season" data-mce-href="blogs/vaaree-journals/designer-bed-sheets-for-every-season" data-mce-fragment="1"><strong data-mce-fragment="1">Seasonal bed sheets</strong></a>
                            </li>
                        </ol>
                        <p data-mce-fragment="1">Seasonal bed sheets are bed linens specifically designed to suit different seasons and weather conditions. These sheets are made from a variety of materials and come in different weights and designs to provide comfort and aesthetic appeal during different times of the year.</p>
                        <ol start="2" data-mce-fragment="1">
                            <li data-mce-fragment="1">
                                <strong data-mce-fragment="1"></strong><a href="blogs/vaaree-journals/jaipuri-bedsheets-adding-ethnic-elegance-to-your-decor" data-mce-href="blogs/vaaree-journals/jaipuri-bedsheets-adding-ethnic-elegance-to-your-decor" data-mce-fragment="1"><strong data-mce-fragment="1">Jaipuri print bedsheets</strong></a>
                            </li>
                        </ol>
                        <p>The gorgeous and vivid cotton Jaipuri bedsheet is inextricably related to traditional bedroom décor. They are unrivaled in terms of colour and ethnic flavour in the bedroom! These bedsheets, which are available in both versatile cotton and inexpensive glace cotton, have a special place in every linen cupboard.</p>
                        <h2 data-mce-fragment="1">Bed Sheet Sizes:</h2>
                        <p>Bedsheet sizes can vary based on factors such as the type of bed and regional standards. Here are some common bedsheet sizes:</p>
                        <ol data-mce-fragment="1">
                            <li data-mce-fragment="1">
                                <strong data-mce-fragment="1"></strong><a href="collections/king-size-bedsheets" data-mce-href="collections/king-size-bedsheets" data-mce-fragment="1"><strong data-mce-fragment="1">King Size Bed Sheets</strong></a>
                            </li>
                        </ol>
                        <p data-mce-fragment="1">Made for beds that spell grandeur. Our king-size bedsheets are just the right size for your mega bed. There is ample fabric to cover the bed and tuck underneath for a smooth fit. For more please check out our&nbsp;<a href="blogs/vaaree-journals/top-10-stylish-king-size-bedsheets-for-a-fashionable-bedroom" data-mce-href="blogs/vaaree-journals/top-10-stylish-king-size-bedsheets-for-a-fashionable-bedroom" data-mce-fragment="1"><strong data-mce-fragment="1">top 10 king size bedsheets for stylish bedroom</strong></a>.</p>
                        <ol start="2" data-mce-fragment="1">
                            <li data-mce-fragment="1">
                                <strong data-mce-fragment="1"></strong><a href="collections/queen-size-bedsheets" data-mce-href="collections/queen-size-bedsheets" data-mce-fragment="1"><strong data-mce-fragment="1">Queen Size Bed Sheets</strong></a>
                            </li>
                        </ol>
                        <p data-mce-fragment="1">Struggling with finding the apt size for a queen bed? Worry not because we have a special range that is made to fit queen-size beds perfectly. For more please check out our&nbsp;<a href="blogs/vaaree-journals/top-5-affordable-queen-size-bedsheets-for-every-home" data-mce-href="blogs/vaaree-journals/top-5-affordable-queen-size-bedsheets-for-every-home" data-mce-fragment="1"><strong data-mce-fragment="1">top 5 affordable queen size bedsheets for every home</strong></a>.</p>
                        <ol start="3" data-mce-fragment="1">
                            <li data-mce-fragment="1">
                                <strong data-mce-fragment="1"></strong><a href="collections/single-size-bedsheets" data-mce-href="collections/single-size-bedsheets" data-mce-fragment="1"><strong data-mce-fragment="1">Bedsheet Single Bed</strong></a>
                            </li>
                        </ol>
                        <p data-mce-fragment="1">Don’t let your single beds feel ignored because we cater abundantly to keeping them nice and pleasing. We also offer&nbsp;<a href="blogs/vaaree-journals/top-10-stylish-single-bedsheets-for-modern-bedrooms" data-mce-href="blogs/vaaree-journals/top-10-stylish-single-bedsheets-for-modern-bedrooms" data-mce-fragment="1"><strong data-mce-fragment="1">stylish single bedsheets for modern bedrooms</strong></a>.</p>
                        <ol start="4" data-mce-fragment="1">
                            <li data-mce-fragment="1"><strong data-mce-fragment="1"> Double Bedsheets:</strong></li>
                        </ol>
                        <p data-mce-fragment="1">For beds that are too small to be called king or queen, a double bedsheet is the answer!</p>
                        <ol start="5" data-mce-fragment="1">
                            <li data-mce-fragment="1"><strong data-mce-fragment="1"> Fitted Bedsheets:</strong></li>
                        </ol>
                        <p data-mce-fragment="1">Tired of the everyday struggles of keeping the bedsheet crease-free? Try our fitted bedsheets that wrap tightly around your mattress in a jiffy and prevent folds.</p>
                        <p data-mce-fragment="1">Please also check how to&nbsp;<a href="blogs/vaaree-journals/how-to-measure-your-mattress-for-the-right-bed-sheet-size" data-mce-href="blogs/vaaree-journals/how-to-measure-your-mattress-for-the-right-bed-sheet-size" data-mce-fragment="1"><strong data-mce-fragment="1">measure for perfect bed sheets: mattress sizing guide</strong></a>.</p>
                        <h2 data-mce-fragment="1">How to Choose the Perfect Bed Sheets</h2>
                        <p data-mce-fragment="1"><a href="blogs/vaaree-journals/tips-for-choosing-the-best-bed-sheets-for-you" data-mce-href="blogs/vaaree-journals/tips-for-choosing-the-best-bed-sheets-for-you" data-mce-fragment="1"><strong data-mce-fragment="1">Choosing the right bed sheets</strong></a>&nbsp;can significantly improve your sleeping experience and overall comfort.</p>
                        <p data-mce-fragment="1">Here are some tips to help you select the best bed sheets for your needs:</p>
                        <ol data-mce-fragment="1">
                            <li data-mce-fragment="1">
                                <strong data-mce-fragment="1">Fabric Choice:</strong> Consider the fabric of the sheets. Common options include cotton (including Egyptian, Pima, or Supima), linen, bamboo, &amp; microfiber. Each material has its unique properties, such as softness, breathability, and durability. Cotton is a popular choice for its comfort and versatility.
                            </li>
                            <li data-mce-fragment="1">
                                <strong data-mce-fragment="1">Thread Count:</strong> Thread count refers to the number of threads woven into one square inch of fabric. Contrary to popular belief, higher thread count doesn't always mean better quality. A range of 200 to 800 thread count is usually sufficient for most people. Too high a thread count might mean the sheets are tightly woven and less breathable.
                            </li>
                            <li data-mce-fragment="1">
                                <strong data-mce-fragment="1">Weave Type:&nbsp;</strong>Different weave types can affect the feel and performance of the sheets. Common weaves include percale (crisp and cool), sateen (smooth and luxurious), and twill (durable and wrinkle-resistant). Choose the one that matches your preferences.
                            </li>
                            <li data-mce-fragment="1">
                                <strong data-mce-fragment="1">Fiber Quality:&nbsp;</strong>If you opt for cotton sheets, pay attention to fibre quality. Long-staple cotton, like Egyptian or Pima, tends to be softer &amp; more durable than short-staple cotton.
                            </li>
                            <li data-mce-fragment="1">
                                <strong data-mce-fragment="1">Fit and Size:</strong> Ensure you choose the correct sheet size that matches your mattress dimensions. Sheets that fit properly will stay in place and not bunch up during the night.
                            </li>
                        </ol>
                        <p data-mce-fragment="1">By considering these factors, you'll be better equipped to choose bed sheets that cater to your comfort &amp; sleep needs.</p>
                        <h2 data-mce-fragment="1">Elevate Your Sleep Experience with Vaaree's Premium Cotton Bedsheets</h2>
                        <p data-mce-fragment="1">The truly&nbsp;<strong data-mce-fragment="1">luxury bedsheets</strong>&nbsp;are always crafted in pure cotton because no other fabric can match its breathability and lasting softness. For your convenience, each bedsheet at the Vaaree store also comes with a softness meter that tells you its thread count so you can assess the degree of softness. To sum it up, we are the&nbsp;<strong data-mce-fragment="1">cotton bed sheets</strong>&nbsp;specialists and the online store where you would love to shop!</p>
                        <style>
                            <!--
                            table,
                            td,
                            th {
                                border: 1px solid black;
                            }

                            table {
                                border-collapse: collapse;
                                width: 50%;
                            }

                            td {
                                text-align: center;
                            }
                            -->
                        </style>
                        <h2 style="text-align: left;" data-mce-style="text-align: left;">Designer Bed Sheet Price Lists</h2>
                        <p>Add your preferred bed sheets to your shopping cart at our online store. Here's a quick look at bed sheet pricing:</p>
                        <div class="t4s-table-res-df">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p><b>Bed Sheets</b></p>
                                        </td>
                                        <td>
                                            <p><b>Price (Rs.)</b></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><a href="products/floral-stories-bedsheet"><span style="font-weight: 400;" data-mce-style="font-weight: 400;">Floral Stories Bedsheet</span></a></p>
                                        </td>
                                        <td>
                                            <p><span style="font-weight: 400;" data-mce-style="font-weight: 400;">₹ 837.00</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><a href="products/big-tide-bedsheet"><span style="font-weight: 400;" data-mce-style="font-weight: 400;">Big Tide Bedsheet</span></a></p>
                                        </td>
                                        <td>
                                            <p><span style="font-weight: 400;" data-mce-style="font-weight: 400;">₹ 910.00</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><a href="products/doddled-blossoms-bedsheet"><span style="font-weight: 400;" data-mce-style="font-weight: 400;">Doddled Blossoms Bedsheet</span></a></p>
                                        </td>
                                        <td>
                                            <p><span style="font-weight: 400;" data-mce-style="font-weight: 400;">₹ 1,499.00</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><a href="products/trance-lines-abstract-bedsheet"><span style="font-weight: 400;" data-mce-style="font-weight: 400;">Trance Lines Abstract Bedsheet</span></a></p>
                                        </td>
                                        <td>
                                            <p><span style="font-weight: 400;" data-mce-style="font-weight: 400;">₹ 939.00</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><a href="products/floral-splatter-bedsheet"><span style="font-weight: 400;" data-mce-style="font-weight: 400;">Floral Splatter Bedsheet</span></a></p>
                                        </td>
                                        <td>
                                            <p><span style="font-weight: 400;" data-mce-style="font-weight: 400;">₹ 910.00</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><a href="products/endless-spring-bedsheet"><span style="font-weight: 400;" data-mce-style="font-weight: 400;">Endless Spring Bedsheet</span></a></p>
                                        </td>
                                        <td>
                                            <p><span style="font-weight: 400;" data-mce-style="font-weight: 400;">₹ 1,364.00</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><a href="products/striped-wonder-bedsheet-green"><span style="font-weight: 400;" data-mce-style="font-weight: 400;">Striped Wonder Bedsheet - Green</span></a></p>
                                        </td>
                                        <td>
                                            <p><span style="font-weight: 400;" data-mce-style="font-weight: 400;">₹ 1,000.00</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><a href="products/traditionally-tuskan-bedsheet-blue"><span style="font-weight: 400;" data-mce-style="font-weight: 400;">Traditionally Tuskan Bedsheet - Blue</span></a></p>
                                        </td>
                                        <td>
                                            <p><span style="font-weight: 400;" data-mce-style="font-weight: 400;">₹ 997.50</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><a href="products/mughal-muse-bedsheet"><span style="font-weight: 400;" data-mce-style="font-weight: 400;">Mughal Muse Bedsheet</span></a></p>
                                        </td>
                                        <td>
                                            <p><span style="font-weight: 400;" data-mce-style="font-weight: 400;">₹ 837.00</span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><a href="products/pristine-in-white-bedsheet"><span style="font-weight: 400;" data-mce-style="font-weight: 400;">Pristine in White Bedsheet</span></a></p>
                                        </td>
                                        <td>
                                            <p><span style="font-weight: 400;" data-mce-style="font-weight: 400;">₹ 1,364.00</span></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <h2 style="text-align: left;" data-mce-style="text-align: left;"></h2>
                        <h2 style="text-align: left;" data-mce-style="text-align: left;"></h2>
                        <h2 style="text-align: left;" data-mce-style="text-align: left;">Frequently Asked Questions</h2>
                        <h3 style="text-align: left;" data-mce-style="text-align: left;" data-mce-fragment="1">1. Which Bedsheets Colours Are Available At Vaaree?</h3>
                        <p style="text-align: left;" data-mce-style="text-align: left;" data-mce-fragment="1">If you choose to&nbsp;<strong data-mce-fragment="1">buy bedsheets online</strong>&nbsp;at Vaaree, the world is your oyster – both in terms of designs and colours. Whether you are looking for dark tones like black bedsheets or neutral hues like brown or beige bedsheet, you name the colour and we promise you’d find it here!</p>
                        <h3 style="text-align: left;" data-mce-style="text-align: left;" data-mce-fragment="1">2. How do you choose good bed sheets?</h3>
                        <p style="text-align: left;" data-mce-style="text-align: left;" data-mce-fragment="1">Good bedsheets are usually determined on the basis of material &amp; thread count. Higher the thread count, softer is the bedsheet. Thus, comes better comfort and best sleep! Likewise, cotton bedsheets are accounted good and are preferred over others due to its soft skin-feel &amp; breathability quotient. Other than this, bedsheets that look good obviously make good bedsheets!</p>
                        <h3 style="text-align: left;" data-mce-style="text-align: left;" data-mce-fragment="1">3. What type of material is best for bedsheets?</h3>
                        <p style="text-align: left;" data-mce-style="text-align: left;" data-mce-fragment="1">Bedsheets are made from many different materials. And not to brag, but you’d find all of them at Vaaree! A few types of bedsheet materials include:</p>
                        <ul style="text-align: left;" data-mce-style="text-align: left;" data-mce-fragment="1">
                            <li data-mce-fragment="1"><strong data-mce-fragment="1">Cotton bed sheets</strong></li>
                            <li data-mce-fragment="1"><strong data-mce-fragment="1">Silk bedsheets</strong></li>
                            <li data-mce-fragment="1"><strong data-mce-fragment="1">Polyester bedsheets</strong></li>
                            <li data-mce-fragment="1"><strong data-mce-fragment="1">Satin bedsheets</strong></li>
                            <li data-mce-fragment="1"><strong data-mce-fragment="1">Bamboo bedsheets</strong></li>
                            <li data-mce-fragment="1"><strong data-mce-fragment="1">Modal bedsheets</strong></li>
                            <li data-mce-fragment="1">
                                <strong data-mce-fragment="1">Blended bedsheets</strong>– Made from a mix of two or more different materials.
                            </li>
                        </ul>
                        <h3 style="text-align: left;" data-mce-style="text-align: left;" data-mce-fragment="1">4. How to Care For Your Bedsheets?</h3>
                        <p style="text-align: left;" data-mce-style="text-align: left;" data-mce-fragment="1"><a href="blogs/vaaree-journals/how-to-care-for-your-bedsheets-tips-and-tricks-for-longevity" data-mce-href="blogs/vaaree-journals/how-to-care-for-your-bedsheets-tips-and-tricks-for-longevity" data-mce-fragment="1"><strong data-mce-fragment="1">Caring for your bedsheets</strong></a>&nbsp;properly can help extend their lifespan and keep them in excellent condition. Here are some tips on how to care for your bedsheets:</p>
                        <ul style="text-align: left;" data-mce-style="text-align: left;" data-mce-fragment="1">
                            <li data-mce-fragment="1">Washing Frequency</li>
                            <li data-mce-fragment="1">Sort and Separate</li>
                            <li data-mce-fragment="1">Read Care Labels</li>
                            <li data-mce-fragment="1">Use Mild Detergents</li>
                            <li data-mce-fragment="1">Avoid Bleach</li>
                            <li data-mce-fragment="1">Wash in Cold Water</li>
                            <li data-mce-fragment="1">Store Properly</li>
                            <li data-mce-fragment="1">Keep Pets Away</li>
                        </ul>
                        <h3 style="text-align: left;" data-mce-style="text-align: left;" data-mce-fragment="1">5. How do I care for my bedsheets to make them last longer?</h3>
                        <p style="text-align: left;" data-mce-style="text-align: left;" data-mce-fragment="1">To extend the lifespan of your bedsheets, follow these tips:</p>
                        <ul data-mce-fragment="1">
                            <li style="text-align: left;" data-mce-style="text-align: left;" data-mce-fragment="1">Wash them with similar colours on a gentle cycle.</li>
                            <li style="text-align: left;" data-mce-style="text-align: left;" data-mce-fragment="1">Avoid using harsh detergents or bleach.</li>
                            <li style="text-align: left;" data-mce-style="text-align: left;" data-mce-fragment="1">Tumble dry on low heat or line dry to prevent damage.</li>
                            <li style="text-align: left;" data-mce-style="text-align: left;" data-mce-fragment="1">Iron on low heat if necessary, and avoid excessive heat.</li>
                        </ul>
                        <h3>6. Where do I find the best bed sheets near me?</h3>
                        <p><span style="font-weight: 400;">You can find the best bed sheets at Vaaree, we have bedsheets in a multitude of designs in unique colors, patterns, and sizes. Whether you're into the timeless charm of florals, the classic appeal of stripes, the cultural vibes of ethnic patterns, or even if you're on the lookout for the perfect </span><a href="collections/kids-bedsheets"><b>kids' bedsheet</b></a><span style="font-weight: 400;"> – Vaaree has it all.</span></p>
                        <h3>7. How to find the best bed sheets in affordable prices?</h3>
                        <p><span style="font-weight: 400;">Vaaree is just the platform where you can find high-quality bedsheets at affordable prices in different colors patterns and sizes. We have got an extensive collection of high-quality cozy bedsheets at the lowest prices.</span></p>
                        <h3>8. Where to buy bed sheets for special occasions?</h3>
                        <p><span style="font-weight: 400;">Whether it's a festive celebration, a special anniversary, or a joyous occasion, Vaaree has high-quality and cozy bedsheets that suit every mood and style.</span></p>
                        <script type="application/ld+json">
                            {
                                "@context": "https://schema.org",
                                "@type": "FAQPage",
                                "mainEntity": [{
                                    "@type": "Question",
                                    "name": "Which Bedsheets Colours Are Available At Vaaree?",
                                    "acceptedAnswer": {
                                        "@type": "Answer",
                                        "text": "If you choose to buy bedsheets online at Vaaree, the world is your oyster – both in terms of designs and colours. Whether you are looking for dark tones like black bedsheets or neutral hues like brown or beige bedsheet, you name the colour and we promise you’d find it here!"
                                    }
                                }, {
                                    "@type": "Question",
                                    "name": "How do you choose good bed sheets?",
                                    "acceptedAnswer": {
                                        "@type": "Answer",
                                        "text": "Good bedsheets are usually determined on the basis of material & thread count. Higher the thread count, softer is the bedsheet. Thus, comes better comfort and best sleep! Likewise, cotton bedsheets are accounted good and are preferred over others due to its soft skin-feel & breathability quotient. Other than this, bedsheets that look good obviously make good bedsheets!"
                                    }
                                }, {
                                    "@type": "Question",
                                    "name": "What type of material is best for bedsheets?",
                                    "acceptedAnswer": {
                                        "@type": "Answer",
                                        "text": "Bedsheets are made from many different materials. And not to brag, but you’d find all of them at Vaaree! A few types of bedsheet materials include:•
                                        Cotton bed sheets• Silk bedsheets• Polyester bedsheets• Satin bedsheets• Bamboo bedsheets• Modal bedsheets• Blended bedsheets– Made from a mix of two or more different materials.
                                        "
                                    }
                                }, {
                                    "@type": "Question",
                                    "name": "How to Care For Your Bedsheets?",
                                    "acceptedAnswer": {
                                        "@type": "Answer",
                                        "text": "Caring for your bedsheets properly can help extend their lifespan and keep them in excellent condition. Here are some tips on how to care for your bedsheets:•
                                        Washing Frequency• Sort and Separate• Read Care Labels• Use Mild Detergents• Avoid Bleach• Wash in Cold Water• Store Properly• Keep Pets Away "
                                    }
                                }, {
                                    "@type": "Question",
                                    "name": "How do I care for my bedsheets to make them last longer?",
                                    "acceptedAnswer": {
                                        "@type": "Answer",
                                        "text": "To extend the lifespan of your bedsheets, follow these tips:•
                                        Wash them with similar colours on a gentle cycle.•Avoid using harsh detergents or bleach.•Tumble dry on low heat or line dry to prevent damage.•Iron on low heat
                                        if necessary,
                                        and avoid excessive heat.
                                        "
                                    }
                                }]
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <link href="cdn/shop/t/130/assets/fbv-info-popup.css?v=126841595900428484791714538258" rel="stylesheet" type="text/css" media="all">
        <div class="fbv-info-container" id="fbv-info-container">
            <div class="popup-header popup-header-mob">
                <div></div>
                <div class="rectangle"></div>
                <div class="popup-close-button" id="fbv-popup-close-button-mob">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 14 14" fill="none">
                        <path d="M1 1L13 13" stroke="#7A7A7A" stroke-width="1" stroke-linecap="round"></path>
                        <path d="M13 1L0.999999 13" stroke="#7A7A7A" stroke-width="1" stroke-linecap="round"></path>
                    </svg>

                </div>
            </div>
            <div class="popup-header popup-header-desk">
                <div class="fbv_icon_text">
                    <svg width="51" height="20" viewBox="0 0 51 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="fbv-icon">
                        <rect width="50.9091" height="20" rx="10" fill="#E8C463"></rect>
                        <path d="M16.7308 5.8277C16.7761 5.63729 16.6317 5.45453 16.436 5.45453H11.0139C10.8748 5.45453 10.7536 5.54916 10.7199 5.68406L10.4926 6.59315C10.4448 6.78441 10.5895 6.96968 10.7866 6.96968H16.2197C16.36 6.96968 16.482 6.87332 16.5145 6.73679L16.7308 5.8277Z" fill="#262727"></path>
                        <path d="M25.0608 5.45453C25.2494 5.45453 25.3922 5.62493 25.3591 5.8106L25.1561 6.95279C25.1304 7.09742 25.0046 7.20278 24.8577 7.20278H21.6633C21.5157 7.20278 21.3897 7.30901 21.3646 7.45439L21.1323 8.80378C21.1004 8.98897 21.243 9.15823 21.4309 9.15823H23.4785C23.6678 9.15823 23.8108 9.33003 23.7764 9.51627L23.5775 10.5937C23.551 10.7374 23.4257 10.8417 23.2795 10.8417H21.0151C20.8679 10.8417 20.7419 10.9476 20.7166 11.0926L20.1568 14.2946C20.1314 14.4396 20.0055 14.5454 19.8583 14.5454H18.2597C18.0713 14.5454 17.9286 14.3753 17.9613 14.1897L19.4601 5.70485C19.4857 5.56007 19.6115 5.45453 19.7585 5.45453H25.0608Z" fill="#262727"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M33.2167 7.81143C33.1218 8.34669 32.9016 8.79131 32.5563 9.14528C32.3515 9.3552 32.1224 9.52716 31.869 9.66117C31.73 9.73472 31.7349 10.0187 31.8699 10.0995C32.05 10.2072 32.2054 10.3467 32.3361 10.518C32.5865 10.846 32.7117 11.2302 32.7117 11.6705C32.7117 11.8087 32.6987 11.9425 32.6728 12.072C32.5433 12.8317 32.1721 13.4361 31.5591 13.885C30.9462 14.3253 30.1649 14.5454 29.2152 14.5454H25.3418C25.1533 14.5454 25.0106 14.3753 25.0434 14.1897L26.5421 5.70485C26.5677 5.56007 26.6935 5.45453 26.8405 5.45453H30.6785C31.4987 5.45453 32.1333 5.62288 32.5822 5.95958C33.0311 6.29628 33.2556 6.76248 33.2556 7.35818C33.2556 7.50495 33.2426 7.65603 33.2167 7.81143ZM29.5907 9.14528C29.962 9.14528 30.2598 9.06327 30.4843 8.89924C30.7088 8.7352 30.8469 8.49778 30.8987 8.18698C30.9073 8.13519 30.9116 8.06612 30.9116 7.97978C30.9116 7.72942 30.8296 7.53948 30.6656 7.40998C30.5016 7.27185 30.2598 7.20278 29.9404 7.20278H28.745C28.5976 7.20278 28.4716 7.30883 28.4464 7.45406L28.2148 8.7905C28.1827 8.97579 28.3253 9.14528 28.5134 9.14528H29.5907ZM30.4713 11.7741C30.4886 11.6705 30.4972 11.5928 30.4972 11.541C30.4972 11.2907 30.4066 11.0964 30.2253 10.9583C30.044 10.8115 29.7936 10.7381 29.4742 10.7381H28.1224C27.9755 10.7381 27.8497 10.8436 27.8241 10.9883L27.5689 12.4283C27.536 12.614 27.6787 12.7842 27.8672 12.7842H29.1375C29.5174 12.7842 29.8195 12.6979 30.044 12.5252C30.2685 12.3526 30.4109 12.1022 30.4713 11.7741Z" fill="#262727"></path>
                        <path d="M38.2691 11.4707C38.1363 11.7343 37.7435 11.6719 37.6989 11.3802L36.8326 5.71178C36.81 5.56382 36.6827 5.45453 36.533 5.45453H34.7981C34.6095 5.45453 34.4667 5.62499 34.4998 5.81068L36.0106 14.2955C36.0364 14.4401 36.1621 14.5454 36.309 14.5454H38.6443C38.7564 14.5454 38.8593 14.4836 38.9119 14.3846L43.4202 5.89975C43.5275 5.69791 43.3812 5.45453 43.1526 5.45453H41.4865C41.3721 5.45453 41.2674 5.51901 41.2159 5.62122L38.2691 11.4707Z" fill="#262727"></path>
                        <path d="M11.3986 9.48854C11.426 9.34571 11.5509 9.24241 11.6963 9.24241H15.6508C15.8436 9.24241 15.9874 9.42019 15.9471 9.60879L15.7528 10.5179C15.7229 10.6577 15.5994 10.7576 15.4564 10.7576H11.5225C11.3323 10.7576 11.1892 10.5844 11.2249 10.3976L11.3986 9.48854Z" fill="#262727"></path>
                        <path d="M15.2604 13.3856C15.2929 13.2002 15.1502 13.0303 14.962 13.0303H7.98358C7.84453 13.0303 7.72332 13.1249 7.68959 13.2598L7.46232 14.1689C7.41451 14.3602 7.55916 14.5454 7.7563 14.5454H14.8026C14.9497 14.5454 15.0756 14.4397 15.101 14.2947L15.2604 13.3856Z" fill="#262727"></path>
                    </svg>
                    <span class="info-text">Fulfilled By VAAREE</span>
                </div>
                <div class="popup-close-button" id="fbv-popup-close-button-desk">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 14 14" fill="none">
                        <path d="M1 1L13 13" stroke="#7A7A7A" stroke-width="1" stroke-linecap="round"></path>
                        <path d="M13 1L0.999999 13" stroke="#7A7A7A" stroke-width="1" stroke-linecap="round"></path>
                    </svg>

                </div>
            </div>
            <div class="fbv_icon_text fbv_icon_text-mob">
                <svg width="51" height="20" viewBox="0 0 51 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="fbv-icon">
                    <rect width="50.9091" height="20" rx="10" fill="#E8C463"></rect>
                    <path d="M16.7308 5.8277C16.7761 5.63729 16.6317 5.45453 16.436 5.45453H11.0139C10.8748 5.45453 10.7536 5.54916 10.7199 5.68406L10.4926 6.59315C10.4448 6.78441 10.5895 6.96968 10.7866 6.96968H16.2197C16.36 6.96968 16.482 6.87332 16.5145 6.73679L16.7308 5.8277Z" fill="#262727"></path>
                    <path d="M25.0608 5.45453C25.2494 5.45453 25.3922 5.62493 25.3591 5.8106L25.1561 6.95279C25.1304 7.09742 25.0046 7.20278 24.8577 7.20278H21.6633C21.5157 7.20278 21.3897 7.30901 21.3646 7.45439L21.1323 8.80378C21.1004 8.98897 21.243 9.15823 21.4309 9.15823H23.4785C23.6678 9.15823 23.8108 9.33003 23.7764 9.51627L23.5775 10.5937C23.551 10.7374 23.4257 10.8417 23.2795 10.8417H21.0151C20.8679 10.8417 20.7419 10.9476 20.7166 11.0926L20.1568 14.2946C20.1314 14.4396 20.0055 14.5454 19.8583 14.5454H18.2597C18.0713 14.5454 17.9286 14.3753 17.9613 14.1897L19.4601 5.70485C19.4857 5.56007 19.6115 5.45453 19.7585 5.45453H25.0608Z" fill="#262727"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M33.2167 7.81143C33.1218 8.34669 32.9016 8.79131 32.5563 9.14528C32.3515 9.3552 32.1224 9.52716 31.869 9.66117C31.73 9.73472 31.7349 10.0187 31.8699 10.0995C32.05 10.2072 32.2054 10.3467 32.3361 10.518C32.5865 10.846 32.7117 11.2302 32.7117 11.6705C32.7117 11.8087 32.6987 11.9425 32.6728 12.072C32.5433 12.8317 32.1721 13.4361 31.5591 13.885C30.9462 14.3253 30.1649 14.5454 29.2152 14.5454H25.3418C25.1533 14.5454 25.0106 14.3753 25.0434 14.1897L26.5421 5.70485C26.5677 5.56007 26.6935 5.45453 26.8405 5.45453H30.6785C31.4987 5.45453 32.1333 5.62288 32.5822 5.95958C33.0311 6.29628 33.2556 6.76248 33.2556 7.35818C33.2556 7.50495 33.2426 7.65603 33.2167 7.81143ZM29.5907 9.14528C29.962 9.14528 30.2598 9.06327 30.4843 8.89924C30.7088 8.7352 30.8469 8.49778 30.8987 8.18698C30.9073 8.13519 30.9116 8.06612 30.9116 7.97978C30.9116 7.72942 30.8296 7.53948 30.6656 7.40998C30.5016 7.27185 30.2598 7.20278 29.9404 7.20278H28.745C28.5976 7.20278 28.4716 7.30883 28.4464 7.45406L28.2148 8.7905C28.1827 8.97579 28.3253 9.14528 28.5134 9.14528H29.5907ZM30.4713 11.7741C30.4886 11.6705 30.4972 11.5928 30.4972 11.541C30.4972 11.2907 30.4066 11.0964 30.2253 10.9583C30.044 10.8115 29.7936 10.7381 29.4742 10.7381H28.1224C27.9755 10.7381 27.8497 10.8436 27.8241 10.9883L27.5689 12.4283C27.536 12.614 27.6787 12.7842 27.8672 12.7842H29.1375C29.5174 12.7842 29.8195 12.6979 30.044 12.5252C30.2685 12.3526 30.4109 12.1022 30.4713 11.7741Z" fill="#262727"></path>
                    <path d="M38.2691 11.4707C38.1363 11.7343 37.7435 11.6719 37.6989 11.3802L36.8326 5.71178C36.81 5.56382 36.6827 5.45453 36.533 5.45453H34.7981C34.6095 5.45453 34.4667 5.62499 34.4998 5.81068L36.0106 14.2955C36.0364 14.4401 36.1621 14.5454 36.309 14.5454H38.6443C38.7564 14.5454 38.8593 14.4836 38.9119 14.3846L43.4202 5.89975C43.5275 5.69791 43.3812 5.45453 43.1526 5.45453H41.4865C41.3721 5.45453 41.2674 5.51901 41.2159 5.62122L38.2691 11.4707Z" fill="#262727"></path>
                    <path d="M11.3986 9.48854C11.426 9.34571 11.5509 9.24241 11.6963 9.24241H15.6508C15.8436 9.24241 15.9874 9.42019 15.9471 9.60879L15.7528 10.5179C15.7229 10.6577 15.5994 10.7576 15.4564 10.7576H11.5225C11.3323 10.7576 11.1892 10.5844 11.2249 10.3976L11.3986 9.48854Z" fill="#262727"></path>
                    <path d="M15.2604 13.3856C15.2929 13.2002 15.1502 13.0303 14.962 13.0303H7.98358C7.84453 13.0303 7.72332 13.1249 7.68959 13.2598L7.46232 14.1689C7.41451 14.3602 7.55916 14.5454 7.7563 14.5454H14.8026C14.9497 14.5454 15.0756 14.4397 15.101 14.2947L15.2604 13.3856Z" fill="#262727"></path>
                </svg>
                <span class="info-text">Fulfilled By VAAREE</span>
            </div>
            <div class="popup-content">
                FBV products are quality checked, packed and dispatched by Vaaree at a faster pace. At Vaaree, we take pride in offering free and fast delivery to ensure your shopping experience is nothing short of exceptional.
            </div>
        </div>
        <script src="cdn/shop/t/130/assets/fbv-info-popup.js?v=27897902727689366131711313788"></script>





        <script>
            //Tagname to be used in facets  
            var fbv_tag = "FBV"
            let quickAccessBtn = document.querySelectorAll('.collection-filter__label-button');
            if (quickAccessBtn.length > 0) {
                quickAccessBtn.forEach((button, index) => {
                    button.addEventListener("click", function(e) {
                        let blockid = '#' + this.getAttribute("attr");
                        $('.t4s-btn-filter').click();
                        $('.t4s-facet').removeAttr('open');
                        $(blockid).attr('open', 'open');
                    });
                });
            }

            var layoutSwitchElement = document.querySelector('.t4s-layout-switch-wrapper');
            if (layoutSwitchElement && layoutSwitchElement.parentNode.firstChild === layoutSwitchElement && window.innerWidth < 768) {
                var sortContainer = document.querySelector('.t4s-filter_sortby_container');
                if (sortContainer) {
                    sortContainer.style.marginLeft = 'calc(0.5 * var(--ts-gutter-x, 3rem))';
                }
            }

            function openSidebarFilters(e) {
                let blockid = '#' + e.getAttribute("attr");
                $('.t4s-btn-filter').click();
                $('.t4s-facet').removeAttr('open');
                $(blockid).attr('open', 'open');
            }

            document.addEventListener("DOMContentLoaded", () => {
                window.addEventListener('popstate', function(event) {
                    var cartOpen = document.getElementById("t4s-mini_cart").getAttribute("aria-hidden") === "false";
                    if (cartOpen) {
                        window.location.reload();
                    }
                });
            });
        </script>
    </section>
    <div id="shopify-section-template--16885348434166__1659008312974b87a5" class="shopify-section">

        <div id="shopify-block-349ea41e-7a59-4a82-bc13-763405c76627" class="shopify-block shopify-app-block">
            <div style="margin:0 auto;max-width:1080px;">
                <div class="jdgm-carousel-wrapper">
                    <div class="jdgm-carousel-title-and-link">
                        <h2 class="jdgm-carousel-title">Hear from our customers</h2>
                        <span class="jdgm-all-reviews-rating-wrapper" href="javascript:void(0)">
                            <span style="display:block" data-score="4.28" class="jdgm-all-reviews-rating" aria-label="4.28 stars" tabindex="0" role="img"><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--half"></span></span>
                            <span style="display: block" class="jdgm-carousel-number-of-reviews" data-number-of-reviews="8803"><a target="_blank" href="https://judge.me/reviews/vaareehome">from 8803 reviews</a></span>
                        </span>
                    </div>
                    <section class="jdgm-widget jdgm-carousel jdgm-carousel--default-theme jdgm-carousel--done" data-widget-name="carousel" data-impressions-tracked="true" data-arrows-on-sides="true">
                        <style>
                            .jdgm-carousel {
                                display: none
                            }
                        </style>
                        <style>
                            .jdgm-xx {
                                left: 0
                            }

                            .jdgm-carousel-title-and-link {
                                width: calc(100% - 81px);
                                margin: 0 auto 24px auto
                            }

                            .jdgm-carousel-wrapper .jdgm-widget.jdgm-carousel {
                                width: calc(100% - 81px);
                                margin: 0 auto
                            }

                            .jdgm-carousel-wrapper .jdgm-carousel__left-arrow {
                                float: left;
                                margin-left: -25px;
                                margin-top: -150.0px
                            }

                            .jdgm-carousel-wrapper .jdgm-carousel__right-arrow {
                                float: right;
                                margin-right: -25px;
                                margin-top: -150.0px
                            }

                            @media only screen and (min-width: 991px) {
                                .jdgm-carousel-wrapper .jdgm-carousel-item {
                                    width: 20.0%
                                }
                            }

                            .jdgm-carousel-item__timestamp {
                                display: none !important
                            }

                            .jdgm-carousel-item__product-title {
                                display: none !important
                            }

                            .jdgm-carousel-wrapper .jdgm-carousel-item__review {
                                height: calc(72% - 1.4em)
                            }
                        </style>
                        <div class="jdgm-carousel__item-container">
                            <div class="jdgm-carousel__item-wrapper" style="font-size: 0px; transform: translate3d(0px, 0px, 0px);">
                                <div class="jdgm-carousel-item " data-review-id="07885e6f-863b-4794-b261-39dcf3acbdab" style="font-size: 14px;">
                                    <div class="jdgm-carousel-item__review">
                                        <div class="jdgm-carousel-item__review-rating" tabindex="0" aria-label="5 stars" role="img"> <span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span> </div>
                                        <div class="jdgm-carousel-item__review-content">
                                            <div class="jdgm-carousel-item__review-title jdgm-line-clamp" style="-webkit-line-clamp: 1;">Cooltrex glass mug</div>
                                            <div class="jdgm-carousel-item__review-body">
                                                <p>Very good mugs. The mug is so light. I like mugs with a reasonable amount of capacity. Perfect for my taste.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jdgm-carousel-item__reviewer-name-wrapper">
                                        <div class="jdgm-carousel-item__reviewer-name jdgm-ellipsis"> s.S. </div>
                                        <div class="jdgm-carousel-item__timestamp jdgm-ellipsis" data-time="04/28/2024">6 days ago</div>
                                    </div> <a class="jdgm-carousel-item__product jdgm--shop-review-has-image" href="/products/cooltrex-glass-mug-round-set-of-two#judgeme_product_reviews"> <img class="jdgm-carousel-item__product-image" alt="Cooltrex Glass Mug (Round) - Set Of Two" data-src="https://cdn.shopify.com/s/files/1/0632/2526/6422/files/0002_GPZB212-250-2_1_70x70.jpg?v=1685669409" data-src-retina="https://cdn.shopify.com/s/files/1/0632/2526/6422/files/0002_GPZB212-250-2_1_140x140.jpg?v=1685669409">
                                        <div class="jdgm-carousel-item__product-title jdgm-ellipsis"> Cooltrex Glass Mug (Round) - Set Of Two </div>
                                    </a>
                                </div>
                                <div class="jdgm-carousel-item " data-review-id="816f45d8-162f-45de-823d-ed92b1e5a903" style="font-size: 14px;">
                                    <div class="jdgm-carousel-item__review">
                                        <div class="jdgm-carousel-item__review-rating" tabindex="0" aria-label="5 stars" role="img"> <span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span> </div>
                                        <div class="jdgm-carousel-item__review-content">
                                            <div class="jdgm-carousel-item__review-title jdgm-line-clamp" style="-webkit-line-clamp: 1;">Very relaxing Art.</div>
                                            <div class="jdgm-carousel-item__review-body">
                                                <p>Soothing</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jdgm-carousel-item__reviewer-name-wrapper">
                                        <div class="jdgm-carousel-item__reviewer-name jdgm-ellipsis"> Mukesh Prasad </div>
                                        <div class="jdgm-carousel-item__timestamp jdgm-ellipsis" data-time="04/24/2024">1 week ago</div>
                                    </div> <a class="jdgm-carousel-item__product jdgm--shop-review-has-image" href="/products/tranquility-wall-art-set-of-three#judgeme_product_reviews"> <img class="jdgm-carousel-item__product-image" alt="Tranquility Wall Art - Set Of Three" data-src="https://cdn.shopify.com/s/files/1/0632/2526/6422/products/0003_1_1084d3f7-0261-4167-bfc6-bdf852a91c88_70x70.jpg?v=1686913209" data-src-retina="https://cdn.shopify.com/s/files/1/0632/2526/6422/products/0003_1_1084d3f7-0261-4167-bfc6-bdf852a91c88_140x140.jpg?v=1686913209">
                                        <div class="jdgm-carousel-item__product-title jdgm-ellipsis"> Tranquility Wall Art - Set Of Three </div>
                                    </a>
                                </div>
                                <div class="jdgm-carousel-item " data-review-id="587af9c9-2106-405a-ad4d-80a51fd60451" style="font-size: 14px;">
                                    <div class="jdgm-carousel-item__review">
                                        <div class="jdgm-carousel-item__review-rating" tabindex="0" aria-label="5 stars" role="img"> <span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span> </div>
                                        <div class="jdgm-carousel-item__review-content">
                                            <div class="jdgm-carousel-item__review-title jdgm-line-clamp" style="-webkit-line-clamp: 1;">Beautiful.</div>
                                            <div class="jdgm-carousel-item__review-body">
                                                <p>The vase looks amazing and really impressed with the size.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jdgm-carousel-item__reviewer-name-wrapper">
                                        <div class="jdgm-carousel-item__reviewer-name jdgm-ellipsis"> Achin Narula </div>
                                        <div class="jdgm-carousel-item__timestamp jdgm-ellipsis" data-time="04/11/2024">3 weeks ago</div>
                                    </div> <a class="jdgm-carousel-item__product jdgm--shop-review-has-image" href="/products/kirsti-kay-vase#judgeme_product_reviews"> <img class="jdgm-carousel-item__product-image" alt="Kirsti Kay Vase" data-src="https://judgeme.imgix.net/vaaree/1712817128__image__original.jpg?auto=format&amp;w=70" data-src-retina="https://judgeme.imgix.net/vaaree/1712817128__image__original.jpg?auto=format&amp;w=140">
                                        <div class="jdgm-carousel-item__product-title jdgm-ellipsis"> Kirsti Kay Vase </div>
                                    </a>
                                </div>
                                <div class="jdgm-carousel-item " data-review-id="d7e11e65-cfc7-4c62-b565-071bdabd36cc" style="font-size: 14px;">
                                    <div class="jdgm-carousel-item__review">
                                        <div class="jdgm-carousel-item__review-rating" tabindex="0" aria-label="5 stars" role="img"> <span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span> </div>
                                        <div class="jdgm-carousel-item__review-content">
                                            <div class="jdgm-carousel-item__review-title jdgm-line-clamp" style="-webkit-line-clamp: 1;">Looks fantastic!</div>
                                            <div class="jdgm-carousel-item__review-body">
                                                <p>The vase looks lovely. Very beautiful and exactly how it is in the website.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jdgm-carousel-item__reviewer-name-wrapper">
                                        <div class="jdgm-carousel-item__reviewer-name jdgm-ellipsis"> Somdatta Ganguly </div>
                                        <div class="jdgm-carousel-item__timestamp jdgm-ellipsis" data-time="03/10/2024">1 month ago</div>
                                    </div> <a class="jdgm-carousel-item__product jdgm--shop-review-has-image" href="/products/heritage-vase#judgeme_product_reviews"> <img class="jdgm-carousel-item__product-image" alt="Heritage Vase" data-src="https://judgeme.imgix.net/vaaree/1710087336__1000094657__original.jpg?auto=format&amp;w=70" data-src-retina="https://judgeme.imgix.net/vaaree/1710087336__1000094657__original.jpg?auto=format&amp;w=140">
                                        <div class="jdgm-carousel-item__product-title jdgm-ellipsis"> Heritage Vase </div>
                                    </a>
                                </div>
                                <div class="jdgm-carousel-item " data-review-id="045c714d-c43c-4f2e-9747-902b8f7f3f5e" style="font-size: 14px;">
                                    <div class="jdgm-carousel-item__review">
                                        <div class="jdgm-carousel-item__review-rating" tabindex="0" aria-label="4 stars" role="img"> <span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--off"></span> </div>
                                        <div class="jdgm-carousel-item__review-content">
                                            <div class="jdgm-carousel-item__review-title jdgm-line-clamp" style="-webkit-line-clamp: 1;">Classic!</div>
                                            <div class="jdgm-carousel-item__review-body">
                                                <p>Good product, 4 stars because first time I ordered the product was defective,but still given 4 stars as when I put the request for return and exchange it, the same day it was returned and received the final product after 3 days, good work!, by the way product quality is also good, hope it will work for very long time.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jdgm-carousel-item__reviewer-name-wrapper">
                                        <div class="jdgm-carousel-item__reviewer-name jdgm-ellipsis"> Pushkar Sehgal </div>
                                        <div class="jdgm-carousel-item__timestamp jdgm-ellipsis" data-time="03/10/2024">1 month ago</div>
                                    </div> <a class="jdgm-carousel-item__product jdgm--shop-review-has-image" href="/products/roaman-beige-wall-clock#judgeme_product_reviews"> <img class="jdgm-carousel-item__product-image" alt="Roman Beige Wall Clock" data-src="https://judgeme.imgix.net/vaaree/1710064072__17100640348563911206498821183726__original.jpg?auto=format&amp;w=70" data-src-retina="https://judgeme.imgix.net/vaaree/1710064072__17100640348563911206498821183726__original.jpg?auto=format&amp;w=140">
                                        <div class="jdgm-carousel-item__product-title jdgm-ellipsis"> Roman Beige Wall Clock </div>
                                    </a>
                                </div>
                                <div class="jdgm-carousel-item " data-review-id="a62bf4ce-82bb-4e43-a4f7-8f1e0cb4fdd1" style="font-size: 14px;">
                                    <div class="jdgm-carousel-item__review">
                                        <div class="jdgm-carousel-item__review-rating" tabindex="0" aria-label="5 stars" role="img"> <span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span> </div>
                                        <div class="jdgm-carousel-item__review-content">
                                            <div class="jdgm-carousel-item__review-title jdgm-line-clamp" style="-webkit-line-clamp: 1;">Best Bedsheet</div>
                                            <div class="jdgm-carousel-item__review-body">
                                                <p>Size is big and good fit for bed.
                                                    <br> Good Quality.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jdgm-carousel-item__reviewer-name-wrapper">
                                        <div class="jdgm-carousel-item__reviewer-name jdgm-ellipsis"> Dipti Thetha </div>
                                        <div class="jdgm-carousel-item__timestamp jdgm-ellipsis" data-time="03/09/2024">1 month ago</div>
                                    </div> <a class="jdgm-carousel-item__product jdgm--shop-review-has-image" href="/products/siesta-stripes-bedsheet-brown#judgeme_product_reviews"> <img class="jdgm-carousel-item__product-image" alt="Siesta Stripes Bedsheet - Brown" data-src="https://judgeme.imgix.net/vaaree/1709964580__1000231423__original.jpg?auto=format&amp;w=70" data-src-retina="https://judgeme.imgix.net/vaaree/1709964580__1000231423__original.jpg?auto=format&amp;w=140">
                                        <div class="jdgm-carousel-item__product-title jdgm-ellipsis"> Siesta Stripes Bedsheet - Brown </div>
                                    </a>
                                </div>
                                <div class="jdgm-carousel-item " data-review-id="b221e8c7-5a61-459c-85e1-42036b0f587a" style="font-size: 14px;">
                                    <div class="jdgm-carousel-item__review">
                                        <div class="jdgm-carousel-item__review-rating" tabindex="0" aria-label="5 stars" role="img"> <span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span> </div>
                                        <div class="jdgm-carousel-item__review-content">
                                            <div class="jdgm-carousel-item__review-title jdgm-line-clamp" style="-webkit-line-clamp: 1;"></div>
                                            <div class="jdgm-carousel-item__review-body">
                                                <p>Quality of the runner is good and the colour is really nice.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jdgm-carousel-item__reviewer-name-wrapper">
                                        <div class="jdgm-carousel-item__reviewer-name jdgm-ellipsis"> Nita </div>
                                        <div class="jdgm-carousel-item__timestamp jdgm-ellipsis" data-time="03/05/2024">1 month ago</div>
                                    </div> <a class="jdgm-carousel-item__product jdgm--shop-review-has-image" href="/products/stella-jacquard-table-rubber-beige#judgeme_product_reviews"> <img class="jdgm-carousel-item__product-image" alt="Stella Jacquard Table Runner - Beige" data-src="https://judgeme.imgix.net/vaaree/1709607097__d43d0dcd-726e-4c90-97ad-9d6c1d90abef__original.jpeg?auto=format&amp;w=70" data-src-retina="https://judgeme.imgix.net/vaaree/1709607097__d43d0dcd-726e-4c90-97ad-9d6c1d90abef__original.jpeg?auto=format&amp;w=140">
                                        <div class="jdgm-carousel-item__product-title jdgm-ellipsis"> Stella Jacquard Table Runner - Beige </div>
                                    </a>
                                </div>
                                <div class="jdgm-carousel-item " data-review-id="35cc1770-c0dd-4721-ac5e-d07dcf28602a" style="font-size: 14px;">
                                    <div class="jdgm-carousel-item__review">
                                        <div class="jdgm-carousel-item__review-rating" tabindex="0" aria-label="5 stars" role="img"> <span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span> </div>
                                        <div class="jdgm-carousel-item__review-content">
                                            <div class="jdgm-carousel-item__review-title jdgm-line-clamp" style="-webkit-line-clamp: 1;">Sooo beautiful</div>
                                            <div class="jdgm-carousel-item__review-body">
                                                <p>I am using it and find it very comfortable apart from being flowery and beautiful</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jdgm-carousel-item__reviewer-name-wrapper">
                                        <div class="jdgm-carousel-item__reviewer-name jdgm-ellipsis"> Kamal Bajaj </div>
                                        <div class="jdgm-carousel-item__timestamp jdgm-ellipsis" data-time="02/27/2024">2 months ago</div>
                                    </div> <a class="jdgm-carousel-item__product jdgm--shop-review-has-image" href="/products/floral-serenade-bedsheet#judgeme_product_reviews"> <img class="jdgm-carousel-item__product-image" alt="Floral Serenade Bedsheet" data-src="https://cdn.shopify.com/s/files/1/0632/2526/6422/files/0001_2_54cff094-a017-415f-9ae7-6e9aeb0b4a95_70x70.jpg?v=1703267895" data-src-retina="https://cdn.shopify.com/s/files/1/0632/2526/6422/files/0001_2_54cff094-a017-415f-9ae7-6e9aeb0b4a95_140x140.jpg?v=1703267895">
                                        <div class="jdgm-carousel-item__product-title jdgm-ellipsis"> Floral Serenade Bedsheet </div>
                                    </a>
                                </div>
                                <div class="jdgm-carousel-item " data-review-id="1f195de2-bc24-4b78-b44d-3ca12ecdd30f" style="font-size: 14px;">
                                    <div class="jdgm-carousel-item__review">
                                        <div class="jdgm-carousel-item__review-rating" tabindex="0" aria-label="5 stars" role="img"> <span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span> </div>
                                        <div class="jdgm-carousel-item__review-content">
                                            <div class="jdgm-carousel-item__review-title jdgm-line-clamp" style="-webkit-line-clamp: 1;">Excellent!!!</div>
                                            <div class="jdgm-carousel-item__review-body">
                                                <p>These mugs are very nice , sturdy and durable Thanks Varee , I love all the products I purchased from you</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jdgm-carousel-item__reviewer-name-wrapper">
                                        <div class="jdgm-carousel-item__reviewer-name jdgm-ellipsis"> Kamal Bajaj </div>
                                        <div class="jdgm-carousel-item__timestamp jdgm-ellipsis" data-time="02/27/2024">2 months ago</div>
                                    </div> <a class="jdgm-carousel-item__product jdgm--shop-review-has-image" href="/products/fraunces-floral-mug-set-of-two#judgeme_product_reviews"> <img class="jdgm-carousel-item__product-image" alt="Fraunces Floral Mug - Set Of Two" data-src="https://cdn.shopify.com/s/files/1/0632/2526/6422/files/SN_MG_155_PO2_05-Rz9SQAhs_70x70.jpg?v=1706621439" data-src-retina="https://cdn.shopify.com/s/files/1/0632/2526/6422/files/SN_MG_155_PO2_05-Rz9SQAhs_140x140.jpg?v=1706621439">
                                        <div class="jdgm-carousel-item__product-title jdgm-ellipsis"> Fraunces Floral Mug - Set Of Two </div>
                                    </a>
                                </div>
                                <div class="jdgm-carousel-item " data-review-id="bdbebd45-a563-4955-bf74-a155dc93e365" style="font-size: 14px;">
                                    <div class="jdgm-carousel-item__review">
                                        <div class="jdgm-carousel-item__review-rating" tabindex="0" aria-label="4 stars" role="img"> <span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--off"></span> </div>
                                        <div class="jdgm-carousel-item__review-content">
                                            <div class="jdgm-carousel-item__review-title jdgm-line-clamp" style="-webkit-line-clamp: 1;">Nice looking wall shelves!</div>
                                            <div class="jdgm-carousel-item__review-body">
                                                <p>These wall shelves look quite nice, light-weight and reasonably priced!</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jdgm-carousel-item__reviewer-name-wrapper">
                                        <div class="jdgm-carousel-item__reviewer-name jdgm-ellipsis"> Jaspal Khurana </div>
                                        <div class="jdgm-carousel-item__timestamp jdgm-ellipsis" data-time="02/25/2024">2 months ago</div>
                                    </div> <a class="jdgm-carousel-item__product jdgm--shop-review-has-image" href="/products/rustic-reverie-wall-shelf-black-set-of-three#judgeme_product_reviews"> <img class="jdgm-carousel-item__product-image" alt="Rustic Reverie Wall Shelf - Black - Set Of Three" data-src="https://judgeme.imgix.net/vaaree/1708845101__1000001455__original.jpg?auto=format&amp;w=70" data-src-retina="https://judgeme.imgix.net/vaaree/1708845101__1000001455__original.jpg?auto=format&amp;w=140">
                                        <div class="jdgm-carousel-item__product-title jdgm-ellipsis"> Rustic Reverie Wall Shelf - Black - Set Of Three </div>
                                    </a>
                                </div>
                                <div class="jdgm-carousel-item " data-review-id="2f5265f6-c3db-4211-b888-672e3cd6debe" style="font-size: 14px;">
                                    <div class="jdgm-carousel-item__review">
                                        <div class="jdgm-carousel-item__review-rating" tabindex="0" aria-label="5 stars" role="img"> <span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span> </div>
                                        <div class="jdgm-carousel-item__review-content">
                                            <div class="jdgm-carousel-item__review-title jdgm-line-clamp" style="-webkit-line-clamp: 1;">Loved it</div>
                                            <div class="jdgm-carousel-item__review-body">
                                                <p>its very beautiful and amazing quality</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jdgm-carousel-item__reviewer-name-wrapper">
                                        <div class="jdgm-carousel-item__reviewer-name jdgm-ellipsis"> shashi </div>
                                        <div class="jdgm-carousel-item__timestamp jdgm-ellipsis" data-time="02/21/2024">2 months ago</div>
                                    </div> <a class="jdgm-carousel-item__product jdgm--shop-review-has-image" href="/products/bird-flight-fancy-wall-accent-set-of-five#judgeme_product_reviews"> <img class="jdgm-carousel-item__product-image" alt="Bird Flight Fancy Wall Accent - Set Of Five" data-src="https://judgeme.imgix.net/vaaree/1708520123__screenshot2024-02-21at62319pm__original.png?auto=format&amp;w=70" data-src-retina="https://judgeme.imgix.net/vaaree/1708520123__screenshot2024-02-21at62319pm__original.png?auto=format&amp;w=140">
                                        <div class="jdgm-carousel-item__product-title jdgm-ellipsis"> Bird Flight Fancy Wall Accent - Set Of Five </div>
                                    </a>
                                </div>
                                <div class="jdgm-carousel-item " data-review-id="7f4bcc09-2162-4185-acb6-3c73275cdc7c" style="font-size: 14px;">
                                    <div class="jdgm-carousel-item__review">
                                        <div class="jdgm-carousel-item__review-rating" tabindex="0" aria-label="5 stars" role="img"> <span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span> </div>
                                        <div class="jdgm-carousel-item__review-content">
                                            <div class="jdgm-carousel-item__review-title jdgm-line-clamp" style="-webkit-line-clamp: 1;">Azoroni Jars</div>
                                            <div class="jdgm-carousel-item__review-body">
                                                <p>The jars were airtight and serve the purpose of storing small quantities of ingredients in the kitchen. They look good and were packed with utmost security. Thank you Vaaree.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jdgm-carousel-item__reviewer-name-wrapper">
                                        <div class="jdgm-carousel-item__reviewer-name jdgm-ellipsis"> Pallavi Jadhav </div>
                                        <div class="jdgm-carousel-item__timestamp jdgm-ellipsis" data-time="01/26/2024">3 months ago</div>
                                    </div> <a class="jdgm-carousel-item__product jdgm--shop-review-has-image" href="/products/azoroni-jar-150-ml-set-of-six#judgeme_product_reviews"> <img class="jdgm-carousel-item__product-image" alt="Azoroni Jar (150 ML) - Set Of Six" data-src="https://cdn.shopify.com/s/files/1/0632/2526/6422/files/0000_H2360C-3SETS-2_1_70x70.jpg?v=1706550741" data-src-retina="https://cdn.shopify.com/s/files/1/0632/2526/6422/files/0000_H2360C-3SETS-2_1_140x140.jpg?v=1706550741">
                                        <div class="jdgm-carousel-item__product-title jdgm-ellipsis"> Azoroni Jar (150 ML) - Set Of Six </div>
                                    </a>
                                </div>
                                <div class="jdgm-carousel-item " data-review-id="cd2342c2-5701-4f0a-a27d-5f00583d7add" style="font-size: 14px;">
                                    <div class="jdgm-carousel-item__review">
                                        <div class="jdgm-carousel-item__review-rating" tabindex="0" aria-label="4 stars" role="img"> <span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--off"></span> </div>
                                        <div class="jdgm-carousel-item__review-content">
                                            <div class="jdgm-carousel-item__review-title jdgm-line-clamp" style="-webkit-line-clamp: 1;"></div>
                                            <div class="jdgm-carousel-item__review-body">
                                                <p>Faux Bamboo Bonsai In Square Pot</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jdgm-carousel-item__reviewer-name-wrapper">
                                        <div class="jdgm-carousel-item__reviewer-name jdgm-ellipsis"> Amandeep Bakh </div>
                                        <div class="jdgm-carousel-item__timestamp jdgm-ellipsis" data-time="01/25/2024">3 months ago</div>
                                    </div> <a class="jdgm-carousel-item__product jdgm--shop-review-has-image" href="/products/faux-bamboo-bonsai-in-square-pot#judgeme_product_reviews"> <img class="jdgm-carousel-item__product-image" alt="Faux Bamboo Bonsai In Square Pot" data-src="https://cdn.shopify.com/s/files/1/0632/2526/6422/files/0000_ABT48CMBAMBOO_70x70.jpg?v=1706606499" data-src-retina="https://cdn.shopify.com/s/files/1/0632/2526/6422/files/0000_ABT48CMBAMBOO_140x140.jpg?v=1706606499">
                                        <div class="jdgm-carousel-item__product-title jdgm-ellipsis"> Faux Bamboo Bonsai In Square Pot </div>
                                    </a>
                                </div>
                                <div class="jdgm-carousel-item " data-review-id="4594d346-b68b-416a-bf46-0c22158081dc" style="font-size: 14px;">
                                    <div class="jdgm-carousel-item__review">
                                        <div class="jdgm-carousel-item__review-rating" tabindex="0" aria-label="5 stars" role="img"> <span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span> </div>
                                        <div class="jdgm-carousel-item__review-content">
                                            <div class="jdgm-carousel-item__review-title jdgm-line-clamp" style="-webkit-line-clamp: 1;">👍</div>
                                            <div class="jdgm-carousel-item__review-body">
                                                <p>Good lamps. Just as shown in the pics. Vintage finish is good. Size is good. Found them to be sturdy as well. Would recommend it.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jdgm-carousel-item__reviewer-name-wrapper">
                                        <div class="jdgm-carousel-item__reviewer-name jdgm-ellipsis"> Pratima Moghe </div>
                                        <div class="jdgm-carousel-item__timestamp jdgm-ellipsis" data-time="01/22/2024">3 months ago</div>
                                    </div> <a class="jdgm-carousel-item__product jdgm--shop-review-has-image" href="/products/vintage-pulley-wall-lamp#judgeme_product_reviews"> <img class="jdgm-carousel-item__product-image" alt="Vintage Pulley Wall Lamp" data-src="https://judgeme.imgix.net/vaaree/1705902156__img_20240105_192543__original.jpg?auto=format&amp;w=70" data-src-retina="https://judgeme.imgix.net/vaaree/1705902156__img_20240105_192543__original.jpg?auto=format&amp;w=140">
                                        <div class="jdgm-carousel-item__product-title jdgm-ellipsis"> Vintage Pulley Wall Lamp </div>
                                    </a>
                                </div>
                                <div class="jdgm-carousel-item " data-review-id="4720102b-21a5-4c25-acac-018673a98def" style="font-size: 14px;">
                                    <div class="jdgm-carousel-item__review">
                                        <div class="jdgm-carousel-item__review-rating" tabindex="0" aria-label="5 stars" role="img"> <span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span><span class="jdgm-star jdgm--on"></span> </div>
                                        <div class="jdgm-carousel-item__review-content">
                                            <div class="jdgm-carousel-item__review-title jdgm-line-clamp" style="-webkit-line-clamp: 1;">Excellent bedding set👌🏻</div>
                                            <div class="jdgm-carousel-item__review-body">
                                                <p>Awesome colours and fabric. Product 100% matches with the pictures provided by Vaaree.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jdgm-carousel-item__reviewer-name-wrapper">
                                        <div class="jdgm-carousel-item__reviewer-name jdgm-ellipsis"> Sudha Yadava </div>
                                        <div class="jdgm-carousel-item__timestamp jdgm-ellipsis" data-time="01/09/2024">3 months ago</div>
                                    </div> <a class="jdgm-carousel-item__product jdgm--shop-review-has-image" href="/products/beatific-blue-bedsheet#judgeme_product_reviews"> <img class="jdgm-carousel-item__product-image" alt="Beatific Blue Bedsheet" data-src="https://cdn.shopify.com/s/files/1/0632/2526/6422/files/1059224-Edit_70x70.jpg?v=1704959758" data-src-retina="https://cdn.shopify.com/s/files/1/0632/2526/6422/files/1059224-Edit_140x140.jpg?v=1704959758">
                                        <div class="jdgm-carousel-item__product-title jdgm-ellipsis"> Beatific Blue Bedsheet </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="jdgm-carousel__arrows">
                            <div class="jdgm-carousel__left-arrow" tabindex="0"></div>
                            <div class="jdgm-carousel__right-arrow" tabindex="0"></div>
                        </div>
                    </section>
                </div>
            </div>


        </div>





    </div>
    <div id="changePincodeContainer" class="change-pincode-container">
        <div class="edd-plp-content">
            <div class="pincode-error-banner t4s-swatch_banner_animator" style="display:none">
                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.5 2L17.8612 14.75H3.13878L10.5 2Z" fill="#ED546F" stroke="#ED546F" stroke-width="2"></path>
                    <path d="M11.22 11.552H10.068V5.504H11.22V11.552ZM9.876 13.28C9.876 13.064 9.952 12.88 10.104 12.728C10.264 12.568 10.452 12.488 10.668 12.488C10.884 12.488 11.068 12.568 11.22 12.728C11.38 12.88 11.46 13.064 11.46 13.28C11.46 13.496 11.38 13.684 11.22 13.844C11.068 13.996 10.884 14.072 10.668 14.072C10.452 14.072 10.264 13.996 10.104 13.844C9.952 13.684 9.876 13.496 9.876 13.28Z" fill="white"></path>
                </svg>
                <span class="error-message">Delivery not available on pincode</span>
            </div>
            <div class="edd-plp-heading">
                <div class="change-pincode-heading-text">
                    Delivery Time
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="19" height="11" viewBox="0 0 19 11" fill="none">
                            <path d="M17.7572 5.42077C17.4943 5.3207 17.2792 5.12054 17.1598 4.84534L16.0365 2.4185C15.7736 1.84306 15.2 1.46778 14.5786 1.46778H12.0931V0.967399C12.0931 0.442001 11.6868 0.0416981 11.2088 0.0416981L0.38239 0C0.167295 0 -5.66244e-07 0.175133 -5.66244e-07 0.400303C-5.66244e-07 0.625474 0.167295 0.800606 0.38239 0.800606L11.1849 0.842305C11.2566 0.842305 11.3283 0.917361 11.3283 0.992418V8.89841H4.92327C4.75598 8.14784 4.11069 7.5724 3.32201 7.5724C2.53333 7.5724 1.88805 8.14784 1.72075 8.89841H0.908176C0.836478 8.89841 0.76478 8.82335 0.76478 8.74829V0.400303C0.76478 0.175132 0.597484 0 0.38239 0C0.167295 0 -5.66244e-07 0.175133 -5.66244e-07 0.400303L0 8.74829C0 9.27369 0.406289 9.674 0.884276 9.674H1.74465C1.91195 10.4246 2.55723 11 3.34591 11C4.13459 11 4.77988 10.4246 4.94717 9.674H11.7346H13.3359C13.5031 10.4246 14.1484 11 14.9371 11C15.7258 11 16.3711 10.4246 16.5384 9.674H17.9484C18.522 9.674 19 9.17362 19 8.57316V7.19712C18.9522 6.39651 18.4742 5.69598 17.7572 5.42077ZM3.34591 10.2244C2.84403 10.2244 2.46164 9.79909 2.46164 9.29871C2.46164 8.79833 2.86793 8.37301 3.34591 8.37301C3.8478 8.37301 4.23019 8.79833 4.23019 9.29871C4.23019 9.79909 3.8478 10.2244 3.34591 10.2244ZM14.9132 10.2244C14.4113 10.2244 14.0289 9.79909 14.0289 9.29871C14.0289 8.77331 14.4352 8.37301 14.9132 8.37301C15.4151 8.37301 15.7975 8.79833 15.7975 9.29871C15.7975 9.79909 15.3912 10.2244 14.9132 10.2244ZM18.2113 8.57316C18.2113 8.74829 18.0679 8.89841 17.9006 8.89841H16.4906C16.3233 8.14784 15.678 7.5724 14.8893 7.5724C14.1245 7.5724 13.4553 8.14784 13.2881 8.89841H12.0453V5.39575H15.4868C15.7019 5.39575 15.8692 5.22062 15.8692 4.99545C15.8692 4.77028 15.7019 4.59515 15.4868 4.59515H12.0931V2.21835H14.5786C14.9132 2.21835 15.2239 2.4185 15.3673 2.71873L16.4906 5.14556C16.7057 5.59591 17.0642 5.92115 17.5182 6.09629C17.9484 6.2464 18.2352 6.67172 18.2352 7.14708V8.57316H18.2113Z" fill="black"></path>
                        </svg></span>
                </div>
                <!--
        -
        <div class="modal-close-button">
           <svg xmlns="http://www.w3.org/2000/svg" width="" height="" viewBox="0 0 14 14" fill="none">
  <path d="M1 1L13 13" stroke="#7A7A7A" stroke-width= stroke-linecap="round"/>
  <path d="M13 1L0.999999 13" stroke="#7A7A7A" stroke-width= stroke-linecap="round"/>
</svg>

        </div>
        -
      -->
            </div>
            <div class="change-pincode-heading-tagline">Please enter PIN code to check delivery time</div>
            <form id="edd-form-pincode" class="edd-form-pincode">
                <input type="tel" placeholder="Enter PIN code" id="pincode-input-plp" class="pincode-input" maxlength="6">
                <span class="verified-icon" style="display: block;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <circle cx="8" cy="8" r="8" fill="#55B765"></circle>
                        <path d="M4.14844 8.29615L6.55584 10.6665L11.8521 5.92578" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg></span>
                <button type="submit" id="check-button-plp" class="check-button">Apply</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.hyperspeed.me/script/vaaree.com/cdn/shop/t/130/assets/edd.js?v=62618964849751655441713514985"></script>
    <script>
        var pageType = `collection`;
        var apiUsername = "vaaree".trim();
        var apiKey = "666df8a8-f2e9-4fdf-a9cf-30350459b629".trim();
        var vendorPincodeStr = JSON.stringify({
            "Bagooze": "132103",
            "Mark Home": "400053",
            "Linen Design Company Private Limited": "122003",
            "Jaipur Fabric": "302015",
            "Jaipur Prime": "302029",
            "Kotton Culture": "452010",
            "Mrid Cera": "303107",
            "vaareehome": "132103",
            "Haber Living": "641603",
            "Lush & Beyond": "122002",
            "Hitkari": "121003",
            "Indus People": "110030",
            "Easy Goods": "302039",
            "Rajasthani Kart": "302018",
            "Smart Serve": "400064",
            "Green Heirloom": "682016",
            "The White Ink Decor": "201312",
            "Rena Germany": "396230",
            "Chhavi India": "132103",
            "Devarsh Handicrafts": "302029",
            "Export House": "140308",
            "Shreshmo": "400002",
            "Preciso Fashion": "600018",
            "Green Girgit": "121009",
            "Naksh": "400062",
            "Blessing Crafts": "244001",
            "Kanpur Flower Cycling Pvt. Ltd": "209305",
            "Vedas Exports": "342008",
            "KRJ Retail Private Limited": "201301",
            "Mahadev Mill": "380002",
            "Aashi Gifts": "302022",
            "Tree Of Life": "110020",
            "Rad Living": "201305",
            "Lighting Hours": "302029",
            "New Era Enterprises": "110015",
            "Ugaoo Agritech Private Limited": "410507",
            "Sino India": "132103",
            "Abstract India": "132103",
            "JD creations": "201012",
            "Femora": "302013",
            "Halos": "201010",
            "Clasiko India": "132103",
            "Decor Mart": "201301",
            "Athena": "421302",
            "Gayatri Attraction": "302029",
            "Shree Radhe": "360003",
            "Rajasthan Decor": "302017",
            "Klotthe": "245101",
            "Home Studios": "382445",
            "Edya Home": "281001",
            "Blocks Of India": "302029",
            "LIT Lamps": "400037",
            "The Conversion": "122001",
            "Duli India": "110074",
            "Embassy": "560018",
            "Nestroots": "122016",
            "Kolorabia Designs": "122001",
            "Wisdom Decor": "132103",
            "Hiyanshi Creations": "132103",
            "Tailoring India": "394210",
            "Urban Dream": "132103",
            "Homesake": "201307",
            "999 Store": "110047",
            "Bella True": "132103",
            "Bella Casa": "302022",
            "Good Homes": "302001",
            "Artment": "110030",
            "Art Street": "201308",
            "Sambhav Clothings": "560053",
            "Elemntl Designs": "201301",
            "Arrabi": "245101",
            "Aarohi Creations": "302029",
            "Sundram Hastkala": "201010",
            "The Table Fable": "122003",
            "Allo Innoware": "401028",
            "Auram Cookware": "400086",
            "Advance Cork International": "201301",
            "Vaaree": "132103",
            "Asian Handicrafts": "201010",
            "Gopalas": "302022",
            "Fourwalls": "201301",
            "DA Studios": "110025",
            "Sourcing India Inc": "131029",
            "Craftsman India Online": "686671",
            "The Wishing Chair": "110049",
            "Akeeratly": "110052",
            "Vaaree Panipat": "132103",
            "Flag Bearer": "110037",
            "Lock N Lock": "421302",
            "Curio Cart": "201301",
            "Decor Mart Khurja": "203131",
            "Posh N Plush": "282002",
            "The Scented Stories": "560062",
            "Basik Innovation LLP": "396191",
            "SATVIK": "110035",
            "Rago Inc": "132103",
            "Casa Decor": "201310",
            "Coral Tree": "122001",
            "AsianHandicrafts": "403505",
            "Vaaree": "403001",
            "TreeOfLife": "403901"
        });
        var vendorPincode = JSON.parse(vendorPincodeStr);
        var vendorName = "";
        var productTags = null;
        var fbvFilterTagName = "" || "fbv";
        var defaultNumberOfDays = 4;
        var defaultNumberOfDaysFBV = 3;
        var pageType = `collection`;

        function init() {
            if (pageType === 'product') {
                var pincodeInputContainer = document.getElementById("input-container");
                var defaultEstimateDeliveryInfo = document.getElementsByClassName("default-estimate-delivery-info")[0];
                var deliveryTextElement = document.getElementsByClassName(`t4s-default-end_delivery`)[0];
                var deliveryInfoFbv = document.getElementsByClassName("delivery-info-fbv")[0];
                var estimateDeliveryDateElementFbv = document.getElementsByClassName("t4s-end_delivery-fbv")[0];
                if (fbvTagExist(productTags)) {
                    deliveryInfoFbv.style.display = "flex";
                    defaultEstimateDeliveryInfo.style.display = "none";
                    estimateDeliveryDateElementFbv.textContent = `3 Day Delivery`;
                } else if (deliveryTextElement) {
                    deliveryTextElement.textContent = `9:00PM on ${calculateDeliveryDate(defaultNumberOfDays, 0)}`;
                }
                var pincodeInput = document.getElementById("pincode-input");
                pincodeInputContainer.addEventListener("submit", handleCheckButton);
                pincodeInput.addEventListener("input", handlePincodeInput);
                pincodeInputContainer.addEventListener("click", () => focusOnInput('pincode-input'));
                var storedPincode = getLocalStorageItem(localStorageKeys.deliveryPincode) || document.getElementById("pincode-input").value;
                storedPincode && showEstimateDeliveryDate(storedPincode, productTags);
            }
            if (pageType === 'collection') {
                var pincodeInputContainer = document.getElementById("edd-form-pincode");
                setDefaultDateInCollectionPage(defaultNumberOfDays, null, productTags);
                var doesPincodeExists = getLocalStorageItem('delivery-pincode');
                if (window.innerWidth < 768) {
                    doesPincodeExists ?
                        document.querySelector('.sticky-filter-sort-container').style.top = '85px' :
                        document.querySelector('.sticky-filter-sort-container').style.top = '66px';
                }
                var storedPincode = getLocalStorageItem(localStorageKeys.deliveryPincode);
                pincodeInputContainer && pincodeInputContainer.addEventListener("click", () => focusOnInput('pincode-input-plp'));
                storedPincode && showEstimateDeliveryDateonPlpPage(storedPincode, , productTags);
                window.addEventListener('popstate', function(event) {
                    if (event.state && event.state.page === '/collections') {
                        window.location.reload();
                    }
                });
            }
        }
        init();
    </script>

    <script src="https://cdn.hyperspeed.me/script/vaaree.com/cdn/shop/t/130/assets/change-pincode-popup.js?v=105602827470077140061708928276"></script>
</main>

<script>
    (function() {
        // disable_right_click_img
        document.addEventListener("mousedown", function(event) {
            if ((event.target || event.srcElement).tagName.toLowerCase() === "img") {
                // Middle-click to open in new tab
                if (event.which == 2) {
                    event.preventDefault();
                }
            }
        });
        document.addEventListener("contextmenu", function(event) {
            if ((event.target || event.srcElement).tagName.toLowerCase() === "img") {
                event.preventDefault();
            }
        });
        // disable_right_click_bg_img
        document.addEventListener("contextmenu", function(event) {
            if ((event.target || event.srcElement).style.backgroundImage) {
                event.preventDefault();
            }
        });
        // Drag and drop <img loading="lazy"> elements
        const disableDragAndDropT4s = function() {
            document.body.setAttribute("ondragstart", "return false;");
            document.body.setAttribute("ondrop", "return false;");
        };
        if (document.readyState === "complete") {
            disableDragAndDropT4s();
        } else {
            document.addEventListener("DOMContentLoaded", disableDragAndDropT4s);
        }
    }());
</script>
</div>
<div id="shopify-section-slider_config" class="shopify-section t4s-section t4s-section-config t4s_tp_flickity t4s-section-admn-fixed">
    <style data-shopify>
        .t4s-flicky-slider.t4s-slider-btn-cl-custom1 {
            --btn-color: #ffffff;
            --btn-background: #abb1b4;
            --btn-border: #abb1b4;
            --btn-color-hover: #ffffff;
            --btn-background-hover: #E8C463;
            --btn-border-hover: #E8C463;
        }

        .t4s-flicky-slider.t4s-slider-btn-style-outline.t4s-slider-btn-cl-custom1 {
            --btn-color: #abb1b4;
            --btn-border: #abb1b4;
            --btn-color-hover: #ffffff;
            --btn-background-hover: #E8C463;
        }

        .t4s-flicky-slider.t4s-slider-btn-style-simple.t4s-slider-btn-cl-custom1 {
            --btn-color: #abb1b4;
            --btn-border: #abb1b4;
            --btn-color-hover: #E8C463;
            --btn-border-hover: #E8C463;
        }

        .t4s-flicky-slider.t4s-dots-cl-custom1 {
            --dots-background: #abb1b4;
            --dots-background2: #ffffff;
        }

        .t4s-dots-style-number.t4s-dots-cl-custom1 {
            --dots-cl: #ffffff;
            --bg-dots-cl: #abb1b4;
        }
    </style>
    <style data-shopify>
        .t4s-flicky-slider.t4s-slider-btn-cl-custom2 {
            --btn-color: #ffffff;
            --btn-background: #7a7a7a;
            --btn-border: #7a7a7a;
            --btn-color-hover: #ffffff;
            --btn-background-hover: #7a7a7a;
            --btn-border-hover: #7a7a7a;
        }

        .t4s-flicky-slider.t4s-slider-btn-style-outline.t4s-slider-btn-cl-custom2 {
            --btn-color: #7a7a7a;
            --btn-border: #7a7a7a;
            --btn-color-hover: #ffffff;
            --btn-background-hover: #7a7a7a;
        }

        .t4s-flicky-slider.t4s-slider-btn-style-simple.t4s-slider-btn-cl-custom2 {
            --btn-color: #7a7a7a;
            --btn-border: #7a7a7a;
            --btn-color-hover: #7a7a7a;
            --btn-border-hover: #7a7a7a;
        }

        .t4s-flicky-slider.t4s-dots-cl-custom2 {
            --dots-background: #7a7a7a;
            --dots-background2: #ffffff;
        }

        .t4s-dots-style-number.t4s-dots-cl-custom2 {
            --dots-cl: #ffffff;
            --bg-dots-cl: #7a7a7a;
        }
    </style>


    <?php
    include "include/footer.php";
    ?>