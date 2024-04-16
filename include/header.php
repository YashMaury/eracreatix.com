<!doctype html>
<html class="t4sp-theme is-header--stuck t4s-hsticky__ready t4s-wrapper__custom rtl_false swatch_color_style_1 pr_border_style_1 pr_img_effect_2 enable_eff_img1_true badge_shape_1 css_for_wis_app_true shadow_round_img_false t4s-header__categories is-remove-unavai-1 t4_compare_false t4s-cart-count-0 t4s-pr-ellipsis-false
 no-js" lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <link rel="stylesheet" href="index.css">
    <script>
        class LightJsLoader {
            constructor(e) {
                this.jQs = [], this.listener = this.handleListener.bind(this, e), this.scripts = ["default", "defer", "async"].reduce(((e, t) => ({
                    ...e,
                    [t]: []
                })), {});
                const t = this;
                e.forEach((e => window.addEventListener(e, t.listener, {
                    passive: !0
                })))
            }
            handleListener(e) {
                const t = this;
                return e.forEach((e => window.removeEventListener(e, t.listener))), "complete" === document.readyState ? this.handleDOM() : document.addEventListener("readystatechange", (e => {
                    if ("complete" === e.target.readyState) return setTimeout(t.handleDOM.bind(t), 1)
                }))
            }
            async handleDOM() {
                this.suspendEvent(), this.suspendJQuery(), this.findScripts(), this.preloadScripts();
                for (const e of Object.keys(this.scripts)) await this.replaceScripts(this.scripts[e]);
                for (const e of ["DOMContentLoaded", "readystatechange"]) await this.requestRepaint(), document.dispatchEvent(new Event("lightJS-" + e));
                document.lightJSonreadystatechange && document.lightJSonreadystatechange();
                for (const e of ["DOMContentLoaded", "load"]) await this.requestRepaint(), window.dispatchEvent(new Event("lightJS-" + e));
                await this.requestRepaint(), window.lightJSonload && window.lightJSonload(), await this.requestRepaint(), this.jQs.forEach((e => e(window).trigger("lightJS-jquery-load"))), window.dispatchEvent(new Event("lightJS-pageshow")), await this.requestRepaint(), window.lightJSonpageshow && window.lightJSonpageshow()
            }
            async requestRepaint() {
                return new Promise((e => requestAnimationFrame(e)))
            }
            findScripts() {
                document.querySelectorAll("script[type=lightJs]").forEach((e => {
                    e.hasAttribute("src") ? e.hasAttribute("async") && e.async ? this.scripts.async.push(e) : e.hasAttribute("defer") && e.defer ? this.scripts.defer.push(e) : this.scripts.default.push(e) : this.scripts.default.push(e)
                }))
            }
            preloadScripts() {
                const e = this,
                    t = Object.keys(this.scripts).reduce(((t, n) => [...t, ...e.scripts[n]]), []),
                    n = document.createDocumentFragment();
                t.forEach((e => {
                    const t = e.getAttribute("src");
                    if (!t) return;
                    const s = document.createElement("link");
                    s.href = t, s.rel = "preload", s.as = "script", n.appendChild(s)
                })), document.head.appendChild(n)
            }
            async replaceScripts(e) {
                let t;
                for (; t = e.shift();) await this.requestRepaint(), new Promise((e => {
                    const n = document.createElement("script");
                    [...t.attributes].forEach((e => {
                        "type" !== e.nodeName && n.setAttribute(e.nodeName, e.nodeValue)
                    })), t.hasAttribute("src") ? (n.addEventListener("load", e), n.addEventListener("error", e)) : (n.text = t.text, e()), t.parentNode.replaceChild(n, t)
                }))
            }
            suspendEvent() {
                const e = {};
                [{
                    obj: document,
                    name: "DOMContentLoaded"
                }, {
                    obj: window,
                    name: "DOMContentLoaded"
                }, {
                    obj: window,
                    name: "load"
                }, {
                    obj: window,
                    name: "pageshow"
                }, {
                    obj: document,
                    name: "readystatechange"
                }].map((t => function (t, n) {
                    function s(n) {
                        return e[t].list.indexOf(n) >= 0 ? "lightJS-" + n : n
                    }
                    e[t] || (e[t] = {
                        list: [n],
                        add: t.addEventListener,
                        remove: t.removeEventListener
                    }, t.addEventListener = (...n) => {
                        n[0] = s(n[0]), e[t].add.apply(t, n)
                    }, t.removeEventListener = (...n) => {
                        n[0] = s(n[0]), e[t].remove.apply(t, n)
                    })
                }(t.obj, t.name))), [{
                    obj: document,
                    name: "onreadystatechange"
                }, {
                    obj: window,
                    name: "onpageshow"
                }].map((e => function (e, t) {
                    let n = e[t];
                    Object.defineProperty(e, t, {
                        get: () => n || function () { },
                        set: s => {
                            e["lightJS" + t] = n = s
                        }
                    })
                }(e.obj, e.name)))
            }
            suspendJQuery() {
                const e = this;
                let t = window.jQuery;
                Object.defineProperty(window, "jQuery", {
                    get: () => t,
                    set(n) {
                        if (!n || !n.fn || !e.jQs.includes(n)) return void (t = n);
                        n.fn.ready = n.fn.init.prototype.ready = e => {
                            e.bind(document)(n)
                        };
                        const s = n.fn.on;
                        n.fn.on = n.fn.init.prototype.on = function (...e) {
                            if (window !== this[0]) return s.apply(this, e), this;
                            const t = e => e.split(" ").map((e => "load" === e || 0 === e.indexOf("load.") ? "lightJS-jquery-load" : e)).join(" ");
                            return "string" == typeof e[0] || e[0] instanceof String ? (e[0] = t(e[0]), s.apply(this, e), this) : ("object" == typeof e[0] && Object.keys(e[0]).forEach((n => {
                                delete Object.assign(e[0], {
                                    [t(n)]: e[0][n]
                                })[n]
                            })), s.apply(this, e), this)
                        }, e.jQs.push(n), t = n
                    }
                })
            }
        }
        new LightJsLoader(["keydown", "mousemove", "touchend", "touchmove", "touchstart", "wheel"]);
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="theme-color" content="#fff">
    <link rel="canonical" href="index.html" />
    <link rel="preconnect" href="https://cdn.shopify.com/" crossorigin>
    <link rel="shortcut icon" type="image/png"
        href="cdn/shop/files/apple-icon-152x152d3ee.png?v=1674062412&amp;width=32">
    <link rel="apple-touch-icon-precomposed" type="image/png" sizes="152x152"
        href="cdn/shop/files/apple-icon-152x152c78b.png?v=1674062412&amp;width=152">
    <title>Buy Best Home Decor Items &amp; Essentials Online At Best Prices &ndash; Vaaree</title>
    <meta name="description"
        content="Home Décor- Buy Home Decorative Items &amp; essentials Online in India. Choose from a wide range of premium home decor products at Vaaree. Buy house decoration items online at best prices.">
    <meta name="keywords" content="buy home decor, bedsheets, towels, kitchen, mugs online" />
    <meta name="author" content="House of Vaaree">

    <meta property="og:site_name" content="Vaaree">
    <meta property="og:url" content="https://vaaree.com/">
    <meta property="og:title" content="Buy Best Home Decor Items &amp; Essentials Online At Best Prices">
    <meta property="og:type" content="website">
    <meta property="og:description"
        content="Home Décor- Buy Home Decorative Items &amp; essentials Online in India. Choose from a wide range of premium home decor products at Vaaree. Buy house decoration items online at best prices.">
    <meta property="og:image"
        content="http://vaaree.com/cdn/shop/files/WhatsApp_Image_2022-05-24_at_4.32.18_PM.jpg?v=1653390295">
    <meta property="og:image:secure_url"
        content="https://vaaree.com/cdn/shop/files/WhatsApp_Image_2022-05-24_at_4.32.18_PM.jpg?v=1653390295">
    <meta property="og:image:width" content="1024">
    <meta property="og:image:height" content="536">
    <meta name="twitter:site" content="@vaareehome">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Buy Best Home Decor Items &amp; Essentials Online At Best Prices">
    <meta name="twitter:description"
        content="Home Décor- Buy Home Decorative Items &amp; essentials Online in India. Choose from a wide range of premium home decor products at Vaaree. Buy house decoration items online at best prices.">
    <script async src="cdn/shop/t/130/assets/lazysizes.minc8f0.js?v=86244101074946284761695367398"></script>
    <script defer src="cdn/shop/t/130/assets/global.minec2d.js?v=26735022652930471661711311261"></script>
    <script>
        const customer_marketplace_id = null;
        const customer_name = ""
        const customer_phone = ""
    </script>
    <script defer src="cdn/shop/t/130/assets/page-redirection2948.js?v=12904145612437102721710501942"></script>
    <link href="cdn/shop/t/130/assets/minified_css.minae1a.css?v=5227850076568898271712046286" rel="stylesheet"
        type="text/css" media="all" />
    <img alt="website" width="99999" height="99999"
        style="pointer-events: none; position: absolute; top: 0; left: 0; width: 99vw; height: 99vh; max-width: 99vw; max-height: 99vh;"
        src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI5OTk5OSIgaGVpZ2h0PSI5OTk5OSIgdmlld0JveD0iMCAwIDk5OTk5IDk5OTk5IiAvPg==" />
    <script>
        window.performance && window.performance.mark && window.performance.mark('shopify.content_for_header.start');
    </script>
    <meta name="facebook-domain-verification" content="xdlnd89oajo8ige0bstdecpvqupqa8">
    <meta id="shopify-digital-wallet" name="shopify-digital-wallet" content="/63225266422/digital_wallets/dialog">
    <script async="async" src="checkouts/internal/preloadsd568.js?locale=en-IN"></script>
    <script async="async" src="../shop.app/checkouts/internal/preloadsdd00.js?locale=en-IN&amp;shop_id=63225266422"
        crossorigin="anonymous"></script>
    <script integrity="sha256-n5Uet9jVOXPHGd4hH4B9Y6+BxkTluaaucmYaxAjUcvY="
        data-source-attribution="shopify.loadfeatures" defer="defer"
        src="cdn/shopifycloud/shopify/assets/storefront/load_feature-9f951eb7d8d53973c719de211f807d63af81c644e5b9a6ae72661ac408d472f6.js"
        crossorigin="anonymous"></script>
    <script integrity="sha256-HAs5a9TQVLlKuuHrahvWuke+s1UlxXohfHeoYv8G2D8="
        data-source-attribution="shopify.dynamic-checkout" defer="defer"
        src="cdn/shopifycloud/shopify/assets/storefront/features-1c0b396bd4d054b94abae1eb6a1bd6ba47beb35525c57a217c77a862ff06d83f.js"
        crossorigin="anonymous"></script>
    <script id="sections-script"
        data-sections="collections-list,banner,collections-list-packery,blog-post,custom-html,footer,bottom-bar"
        defer="defer" src="cdn/shop/t/130/compiled_assets/scripts8e60.js?316383"></script>

    <script>
        window.performance && window.performance.mark && window.performance.mark('shopify.content_for_header.end');
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i|Harmonia+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i&amp;display=swap"
        media="print" onload="this.media='all'">

    <script>
        const isBehaviorSmooth = 'scrollBehavior' in document.documentElement.style && getComputedStyle(document.documentElement).scrollBehavior === 'smooth';
        const t4sXMLHttpRequest = window.XMLHttpRequest,
            documentElementT4s = document.documentElement;
        documentElementT4s.className = documentElementT4s.className.replace('no-js', 'js');

        function loadImageT4s(_this) {
            _this.classList.add('lazyloadt4sed')
        };
        (function () {
            const matchMediaHoverT4s = (window.matchMedia('(-moz-touch-enabled: 1), (hover: none)')).matches;
            documentElementT4s.className += ((window.CSS && window.CSS.supports('(position: sticky) or (position: -webkit-sticky)')) ? ' t4sp-sticky' : ' t4sp-no-sticky');
            documentElementT4s.className += matchMediaHoverT4s ? ' t4sp-no-hover' : ' t4sp-hover';
            /*window.onpageshow = function() { if (performance.navigation.type === 2) {document.dispatchEvent(new CustomEvent('cart:refresh'))} }; */
            if (!matchMediaHoverT4s && window.width > 1024) {
                document.addEventListener('mousemove', function (evt) {
                    documentElementT4s.classList.replace('t4sp-no-hover', 't4sp-hover');
                    document.dispatchEvent(new CustomEvent('theme:hover'));
                }, {
                    once: true
                });
            }
        }());
    </script>

    <script src="cdn/shop/t/130/assets/coupons-helpers74be.js?v=74899048720119070191712369286"></script>



    <!-- Start of Judge.me Core -->
    <link rel="dns-prefetch" href="https://cdn.judge.me/">
    <script data-cfasync='false' class='jdgm-settings-script'>
        window.jdgmSettings = {
            "pagination": 5,
            "disable_web_reviews": false,
            "badge_no_review_text": "No reviews",
            "badge_n_reviews_text": "{{ average_rating_1_decimal }} ({{ n }}) ",
            "badge_star_color": "#e8c463",
            "hide_badge_preview_if_no_reviews": true,
            "badge_hide_text": false,
            "enforce_center_preview_badge": false,
            "widget_title": "Product Review By Customers",
            "widget_open_form_text": "Write a review",
            "widget_close_form_text": "Cancel review",
            "widget_refresh_page_text": "Refresh page",
            "widget_summary_text": "Based on {{ number_of_reviews }} review/reviews",
            "widget_no_review_text": "Be the first to write a review",
            "widget_name_field_text": "Name",
            "widget_verified_name_field_text": "Name (public)",
            "widget_name_placeholder_text": "Enter your name (public)",
            "widget_required_field_error_text": "This field is required.",
            "widget_email_field_text": "Email",
            "widget_verified_email_field_text": "Verified Email (private, can not be edited)",
            "widget_email_placeholder_text": "Enter your email (private)",
            "widget_email_field_error_text": "Please enter a valid email address.",
            "widget_rating_field_text": "Product Rating",
            "widget_review_title_field_text": "Review Title",
            "widget_review_title_placeholder_text": "Give your review a title",
            "widget_review_body_field_text": "Review",
            "widget_review_body_placeholder_text": "Write your comments here",
            "widget_pictures_field_text": "Picture/Video (optional)",
            "widget_submit_review_text": "Submit Review",
            "widget_submit_verified_review_text": "Submit Verified Review",
            "widget_submit_success_msg_with_auto_publish": "Thank you! Please refresh the page in a few moments to see your review. You can remove or edit your review by logging into \u003ca href='https://judge.me/login' target='_blank' rel='nofollow noopener'\u003eJudge.me\u003c/a\u003e",
            "widget_submit_success_msg_no_auto_publish": "Thank you! Your review will be published as soon as it is approved by the shop admin. You can remove or edit your review by logging into \u003ca href='https://judge.me/login' target='_blank' rel='nofollow noopener'\u003eJudge.me\u003c/a\u003e",
            "widget_show_default_reviews_out_of_total_text": "Showing {{ n_reviews_shown }} out of {{ n_reviews }} reviews.",
            "widget_show_all_link_text": "Show all",
            "widget_show_less_link_text": "Show less",
            "widget_author_said_text": "{{ reviewer_name }} said:",
            "widget_days_text": "{{ n }} days ago",
            "widget_weeks_text": "{{ n }} week/weeks ago",
            "widget_months_text": "{{ n }} month/months ago",
            "widget_years_text": "{{ n }} year/years ago",
            "widget_yesterday_text": "Yesterday",
            "widget_today_text": "Today",
            "widget_replied_text": "\u003e\u003e {{ shop_name }} replied:",
            "widget_read_more_text": "Read more",
            "widget_rating_filter_color": "#e8c463",
            "widget_rating_filter_see_all_text": "See all reviews",
            "widget_sorting_most_recent_text": "Most Recent",
            "widget_sorting_highest_rating_text": "Highest Rating",
            "widget_sorting_lowest_rating_text": "Lowest Rating",
            "widget_sorting_with_pictures_text": "Only Pictures",
            "widget_sorting_most_helpful_text": "Most Helpful",
            "widget_open_question_form_text": "Ask a question",
            "widget_reviews_subtab_text": "Reviews",
            "widget_questions_subtab_text": "Questions",
            "widget_question_label_text": "Question",
            "widget_answer_label_text": "Answer",
            "widget_question_placeholder_text": "Write your question here",
            "widget_submit_question_text": "Submit Question",
            "widget_question_submit_success_text": "Thank you for your question! We will notify you once it gets answered.",
            "widget_star_color": "#e8c463",
            "verified_badge_text": "Verified",
            "verified_badge_placement": "left-of-reviewer-name",
            "widget_hide_border": false,
            "widget_social_share": false,
            "widget_thumb": false,
            "widget_review_location_show": false,
            "widget_location_format": "country_iso_code",
            "all_reviews_include_out_of_store_products": true,
            "all_reviews_out_of_store_text": "(out of store)",
            "all_reviews_product_name_prefix_text": "about",
            "enable_review_pictures": true,
            "enable_question_anwser": false,
            "review_date_format": "timestamp",
            "default_sort_method": "highest-rating",
            "widget_product_reviews_subtab_text": "Product Reviews",
            "widget_shop_reviews_subtab_text": "Shop Reviews",
            "widget_sorting_pictures_first_text": "Pictures First",
            "floating_tab_button_name": "★ Judge.me Reviews",
            "floating_tab_title": "Let customers speak for us",
            "floating_tab_url": "",
            "floating_tab_url_enabled": false,
            "all_reviews_text_badge_text": "Customers rate us {{ shop.metafields.judgeme.all_reviews_rating | round: 1 }}/5 based on {{ shop.metafields.judgeme.all_reviews_count }} reviews.",
            "all_reviews_text_badge_text_branded_style": "{{ shop.metafields.judgeme.all_reviews_rating | round: 1 }} out of 5 stars based on {{ shop.metafields.judgeme.all_reviews_count }} reviews",
            "all_reviews_text_badge_url": "",
            "featured_carousel_title": "Hear from our customers",
            "featured_carousel_count_text": "from {{ n }} reviews",
            "featured_carousel_url": "",
            "featured_carousel_arrows_on_the_sides": true,
            "verified_count_badge_url": "",
            "widget_rating_preset_default": 0,
            "widget_histogram_use_custom_color": true,
            "picture_reminder_submit_button": "Upload Pictures",
            "mute_video_by_default": true,
            "widget_sorting_videos_first_text": "Videos First",
            "widget_review_pending_text": "Pending",
            "featured_carousel_items_for_large_screen": 5,
            "remove_microdata_snippet": false,
            "preview_badge_no_question_text": "No questions",
            "preview_badge_n_question_text": "{{ number_of_questions }} question/questions",
            "remove_judgeme_branding": true,
            "widget_search_bar_placeholder": "Search reviews",
            "widget_sorting_verified_only_text": "Verified only",
            "all_reviews_page_load_more_text": "Load More Reviews",
            "widget_advanced_speed_features": 5,
            "widget_public_name_text": "displayed publicly like",
            "default_reviewer_name_has_non_latin": true,
            "widget_reviewer_anonymous": "Anonymous",
            "medals_widget_title": "Judge.me Review Medals",
            "widget_invalid_yt_video_url_error_text": "Not a YouTube video URL",
            "widget_max_length_field_error_text": "Please enter no more than {0} characters.",
            "widget_verified_by_shop_text": "Verified by Shop",
            "widget_show_photo_gallery": true,
            "widget_load_with_code_splitting": true,
            "widget_ugc_title": "Made by us, Shared by you",
            "widget_ugc_subtitle": "Tag us to see your picture featured in our page",
            "widget_ugc_primary_button_text": "Buy Now",
            "widget_ugc_secondary_button_text": "Load More",
            "widget_ugc_reviews_button_text": "View Reviews",
            "widget_primary_color": "#222222",
            "widget_enable_secondary_color": true,
            "widget_secondary_color": "#e8c463",
            "widget_summary_average_rating_text": "{{ average_rating }} out of 5",
            "widget_media_grid_title": "Customer photos \u0026 videos",
            "widget_media_grid_see_more_text": "See more",
            "widget_round_style": true,
            "widget_show_product_medals": false,
            "widget_verified_by_judgeme_text": "Verified by Judge.me",
            "widget_show_store_medals": false,
            "widget_verified_by_judgeme_text_in_store_medals": "Verified by Judge.me",
            "widget_media_field_exceed_quantity_message": "Sorry, we can only accept {{ max_media }} for one review.",
            "widget_media_field_exceed_limit_message": "{{ file_name }} is too large, please select a {{ media_type }} less than {{ size_limit }}MB.",
            "widget_review_submitted_text": "Review Submitted!",
            "widget_question_submitted_text": "Question Submitted!",
            "widget_close_form_text_question": "Cancel",
            "widget_write_your_answer_here_text": "Write your answer here",
            "widget_show_collected_by_judgeme": false,
            "widget_collected_by_judgeme_text": "collected by Judge.me",
            "widget_load_more_text": "Load More",
            "widget_full_review_text": "Full Review",
            "widget_read_more_reviews_text": "Read More Reviews",
            "widget_read_questions_text": "Read Questions",
            "widget_questions_and_answers_text": "Questions \u0026 Answers",
            "widget_verified_by_text": "Verified by",
            "widget_number_of_reviews_text": "{{ number_of_reviews }} reviews",
            "widget_back_button_text": "Back",
            "widget_next_button_text": "Next",
            "widget_custom_forms_filter_button": "Filters",
            "custom_forms_style": "vertical",
            "how_reviews_are_collected": "How reviews are collected?",
            "widget_gdpr_statement": "How we use your data: We’ll only contact you about the review you left, and only if necessary. By submitting your review, you agree to Judge.me’s \u003ca href='https://judge.me/terms' target='_blank' rel='nofollow noopener'\u003eterms and conditions\u003c/a\u003e and \u003ca href='https://judge.me/privacy' target='_blank' rel='nofollow noopener'\u003eprivacy policy\u003c/a\u003e.",
            "preview_badge_collection_page_install_preference": true,
            "preview_badge_home_page_install_preference": true,
            "preview_badge_product_page_install_preference": true,
            "review_widget_best_location": true,
            "platform": "shopify",
            "branding_url": "https://judge.me/reviews/vaareehome",
            "branding_text": "Powered by Judge.me",
            "locale": "en",
            "reply_name": "Vaaree",
            "widget_version": "3.0",
            "footer": true,
            "autopublish": true,
            "review_dates": true,
            "enable_custom_form": true,
            "shop_use_review_site": true,
            "can_be_branded": true
        };
    </script>









    <script data-cfasync='false' class='jdgm-script'>
        ! function (e) {
            window.jdgm = window.jdgm || {}, jdgm.CDN_HOST = "https://cdn.judge.me/",
                jdgm.docReady = function (d) {
                    (e.attachEvent ? "complete" === e.readyState : "loading" !== e.readyState) ?
                        setTimeout(d, 0) : e.addEventListener("DOMContentLoaded", d)
                }, jdgm.loadCSS = function (d, t, o, s) {
                    !o && jdgm.loadCSS.requestedUrls.indexOf(d) >= 0 || (jdgm.loadCSS.requestedUrls.push(d),
                        (s = e.createElement("link")).rel = "stylesheet", s.class = "jdgm-stylesheet", s.media = "nope!",
                        s.href = d, s.onload = function () {
                            this.media = "all", t && setTimeout(t)
                        }, e.body.appendChild(s))
                },
                jdgm.loadCSS.requestedUrls = [], jdgm.loadJS = function (e, d) {
                    var t = new XMLHttpRequest;
                    t.onreadystatechange = function () {
                        4 === t.readyState && (Function(t.response)(), d && d(t.response))
                    },
                        t.open("GET.html", e), t.send()
                }, jdgm.docReady((function () {
                    (window.jdgmLoadCSS || e.querySelectorAll(
                        ".jdgm-widget, .jdgm-all-reviews-page").length > 0) && (jdgmSettings.widget_load_with_code_splitting ?
                            parseFloat(jdgmSettings.widget_version) >= 3 ? jdgm.loadCSS(jdgm.CDN_HOST + "widget_v3/base.css") :
                                jdgm.loadCSS(jdgm.CDN_HOST + "widget/base.css") : jdgm.loadCSS(jdgm.CDN_HOST + "shopify_v2.css"),
                            jdgm.loadJS(jdgm.CDN_HOST + "loader.js"))
                }))
        }(document);
    </script>

    <noscript>
        <link rel="stylesheet" type="text/css" media="all" href="../cdn.judge.me/shopify_v2.css">
    </noscript>
    <!-- End of Judge.me Core -->



    <script>
        if (getSourceCookie(cookie_name) == "admitad") {
            const admitadScript = document.createElement('script');
            admitadScript.setAttribute('src', '../cdn.teleportapi.com/admitag.minc76f.js?campaign_code=0fc1a21e2d');
            document.head.appendChild(admitadScript);
        }
    </script>

    <script defer type="text/javascript" src="../abhiwebdd.com/audience.html"></script>
    <script defer type="text/javascript" src="../wd-ret.io/rtg/v1/retag.js"></script>
    <script defer type="text/javascript" src="../charles.ldgaqplopq.com/benedict.js"></script>
    <script defer type="text/javascript" src="../static-cdn.trackier.com/rtg/661663ad8e8a0d6bad7a4bef.js"></script>

    <script type="text/javascript">
        // name of the cookie that stores the source
        // change if you have another name
        var cookie_name = 'deduplication_cookie';
        // cookie lifetime
        var days_to_store = 30;
        // expected deduplication_cookie value for Admitad
        var deduplication_cookie_value = 'admitad';
        // name of GET parameter for deduplication
        // change if you have another name
        var channel_name = 'utm_source';
        // a function to get the source from the GET parameter
        getSourceParamFromUri = function () {
            var pattern = channel_name + '=([^&]+)';
            var re = new RegExp(pattern);
            return (re.exec(document.location.search) || [])[1] || '';
        };
        // a function to get the source from the cookie named cookie_name
        getSourceCookie = function () {
            var matches = document.cookie.match(new RegExp(
                '(?:^|; )' + cookie_name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + '=([^;]*)'
            ));
            return matches ? decodeURIComponent(matches[1]) : undefined;
        };
        // a function to set the source in the cookie named cookie_name
        setSourceCookie = function () {
            var param = getSourceParamFromUri();
            var params = (new URL(document.html)).searchParams;
            if (!params.get(channel_name) && params.get('gclid')) {
                param = 'google'
            } else if (!params.get(channel_name) && params.get('fbclid')) {
                param = 'facebook'
            } else if (!params.get(channel_name) && params.get('cjevent')) {
                param = 'cj'
            } else if ((params.get(channel_name) == 'kitglobal') && !!params.get('_gs_ref')) {
                var period = 1 * 60 * 60 * 24 * 1000; // in seconds
                var expiresDate = new Date((period) + +new Date);
                var cookieString = 'kit_token' + '=' + params.get('_gs_ref') + '; path=/; expires=' + expiresDate.toGMTString();
                document.cookie = cookieString + '; domain=.' + location.host;
                param = 'kitglobal';
            } else if (!param) {
                return;
            }
            var period = days_to_store * 60 * 60 * 24 * 1000; // in seconds
            var expiresDate = new Date((period) + +new Date);
            var cookieString = cookie_name + '=' + param + '; path=/; expires=' + expiresDate.toGMTString();
            document.cookie = cookieString;
            document.cookie = cookieString + '; domain=.' + location.host;
        };
        // set cookie
        setSourceCookie();
    </script>

    <!-- Schema Updation -- New Schema added on 10th April 2024 -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "Vaaree",
            "url": "https://vaaree.com/",
            "logo": "https://vaaree.com/cdn/shop/files/apple-icon-152x152_55x.png?v=1674062412",
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "08068084868",
                "contactType": "customer service",
                "areaServed": "IN",
                "availableLanguage": "en"
            },
            "sameAs": [
                "https://www.facebook.com/vaareehome",
                "https://twitter.com/vaareehome",
                "https://www.instagram.com/vaareehome/",
                "https://www.youtube.com/channel/UCGW-YhVqqn11TgamrNNPVqw",
                "https://in.linkedin.com/company/vaareehome",
                "https://www.pinterest.ca/vaareehome/"
            ]
        }
    </script>

    <script>
        var gsf_conversion_data = {
            page_type: 'home',
            event: 'page_view',
            data: {
                product_data: [{
                    variant_id: 45421042761974,
                    product_id: 8175551545590,
                    name: "(A) Letter Wall Hook",
                    price: "750.00",
                    currency: "INR",
                    sku: "11636",
                    brand: "The Wishing Chair",
                    variant: "14x2x26 inch",
                    category: "Hooks &amp; Key Holders"
                }, {
                    variant_id: 45968007856374,
                    product_id: 8357788614902,
                    name: "(A) Mini Mottled Mono Wall Hanging - Pink",
                    price: "850.00",
                    currency: "INR",
                    sku: "17782-A",
                    brand: "The Wishing Chair",
                    variant: "8x8x1 inch",
                    category: "Wall Accents"
                }],
                total_price: "1600.00",
                shop_currency: "INR"
            }
        };
    </script>


    <script src="../cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <img alt="icon" id="svgicon" width="1400" height="1400"
        style="pointer-events: none; position: absolute; top: 0; left: 0; width: 99vw; height: 99vh; max-width: 99vw; max-height: 99vh;"
        src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48c3ZnIHdpZHRoPSI5OTk5OXB4IiBoZWlnaHQ9Ijk5OTk5cHgiIHZpZXdCb3g9IjAgMCA5OTk5OSA5OTk5OSIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj48ZyBzdHJva2U9Im5vbmUiIGZpbGw9Im5vbmUiIGZpbGwtb3BhY2l0eT0iMCI+PHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9Ijk5OTk5IiBoZWlnaHQ9Ijk5OTk5Ij48L3JlY3Q+IDwvZz4gPC9zdmc+"
        loading="lazy">
    <script defer src="cdn/shop/t/130/assets/searchtap-custome313.js?v=25382822671028881101708928283"></script>
    <script src="cdn/shop/t/130/assets/searchtap-config2ac1.js?v=99608339423431912041706333055"></script>
    <script defer src="cdn/shop/t/130/assets/searchtap7941.js?v=114025972196429877671708928283"></script>

    <script type="text/javascript">
        (function (f, b) {
            if (!b.__SV) {
                var e, g, i, h;
                window.mixpanel = b;
                b._i = [];
                b.init = function (e, f, c) {
                    function g(a, d) {
                        var b = d.split(".");
                        2 == b.length && ((a = a[b[0]]), (d = b[1]));
                        a[d] = function () {
                            a.push([d].concat(Array.prototype.slice.call(arguments, 0)));
                        };
                    }
                    var a = b;
                    "undefined" !== typeof c ? (a = b[c] = []) : (c = "mixpanel");
                    a.people = a.people || [];
                    a.toString = function (a) {
                        var d = "mixpanel";
                        "mixpanel" !== c && (d += "." + c);
                        a || (d += " (stub)");
                        return d;
                    };
                    a.people.toString = function () {
                        return a.toString(1) + ".people (stub)";
                    };
                    i = "disable time_event track track_pageview track_links track_forms track_with_groups add_group set_group remove_group register register_once alias unregister identify name_tag set_config reset opt_in_tracking opt_out_tracking has_opted_in_tracking has_opted_out_tracking clear_opt_in_out_tracking start_batch_senders people.set people.set_once people.unset people.increment people.append people.union people.track_charge people.clear_charges people.delete_user people.remove".split(" ");
                    for (h = 0; h < i.length; h++) g(a, i[h]);
                    var j = "set set_once union unset remove delete".split(" ");
                    a.get_group = function () {
                        function b(c) {
                            d[c] = function () {
                                call2_args = arguments;
                                call2 = [c].concat(Array.prototype.slice.call(call2_args, 0));
                                a.push([e, call2]);
                            };
                        }
                        for (var d = {}, e = ["get_group"].concat(Array.prototype.slice.call(arguments, 0)), c = 0; c < j.length; c++) b(j[c]);
                        return d;
                    };
                    b._i.push([e, f, c]);
                };
                b.__SV = 1.2;
                e = f.createElement("script");
                e.type = "text/javascript";
                e.async = !0;
                e.src = "undefined" !== typeof MIXPANEL_CUSTOM_LIB_URL ? MIXPANEL_CUSTOM_LIB_URL : "file:" === f.location.protocol && "//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js".match(/^\/\//) ? "https://cdn.mxpnl.com/libs/mixpanel-2-latest.min.js" : "//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js";
                g = f.getElementsByTagName("script")[0];
                g.parentNode.insertBefore(e, g);
            }
        })(document, window.mixpanel || []);

        function setSessionVariable(key, value) {
            const data = {
                value: value
            };

            sessionStorage.setItem(key, JSON.stringify(data));
        }
        var mixpanel_id_key = 'mixpanel_distinct_id'

        mixpanel.init("2ff660ea1313df6b1b47dc1bd83cebb3", {
            'loaded': function () {
                setSessionVariable(mixpanel_id_key, mixpanel.get_distinct_id());
            }
        });
    </script>




    <script>
        var event_types = {
            page_visited: "page_visited",
            page_interaction: "page_interaction",
            click_event: "click_event",
            mousedown_event: "mousedown_event",
            swipe_event: "swipe_event"
        }

        var event_strings = {
            collection_viewed: "Collection Viewed",
            homepage_viewed: "Home Page Viewed",
            product_viewed: "Product Viewed",
            cart_viewed: "Cart Viewed",
            collection_interaction: "Collection Interaction",
            added_to_cart: "Added to Cart",
            filter_interaction: "Filters Interaction",
            cart_interaction: "Cart Interacted",
            pdp_interaction: "PDP Interaction",
            top_nav_interaction: "Top Nav Interaction",
            navigation_interaction: "Navigation Interaction",
            coupon_page_viewed: "Coupon Page Viewed",
            coupon_page_interacted: "Coupon Page Interacted"
        }
    </script>


    <script>
        var event_types = {
            page_visited: "page_visited",
            page_interaction: "page_interaction",
            click_event: "click_event",
            mousedown_event: "mousedown_event",
            swipe_event: "swipe_event"
        }

        var event_strings = {
            collection_viewed: "Collection Viewed",
            homepage_viewed: "Home Page Viewed",
            product_viewed: "Product Viewed",
            cart_viewed: "Cart Viewed",
            collection_interaction: "Collection Interaction",
            added_to_cart: "Added to Cart",
            filter_interaction: "Filters Interaction",
            cart_interaction: "Cart Interacted",
            pdp_interaction: "PDP Interaction",
            top_nav_interaction: "Top Nav Interaction",
            navigation_interaction: "Navigation Interaction",
            coupon_page_viewed: "Coupon Page Viewed",
            coupon_page_interacted: "Coupon Page Interacted"
        }
    </script>
    <script>
        var variants = null;
        var email_regex = /^[a-z0-9]+@[a-z]+\.[a-z]{2,3}$/;
        var helper_functions = {
            handleUrlParams: function () {
                const url = new URL(window.location.html);
                const params = new URLSearchParams(url.search);
                const utm_source = params.get('utm_source');
                const utm_medium = params.get('utm_medium');
                const utm_campaign = params.get('utm_campaign');
                const utmParams = {
                    utm_source: utm_source || "",
                    utm_medium: utm_medium || "",
                    utm_campaign: utm_campaign || ""
                }
                return utmParams;
            },
            findNestedValue: function (obj, targetKey) {
                for (const key in obj) {
                    if (key === targetKey) {
                        return obj[key];
                    } else if (typeof obj[key] === 'object') {
                        const result = this.findNestedValue(obj[key], targetKey);
                        if (result !== undefined) {
                            return result;
                        }
                    }
                }
                return undefined;
            },
            getPageVisitEvent: function (targetKey, eventObject) {
                var eventObject = {
                    ...eventObject,
                    name: event_strings[targetKey],
                    event_type: event_types.page_visited,
                };
                return eventObject;
            },
            findImmediateParentKey: function (obj, targetKey, parentKey = null) {
                for (const key in obj) {
                    if (key === targetKey) {
                        return parentKey;
                    } else if (typeof obj[key] === 'object') {
                        const result = this.findImmediateParentKey(obj[key], targetKey, key);
                        if (result !== undefined) {
                            return result;
                        }
                    }
                }
                return undefined;
            },
            getInteractionEvent: function (immediateParentKey, eventObject) {
                if (eventObject.event_type && eventObject.event_type === event_types.mousedown_event)
                    var event_type = event_types.mousedown_event;
                else if (eventObject.event_type && eventObject.event_type === event_types.swipe_event)
                    var event_type = event_types.swipe_event;
                else
                    var event_type = event_types.click_event;
                var eventObject = {
                    ...eventObject,
                    name: event_strings[immediateParentKey],
                    event_type
                }
                return eventObject;
            },
            getPageVisitedEventsList: function (events, targetKeys) {
                var page_visited_events_all = []
                targetKeys.forEach(targetKey => {
                    var targetKeyObject = this.findNestedValue(events, targetKey);
                    if (targetKeyObject !== undefined) {
                        var resultObj = this.getPageVisitEvent(targetKey, targetKeyObject);
                        page_visited_events_all.push(resultObj)
                    }
                });
                return page_visited_events_all;
            },
            getInteractionEventsList: function (events, targetKeys) {
                var page_interaction_events_all = []
                targetKeys.forEach(targetKey => {
                    var targetKeyObject = this.findNestedValue(events, targetKey);
                    var immediateParentKey = this.findImmediateParentKey(events, targetKey);
                    if (targetKeyObject !== undefined) {
                        var resultObj = this.getInteractionEvent(immediateParentKey, targetKeyObject);
                        page_interaction_events_all.push(resultObj)
                    }
                });
                return page_interaction_events_all;
            },
            combineEvents: function (requiredEvents) {
                return requiredEvents.flat();
            },
            getAtcClickedData: function (eventObject, click_element) {
                if (
                    variants.length > 0 &&
                    document.querySelector('.t4s-btn-atc_text').innerText.toLowerCase().trim() === "select size"
                )
                    return
                var product_quantity = document.querySelector(".t4s-product-form__buttons .t4s-quantity-input").value;
                var source_type = click_element === ".t4s-sticky-atc__atc" ? "Sticky ATC" : "Product form ATC";
                var variantDetails = {
                    "name": "",
                    product_quantity,
                    source_type
                }
                var variant_to_buy = document.querySelector('.t4s-swatch__item.is--selected');
                if (variant_to_buy) {
                    variant_to_buy = variant_to_buy.getAttribute("data-value")
                    var boughtProduct = variants.filter(function (variant) {
                        return variant.title === variant_to_buy;
                    });
                    variantDetails = {
                        ...variantDetails,
                        variant_title: boughtProduct[0].title || "",
                        variant_price: (boughtProduct[0].price / 100).toFixed(2) || "",
                    }
                } else {
                    variantDetails = {
                        ...variantDetails,
                        variant_title: "" || "",
                        variant_price: "" || "",
                    }
                }
                eventObject.params = {
                    ...eventObject.params,
                    ...variantDetails
                }
            },
            getFiltersAppliedData: function (eventObject) {
                var filters_list = []
                const selectedLiElements = document.querySelectorAll('.t4s-filter__values li.is--selected');
                selectedLiElements.forEach(li => {
                    filters_list.push(li.textContent.trim().split('(')[0])
                });
                eventObject.params = {
                    ...eventObject.params,
                    filters: filters_list
                }
            },
            getAtcSidebarClickedData: function (eventObject, click_element) {
                var source_type = click_element === ".t4s-site-nav__cart" ? "Header Cart Icon" : "View Cart Bottom Bar";
                eventObject.params = {
                    ...eventObject.params,
                    source_type
                }
            },

            getCurrentCartData: function (eventObject, click_element) {
                let cartContainer = $("#cart-item-container");
                let cart_quantity = document.querySelector('[data-cart-count]')?.textContent || "0";
                let cartValue = $(".t4s-cart__totalPrice").eq(0).text() || "0.00";
                let cartItems = cartContainer.find(".mini-cart-item") || [];

                let product_count = cartItems.length;
                let product_type = [];
                cartItems.each(function () {
                    product_type.push($(this).attr('data-product-type'));
                });
                cartValue = cartValue.replace(/,/g, '').match(/(\d+\.\d+)/g)[0] || "0";

                let requiredCartData = {
                    product_count,
                    cart_quantity,
                    product_type: [...new Set(product_type)],
                    cartValue,
                }
                eventObject.params = {
                    ...eventObject.params,
                    ...requiredCartData
                }
            },
            setUpSellProductData: function (eventObject, click_event, e) {
                let addSellBlockEl = e.target;
                const upsellItemClassName = "upsell-item";
                while (addSellBlockEl && !addSellBlockEl.classList.contains(upsellItemClassName)) {
                    addSellBlockEl = addSellBlockEl.parentElement;
                }
                let productType = addSellBlockEl.dataset.type;
                let productTitle = addSellBlockEl.dataset.title;
                let productSku = addSellBlockEl.dataset.sku;
                let productPrice = addSellBlockEl.dataset.price;
                eventObject.params = {
                    ...eventObject.params,
                    cross_sell_product_name: productTitle,
                    cross_sell_product_type: productType,
                    cross_sell_product_price: parseFloat((productPrice / 100)).toFixed(2),
                    cross_sell_product_sku: productSku,
                }
            },

            handleMixpanelRemoveElement: function (e, product_title, variant_id, variant_sku) {
                var source = "index" == 'cart' ? 'Cart Page' : 'Header Cart Icon';
                if (e.target.value == "0") {
                    mixpanel.track(
                        event_strings.atc_interaction, {
                        "interaction_type": "Removing the Product",
                        "product_name": product_title,
                        source
                    }
                    );
                } else {
                    mixpanel.track(
                        event_strings.atc_interaction, {
                        "interaction_type": "Editing the Quantity",
                        "product_name": product_title,
                        "final_quantity": e.target.value,
                        "variant_id": variant_id,
                        "variant_sku": variant_sku,
                        source
                    }
                    );
                }
            },
            getVariantData: function (eventObject, click_element) {
                var selected_variant = document.querySelector(".t4s-swatch__item.is--selected");
                var variant_title = selected_variant.getAttribute("data-value");
                var variant_id = variants.find(obj => obj.title === variant_title)?.id;
                eventObject.params = {
                    ...eventObject.params,
                    "interaction_type": "Variant Selection",
                    variant_title,
                    variant_id
                }
            },
            checkifPincodeTyped: function (eventObject, click_element) {
                var pincode_input = document.getElementById("pincode-input").value;
                eventObject.params = {}
                if (pincode_input.length === 6)
                    eventObject.params = {
                        ...eventObject.params,
                        "interaction_type": "EDD Interaction"
                    }
            },
            getAccordianData: function (eventObject, click_element, e) {
                var accordian_type = $(e.target.parentNode).find('.t4s-tab__text')[0].innerText;
                eventObject.params = {
                    ...eventObject.params,
                    "interaction_type": "Accordion Clicks",
                    accordian_type
                }
            },
            getPdpProductClickSource: function (eventObject, click_element, e) {
                var product_clicked = e.target.parentNode.parentNode.parentNode;
                var productOptions = product_clicked.getAttribute('data-product-options');
                if (product_clicked.getAttribute('isrecommendation') == 'true') {
                    var product_click_source = 'You may also like';
                } else {
                    var product_click_source = 'Recently viewed Products';
                }
                var productOptionsObj = JSON.parse(productOptions);
                var product = {
                    "error": "json not allowed for this object"
                }
                var product_handle = productOptionsObj.handle;
                var product_title = $(product_clicked).find('.t4s-product-title')[0].innerText;
                eventObject.params = {
                    ...eventObject.params,
                    "interaction_type": "Product Click",
                    product_handle,
                    product_title,
                    "source": product_click_source
                }
            },
            trackWriteOrCancelReview: function (eventObject, click_element, e) {
                if (e.target.innerText === "Write a review") {
                    eventObject.params = {
                        ...eventObject.params,
                        "interaction_type": "Write Judgeme Review",
                    }
                } else {
                    eventObject.params = {
                        ...eventObject.params,
                        "interaction_type": "Cancel Judgeme Review",
                    }
                }
            },
            getSubmitReviewData: function (eventObject, click_element, e) {
                var review_remark = document.querySelector("[name='review_body']").value;
                var reviewer_name = document.querySelector("[name='reviewer_name']").value;
                var reviewer_email = document.querySelector("[name='reviewer_email']").value;
                var review_star = document.querySelectorAll(".jdgm-form__rating .jdgm-star.jdgm--on").length;
                if (!review_remark || !reviewer_name || !reviewer_email || !email_regex.test(reviewer_email))
                    return;
                eventObject.params = {
                    ...eventObject.params,
                    "interaction_type": "Submit Judgeme Review",
                    review_remark,
                    review_star
                }
            },
            getfilterLabel: function (eventObject, click_element, e) {
                eventObject.params = {
                    "interaction_type": "Mid-collection used"
                }
                var filter_type = e.target.getAttribute("data-filter-type");
                eventObject.params = {
                    ...eventObject.params,
                    "filter_type": filter_type
                }
            },
            getFilterSource: function (eventObject, click_element, e) {
                eventObject.params = {
                    "interaction_type": "Opening the filter"
                }
                var filter_source = '';
                if (click_element == ".view-all-filters") {
                    filter_source = "Mid Collection View All"
                } else if (click_element == ".collection-filter__label-button") {
                    filter_source = "Quick Filter"
                } else {
                    filter_source = "Filter CTA"
                }
                eventObject.params = {
                    ...eventObject.params,
                    "filter_source": filter_source
                }
            },
            getNavClose: function (eventObject, click_element, e) {
                var navButton = document.querySelector("[data-menu-drawer][is-nav-hidden='false']");
                eventObject.params = {}
                if (navButton) {
                    var nav_status = navButton.getAttribute("is-nav-hidden");
                    if (nav_status == "false") {
                        eventObject.params = {
                            ...eventObject.params,
                            "interaction_type": "Navigation closed"
                        }
                        navButton.setAttribute("is-nav-hidden", "true")
                    }
                }
            },
            getNavOptionName: function (eventObject, click_element, e) {
                var clickedElement = e.currentTarget;
                var navTextElement = clickedElement.querySelector(".t4s-nav_link_txt");
                var navOption;
                if (navTextElement) {
                    navOption = navTextElement.textContent.trim();
                } else {
                    navOption = clickedElement.textContent.trim();
                }
                eventObject.params = {
                    ...eventObject.params,
                    nav_option: navOption
                };
            },
            addEventToNavButton: function () {
                var navButton = document.querySelectorAll("[data-menu-drawer]");
                if (navButton.length) {
                    navButton.forEach(nav => {
                        nav.addEventListener("click", () => {
                            nav.setAttribute("is-nav-hidden", "false");
                        })
                    })
                }
            },
            getCollectionPageNumber: function () {
                var pageNumber;
                var urlParams = new URLSearchParams(window.location.search);
                pageNumber = urlParams.get("page") || "1";
                return pageNumber;
            },
            getApplicableCouponsCount: function (eventObject, click_element) {
                var validCouponList = document.getElementById("valid_coupons_list");
                var activeCount = validCouponList.children.length;
                eventObject.params = {
                    ...eventObject.params,
                    "coupons_active": activeCount
                }
            },
            checkifCouponEnter: function (eventObject, click_element) {
                var couponInput = document.getElementById("coupon-input-cart");
                if (couponInput.value.length > 0) {
                    eventObject.params = {
                        ...eventObject.params,
                        "interaction_type": "Custom Coupon Applied"
                    }
                } else {
                    return;
                }
            }
        }
    </script>

    <script>
        var common_events = {
            page_visited: {},
            page_interaction: {
                filter_interaction: {
                    open_filter: {
                        params: {},
                        clickable_elements: [
                            ".t4s-btn-filter-wrapper",
                            ".view-all-filters",
                            ".collection-filter__label-button"
                        ],
                        callbacks: [helper_functions.getFilterSource]
                    },
                    apply_filter: {
                        params: {
                            "interaction_type": "Applying the filter",
                        },
                        clickable_elements: [
                            ".mm-apply-btn"
                        ],
                        callbacks: [helper_functions.getFiltersAppliedData]
                    },
                    clear_filter: {
                        params: {
                            "interaction_type": "Clearing the selected filters",
                        },
                        clickable_elements: [
                            ".mm-clearall-btn",
                            ".t4s-active-filters__clear"
                        ]
                    },
                    midplp_filter_used: {
                        params: {},
                        clickable_elements: [
                            ".visible-filter-pill"
                        ],
                        callbacks: [helper_functions.getfilterLabel]
                    },
                    midplp_notify_clicked: {
                        params: {
                            "interaction_type": "Notify Us used",
                        },
                        clickable_elements: [
                            ".notify-text"
                        ]
                    }
                },
                cart_viewed: {
                    cart_checked: {
                        params: {
                            "interaction_type": "ATC clicked",
                            "source": "/",
                        },
                        clickable_elements: [
                            ".t4s-site-nav__cart",
                            ".sticky-view-cart",
                            ".t4s-sticky-atc__atc",
                            ".t4s-product-form__submit",
                        ],
                        callbacks: [helper_functions.getCurrentCartData],
                        delayForCallBack: 2000,
                    }
                },
                cart_interaction: {
                    cart_closed: {
                        params: {
                            "interaction_type": "Cart Closed",
                        },
                        clickable_elements: [
                            ".t4s-back-to-shop"
                        ]
                    },
                    checkout_clicked: {
                        params: {
                            "interaction_type": "Checkout clicked",
                            "source": "/"
                        },
                        clickable_elements: [
                            ".cart-checkout-btn-wrapper",
                            ".t4s-btn__checkout"
                        ],
                        event_type: "mousedown_event"
                    },
                    crosssell_added: {
                        params: {
                            "interaction_type": "Cross Sell Added",
                        },
                        clickable_elements: [
                            ".cart-upsell-add-btn"
                        ],
                        callbacks: [helper_functions.setUpSellProductData],
                    },
                    product_removed: {
                        params: {
                            "interaction_type": "Product Removed",
                        },
                        clickable_elements: [
                            ".t4s-quantity-cart-item .remove--icon"
                        ],
                    },
                    product_quantity_edited_via_click: {
                        params: {
                            "interaction_type": "Quantity Edited",
                        },
                        clickable_elements: [
                            ".t4s-quantity-cart-item .is--plus",
                            ".t4s-quantity-cart-item .is--minus > .icon--minus",
                        ],
                    },
                    view_coupon_clicked: {
                        params: {
                            "interaction_type": "View Coupon Clicked",
                        },
                        clickable_elements: [
                            "#coupons-na-wrapper",
                        ],
                    }
                },
                top_nav_interaction: {
                    hamburger_menu_clicked: {
                        params: {
                            "interaction_type": "Hamberger Menu clicked",
                        },
                        clickable_elements: [
                            "[data-menu-drawer]"
                        ]
                    },
                    search_bar_clicked: {
                        params: {
                            "interaction_type": "Search Bar clicked",
                        },
                        clickable_elements: [
                            ".st-search-box"
                        ],
                        event_type: "mousedown_event"
                    },
                    logo_clicked: {
                        params: {
                            "interaction_type": "Logo clicked",
                        },
                        clickable_elements: [
                            ".t4s-header__logo a"
                        ]
                    }
                },
                navigation_interaction: {
                    nav_closed: {
                        params: {},
                        clickable_elements: [
                            ".t4s-close-overlay",
                            ".t4s-drawer-menu__close"
                        ],
                        callbacks: [helper_functions.getNavClose]
                    },
                    nav_clicked: {
                        params: {
                            "interaction_type": "Navigation clicked"
                        },
                        clickable_elements: [
                            ".t4s-menu-item a"
                        ],
                        callbacks: [helper_functions.getNavOptionName],
                        event_type: "mousedown_event"
                    }
                },
                coupon_page_viewed: {
                    coupon_page_view: {
                        params: {
                            "interaction_type": "Coupon Page viewed",
                        },
                        clickable_elements: [
                            "#coupons-na-wrapper",
                        ],
                        callbacks: [helper_functions.getApplicableCouponsCount],
                        event_type: "click_event",
                        delayForCallBack: 2000,
                    }
                },
                coupon_page_interacted: {
                    default_coupon_applied: {
                        params: {
                            "interaction_type": "Default Coupon Applied",
                        },
                        clickable_elements: [
                            ".coupon-apply-button",
                        ],
                        event_type: "click_event"
                    },
                    coupon_field_clicked: {
                        params: {
                            "interaction_type": "Coupon Field Clicked",
                        },
                        clickable_elements: [
                            "#coupon-input-cart",
                        ],
                        event_type: "click_event"
                    },
                    custom_coupon_applied: {
                        params: {},
                        clickable_elements: [
                            "#check-button-coupon",
                        ],
                        callbacks: [helper_functions.checkifCouponEnter],
                        event_type: "click_event"
                    }
                }
            }
        };

        var common_required_events = [
            helper_functions.getPageVisitedEventsList(common_events, []),
            helper_functions.getInteractionEventsList(common_events, ["open_filter", "apply_filter", "clear_filter", "midplp_filter_used", "midplp_notify_clicked", "cart_checked", "cart_closed", "checkout_clicked", "crosssell_added", "product_removed", "product_quantity_edited_via_click", "hamburger_menu_clicked", "search_bar_clicked", "logo_clicked", "nav_closed", "nav_clicked", "view_coupon_clicked", "coupon_page_view", "default_coupon_applied", "coupon_field_clicked", "custom_coupon_applied"])
        ]
        var common_mixpanel_events = helper_functions.combineEvents(common_required_events);
        document.addEventListener("DOMContentLoaded", () => {
            helper_functions.addEventToNavButton();
        });
    </script>




    <script>
        var event_types = {
            page_visited: "page_visited",
            page_interaction: "page_interaction",
            click_event: "click_event",
            mousedown_event: "mousedown_event",
            swipe_event: "swipe_event"
        }

        var event_strings = {
            collection_viewed: "Collection Viewed",
            homepage_viewed: "Home Page Viewed",
            product_viewed: "Product Viewed",
            cart_viewed: "Cart Viewed",
            collection_interaction: "Collection Interaction",
            added_to_cart: "Added to Cart",
            filter_interaction: "Filters Interaction",
            cart_interaction: "Cart Interacted",
            pdp_interaction: "PDP Interaction",
            top_nav_interaction: "Top Nav Interaction",
            navigation_interaction: "Navigation Interaction",
            coupon_page_viewed: "Coupon Page Viewed",
            coupon_page_interacted: "Coupon Page Interacted"
        }
    </script>


    <script>
        var event_types = {
            page_visited: "page_visited",
            page_interaction: "page_interaction",
            click_event: "click_event",
            mousedown_event: "mousedown_event",
            swipe_event: "swipe_event"
        }

        var event_strings = {
            collection_viewed: "Collection Viewed",
            homepage_viewed: "Home Page Viewed",
            product_viewed: "Product Viewed",
            cart_viewed: "Cart Viewed",
            collection_interaction: "Collection Interaction",
            added_to_cart: "Added to Cart",
            filter_interaction: "Filters Interaction",
            cart_interaction: "Cart Interacted",
            pdp_interaction: "PDP Interaction",
            top_nav_interaction: "Top Nav Interaction",
            navigation_interaction: "Navigation Interaction",
            coupon_page_viewed: "Coupon Page Viewed",
            coupon_page_interacted: "Coupon Page Interacted"
        }
    </script>
    <script>
        var variants = null;
        var email_regex = /^[a-z0-9]+@[a-z]+\.[a-z]{2,3}$/;
        var helper_functions = {
            handleUrlParams: function () {
                const url = new URL(window.location.html);
                const params = new URLSearchParams(url.search);
                const utm_source = params.get('utm_source');
                const utm_medium = params.get('utm_medium');
                const utm_campaign = params.get('utm_campaign');
                const utmParams = {
                    utm_source: utm_source || "",
                    utm_medium: utm_medium || "",
                    utm_campaign: utm_campaign || ""
                }
                return utmParams;
            },
            findNestedValue: function (obj, targetKey) {
                for (const key in obj) {
                    if (key === targetKey) {
                        return obj[key];
                    } else if (typeof obj[key] === 'object') {
                        const result = this.findNestedValue(obj[key], targetKey);
                        if (result !== undefined) {
                            return result;
                        }
                    }
                }
                return undefined;
            },
            getPageVisitEvent: function (targetKey, eventObject) {
                var eventObject = {
                    ...eventObject,
                    name: event_strings[targetKey],
                    event_type: event_types.page_visited,
                };
                return eventObject;
            },
            findImmediateParentKey: function (obj, targetKey, parentKey = null) {
                for (const key in obj) {
                    if (key === targetKey) {
                        return parentKey;
                    } else if (typeof obj[key] === 'object') {
                        const result = this.findImmediateParentKey(obj[key], targetKey, key);
                        if (result !== undefined) {
                            return result;
                        }
                    }
                }
                return undefined;
            },
            getInteractionEvent: function (immediateParentKey, eventObject) {
                if (eventObject.event_type && eventObject.event_type === event_types.mousedown_event)
                    var event_type = event_types.mousedown_event;
                else if (eventObject.event_type && eventObject.event_type === event_types.swipe_event)
                    var event_type = event_types.swipe_event;
                else
                    var event_type = event_types.click_event;
                var eventObject = {
                    ...eventObject,
                    name: event_strings[immediateParentKey],
                    event_type
                }
                return eventObject;
            },
            getPageVisitedEventsList: function (events, targetKeys) {
                var page_visited_events_all = []
                targetKeys.forEach(targetKey => {
                    var targetKeyObject = this.findNestedValue(events, targetKey);
                    if (targetKeyObject !== undefined) {
                        var resultObj = this.getPageVisitEvent(targetKey, targetKeyObject);
                        page_visited_events_all.push(resultObj)
                    }
                });
                return page_visited_events_all;
            },
            getInteractionEventsList: function (events, targetKeys) {
                var page_interaction_events_all = []
                targetKeys.forEach(targetKey => {
                    var targetKeyObject = this.findNestedValue(events, targetKey);
                    var immediateParentKey = this.findImmediateParentKey(events, targetKey);
                    if (targetKeyObject !== undefined) {
                        var resultObj = this.getInteractionEvent(immediateParentKey, targetKeyObject);
                        page_interaction_events_all.push(resultObj)
                    }
                });
                return page_interaction_events_all;
            },
            combineEvents: function (requiredEvents) {
                return requiredEvents.flat();
            },
            getAtcClickedData: function (eventObject, click_element) {
                if (
                    variants.length > 0 &&
                    document.querySelector('.t4s-btn-atc_text').innerText.toLowerCase().trim() === "select size"
                )
                    return
                var product_quantity = document.querySelector(".t4s-product-form__buttons .t4s-quantity-input").value;
                var source_type = click_element === ".t4s-sticky-atc__atc" ? "Sticky ATC" : "Product form ATC";
                var variantDetails = {
                    "name": "",
                    product_quantity,
                    source_type
                }
                var variant_to_buy = document.querySelector('.t4s-swatch__item.is--selected');
                if (variant_to_buy) {
                    variant_to_buy = variant_to_buy.getAttribute("data-value")
                    var boughtProduct = variants.filter(function (variant) {
                        return variant.title === variant_to_buy;
                    });
                    variantDetails = {
                        ...variantDetails,
                        variant_title: boughtProduct[0].title || "",
                        variant_price: (boughtProduct[0].price / 100).toFixed(2) || "",
                    }
                } else {
                    variantDetails = {
                        ...variantDetails,
                        variant_title: "" || "",
                        variant_price: "" || "",
                    }
                }
                eventObject.params = {
                    ...eventObject.params,
                    ...variantDetails
                }
            },
            getFiltersAppliedData: function (eventObject) {
                var filters_list = []
                const selectedLiElements = document.querySelectorAll('.t4s-filter__values li.is--selected');
                selectedLiElements.forEach(li => {
                    filters_list.push(li.textContent.trim().split('(')[0])
                });
                eventObject.params = {
                    ...eventObject.params,
                    filters: filters_list
                }
            },
            getAtcSidebarClickedData: function (eventObject, click_element) {
                var source_type = click_element === ".t4s-site-nav__cart" ? "Header Cart Icon" : "View Cart Bottom Bar";
                eventObject.params = {
                    ...eventObject.params,
                    source_type
                }
            },

            getCurrentCartData: function (eventObject, click_element) {
                let cartContainer = $("#cart-item-container");
                let cart_quantity = document.querySelector('[data-cart-count]')?.textContent || "0";
                let cartValue = $(".t4s-cart__totalPrice").eq(0).text() || "0.00";
                let cartItems = cartContainer.find(".mini-cart-item") || [];

                let product_count = cartItems.length;
                let product_type = [];
                cartItems.each(function () {
                    product_type.push($(this).attr('data-product-type'));
                });
                cartValue = cartValue.replace(/,/g, '').match(/(\d+\.\d+)/g)[0] || "0";

                let requiredCartData = {
                    product_count,
                    cart_quantity,
                    product_type: [...new Set(product_type)],
                    cartValue,
                }
                eventObject.params = {
                    ...eventObject.params,
                    ...requiredCartData
                }
            },
            setUpSellProductData: function (eventObject, click_event, e) {
                let addSellBlockEl = e.target;
                const upsellItemClassName = "upsell-item";
                while (addSellBlockEl && !addSellBlockEl.classList.contains(upsellItemClassName)) {
                    addSellBlockEl = addSellBlockEl.parentElement;
                }
                let productType = addSellBlockEl.dataset.type;
                let productTitle = addSellBlockEl.dataset.title;
                let productSku = addSellBlockEl.dataset.sku;
                let productPrice = addSellBlockEl.dataset.price;
                eventObject.params = {
                    ...eventObject.params,
                    cross_sell_product_name: productTitle,
                    cross_sell_product_type: productType,
                    cross_sell_product_price: parseFloat((productPrice / 100)).toFixed(2),
                    cross_sell_product_sku: productSku,
                }
            },

            handleMixpanelRemoveElement: function (e, product_title, variant_id, variant_sku) {
                var source = "index" == 'cart' ? 'Cart Page' : 'Header Cart Icon';
                if (e.target.value == "0") {
                    mixpanel.track(
                        event_strings.atc_interaction, {
                        "interaction_type": "Removing the Product",
                        "product_name": product_title,
                        source
                    }
                    );
                } else {
                    mixpanel.track(
                        event_strings.atc_interaction, {
                        "interaction_type": "Editing the Quantity",
                        "product_name": product_title,
                        "final_quantity": e.target.value,
                        "variant_id": variant_id,
                        "variant_sku": variant_sku,
                        source
                    }
                    );
                }
            },
            getVariantData: function (eventObject, click_element) {
                var selected_variant = document.querySelector(".t4s-swatch__item.is--selected");
                var variant_title = selected_variant.getAttribute("data-value");
                var variant_id = variants.find(obj => obj.title === variant_title)?.id;
                eventObject.params = {
                    ...eventObject.params,
                    "interaction_type": "Variant Selection",
                    variant_title,
                    variant_id
                }
            },
            checkifPincodeTyped: function (eventObject, click_element) {
                var pincode_input = document.getElementById("pincode-input").value;
                eventObject.params = {}
                if (pincode_input.length === 6)
                    eventObject.params = {
                        ...eventObject.params,
                        "interaction_type": "EDD Interaction"
                    }
            },
            getAccordianData: function (eventObject, click_element, e) {
                var accordian_type = $(e.target.parentNode).find('.t4s-tab__text')[0].innerText;
                eventObject.params = {
                    ...eventObject.params,
                    "interaction_type": "Accordion Clicks",
                    accordian_type
                }
            },
            getPdpProductClickSource: function (eventObject, click_element, e) {
                var product_clicked = e.target.parentNode.parentNode.parentNode;
                var productOptions = product_clicked.getAttribute('data-product-options');
                if (product_clicked.getAttribute('isrecommendation') == 'true') {
                    var product_click_source = 'You may also like';
                } else {
                    var product_click_source = 'Recently viewed Products';
                }
                var productOptionsObj = JSON.parse(productOptions);
                var product = {
                    "error": "json not allowed for this object"
                }
                var product_handle = productOptionsObj.handle;
                var product_title = $(product_clicked).find('.t4s-product-title')[0].innerText;
                eventObject.params = {
                    ...eventObject.params,
                    "interaction_type": "Product Click",
                    product_handle,
                    product_title,
                    "source": product_click_source
                }
            },
            trackWriteOrCancelReview: function (eventObject, click_element, e) {
                if (e.target.innerText === "Write a review") {
                    eventObject.params = {
                        ...eventObject.params,
                        "interaction_type": "Write Judgeme Review",
                    }
                } else {
                    eventObject.params = {
                        ...eventObject.params,
                        "interaction_type": "Cancel Judgeme Review",
                    }
                }
            },
            getSubmitReviewData: function (eventObject, click_element, e) {
                var review_remark = document.querySelector("[name='review_body']").value;
                var reviewer_name = document.querySelector("[name='reviewer_name']").value;
                var reviewer_email = document.querySelector("[name='reviewer_email']").value;
                var review_star = document.querySelectorAll(".jdgm-form__rating .jdgm-star.jdgm--on").length;
                if (!review_remark || !reviewer_name || !reviewer_email || !email_regex.test(reviewer_email))
                    return;
                eventObject.params = {
                    ...eventObject.params,
                    "interaction_type": "Submit Judgeme Review",
                    review_remark,
                    review_star
                }
            },
            getfilterLabel: function (eventObject, click_element, e) {
                eventObject.params = {
                    "interaction_type": "Mid-collection used"
                }
                var filter_type = e.target.getAttribute("data-filter-type");
                eventObject.params = {
                    ...eventObject.params,
                    "filter_type": filter_type
                }
            },
            getFilterSource: function (eventObject, click_element, e) {
                eventObject.params = {
                    "interaction_type": "Opening the filter"
                }
                var filter_source = '';
                if (click_element == ".view-all-filters") {
                    filter_source = "Mid Collection View All"
                } else if (click_element == ".collection-filter__label-button") {
                    filter_source = "Quick Filter"
                } else {
                    filter_source = "Filter CTA"
                }
                eventObject.params = {
                    ...eventObject.params,
                    "filter_source": filter_source
                }
            },
            getNavClose: function (eventObject, click_element, e) {
                var navButton = document.querySelector("[data-menu-drawer][is-nav-hidden='false']");
                eventObject.params = {}
                if (navButton) {
                    var nav_status = navButton.getAttribute("is-nav-hidden");
                    if (nav_status == "false") {
                        eventObject.params = {
                            ...eventObject.params,
                            "interaction_type": "Navigation closed"
                        }
                        navButton.setAttribute("is-nav-hidden", "true")
                    }
                }
            },
            getNavOptionName: function (eventObject, click_element, e) {
                var clickedElement = e.currentTarget;
                var navTextElement = clickedElement.querySelector(".t4s-nav_link_txt");
                var navOption;
                if (navTextElement) {
                    navOption = navTextElement.textContent.trim();
                } else {
                    navOption = clickedElement.textContent.trim();
                }
                eventObject.params = {
                    ...eventObject.params,
                    nav_option: navOption
                };
            },
            addEventToNavButton: function () {
                var navButton = document.querySelectorAll("[data-menu-drawer]");
                if (navButton.length) {
                    navButton.forEach(nav => {
                        nav.addEventListener("click", () => {
                            nav.setAttribute("is-nav-hidden", "false");
                        })
                    })
                }
            },
            getCollectionPageNumber: function () {
                var pageNumber;
                var urlParams = new URLSearchParams(window.location.search);
                pageNumber = urlParams.get("page") || "1";
                return pageNumber;
            },
            getApplicableCouponsCount: function (eventObject, click_element) {
                var validCouponList = document.getElementById("valid_coupons_list");
                var activeCount = validCouponList.children.length;
                eventObject.params = {
                    ...eventObject.params,
                    "coupons_active": activeCount
                }
            },
            checkifCouponEnter: function (eventObject, click_element) {
                var couponInput = document.getElementById("coupon-input-cart");
                if (couponInput.value.length > 0) {
                    eventObject.params = {
                        ...eventObject.params,
                        "interaction_type": "Custom Coupon Applied"
                    }
                } else {
                    return;
                }
            }
        }
    </script>

    <script>
        var {
            utm_source,
            utm_medium,
            utm_campaign
        } = helper_functions.handleUrlParams();
        var page_number = helper_functions.getCollectionPageNumber();

        var events = {
            page_visited: {
                collection_viewed: {
                    params: {
                        "name": "",
                        "handle": "",
                        "product_count": "",
                        "collection_id": "",
                        page_number
                    }
                },
                homepage_viewed: {
                    params: {
                        "name": "Main page"
                    }
                },
                product_viewed: {
                    params: {
                        "name": "",
                        "price": "",
                        "brand": "",
                        "collection_title": "",
                        "variant": "",
                        "product_id": "",
                        "product_type": "",
                        "product_tags": "",
                        "product_reviews": "",
                        "product_rating": "",
                        utm_source,
                        utm_medium,
                        utm_campaign
                    }
                }
            },
            page_interaction: {
                collection_interaction: {
                    first_glance_banner: {
                        params: {
                            "interaction_type": "First Glance banner clicked",
                        },
                        clickable_elements: [
                            ".banner-collection--img"
                        ]
                    },
                    sub_navigation: {
                        params: {
                            "interaction_type": "Sub-navigation clicked",
                        },
                        clickable_elements: [
                            ".collection--img"
                        ]
                    },
                    mid_collection_banner: {
                        params: {
                            "interaction_type": "Mid Collection Banner clicked",
                        },
                        clickable_elements: [
                            ".lead-gen-banner"
                        ]
                    },
                    fbv_toggle_clicked: {
                        params: {
                            "interaction_type": "FBV Toggle clicked",
                        },
                        clickable_elements: [
                            "#toggle-switch"
                        ]
                    },
                    fbv_information_clicked: {
                        params: {
                            "interaction_type": "FBV information clicked",
                        },
                        clickable_elements: [
                            ".fbv_info"
                        ]
                    }
                },
                added_to_cart: {
                    atc_btn_click: {
                        params: {},
                        clickable_elements: [
                            ".t4s-sticky-atc__atc",
                            ".t4s-product-form__submit"
                        ],
                        callbacks: [helper_functions.getAtcClickedData]
                    },
                    freq_bought: {
                        params: {
                            "name": "",
                            "source_type": "Frequently Bought Together"
                        },
                        clickable_elements: [
                            ".cbb-frequently-bought-add-button"
                        ],
                        event_type: "mousedown_event"
                    }
                },
                pdp_interaction: {
                    variant_click: {
                        params: {},
                        clickable_elements: [".t4s-swatch__item"],
                        callbacks: [helper_functions.getVariantData]
                    },
                    check_pincode: {
                        params: {},
                        clickable_elements: [".check-button"],
                        callbacks: [helper_functions.checkifPincodeTyped]
                    },
                    accordian_clicked: {
                        params: {},
                        clickable_elements: ["[data-t4s-tab-item]"],
                        callbacks: [helper_functions.getAccordianData]
                    },
                    product_click: {
                        params: {},
                        clickable_elements: [".t4s-product-inner"],
                        callbacks: [helper_functions.getPdpProductClickSource]
                    },
                    write_or_cancel_review: {
                        params: {},
                        clickable_elements: ["a.jdgm-write-rev-link"],
                        event_type: "mousedown_event",
                        callbacks: [helper_functions.trackWriteOrCancelReview]
                    },
                    cancel_review: {
                        params: {
                            "interaction_type": "Cancel Judgeme Review"
                        },
                        clickable_elements: ["a.jdgm-cancel-rev"]
                    },
                    submit_review: {
                        params: {},
                        clickable_elements: [".jdgm-submit-rev"],
                        callbacks: [helper_functions.getSubmitReviewData]
                    },
                    image_clicked: {
                        params: {
                            "interaction_type": "Image Clicked",
                            "product_handle": "",
                            "product_name": ""
                        },
                        clickable_elements: [".t4s-product__media-item"]
                    },
                    image_swiped_touch: {
                        params: {
                            "interaction_type": "Image Swiped",
                            "product_handle": "",
                            "product_name": ""
                        },
                        clickable_elements: [".pdp-image-gallery-mobile"],
                        event_type: "swipe_event"
                    },
                    image_swiped_click: {
                        params: {
                            "interaction_type": "Image Swiped",
                            "product_handle": "",
                            "product_name": ""
                        },
                        clickable_elements: [".pdp-image-gallery-mobile .flickityt4s-button"]
                    },
                    best_offer_click: {
                        params: {
                            "interaction_type": "Best Offers Clicked",
                            "product_handle": "",
                            "product_name": ""
                        },
                        clickable_elements: [".dynamic-offer-info"]
                    },
                    copy_code_click: {
                        params: {
                            "interaction_type": "Copy Code Clicked",
                            "source": "Availaible Offers"
                        },
                        clickable_elements: [".imageOverlay"]
                    },
                    about_thread_count: {
                        params: {
                            "interaction_type": "About Thread Count Clicked",
                        },
                        clickable_elements: [".thread-count-info"]
                    },
                    locate_cta_click: {
                        params: {
                            "interaction_type": "Locate CTA Clicked",
                        },
                        clickable_elements: [".locate-pincode-wrapper"]
                    },
                    return_policy_click: {
                        params: {
                            "interaction_type": "Return Policy Clicked",
                        },
                        clickable_elements: ["#return-policy-badge .delivery-badges-info-img"]
                    },
                    reviews_click: {
                        params: {
                            "interaction_type": "Reviews Clicked",
                        },
                        clickable_elements: [".t4s-product__review"],
                        event_type: "mousedown_event"
                    },
                    best_offer_interaction: {
                        params: {
                            "interaction_type": "Copy Code Clicked",
                            "source": "Best Offers"
                        },
                        clickable_elements: [".copy-coupon-clipboard-wrapper"]
                    },
                    share_button_click: {
                        params: {
                            "interaction_type": "Share Button Clicked",
                        },
                        clickable_elements: ["#product-share-icon"],
                        event_type: "mousedown_event"
                    }
                }
            }
        };

        var required_events = [
            helper_functions.getPageVisitedEventsList(events, ["homepage_viewed"]),
            helper_functions.getInteractionEventsList(events, [])
        ]
        var pagewise_mixpanel_events = helper_functions.combineEvents(required_events);
    </script>



    <script>
        var mixpanel_events = [...pagewise_mixpanel_events, ...common_mixpanel_events]
        const customerLoggedIn = null;

        function handleCallbacks(eventObject, click_event, e) {
            if (eventObject.callbacks?.length > 0) {
                eventObject.callbacks.forEach((callback) => {
                    if (typeof callback === 'function') {
                        callback(eventObject, click_event, e);
                    }
                })
            }
        }

        function handleEvents(eventObject) {
            if (eventObject.params && Object.keys(eventObject.params).length === 0)
                return

            mixpanel.track(
                eventObject.name,
                eventObject.params
            );

        }

        function initMixPanelEvent() {
            if (customerLoggedIn) {
                mixpanel.identify('');
                mixpanel.people.set_once({
                    "id": "",
                    "first_name": "",
                    "last_name": "",
                    "email": "",
                    "phone": "",
                    "orders_count": "",
                    "total_spent": ""
                });
            }
            mixpanel.track_links("#nav a", "click nav link", {
                "referrer": document.referrer
            });

            if (mixpanel_events.length > 0) {
                mixpanel_events.forEach(eventObject => {
                    switch (eventObject.event_type) {
                        case event_types.page_visited:
                            handleEvents(eventObject);
                            break;
                        case event_types.click_event:
                            if (eventObject.clickable_elements) {
                                eventObject.clickable_elements.forEach((click_event) => {
                                    $(document).on('click', click_event, function (e) {
                                        var delay = eventObject?.delayForCallBack || 0;
                                        setTimeout(() => {
                                            handleCallbacks(eventObject, click_event, e);
                                            handleEvents(eventObject);
                                        }, delay);
                                    });
                                })
                            }
                            break;
                        case event_types.mousedown_event:
                            if (eventObject.clickable_elements) {
                                eventObject.clickable_elements.forEach((click_event) => {
                                    $(document).on('mousedown', click_event, function (e) {
                                        handleCallbacks(eventObject, click_event, e);
                                        handleEvents(eventObject);
                                    });
                                })
                            }
                            break;
                        case event_types.swipe_event:
                            if (eventObject.clickable_elements) {
                                eventObject.clickable_elements.forEach((swipe_event) => {
                                    let touchstartX = 0;
                                    let touchendX = 0;
                                    $(document).on('touchstart', swipe_event, function (e) {
                                        touchstartX = e.changedTouches[0].screenX;
                                    });
                                    $(document).on('touchend', swipe_event, function (e) {
                                        touchendX = e.changedTouches[0].screenX;
                                        const difference = touchendX - touchstartX;
                                        if (Math.abs(difference) > 50) {
                                            handleCallbacks(eventObject, swipe_event, e);
                                            handleEvents(eventObject);
                                        }
                                    });
                                })
                            }
                            break;
                        default:
                            console.log("Init Mixpanel");
                    }
                })
            }
        }
        initMixPanelEvent();
    </script>



    <!-- DeltaX Media optimization Tag Added By AKO 30 11 23-->
    <!-- End of DeltaX Media optimization Tag -->
    <script src="cdn/shop/t/130/assets/starRatingGenerator6987.js?v=143208796052626417531708928283"></script>
    <script>
        /* Add Reusable function here */
        function setSessionStorageItem(key, value) {
            sessionStorage.setItem(key, value);
        }

        function getSessionStorageItem(key) {
            return sessionStorage.getItem(key);
        }

        function setLocalStorageItem(key, value) {
            localStorage.setItem(key, value);
        }

        function getLocalStorageItem(key) {
            return localStorage.getItem(key);
        }
    </script>
    <img alt="icon" id="svgicon" width="1400" height="1400"
        style="pointer-events: none; position: absolute; top: 0; left: 0; width: 99vw; height: 99vh; max-width: 99vw; max-height: 99vh;"
        src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48c3ZnIHdpZHRoPSI5OTk5OXB4IiBoZWlnaHQ9Ijk5OTk5cHgiIHZpZXdCb3g9IjAgMCA5OTk5OSA5OTk5OSIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj48ZyBzdHJva2U9Im5vbmUiIGZpbGw9Im5vbmUiIGZpbGwtb3BhY2l0eT0iMCI+PHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9Ijk5OTk5IiBoZWlnaHQ9Ijk5OTk5Ij48L3JlY3Q+IDwvZz4gPC9zdmc+"
        loading="lazy"><img alt="icon" id="svgicon" width="1400" height="1400"
        style="pointer-events: none; position: absolute; top: 0; left: 0; width: 99vw; height: 99vh; max-width: 99vw; max-height: 99vh;"
        src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48c3ZnIHdpZHRoPSI5OTk5OXB4IiBoZWlnaHQ9Ijk5OTk5cHgiIHZpZXdCb3g9IjAgMCA5OTk5OSA5OTk5OSIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj48ZyBzdHJva2U9Im5vbmUiIGZpbGw9Im5vbmUiIGZpbGwtb3BhY2l0eT0iMCI+PHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9Ijk5OTk5IiBoZWlnaHQ9Ijk5OTk5Ij48L3JlY3Q+IDwvZz4gPC9zdmc+"
        loading="eager">
    <!-- Affise CashKaro Code don't delete -Start -->
    <script>
        try {
            console.log('ck head script initiated')
            // var ckSurvivalMinutes = 30; //in mins
            var ckSurvivalMinutes = 7 * 24 * 60 // number of days  
            // Define the number of mins for cookie survival

            // Function to extract query parameters from the URL
            var getCKSearchParams = function () {
                var searchParams = new URLSearchParams(window.location.search);
                var params = {};
                // Iterate through the query parameters and store them in the 'params' object
                searchParams.forEach(function (value, key) {
                    params[key] = value;
                });
                return params;
            }

            // Function to store query parameters in local storage
            var storeCKInLocalStorage = function (params) {
                // Remove specific items from local storage if they are not present in 'params'
                if (!('gclid' in params)) {
                    localStorage.removeItem('ck_gclid');
                }
                if (!('fbclid' in params)) {
                    localStorage.removeItem('ck_fbclid');
                }
                if (!('igshid' in params)) {
                    localStorage.removeItem('ck_igshid');
                }
                if (!('gad_source' in params)) {
                    localStorage.removeItem('ck_gad_source')
                }
                if (!('msclkid' in params)) {
                    localStorage.removeItem('ck_msclkid')
                }

                // If any of the specified parameters are present, clear all 'ck_' items from local storage
                if ('gclid' in params || 'fbclid' in params || 'igshid' in params || 'gad_source' in params || 'msclkid' in params) {
                    Object.keys(localStorage).forEach(function (key) {
                        if (/^ck_/.test(key)) {
                            localStorage.removeItem(key);
                        }
                    });
                } else {
                    // Store each query parameter in local storage with a 'ck_' prefix
                    for (var key in params) {
                        if (params.hasOwnProperty(key)) {
                            localStorage.setItem("ck_" + key, params[key]);
                        }
                    }

                    // Store the current timestamp in local storage
                    var currentTimestamp = Math.floor(Date.now() / 1000); // Convert milliseconds to seconds
                    localStorage.setItem('ck_timestamp', currentTimestamp);
                }
            }
            // Get the query parameters from the URL
            var ckSearchParams = getCKSearchParams();
            console.log('ckSearchParams :', ckSearchParams)
            // Store the query parameters in local storage
            storeCKInLocalStorage(ckSearchParams);
            console.log('head script ended')
        } catch (error) {
            console.log('ck_head_error', error)
        }
    </script>
    <!-- Affise CashKaro Code don't delete or edit - End -->

    <script defer src='../rtb.dspcdn.org/manifest.js'></script>
    <script async src="../scripts.openinapp.com/7b345a08-70eb-4f7e-b474-2f170b4e2948.js" />
    <!-- BEGIN app block: shopify://apps/quinn-shoppable-videos/blocks/app-embed/150d2781-732b-4020-a9fb-1368e974e6bb -->





    <!-- BEGIN app snippet: init -->





    <script data-app="quinn">
        window.Quinn = {};
        Quinn.ab_test_enabled = false;
        Quinn.ab_test_id = "test01";
        Quinn.ab_enabled_for_widgets = ["floating", "cards", "story"];
        Quinn.ab_enabled_on_pages = [];
    </script>





    <script data-app="quinn">
        Quinn.shop_domain = "vaareehome.myshopify.com";
        Quinn.page_type = "home";
        Quinn.page_handle = "#\/";
        Quinn.currency_symbol = "" || "₹",
            Quinn.design_mode = false;
        Quinn.facebook_pixel_tracking = null;
        Quinn.settings = {
            "story": {
                "visibility": "both",
                "hero_text_color": "#ffffff",
                "hero_text": "WATCH \u0026 BUY!",
                "hero_title": "Bestsellers",
                "show_hero_story": true,
                "is_sticky": false,
                "website_header_identifier": "#shopify-section-header",
                "top_offset_on_collection_mobile": "0",
                "top_offset_on_collection_desktop": "0",
                "top_offset_on_product_mobile": "0",
                "top_offset_on_product_desktop": "0",
                "top_offset_on_home_mobile": "0",
                "top_offset_on_home_desktop": "0"
            },
            "cards": {
                "visibility": "both",
                "show_first_product_price": true,
                "use_variant_price": true,
                "reviewsPlaceholder": "New Arrival",
                "cards_heading": ""
            },
            "imaxvideo": {
                "visibility": "both"
            },
            "overlay": {
                "close_overlay_back_button": false,
                "change_image_on_variant_change": false,
                "cart_selector": "#t4s-mini_cart",
                "swatch_selector_keys": "color",
                "selector_types": "{\"Size\":\"size\",\"Color\":\"shade\",\"Shade\":\"shade\",\"Flavour\":\"dropdown\"}",
                "hide_elements": "",
                "swipe_direction": "vertical",
                "prevent_header_update": false,
                "move_to_next_story": false,
                "uniform_group_overlay_ux": false,
                "is_muted": false,
                "overlay_z_index": "99999",
                "should_open_image_overlay": false,
                "redirect_url": "",
                "redirect_product_click": false,
                "show_media_title_in_group_overlay": false,
                "use_swatch_images": false,
                "sort_variant_by_quantity": false,
                "show_overlay_title_for_all_widgets": false,
                "disable_overlay_minimiser": false,
                "move_to_next_video": false,
                "tap_to_switch_story": false,
                "always_show_products": false
            },
            "floating": {
                "disable_widget": false,
                "floating_type": "rectangle",
                "floating_side": "right",
                "mobile_floating_right": "20",
                "mobile_floating_bottom": 140,
                "desktop_floating_right": "20",
                "desktop_floating_bottom": 140,
                "floating_zindex": "9999",
                "show_circle_close_btn": true,
                "hide_on_rectangle_close": false
            },
            "floating_tray": {
                "enable_widget": false,
                "mobile_floating_bottom": "100",
                "desktop_floating_bottom": "100",
                "slider_text": "REVIEWS"
            },
            "general": {
                "cart_provider": "auto",
                "should_loop_overlay": true,
                "review_provider": "none",
                "currency_symbol": "",
                "show_decimal_price": false,
                "store_offers": "[]",
                "show_branding": false,
                "branding_text_color": "#6D7278",
                "show_overlay_branding": true,
                "overlay_branding_text_color": "#FFFFF",
                "show_video_watermark": true,
                "video_watermark_text_color": "#6D7278",
                "checkout_video_tagging": false,
                "is_market_enabled": false,
                "default_market_country_code": "",
                "gaid": "",
                "fbid": "",
                "shopflowid": "",
                "storeLogoUrl": "",
                "vlpFontScript": "",
                "storeCDNPrefix": "",
                "enable_quinn_cdn": false,
                "disable_ga_events": false,
                "disable_fb_events": false,
                "network_interceptor": false,
                "tracking_injection": true,
                "disable_vibrations": false,
                "prevent_price_round": false,
                "swap_currency_symbol": false
            },
            "customiser": {
                "card_cutoff_price": "true",
                "review_provider": "none",
                "video_cutoff_price_visibility": "true",
                "primaryBtn_title": "Shop now",
                "tertiaryBtn_title": "More info",
                "tertiaryBtn_visibility": "true",
                "secondaryBtn_title": "Add to cart",
                "popup_text": "Watch \u0026 Buy",
                "popup_size": "Small",
                "floating_tray_text": "",
                "floating_tray_bottom_height": "50px"
            },
            "checkout": {
                "ab_enabled": false,
                "ab_test_id": ""
            },
            "clp": {
                "button_position": "top_right",
                "z_index": "9999",
                "vertical_offset": "10",
                "horizontal_offset": "10",
                "button_text": "Quick view"
            },
            "enable_interceptor": false,
            "cart_tracking": false,
            "ab_testing": false,
            "ab_testing_id": "test01",
            "show_ab_testing_analytics": false,
            "ab_control_group_percentage": "50",
            "calc_net_speed": false,
            "enable_gif": false,
            "subscription": {
                "plan_name": "FREE"
            },
            "forced_disabled": false,
            "setupCompleted": true,
            "events": ["quinn_events_product_view", "quinn_events_overlay_open", "quinn_events_overlay_close", "quinn_events_system_action", "quinn_events_custom_action", "quinn_events_overlay_media_interaction", "quinn_events_overlay_swipe", "quinn_events_widget_impression", "quinn_events_page_view", "quinn_events_page_scroll", "quinn_events_cta_clicked"],
            "ab_enabled_on_pages": [],
            "ab_enabled_for_widgets": [],
            "onboarding": {
                "signupCompleted": true,
                "subscribed": true
            },
            "pallet": {
                "--quinn-primary-text-color": "#fff",
                "--quinn-primary-color": "#000",
                "--quinn-primary-border-color": "#000",
                "--quinn-secondary-text-color": "#000",
                "--quinn-secondary-color": "#e8c363",
                "--quinn-secondary-border-color": "#FED716",
                "--quinn-story-outline-color": "#e8c463",
                "--quinn-story-title-color": "#000000",
                "--quinn-cart-checkout-btn-bg-color": "#fff",
                "--quinn-cart-checkout-btn-color": "#000",
                "--quinn-cart-checkout-border-color": "#eee"
            }
        };
        Quinn.version = "quinn-shoppable-videos-206";
        Quinn.pallet = null;
        Quinn.functions = {};
        Quinn.utils = {};
        Quinn.app_id = "5905719";
        Quinn.page_widgets = [];
        Quinn.timestamp = Date.now();
        Quinn.Events = {};
        Quinn.CUSTOM_QUINN_EVENTS = {};
        Quinn.appType = 'shopify';
        Quinn.sft = "6e64aee761af951f1e0ac280d98fb53a";
        Quinn.cdn = "@@vaaree.com@cdn@shop@files@quinn-live.bundle.js?316383";
        Quinn.view_threshold_miliseconds = 0;
        console.log("%cShoppable videos powered by quinn.live", "font-size: 1.2em; font-weight: bolder; text-shadow: #000 1px 1px; background-color: #0388fc; padding: 10px 10%; color: #fff; text-align: center;")
        console.log(`%cversion: ${Quinn.version
            }`, "font-size: 1em; font-weight: bolder;")
        localStorage.setItem("_quinn-shop-domain", Quinn.shop_domain);
    </script>


    <script data-app="quinn">
        Quinn.cdn = Quinn
            .cdn.replace(/@/g, 'index.html')
            .split('index.html')
            .slice(0, -1)
            .join('index.html') + '/';
        Quinn.isNewApp = true;
    </script>



    <script data-app="quinn">
        if (!window.quinnExtensionCdnUrl) {
            const quinnOverlayUrl = "../cdn.shopify.com/extensions/8c95974f-9289-4316-95c8-820ba00203a3/quinn-shoppable-videos-206/assets/quinn-overlay.bundle.js";
            const quinnExtensionUrl = quinnOverlayUrl.split("index.html");
            quinnExtensionUrl.pop();
            window.quinnExtensionCdnUrl = quinnExtensionUrl.join("index.html") + '/';
        }
    </script>
    <script></script>
    <script></script>
    <script>
        window.OPEN_CART = () => {
            document.querySelector('a[href="/cart"]').click()
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const targetNode = document.querySelector("#quinn-cards-1");


            function createScrollButtons() {
                let leftButton = document.createElement("button");
                let rightButton = document.createElement("button");
                leftButton.textContent = "<";
                rightButton.textContent = ">";
                leftButton.classList.add("leftButton");
                rightButton.classList.add("rightButton");
                let parentElement = document.querySelector("#quinn-cards-1");
                parentElement.appendChild(leftButton);
                parentElement.appendChild(rightButton);

                return {
                    leftButton,
                    rightButton,
                };
            }

            function setupScrolling() {
                const {
                    leftButton,
                    rightButton
                } = createScrollButtons();
                let scrollableElement;
                if (window.innerWidth >= 501) {
                    scrollableElement = document.querySelector(".quinn-cards-desktop");
                } else {
                    scrollableElement = document.querySelector(".quinn-cards-mobile");
                }
                let scrollPosition = 0;

                leftButton.addEventListener("click", () => scrollLeft());
                rightButton.addEventListener("click", () => scrollRight());
                leftButton.addEventListener("touchstart", () => scrollLeft());
                rightButton.addEventListener("touchstart", () => scrollRight());

                function scrollLeft() {
                    if (window.innerWidth >= 501) {
                        scrollPosition = Math.max(scrollPosition - 300, 0);
                    } else {
                        scrollPosition = Math.max(scrollPosition - 100, 0);
                    }
                    scrollableElement.scrollTo({
                        left: scrollPosition,
                        behavior: "smooth",
                    });
                }

                function scrollRight() {
                    const maxScrollPosition =
                        scrollableElement.scrollWidth - scrollableElement.offsetWidth;
                    if (window.innerWidth >= 501) {
                        scrollPosition = Math.min(scrollPosition + 300, maxScrollPosition);
                    } else {
                        scrollPosition = Math.min(scrollPosition + 100, maxScrollPosition);
                    }
                    scrollableElement.scrollTo({
                        left: scrollPosition,
                        behavior: "smooth",
                    });
                }
            }

            function handleMutation(mutationsList, observer) {
                for (const mutation of mutationsList) {
                    if (mutation.type === "childList") {
                        const addedNodes = mutation.addedNodes;
                        for (const addedNode of addedNodes) {
                            if (addedNode.childNodes && addedNode.childNodes[8]?.childNodes) {
                                observer.disconnect();
                                setupScrolling();
                            }
                        }
                    }
                }
            }

            if (targetNode) {
                const observer = new MutationObserver(handleMutation);
                const config = {
                    childList: true,
                    subtree: true
                };
                observer.observe(targetNode, config);
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let quinnCards = Array.from(
                document.querySelectorAll(".quinn_cards_widget")
            );
            quinnCards.forEach((elem) => {
                elem.classList.add("t4s-container");
            });
        });
    </script>
    <!-- END app snippet -->

    <!-- BEGIN app snippet: asset -->



    <script
        src="../cdn.shopify.com/extensions/8c95974f-9289-4316-95c8-820ba00203a3/quinn-shoppable-videos-206/assets/quinn-live.bundle.js"
        defer="defer" data-app="quinn" type="module"></script><!-- END app snippet -->

    <!-- BEGIN app snippet: asset -->



    <script data-app="quinn">
        Quinn.overlay_url = "../cdn.shopify.com/extensions/8c95974f-9289-4316-95c8-820ba00203a3/quinn-shoppable-videos-206/assets/quinn-overlay.bundle.js";
    </script><!-- END app snippet -->

    <!-- BEGIN app snippet: asset -->



    <script
        src="../cdn.shopify.com/extensions/8c95974f-9289-4316-95c8-820ba00203a3/quinn-shoppable-videos-206/assets/quinn-vendor.bundle.js"
        defer="defer" data-app="quinn" type="module"></script><!-- END app snippet -->
    <!-- BEGIN app snippet: asset -->



    <script data-app="quinn">
        Quinn.chunk_overlay_variants_url = "../cdn.shopify.com/extensions/8c95974f-9289-4316-95c8-820ba00203a3/quinn-shoppable-videos-206/assets/OverlayInfoVariants-svelte.js";
    </script><!-- END app snippet -->
    <!-- BEGIN app snippet: asset -->



    <script data-app="quinn">
        Quinn.chunk_overlay_video_url = "../cdn.shopify.com/extensions/8c95974f-9289-4316-95c8-820ba00203a3/quinn-shoppable-videos-206/assets/OverlayVideo-svelte.js";
    </script><!-- END app snippet -->
    <!-- BEGIN app snippet: asset -->



    <script data-app="quinn">
        Quinn.chunk_overlay_volume_btn_url = "../cdn.shopify.com/extensions/8c95974f-9289-4316-95c8-820ba00203a3/quinn-shoppable-videos-206/assets/VolumeButton-svelte.js";
    </script><!-- END app snippet -->
    <!-- BEGIN app snippet: asset -->



    <script data-app="quinn">
        Quinn.chunk_overlay_info_variants_url = "../cdn.shopify.com/extensions/8c95974f-9289-4316-95c8-820ba00203a3/quinn-shoppable-videos-206/assets/OverlayInfoVariants-svelte.js";
    </script><!-- END app snippet -->
    <!-- BEGIN app snippet: asset -->



    <script data-app="quinn">
        Quinn.chunk_overlay_cart_btn_url = "../cdn.shopify.com/extensions/8c95974f-9289-4316-95c8-820ba00203a3/quinn-shoppable-videos-206/assets/CartButton-svelte.js";
    </script><!-- END app snippet -->
    <!-- BEGIN app snippet: asset -->



    <script data-app="quinn">
        Quinn.chunk_overlay_video_group_url = "../cdn.shopify.com/extensions/8c95974f-9289-4316-95c8-820ba00203a3/quinn-shoppable-videos-206/assets/OverlayVideoGroup-svelte.js";
    </script><!-- END app snippet -->
    <!-- BEGIN app snippet: asset -->



    <script data-app="quinn">
        Quinn.chunk_overlay_info_products_url = "../cdn.shopify.com/extensions/8c95974f-9289-4316-95c8-820ba00203a3/quinn-shoppable-videos-206/assets/OverlayInfoProducts-svelte.js";
    </script><!-- END app snippet -->
    <!-- BEGIN app snippet: asset -->



    <script data-app="quinn">
        Quinn.chunk_overlay_mobile_products_container_url = "../cdn.shopify.com/extensions/8c95974f-9289-4316-95c8-820ba00203a3/quinn-shoppable-videos-206/assets/OverlayMobileProductsContainer-svelte.js";
    </script><!-- END app snippet -->
    <!-- BEGIN app snippet: asset -->



    <script data-app="quinn">
        Quinn.chunk_overlay_info_product_images_url = "../cdn.shopify.com/extensions/8c95974f-9289-4316-95c8-820ba00203a3/quinn-shoppable-videos-206/assets/OverlayInfoProductImages-svelte.js";
    </script><!-- END app snippet -->
    <!-- BEGIN app snippet: asset -->



    <script data-app="quinn">
        Quinn.chunk_overlay_info_product_description_url = "../cdn.shopify.com/extensions/8c95974f-9289-4316-95c8-820ba00203a3/quinn-shoppable-videos-206/assets/OverlayInfoProductDescription-svelte.js";
    </script><!-- END app snippet -->




    <!-- BEGIN app snippet: asset -->



    <script
        src="../cdn.shopify.com/extensions/8c95974f-9289-4316-95c8-820ba00203a3/quinn-shoppable-videos-206/assets/quinn-floating.bundle.js"
        defer="defer" data-app="quinn" type="module"></script><!-- END app snippet -->
    <!-- BEGIN app snippet: floating -->





    <!-- END app snippet -->





    <!-- END app app block --><!-- BEGIN app block: shopify://apps/frequently-bought-together/blocks/app-embed-block/b1a8cbea-c844-4842-9529-7c62dbab1b1f -->
    <script
        src="../cdn.codeblackbelt.com/scripts/frequently-bought-together/bootstrap.minbac4.js?version=2024041113+0530"
        async></script>
    <!-- END app app block --><!-- BEGIN app block: shopify://apps/judge-me-product-reviews/blocks/judgeme_core/61ccd3b1-a9f2-4160-9fe9-4fec8413e5d8 --><!-- Start of Judge.me Core -->
    <link rel="dns-prefetch" href="https://cdn.judge.me/">
    <script data-cfasync='false' class='jdgm-settings-script'>
        window.jdgmSettings = {
            "pagination": 5,
            "disable_web_reviews": false,
            "badge_no_review_text": "No reviews",
            "badge_n_reviews_text": "{{ average_rating_1_decimal }} ({{ n }}) ",
            "badge_star_color": "#e8c463",
            "hide_badge_preview_if_no_reviews": true,
            "badge_hide_text": false,
            "enforce_center_preview_badge": false,
            "widget_title": "Product Review By Customers",
            "widget_open_form_text": "Write a review",
            "widget_close_form_text": "Cancel review",
            "widget_refresh_page_text": "Refresh page",
            "widget_summary_text": "Based on {{ number_of_reviews }} review/reviews",
            "widget_no_review_text": "Be the first to write a review",
            "widget_name_field_text": "Name",
            "widget_verified_name_field_text": "Name (public)",
            "widget_name_placeholder_text": "Enter your name (public)",
            "widget_required_field_error_text": "This field is required.",
            "widget_email_field_text": "Email",
            "widget_verified_email_field_text": "Verified Email (private, can not be edited)",
            "widget_email_placeholder_text": "Enter your email (private)",
            "widget_email_field_error_text": "Please enter a valid email address.",
            "widget_rating_field_text": "Product Rating",
            "widget_review_title_field_text": "Review Title",
            "widget_review_title_placeholder_text": "Give your review a title",
            "widget_review_body_field_text": "Review",
            "widget_review_body_placeholder_text": "Write your comments here",
            "widget_pictures_field_text": "Picture/Video (optional)",
            "widget_submit_review_text": "Submit Review",
            "widget_submit_verified_review_text": "Submit Verified Review",
            "widget_submit_success_msg_with_auto_publish": "Thank you! Please refresh the page in a few moments to see your review. You can remove or edit your review by logging into \u003ca href='https://judge.me/login' target='_blank' rel='nofollow noopener'\u003eJudge.me\u003c/a\u003e",
            "widget_submit_success_msg_no_auto_publish": "Thank you! Your review will be published as soon as it is approved by the shop admin. You can remove or edit your review by logging into \u003ca href='https://judge.me/login' target='_blank' rel='nofollow noopener'\u003eJudge.me\u003c/a\u003e",
            "widget_show_default_reviews_out_of_total_text": "Showing {{ n_reviews_shown }} out of {{ n_reviews }} reviews.",
            "widget_show_all_link_text": "Show all",
            "widget_show_less_link_text": "Show less",
            "widget_author_said_text": "{{ reviewer_name }} said:",
            "widget_days_text": "{{ n }} days ago",
            "widget_weeks_text": "{{ n }} week/weeks ago",
            "widget_months_text": "{{ n }} month/months ago",
            "widget_years_text": "{{ n }} year/years ago",
            "widget_yesterday_text": "Yesterday",
            "widget_today_text": "Today",
            "widget_replied_text": "\u003e\u003e {{ shop_name }} replied:",
            "widget_read_more_text": "Read more",
            "widget_rating_filter_color": "#e8c463",
            "widget_rating_filter_see_all_text": "See all reviews",
            "widget_sorting_most_recent_text": "Most Recent",
            "widget_sorting_highest_rating_text": "Highest Rating",
            "widget_sorting_lowest_rating_text": "Lowest Rating",
            "widget_sorting_with_pictures_text": "Only Pictures",
            "widget_sorting_most_helpful_text": "Most Helpful",
            "widget_open_question_form_text": "Ask a question",
            "widget_reviews_subtab_text": "Reviews",
            "widget_questions_subtab_text": "Questions",
            "widget_question_label_text": "Question",
            "widget_answer_label_text": "Answer",
            "widget_question_placeholder_text": "Write your question here",
            "widget_submit_question_text": "Submit Question",
            "widget_question_submit_success_text": "Thank you for your question! We will notify you once it gets answered.",
            "widget_star_color": "#e8c463",
            "verified_badge_text": "Verified",
            "verified_badge_placement": "left-of-reviewer-name",
            "widget_hide_border": false,
            "widget_social_share": false,
            "widget_thumb": false,
            "widget_review_location_show": false,
            "widget_location_format": "country_iso_code",
            "all_reviews_include_out_of_store_products": true,
            "all_reviews_out_of_store_text": "(out of store)",
            "all_reviews_product_name_prefix_text": "about",
            "enable_review_pictures": true,
            "enable_question_anwser": false,
            "review_date_format": "timestamp",
            "default_sort_method": "highest-rating",
            "widget_product_reviews_subtab_text": "Product Reviews",
            "widget_shop_reviews_subtab_text": "Shop Reviews",
            "widget_sorting_pictures_first_text": "Pictures First",
            "floating_tab_button_name": "★ Judge.me Reviews",
            "floating_tab_title": "Let customers speak for us",
            "floating_tab_url": "",
            "floating_tab_url_enabled": false,
            "all_reviews_text_badge_text": "Customers rate us {{ shop.metafields.judgeme.all_reviews_rating | round: 1 }}/5 based on {{ shop.metafields.judgeme.all_reviews_count }} reviews.",
            "all_reviews_text_badge_text_branded_style": "{{ shop.metafields.judgeme.all_reviews_rating | round: 1 }} out of 5 stars based on {{ shop.metafields.judgeme.all_reviews_count }} reviews",
            "all_reviews_text_badge_url": "",
            "featured_carousel_title": "Hear from our customers",
            "featured_carousel_count_text": "from {{ n }} reviews",
            "featured_carousel_url": "",
            "featured_carousel_arrows_on_the_sides": true,
            "verified_count_badge_url": "",
            "widget_rating_preset_default": 0,
            "widget_histogram_use_custom_color": true,
            "picture_reminder_submit_button": "Upload Pictures",
            "mute_video_by_default": true,
            "widget_sorting_videos_first_text": "Videos First",
            "widget_review_pending_text": "Pending",
            "featured_carousel_items_for_large_screen": 5,
            "remove_microdata_snippet": false,
            "preview_badge_no_question_text": "No questions",
            "preview_badge_n_question_text": "{{ number_of_questions }} question/questions",
            "remove_judgeme_branding": true,
            "widget_search_bar_placeholder": "Search reviews",
            "widget_sorting_verified_only_text": "Verified only",
            "all_reviews_page_load_more_text": "Load More Reviews",
            "widget_advanced_speed_features": 5,
            "widget_public_name_text": "displayed publicly like",
            "default_reviewer_name_has_non_latin": true,
            "widget_reviewer_anonymous": "Anonymous",
            "medals_widget_title": "Judge.me Review Medals",
            "widget_invalid_yt_video_url_error_text": "Not a YouTube video URL",
            "widget_max_length_field_error_text": "Please enter no more than {0} characters.",
            "widget_verified_by_shop_text": "Verified by Shop",
            "widget_show_photo_gallery": true,
            "widget_load_with_code_splitting": true,
            "widget_ugc_title": "Made by us, Shared by you",
            "widget_ugc_subtitle": "Tag us to see your picture featured in our page",
            "widget_ugc_primary_button_text": "Buy Now",
            "widget_ugc_secondary_button_text": "Load More",
            "widget_ugc_reviews_button_text": "View Reviews",
            "widget_primary_color": "#222222",
            "widget_enable_secondary_color": true,
            "widget_secondary_color": "#e8c463",
            "widget_summary_average_rating_text": "{{ average_rating }} out of 5",
            "widget_media_grid_title": "Customer photos \u0026 videos",
            "widget_media_grid_see_more_text": "See more",
            "widget_round_style": true,
            "widget_show_product_medals": false,
            "widget_verified_by_judgeme_text": "Verified by Judge.me",
            "widget_show_store_medals": false,
            "widget_verified_by_judgeme_text_in_store_medals": "Verified by Judge.me",
            "widget_media_field_exceed_quantity_message": "Sorry, we can only accept {{ max_media }} for one review.",
            "widget_media_field_exceed_limit_message": "{{ file_name }} is too large, please select a {{ media_type }} less than {{ size_limit }}MB.",
            "widget_review_submitted_text": "Review Submitted!",
            "widget_question_submitted_text": "Question Submitted!",
            "widget_close_form_text_question": "Cancel",
            "widget_write_your_answer_here_text": "Write your answer here",
            "widget_show_collected_by_judgeme": false,
            "widget_collected_by_judgeme_text": "collected by Judge.me",
            "widget_load_more_text": "Load More",
            "widget_full_review_text": "Full Review",
            "widget_read_more_reviews_text": "Read More Reviews",
            "widget_read_questions_text": "Read Questions",
            "widget_questions_and_answers_text": "Questions \u0026 Answers",
            "widget_verified_by_text": "Verified by",
            "widget_number_of_reviews_text": "{{ number_of_reviews }} reviews",
            "widget_back_button_text": "Back",
            "widget_next_button_text": "Next",
            "widget_custom_forms_filter_button": "Filters",
            "custom_forms_style": "vertical",
            "how_reviews_are_collected": "How reviews are collected?",
            "widget_gdpr_statement": "How we use your data: We’ll only contact you about the review you left, and only if necessary. By submitting your review, you agree to Judge.me’s \u003ca href='https://judge.me/terms' target='_blank' rel='nofollow noopener'\u003eterms and conditions\u003c/a\u003e and \u003ca href='https://judge.me/privacy' target='_blank' rel='nofollow noopener'\u003eprivacy policy\u003c/a\u003e.",
            "preview_badge_collection_page_install_preference": true,
            "preview_badge_home_page_install_preference": true,
            "preview_badge_product_page_install_preference": true,
            "review_widget_best_location": true,
            "platform": "shopify",
            "branding_url": "https://judge.me/reviews/vaareehome",
            "branding_text": "Powered by Judge.me",
            "locale": "en",
            "reply_name": "Vaaree",
            "widget_version": "3.0",
            "footer": true,
            "autopublish": true,
            "review_dates": true,
            "enable_custom_form": true,
            "shop_use_review_site": true,
            "can_be_branded": true
        };
    </script>




    <script data-cfasync='false' class='jdgm-script'>
        ! function (e) {
            window.jdgm = window.jdgm || {}, jdgm.CDN_HOST = "https://cdn.judge.me/",
                jdgm.docReady = function (d) {
                    (e.attachEvent ? "complete" === e.readyState : "loading" !== e.readyState) ?
                        setTimeout(d, 0) : e.addEventListener("DOMContentLoaded", d)
                }, jdgm.loadCSS = function (d, t, o, a) {
                    !o && jdgm.loadCSS.requestedUrls.indexOf(d) >= 0 || (jdgm.loadCSS.requestedUrls.push(d),
                        (a = e.createElement("link")).rel = "stylesheet", a.class = "jdgm-stylesheet", a.media = "nope!",
                        a.href = d, a.onload = function () {
                            this.media = "all", t && setTimeout(t)
                        }, e.body.appendChild(a))
                },
                jdgm.loadCSS.requestedUrls = [], jdgm.loadJS = function (e, d) {
                    var t = new XMLHttpRequest;
                    t.onreadystatechange = function () {
                        4 === t.readyState && (Function(t.response)(), d && d(t.response))
                    },
                        t.open("GET.html", e), t.send()
                }, jdgm.docReady((function () {
                    (window.jdgmLoadCSS || e.querySelectorAll(
                        ".jdgm-widget, .jdgm-all-reviews-page").length > 0) && (jdgmSettings.widget_load_with_code_splitting ?
                            parseFloat(jdgmSettings.widget_version) >= 3 ? jdgm.loadCSS(jdgm.CDN_HOST + "widget_v3/base.css") :
                                jdgm.loadCSS(jdgm.CDN_HOST + "widget/base.css") : jdgm.loadCSS(jdgm.CDN_HOST + "shopify_v2.css"),
                            jdgm.loadJS(jdgm.CDN_HOST + "loader.js"))
                }))
        }(document);
    </script>
    <noscript>
        <link rel="stylesheet" type="text/css" media="all" href="../cdn.judge.me/shopify_v2.css">
    </noscript>

    <!-- BEGIN app snippet: theme_fix_tags -->
    <script>
        (function () {
            var jdgmThemeFixes = null;
            if (!jdgmThemeFixes) return;
            var thisThemeFix = jdgmThemeFixes[Shopify.theme.id];
            if (!thisThemeFix) return;

            if (thisThemeFix.html) {
                document.addEventListener("DOMContentLoaded", function () {
                    var htmlDiv = document.createElement('div');
                    htmlDiv.classList.add('jdgm-theme-fix-html');
                    htmlDiv.innerHTML = thisThemeFix.html;
                    document.body.append(htmlDiv);
                });
            };

            if (thisThemeFix.css) {
                var styleTag = document.createElement('style');
                styleTag.classList.add('jdgm-theme-fix-style');
                styleTag.innerHTML = thisThemeFix.css;
                document.head.append(styleTag);
            };

            if (thisThemeFix.js) {
                var scriptTag = document.createElement('script');
                scriptTag.classList.add('jdgm-theme-fix-script');
                scriptTag.innerHTML = thisThemeFix.js;
                document.head.append(scriptTag);
            };
        })();
    </script>
    <!-- END app snippet -->
    <!-- End of Judge.me Core -->




    <!-- END app app block -->
    <script
        src="../cdn.shopify.com/extensions/34099ab7-06db-46da-bb17-b078f5cca95c/0.17.0/assets/contlo_messaging_v1.js"
        type="text/javascript" defer="defer"></script>
    <link href="https://monorail-edge.shopifysvc.com/" rel="dns-prefetch">
    <script>
        (function () {
            if ("sendBeacon" in navigator && "performance" in window) {
                var session_token = document.cookie.match(/_shopify_s=([^;]*)/);

                function handle_abandonment_event(e) {
                    var entries = performance.getEntries().filter(function (entry) {
                        return /monorail-edge.shopifysvc.com/.test(entry.name);
                    });
                    if (!window.abandonment_tracked && entries.length === 0) {
                        window.abandonment_tracked = true;
                        var currentMs = Date.now();
                        var navigation_start = performance.timing.navigationStart;
                        var payload = {
                            shop_id: 63225266422,
                            url: window.location.href,
                            navigation_start,
                            duration: currentMs - navigation_start,
                            session_token: session_token && session_token.length === 2 ? session_token[1] : "",
                            page_type: "index"
                        };
                        window.navigator.sendBeacon("https://monorail-edge.shopifysvc.com/v1/produce", JSON.stringify({
                            schema_id: "online_store_buyer_site_abandonment/1.1",
                            payload: payload,
                            metadata: {
                                event_created_at_ms: currentMs,
                                event_sent_at_ms: currentMs
                            }
                        }));
                    }
                }
                window.addEventListener('pagehide', handle_abandonment_event);
            }
        }());
    </script>
    <script id="web-pixels-manager-setup">
        (function e(e, n, a, t, r) {
            var o = "function" == typeof BigInt && -1 !== BigInt.toString().indexOf("[native code]") ? "modern" : "legacy";
            window.Shopify = window.Shopify || {};
            var i = window.Shopify;
            i.analytics = i.analytics || {};
            var s = i.analytics;
            s.replayQueue = [], s.publish = function (e, n, a) {
                return s.replayQueue.push([e, n, a]), !0
            };
            try {
                self.performance.mark("wpm:start")
            } catch (e) { }
            var l = [a, "/wpm", "/b", r, o.substring(0, 1), ".js"].join("");
            ! function (e) {
                var n = e.src,
                    a = e.async,
                    t = void 0 === a || a,
                    r = e.onload,
                    o = e.onerror,
                    i = document.createElement("script"),
                    s = document.head,
                    l = document.body;
                i.async = t, i.src = n, r && i.addEventListener("load", r), o && i.addEventListener("error", o), s ? s.appendChild(i) : l ? l.appendChild(i) : console.error("Did not find a head or body element to append the script")
            }({
                src: l,
                async: !0,
                onload: function () {
                    var a = window.webPixelsManager.init(e);
                    n(a);
                    var t = window.Shopify.analytics;
                    t.replayQueue.forEach((function (e) {
                        var n = e[0],
                            t = e[1],
                            r = e[2];
                        a.publishCustomEvent(n, t, r)
                    })), t.replayQueue = [], t.publish = a.publishCustomEvent, t.visitor = a.visitor
                },
                onerror: function () {
                    var n = e.storefrontBaseUrl.replace(/\/$/, ""),
                        a = "".concat(n, "/.well-known/shopify/monorail/unstable/produce_batch"),
                        r = JSON.stringify({
                            metadata: {
                                event_sent_at_ms: (new Date).getTime()
                            },
                            events: [{
                                schema_id: "web_pixels_manager_load/2.0",
                                payload: {
                                    version: t || "latest",
                                    page_url: self.location.href,
                                    status: "failed",
                                    error_msg: "".concat(l, " has failed to load")
                                },
                                metadata: {
                                    event_created_at_ms: (new Date).getTime()
                                }
                            }]
                        });
                    try {
                        if (self.navigator.sendBeacon.bind(self.navigator)(a, r)) return !0
                    } catch (e) { }
                    var o = new XMLHttpRequest;
                    try {
                        return o.open("POST.html", a, !0), o.setRequestHeader("Content-Type", "text/plain"), o.send(r), !0
                    } catch (e) {
                        console && console.warn && console.warn("[Web Pixels Manager] Got an unhandled error while logging a load error.")
                    }
                    return !1
                }
            })
        })({
            shopId: 63225266422,
            storefrontBaseUrl: "https://vaaree.com",
            cdnBaseUrl: "https://vaaree.com/cdn",
            surface: "storefront-renderer",
            enabledBetaFlags: [],
            webPixelsConfigList: [{
                "id": "17498358",
                "eventPayloadVersion": "1",
                "runtimeContext": "LAX",
                "scriptVersion": "16",
                "type": "CUSTOM",
                "privacyPurposes": null
            }, {
                "id": "23593206",
                "eventPayloadVersion": "1",
                "runtimeContext": "LAX",
                "scriptVersion": "1",
                "type": "CUSTOM",
                "privacyPurposes": null
            }, {
                "id": "shopify-app-pixel",
                "configuration": "{}",
                "eventPayloadVersion": "v1",
                "runtimeContext": "STRICT",
                "scriptVersion": "063",
                "apiClientId": "shopify-pixel",
                "type": "APP",
                "purposes": ["ANALYTICS"]
            }, {
                "id": "shopify-custom-pixel",
                "eventPayloadVersion": "v1",
                "runtimeContext": "LAX",
                "scriptVersion": "063",
                "apiClientId": "shopify-pixel",
                "type": "CUSTOM",
                "purposes": ["ANALYTICS"]
            }],
            initData: {
                "cart": null,
                "checkout": null,
                "customer": null,
                "productVariants": []
            },
        }, function pageEvents(webPixelsManagerAPI) {
            webPixelsManagerAPI.publish("page_viewed");
        }, "cdn.html", "0.0.470", "cad39b03we51f70f0pbc988c4cmaac70d51",);
    </script>
    <script>
        window.ShopifyAnalytics = window.ShopifyAnalytics || {};
        window.ShopifyAnalytics.meta = window.ShopifyAnalytics.meta || {};
        window.ShopifyAnalytics.meta.currency = 'INR';
        var meta = {
            "page": {
                "pageType": "home"
            }
        };
        for (var attr in meta) {
            window.ShopifyAnalytics.meta[attr] = meta[attr];
        }
    </script>
    <script>
        window.ShopifyAnalytics.merchantGoogleAnalytics = function () {

        };
    </script>
    <script class="analytics">
        (window.gaDevIds = window.gaDevIds || []).push('BwiEti');


        (function () {
            var customDocumentWrite = function (content) {
                var jquery = null;

                if (window.jQuery) {
                    jquery = window.jQuery;
                } else if (window.Checkout && window.Checkout.$) {
                    jquery = window.Checkout.$;
                }

                if (jquery) {
                    jquery('body').append(content);
                }
            };

            var hasLoggedConversion = function (token) {
                if (token) {
                    return document.cookie.indexOf('loggedConversion=' + token) !== -1;
                }
                return false;
            }

            var setCookieIfConversion = function (token) {
                if (token) {
                    var twoMonthsFromNow = new Date(Date.now());
                    twoMonthsFromNow.setMonth(twoMonthsFromNow.getMonth() + 2);

                    document.cookie = 'loggedConversion=' + token + '; expires=' + twoMonthsFromNow;
                }
            }

            var trekkie = window.ShopifyAnalytics.lib = window.trekkie = window.trekkie || [];
            if (trekkie.integrations) {
                return;
            }
            trekkie.methods = [
                'identify',
                'page',
                'ready',
                'track',
                'trackForm',
                'trackLink'
            ];
            trekkie.factory = function (method) {
                return function () {
                    var args = Array.prototype.slice.call(arguments);
                    args.unshift(method);
                    trekkie.push(args);
                    return trekkie;
                };
            };
            for (var i = 0; i < trekkie.methods.length; i++) {
                var key = trekkie.methods[i];
                trekkie[key] = trekkie.factory(key);
            }
            trekkie.load = function (config) {
                trekkie.config = config || {};
                trekkie.config.initialDocumentCookie = document.cookie;
                var first = document.getElementsByTagName('script')[0];
                var script = document.createElement('script');
                script.type = 'text/javascript';
                script.onerror = function (e) {
                    var scriptFallback = document.createElement('script');
                    scriptFallback.type = 'text/javascript';
                    scriptFallback.onerror = function (error) {
                        var Monorail = {
                            produce: function produce(monorailDomain, schemaId, payload) {
                                var currentMs = new Date().getTime();
                                var event = {
                                    schema_id: schemaId,
                                    payload: payload,
                                    metadata: {
                                        event_created_at_ms: currentMs,
                                        event_sent_at_ms: currentMs
                                    }
                                };
                                return Monorail.sendRequest("https://" + monorailDomain + "/v1/produce", JSON.stringify(event));
                            },
                            sendRequest: function sendRequest(endpointUrl, payload) {
                                // Try the sendBeacon API
                                if (window && window.navigator && typeof window.navigator.sendBeacon === 'function' && typeof window.Blob === 'function' && !Monorail.isIos12()) {
                                    var blobData = new window.Blob([payload], {
                                        type: 'text/plain'
                                    });

                                    if (window.navigator.sendBeacon(endpointUrl, blobData)) {
                                        return true;
                                    } // sendBeacon was not successful

                                } // XHR beacon

                                var xhr = new XMLHttpRequest();

                                try {
                                    xhr.open('POST.html', endpointUrl);
                                    xhr.setRequestHeader('Content-Type', 'text/plain');
                                    xhr.send(payload);
                                } catch (e) {
                                    console.log(e);
                                }

                                return false;
                            },
                            isIos12: function isIos12() {
                                return window.navigator.userAgent.lastIndexOf('iPhone; CPU iPhone OS 12_') !== -1 || window.navigator.userAgent.lastIndexOf('iPad; CPU OS 12_') !== -1;
                            }
                        };
                        Monorail.produce('monorail-edge.shopifysvc.com',
                            'trekkie_storefront_load_errors/1.1', {
                            shop_id: 63225266422,
                            theme_id: 137352380662,
                            app_name: "storefront",
                            context_url: window.location.href,
                            source_url: "//vaaree.com/cdn/s/trekkie.storefront.2eced10260225d6798d99c4a95501a3f587f6b15.min.js"
                        });

                    };
                    scriptFallback.async = true;
                    scriptFallback.src = 'cdn/s/trekkie.storefront.2eced10260225d6798d99c4a95501a3f587f6b15.min.js';
                    first.parentNode.insertBefore(scriptFallback, first);
                };
                script.async = true;
                script.src = 'cdn/s/trekkie.storefront.2eced10260225d6798d99c4a95501a3f587f6b15.min.js';
                first.parentNode.insertBefore(script, first);
            };
            trekkie.load({
                "Trekkie": {
                    "appName": "storefront",
                    "development": false,
                    "defaultAttributes": {
                        "shopId": 63225266422,
                        "isMerchantRequest": null,
                        "themeId": 137352380662,
                        "themeCityHash": "3219878503051795806",
                        "contentLanguage": "en",
                        "currency": "INR"
                    },
                    "isServerSideCookieWritingEnabled": true,
                    "monorailRegion": "shop_domain",
                    "enabledBetaFlags": ["bbcf04e6"]
                },
                "Google Analytics": {
                    "trackingId": "UA-226389592-1",
                    "domain": "auto",
                    "siteSpeedSampleRate": "10",
                    "enhancedEcommerce": true,
                    "doubleClick": true,
                    "includeSearch": true
                },
                "Facebook Pixel": {
                    "pixelIds": ["1413873692414915"],
                    "agent": "plshopify1.2"
                },
                "Session Attribution": {},
                "S2S": {
                    "facebookCapiEnabled": true,
                    "facebookAppPixelId": "1413873692414915",
                    "source": "trekkie-storefront-renderer"
                }
            });

            var loaded = false;
            trekkie.ready(function () {
                if (loaded) return;
                loaded = true;

                window.ShopifyAnalytics.lib = window.trekkie;

                ga('require', 'linker');

                function addListener(element, type, callback) {
                    if (element.addEventListener) {
                        element.addEventListener(type, callback);
                    } else if (element.attachEvent) {
                        element.attachEvent('on' + type, callback);
                    }
                }

                function decorate(event) {
                    event = event || window.event;
                    var target = event.target || event.srcElement;
                    if (target && (target.getAttribute('action') || target.getAttribute('href'))) {
                        ga(function (tracker) {
                            var linkerParam = tracker.get('linkerParam');
                            document.cookie = '_shopify_ga=' + linkerParam + '; ' + 'path=/';
                        });
                    }
                }
                addListener(window, 'load', function () {
                    for (var i = 0; i < document.forms.length; i++) {
                        var action = document.forms[i].getAttribute('action');
                        if (action && action.indexOf('/cart') >= 0) {
                            addListener(document.forms[i], 'submit', decorate);
                        }
                    }
                    for (var i = 0; i < document.links.length; i++) {
                        var href = document.links[i].getAttribute('href');
                        if (href && href.indexOf('/checkout') >= 0) {
                            addListener(document.links[i], 'click', decorate);
                        }
                    }
                });


                var originalDocumentWrite = document.write;
                document.write = customDocumentWrite;
                try {
                    window.ShopifyAnalytics.merchantGoogleAnalytics.call(this);
                } catch (error) { };
                document.write = originalDocumentWrite;

                window.ShopifyAnalytics.lib.page(null, {
                    "pageType": "home"
                });

                var match = window.location.pathname.match(/checkouts\/(.+)\/(thank_you|post_purchase)/)
                var token = match ? match[1] : undefined;
                if (!hasLoggedConversion(token)) {
                    setCookieIfConversion(token);

                }
            });


            var eventsListenerScript = document.createElement('script');
            eventsListenerScript.async = true;
            eventsListenerScript.src = "cdn/shopifycloud/shopify/assets/shop_events_listener-61fa9e0a912c675e178777d2b27f6cbd482f8912a6b0aa31fa3515985a8cd626.js";
            document.getElementsByTagName('head')[0].appendChild(eventsListenerScript);

        })();
    </script>
    <script class="boomerang">
        (function () {
            if (window.BOOMR && (window.BOOMR.version || window.BOOMR.snippetExecuted)) {
                return;
            }
            window.BOOMR = window.BOOMR || {};
            window.BOOMR.snippetStart = new Date().getTime();
            window.BOOMR.snippetExecuted = true;
            window.BOOMR.snippetVersion = 12;
            window.BOOMR.application = "storefront-renderer";
            window.BOOMR.themeName = "Kalles";
            window.BOOMR.themeVersion = "4.2.0";
            window.BOOMR.shopId = 63225266422;
            window.BOOMR.themeId = 137352380662;
            window.BOOMR.renderRegion = "gcp-asia-southeast1";
            window.BOOMR.url =
                "cdn/shopifycloud/boomerang/shopify-boomerang-1.0.0.min.js";
            var where = document.currentScript || document.getElementsByTagName("script")[0];
            var parentNode = where.parentNode;
            var promoted = false;
            var LOADER_TIMEOUT = 3000;

            function promote() {
                if (promoted) {
                    return;
                }
                var script = document.createElement("script");
                script.id = "boomr-scr-as";
                script.src = window.BOOMR.url;
                script.async = true;
                parentNode.appendChild(script);
                promoted = true;
            }

            function iframeLoader(wasFallback) {
                promoted = true;
                var dom, bootstrap, iframe, iframeStyle;
                var doc = document;
                var win = window;
                window.BOOMR.snippetMethod = wasFallback ? "if" : "i";
                bootstrap = function (parent, scriptId) {
                    var script = doc.createElement("script");
                    script.id = scriptId || "boomr-if-as";
                    script.src = window.BOOMR.url;
                    BOOMR_lstart = new Date().getTime();
                    parent = parent || doc.body;
                    parent.appendChild(script);
                };
                if (!window.addEventListener && window.attachEvent && navigator.userAgent.match(/MSIE [67]./)) {
                    window.BOOMR.snippetMethod = "s";
                    bootstrap(parentNode, "boomr-async");
                    return;
                }
                iframe = document.createElement("IFRAME");
                iframe.src = "about:blank";
                iframe.title = "";
                iframe.role = "presentation";
                iframe.loading = "eager";
                iframeStyle = (iframe.frameElement || iframe).style;
                iframeStyle.width = 0;
                iframeStyle.height = 0;
                iframeStyle.border = 0;
                iframeStyle.display = "none";
                parentNode.appendChild(iframe);
                try {
                    win = iframe.contentWindow;
                    doc = win.document.open();
                } catch (e) {
                    dom = document.domain;
                    iframe.src = "javascript:var d=document.open();d.domain='" + dom + "';void(0);";
                    win = iframe.contentWindow;
                    doc = win.document.open();
                }
                if (dom) {
                    doc._boomrl = function () {
                        this.domain = dom;
                        bootstrap();
                    };
                    doc.write("<body onload='document._boomrl();'>");
                } else {
                    win._boomrl = function () {
                        bootstrap();
                    };
                    if (win.addEventListener) {
                        win.addEventListener("load", win._boomrl, false);
                    } else if (win.attachEvent) {
                        win.attachEvent("onload", win._boomrl);
                    }
                }
                doc.close();
            }
            var link = document.createElement("link");
            if (link.relList &&
                typeof link.relList.supports === "function" &&
                link.relList.supports("preload") &&
                ("as" in link)) {
                window.BOOMR.snippetMethod = "p";
                link.href = window.BOOMR.url;
                link.rel = "preload";
                link.as = "script";
                link.addEventListener("load", promote);
                link.addEventListener("error", function () {
                    iframeLoader(true);
                });
                setTimeout(function () {
                    if (!promoted) {
                        iframeLoader(true);
                    }
                }, LOADER_TIMEOUT);
                BOOMR_lstart = new Date().getTime();
                parentNode.appendChild(link);
            } else {
                iframeLoader(false);
            }

            function boomerangSaveLoadTime(e) {
                window.BOOMR_onload = (e && e.timeStamp) || new Date().getTime();
            }
            if (window.addEventListener) {
                window.addEventListener("load", boomerangSaveLoadTime, false);
            } else if (window.attachEvent) {
                window.attachEvent("onload", boomerangSaveLoadTime);
            }
            if (document.addEventListener) {
                document.addEventListener("onBoomerangLoaded", function (e) {
                    e.detail.BOOMR.init({
                        ResourceTiming: {
                            enabled: true,
                            trackedResourceTypes: ["script", "img", "css"]
                        },
                    });
                    e.detail.BOOMR.t_end = new Date().getTime();
                });
            } else if (document.attachEvent) {
                document.attachEvent("onpropertychange", function (e) {
                    if (!e) e = event;
                    if (e.propertyName === "onBoomerangLoaded") {
                        e.detail.BOOMR.init({
                            ResourceTiming: {
                                enabled: true,
                                trackedResourceTypes: ["script", "img", "css"]
                            },
                        });
                        e.detail.BOOMR.t_end = new Date().getTime();
                    }
                });
            }
        })();
    </script>
</head>

<body class="template-index ">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MKZJ5D6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <a class="skip-to-content-link visually-hidden" href="#MainContent">Skip to content</a>
    <div class="t4s-close-overlay t4s-op-0"></div>

    <div class="t4s-website-wrapper">
        <div id="shopify-section-title_config"
            class="shopify-section t4s-section t4s-section-config t4s-section-admn-fixed">

        </div>
        <div id="shopify-section-pr_item_config"
            class="shopify-section t4s-section t4s-section-config t4s-section-config-product t4s-section-admn-fixed">

        </div>
        <div id="shopify-section-btn_config"
            class="shopify-section t4s-section t4s-section-config t4s-section-admn-fixed">

        </div>
        <h2 class="site-header__logo t4s-d-none">Vaaree</h2>
        <div id="shopify-section-announcement-bar"
            class="shopify-section t4-section t4-section-announcement-bar t4s_bk_flickity t4s_tp_cd">
            <script>
                try {
                    if (window.Shopify && !Shopify.designMode) {
                        document.getElementById('shopify-section-announcement-bar').remove()
                    } else {
                        document.getElementById('shopify-section-announcement-bar').setAttribute("aria-hidden", true)
                    }
                } catch (err) { }
            </script>
        </div>
        <div id="shopify-section-top-bar" class="shopify-section t4-section t4s_tp_flickity t4s_tp_cd t4s-pr">
            <div id="t4s-hsticky__sentinel" class="t4s-op-0 t4s-pe-none t4s-pa t4s-w-100"></div>

        </div>
        <header id="shopify-section-header-categories-menu"
            class="shopify-section t4s-section t4s-section-header t4s-is-header-categories-menu">
            <link href="cdn/shop/t/130/assets/searchtap-sticky-mobile59dd.css?v=72416738382921796941704321960"
                rel="stylesheet" type="text/css" media="all" />
            <link href="cdn/shop/t/130/assets/searchbar-animationdb98.css?v=113187690931086993301705988226"
                rel="stylesheet" type="text/css" media="all" />

            <!-- Design 3 code ends-->


            <div data-header-options='{ "isTransparent": false,"isSticky": true,"hideScroldown": false }'
                class=" t4s-header__wrapper t4s-header__design1 t4s-layout-layout_categories">
                <div class="t4s-section-header__mid t4s-pr">
                    <div class="t4s-container">
                        <div data-header-height class="t4s-row t4s-gx-15 t4s-gx-md-30 t4s-align-items-center" style="">
                            <div class="t4s-col-md-4 t4s-col-3 t4s-d-lg-none t4s-col-item"><a href="index.html"
                                    data-menu-drawer data-drawer-options='{ "id":"#t4s-menu-drawer" }'
                                    class="t4s-push-menu-btn  t4s-lh-1 t4s-d-flex t4s-align-items-center"
                                    aria-label="Sidebar Menu"><svg xmlns="http://www.w3.org/2000/svg" width="30"
                                        height="16" viewBox="0 0 30 16" fill="currentColor">
                                        <rect width="30" height="1.5"></rect>
                                        <rect y="7" width="20" height="1.5"></rect>
                                        <rect y="14" width="30" height="1.5"></rect>
                                    </svg></a></div>
                            <div
                                class="t4s-col-lg-3 t4s-col-md-4 t4s-col-6 t4s-text-center t4s-text-lg-start t4s-col-item">
                                <div class=" t4s-header__logo t4s-lh-1"><a class="t4s-d-inline-block"
                                        href="index.php">
                                        <img loading="lazy"
                                            srcset="media/logo.png 2x"
                                            src="media/logo.png"
                                            class="header__normal-logo t4s-d-none t4s-d-lg-block" width="50" height="43"
                                            alt="Vaaree" style="width: 50px">

                                        <img loading="lazy"
                                            srcset="media/logo.png 2x"
                                            src="media/logo.png"
                                            class="header__sticky-logo t4s-d-none t4s-d-none" width="50" height="43"
                                            alt="Vaaree" style="width: 50px">
                                            <img loading="lazy"
                                            srcset="media/logo.png 2x"
                                            src="media/logo.png"
                                            class="header__mobile-logo t4s-d-lg-none" width="50" height="43"
                                            alt="Vaaree" style="width: 50px">
                                    </a></div>
                            </div>

                            <!-- Added by team Searchtap -->
                            <div class="st-search-box hidden-mobile" style="">
                                <div class="search-input-container">
                                    <img alt="Delivery Time Icon" class="searchbar-icon" height="11" loading="lazy"
                                        src="../cdn.shopify.com/s/files/1/0632/2526/6422/files/search-icon-website5d10.png?v=1701943026"
                                        width="24" />
                                    <input type="text" autocomplete="off" placeholder="" name="q" id="st-search"
                                        class="st-search-input">
                                    <div class="placeholder-label animation">
                                        <span class="common-text">Search for</span>

                                        <span class="text-container-searchbar">

                                            <span class="text">Bedsheets</span>
                                            <span class="text">Cushion covers</span>
                                            <span class="text">Dining sets</span>

                                        </span>

                                    </div>
                                </div>
                            </div>




                            <div
                                class="t4s-col-lg-3 t4s-col-md-4 t4s-col-3 t4s-text-end t4s-col-group_btns t4s-col-item t4s-lh-1 t4s-flex-item">
                                <svg xmlns="http://www.w3.org/2000/svg" class="t4s-d-none">
                                    <symbol id="icon-h-search" viewBox="0 0 18 19" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M11.03 11.68A5.784 5.784 0 112.85 3.5a5.784 5.784 0 018.18 8.18zm.26 1.12a6.78 6.78 0 11.72-.7l5.4 5.4a.5.5 0 11-.71.7l-5.41-5.4z"
                                            fill="currentColor"></path>
                                    </symbol>
                                    <symbol id="icon-h-account" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="1.2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </symbol>
                                    <symbol id="icon-h-heart" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="1.2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path
                                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                        </path>
                                    </symbol>
                                    <symbol id="icon-h-cart" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="1.2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="9" cy="21" r="1"></circle>
                                        <circle cx="20" cy="21" r="1"></circle>
                                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                        </path>
                                    </symbol>
                                </svg>
                                <div
                                    class="t4s-site-nav__icons t4s-use__kalles is--hover2 t4s-h-cart__design1 t4s-lh-1 t4s-d-inline-flex t4s-align-items-center">
                                    <div
                                        class="t4s-site-nav__icon t4s-site-nav__account t4s-pr t4s-d-none t4s-d-md-inline-block">
                                        <a class="t4s-pr" href="account/login4236.html">
                                            <svg class="t4s-icon t4s-icon--account" aria-hidden="true" focusable="false"
                                                role="presentation">
                                                <use href="#icon-h-account"></use>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="t4s-site-nav__icon t4s-site-nav__cart">
                                        <a href="cart.html" data-drawer-delay-
                                            data-drawer-options='{ "id":"#t4s-mini_cart" }'>
                                            <span class="t4s-pr t4s-icon-cart__wrap">
                                                <svg class="t4s-icon t4s-icon--cart" aria-hidden="true"
                                                    focusable="false" role="presentation">
                                                    <use href="#icon-h-cart"></use>
                                                </svg>
                                                <span data-cart-count
                                                    class="t4s-pa t4s-op-0 t4s-ts-op t4s-count-box">0</span>
                                            </span>
                                            <span class="t4s-h-cart-totals t4s-dn t4s-truncate">
                                                <span class="t4s-h-cart__divider t4s-dn">/</span>
                                                <span data-cart-tt-price class="t4s-h-cart__total">₹0.00</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="t4s-section-header__bot t4s-d-none t4s-d-lg-block">
                    <div class="t4s-container">
                        <div data-header-height2 class="t4s-row t4s-g-0 t4s-align-items-center">
                            <div class="t4s-col t4s-col-item">
                                <nav class="t4s-navigation t4s-text-start t4s-nav__hover_sideup t4s-nav-arrow__true">
                                    <ul data-menu-nav id="t4s-nav-ul"
                                        class="t4s-nav__ul t4s-d-inline-flex t4s-flex-wrap t4s-align-items-center">
                                        <li id="item_header-categories-menu-0" data-placement="bottom"
                                            class="t4s-type__mega menu-width__cus t4s-menu-item has--children menu-has__offsets ">
                                            <a class="t4s-lh-1 t4s-d-flex t4s-align-items-center t4s-pr"
                                                href="collections.php?item=bedding" target="_self">
                                                Bedding
                                                <svg
                                                    class="t4s-icon-select-arrow" width="10" height="10"
                                                    role="presentation" viewBox="0 0 19 12">
                                                    <use xlink:href="#t4s-select-arrow"></use>
                                                </svg>
                                                </a>
                                            <div id="content_header-categories-menu-0"
                                                class="t4s-sub-menu t4s-pa t4s-op-0 t4s-pe-none t4s-current-scrollbar">
                                                <div class="t4s-container" style="width:1200px">
                                                    <div class="t4s-row t4s-gx-30 t4s-gy-10 t4s-lazy_menu" data-id="1"
                                                        data-isotopet4s-js='{ "itemSelector": ".t4s-sub-column-item", "layoutMode": "packery","gutter": 0 }'>
                                                        <div class="t4s-loading--bg"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li id="item_b930d1ff-5fb3-41bf-aa6c-6a84c885b9a8" data-placement="bottom"
                                            class="t4s-type__mega menu-width__cus t4s-menu-item has--children menu-has__offsets ">
                                            <a class="t4s-lh-1 t4s-d-flex t4s-align-items-center t4s-pr"
                                                href="collections/home-furnishings.html" target="_self">Furnishings<svg
                                                    class="t4s-icon-select-arrow" width="10" height="10"
                                                    role="presentation" viewBox="0 0 19 12">
                                                    <use xlink:href="#t4s-select-arrow"></use>
                                                </svg></a>
                                            <div id="content_b930d1ff-5fb3-41bf-aa6c-6a84c885b9a8"
                                                class="t4s-sub-menu t4s-pa t4s-op-0 t4s-pe-none t4s-current-scrollbar">
                                                <div class="t4s-container" style="width:1200px">
                                                    <div class="t4s-row t4s-gx-10 t4s-gy-10 t4s-lazy_menu" data-id="2"
                                                        data-isotopet4s-js='{ "itemSelector": ".t4s-sub-column-item", "layoutMode": "packery","gutter": 0 }'>
                                                        <div class="t4s-loading--bg"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li id="item_header-categories-menu-1" data-placement="bottom"
                                            class="t4s-type__mega menu-width__cus t4s-menu-item has--children menu-has__offsets ">
                                            <a class="t4s-lh-1 t4s-d-flex t4s-align-items-center t4s-pr"
                                                href="collections/kitchen-decor.html" target="_self">Kitchen<svg
                                                    class="t4s-icon-select-arrow" width="10" height="10"
                                                    role="presentation" viewBox="0 0 19 12">
                                                    <use xlink:href="#t4s-select-arrow"></use>
                                                </svg></a>
                                            <div id="content_header-categories-menu-1"
                                                class="t4s-sub-menu t4s-pa t4s-op-0 t4s-pe-none t4s-current-scrollbar">
                                                <div class="t4s-container" style="width:1200px">
                                                    <div class="t4s-row t4s-gx-30 t4s-gy-30 t4s-lazy_menu" data-id="4"
                                                        data-isotopet4s-js='{ "itemSelector": ".t4s-sub-column-item", "layoutMode": "packery","gutter": 0 }'>
                                                        <div class="t4s-loading--bg"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li id="item_6667f76b-8135-4bc7-89d1-5d1e0dece228" data-placement="bottom"
                                            class="t4s-type__mega menu-width__cus t4s-menu-item has--children menu-has__offsets ">
                                            <a class="t4s-lh-1 t4s-d-flex t4s-align-items-center t4s-pr"
                                                href="collections/dining-table-decor.html" target="_self">Dining<svg
                                                    class="t4s-icon-select-arrow" width="10" height="10"
                                                    role="presentation" viewBox="0 0 19 12">
                                                    <use xlink:href="#t4s-select-arrow"></use>
                                                </svg></a>
                                            <div id="content_6667f76b-8135-4bc7-89d1-5d1e0dece228"
                                                class="t4s-sub-menu t4s-pa t4s-op-0 t4s-pe-none t4s-current-scrollbar">
                                                <div class="t4s-container" style="width:1200px">
                                                    <div class="t4s-row t4s-gx-30 t4s-gy-30 t4s-lazy_menu" data-id="5"
                                                        data-isotopet4s-js='{ "itemSelector": ".t4s-sub-column-item", "layoutMode": "packery","gutter": 0 }'>
                                                        <div class="t4s-loading--bg"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li id="item_d03047e3-c9b7-40e4-b971-c6fad09372f9" data-placement="bottom"
                                            class="t4s-type__mega menu-width__cus t4s-menu-item has--children menu-has__offsets ">
                                            <a class="t4s-lh-1 t4s-d-flex t4s-align-items-center t4s-pr"
                                                href="collections/home-decor.html" target="_self">Decor<svg
                                                    class="t4s-icon-select-arrow" width="10" height="10"
                                                    role="presentation" viewBox="0 0 19 12">
                                                    <use xlink:href="#t4s-select-arrow"></use>
                                                </svg></a>
                                            <div id="content_d03047e3-c9b7-40e4-b971-c6fad09372f9"
                                                class="t4s-sub-menu t4s-pa t4s-op-0 t4s-pe-none t4s-current-scrollbar">
                                                <div class="t4s-container" style="width:1200px">
                                                    <div class="t4s-row t4s-gx-30 t4s-gy-30 t4s-lazy_menu" data-id="7"
                                                        data-isotopet4s-js='{ "itemSelector": ".t4s-sub-column-item", "layoutMode": "packery","gutter": 0 }'>
                                                        <div class="t4s-loading--bg"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li id="item_mega_9B3cx3" data-placement="bottom"
                                            class="t4s-type__mega menu-width__cus t4s-menu-item has--children menu-has__offsets ">
                                            <a class="t4s-lh-1 t4s-d-flex t4s-align-items-center t4s-pr"
                                                href="collections/kids-room-decor.html" target="_self">Kids &
                                                Children<svg class="t4s-icon-select-arrow" width="10" height="10"
                                                    role="presentation" viewBox="0 0 19 12">
                                                    <use xlink:href="#t4s-select-arrow"></use>
                                                </svg></a>
                                            <div id="content_mega_9B3cx3"
                                                class="t4s-sub-menu t4s-pa t4s-op-0 t4s-pe-none t4s-current-scrollbar">
                                                <div class="t4s-container" style="width:1200px">
                                                    <div class="t4s-row t4s-gx-30 t4s-gy-30 t4s-lazy_menu" data-id="9"
                                                        data-isotopet4s-js='{ "itemSelector": ".t4s-sub-column-item", "layoutMode": "packery","gutter": 0 }'>
                                                        <div class="t4s-loading--bg"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li id="item_mega_menb3J" data-placement="bottom"
                                            class="t4s-type__mega menu-width__cus t4s-menu-item has--children menu-has__offsets ">
                                            <a class="t4s-lh-1 t4s-d-flex t4s-align-items-center t4s-pr"
                                                href="collections/storage-organisers.html" target="_self">Organisers<svg
                                                    class="t4s-icon-select-arrow" width="10" height="10"
                                                    role="presentation" viewBox="0 0 19 12">
                                                    <use xlink:href="#t4s-select-arrow"></use>
                                                </svg></a>
                                            <div id="content_mega_menb3J"
                                                class="t4s-sub-menu t4s-pa t4s-op-0 t4s-pe-none t4s-current-scrollbar">
                                                <div class="t4s-container" style="width:1200px">
                                                    <div class="t4s-row t4s-gx-30 t4s-gy-30 t4s-lazy_menu" data-id="8"
                                                        data-isotopet4s-js='{ "itemSelector": ".t4s-sub-column-item", "layoutMode": "packery","gutter": 0 }'>
                                                        <div class="t4s-loading--bg"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li id="item_2c9dbf9b-9583-4d99-805b-f4fb2d382bc5" data-placement="bottom"
                                            class="t4s-type__mega menu-width__cus t4s-menu-item has--children menu-has__offsets ">
                                            <a class="t4s-lh-1 t4s-d-flex t4s-align-items-center t4s-pr"
                                                href="collections/bath-decor.html" target="_self">Bath<svg
                                                    class="t4s-icon-select-arrow" width="10" height="10"
                                                    role="presentation" viewBox="0 0 19 12">
                                                    <use xlink:href="#t4s-select-arrow"></use>
                                                </svg></a>
                                            <div id="content_2c9dbf9b-9583-4d99-805b-f4fb2d382bc5"
                                                class="t4s-sub-menu t4s-pa t4s-op-0 t4s-pe-none t4s-current-scrollbar">
                                                <div class="t4s-container" style="width:1200px">
                                                    <div class="t4s-row t4s-gx-30 t4s-gy-30 t4s-lazy_menu" data-id="3"
                                                        data-isotopet4s-js='{ "itemSelector": ".t4s-sub-column-item", "layoutMode": "packery","gutter": 0 }'>
                                                        <div class="t4s-loading--bg"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li id="item_29fc68f9-e60d-49bb-837f-c158093ce323" data-placement="bottom"
                                            class="t4s-type__mega menu-width__cus t4s-menu-item has--children menu-has__offsets ">
                                            <a class="t4s-lh-1 t4s-d-flex t4s-align-items-center t4s-pr"
                                                href="collections/garden-decor.html" target="_self">Garden<svg
                                                    class="t4s-icon-select-arrow" width="10" height="10"
                                                    role="presentation" viewBox="0 0 19 12">
                                                    <use xlink:href="#t4s-select-arrow"></use>
                                                </svg></a>
                                            <div id="content_29fc68f9-e60d-49bb-837f-c158093ce323"
                                                class="t4s-sub-menu t4s-pa t4s-op-0 t4s-pe-none t4s-current-scrollbar">
                                                <div class="t4s-container" style="width:1200px">
                                                    <div class="t4s-row t4s-gx-30 t4s-gy-30 t4s-lazy_menu" data-id="6"
                                                        data-isotopet4s-js='{ "itemSelector": ".t4s-sub-column-item", "layoutMode": "packery","gutter": 0 }'>
                                                        <div class="t4s-loading--bg"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li id="item_b56f35b6-1f8e-4c91-833b-2301c3a688ed"
                                            class="t4s-type__simple t4s-menu-item "><a
                                                class="t4s-lh-1 t4s-d-flex t4s-align-items-center t4s-pr"
                                                href="pages/lookbook.html" target="_blank"
                                                style="color:#EEA289">Inspiration</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="t4s-col-2 t4s-text-end t4s-col-item t4s-h-cat__html t4s-rte">
                                <div class="return">
                                    <a href="apps/return_prime.html">Return/Exchange</a>
                                    <i class="las la-envelope fs__14 ml__15"></i> <a class="cg"
                                        href="mailto:help@vaaree.com">help@vaaree.com</a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!--  Added by team searchtap    -->



                <div id="header-with-edd">
                    <div class='search-tap-mobile' id="search-tap-with-icons">
                        <div class="sticky-header-menu t4s-d-lg-none" id="push-menu-sticky"><a href="index.html"
                                data-menu-drawer data-drawer-options='{ "id":"#t4s-menu-drawer" }'
                                class="t4s-push-menu-btn  t4s-lh-1 t4s-d-flex t4s-align-items-center"
                                aria-label="Sidebar Menu"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="16"
                                    viewBox="0 0 30 16" fill="currentColor">
                                    <rect width="30" height="1.5"></rect>
                                    <rect y="7" width="20" height="1.5"></rect>
                                    <rect y="14" width="30" height="1.5"></rect>
                                </svg></a></div>




                        <div class="st-search-box hidden-desktop">
                            <!-- <input type="text" autocomplete="off" placeholder="" name="q" id="st-search-mobile" class="st-search-input">  -->
                            <div class="search-input-container">
                                <img alt="Delivery Time Icon" class="searchbar-icon" height="11" loading="lazy"
                                    src="../cdn.shopify.com/s/files/1/0632/2526/6422/files/search-icon-website5d10.png?v=1701943026"
                                    width="24" />
                                <input type="text" autocomplete="off" placeholder="" name="q" id="st-search-mobile"
                                    class="st-search-input">
                                <div class="placeholder-label animation">
                                    <span class="common-text">Search for</span>
                                    <span class="text-container-searchbar">

                                        <span class="text">Bedsheets</span>
                                        <span class="text">Cushion covers</span>
                                        <span class="text">Dining sets</span>

                                    </span>
                                </div>
                            </div>
                        </div>


                        <div class="t4s-site-nav__icon t4s-site-nav__cart sticky-header-cart-container"
                            id="sticky-header-cart-container">
                            <a href="cart.html" data-drawer-delay- data-drawer-options='{ "id":"#t4s-mini_cart" }'>
                                <span class="t4s-pr t4s-icon-cart__wrap">
                                    <svg class="t4s-icon t4s-icon--cart sticky-header-cart-icon" aria-hidden="true"
                                        focusable="false" role="presentation">
                                        <use href="#icon-h-cart"></use>
                                    </svg>
                                    <span data-cart-count class="t4s-pa t4s-op-0 t4s-ts-op t4s-count-box">0</span>
                                </span>
                                <span class="t4s-h-cart-totals t4s-dn t4s-truncate">
                                    <span class="t4s-h-cart__divider t4s-dn">/</span>
                                    <span data-cart-tt-price class="t4s-h-cart__total">₹0.00</span>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="sticky-edd-container"></div>
                </div>
                <script
                    src="cdn/shop/t/130/assets/sticky-header-scroll1b87.js?v=50575463609269467261708928284"></script>


            </div>




        </header>
        <div id="shopify-section-custom-tag-color" class="shopify-section">







        </div>