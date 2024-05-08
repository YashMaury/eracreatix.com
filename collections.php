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
                    $sql = mysqli_query($con, "select id,subcategory, categoryid from subcategory where `categoryid`='" . $_GET['cid'] . "' ");
                    while ($row = mysqli_fetch_array($sql)) {
                    ?>

                        <div>
                            <a href=" collections.php?cid=<?= $row['categoryid'] ?>" class="collection-image_wrapper flex">
                                <div class="collection--img handle-overlap">
                                    <!-- <img class="t4s-obj-eff subcollection-img collection-image-main lazyautosizes" src="<?php echo "admin/uploads/category/" . $row['categoryImage']; ?>" width="800" height="800" alt="subcollection Abstract Patterns ">
                                    <img class="t4s-lz--fadeIn t4s-obj-eff collection-frame" src="https://cdn.shopify.com/s/files/1/0632/2526/6422/files/Category_Icons-24_1_bb87cf2e-e8b4-45b2-814e-5b9229281d11.png?v=1714742226 " alt="subcollection Fabulous Indian "> -->
                                </div>
                                <div class="collection--text">
                                    <?php echo $row['subcategory']; ?>
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
                                    <a href="collections.php?cid=<?= $_GET['cid']; ?>&page=<?= $page + 1; ?>" class="t4s-pr t4s-loadmore-btn t4s-btn-loading__svg t4s-btn t4s-btn-base t4s-btn-style-outline t4s-btn-size-large t4s-btn-icon-false t4s-btn-color-primary t4s-btn-effect-rectangle-out t4s-lm-onscroll-init">
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
                </div>
            </div>
        </div>
    </section>

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