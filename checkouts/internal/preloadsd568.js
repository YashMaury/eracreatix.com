
    (function() {
      var baseURL = "https://cdn.shopify.com/shopifycloud/checkout-web/assets/";
      var scripts = ["https://cdn.shopify.com/shopifycloud/checkout-web/assets/runtime.baseline.en.19ac59ee8910eff79b25.js","https://cdn.shopify.com/shopifycloud/checkout-web/assets/837.baseline.en.3281b5d05ea6f0248529.js","https://cdn.shopify.com/shopifycloud/checkout-web/assets/24.baseline.en.f3da40087df29c15dcfb.js","https://cdn.shopify.com/shopifycloud/checkout-web/assets/706.baseline.en.a2177ecce24cf8201826.js","https://cdn.shopify.com/shopifycloud/checkout-web/assets/app.baseline.en.3292e6bdd3b3906ed422.js","https://cdn.shopify.com/shopifycloud/checkout-web/assets/751.baseline.en.3248b1ea37c8c8287656.js","https://cdn.shopify.com/shopifycloud/checkout-web/assets/836.baseline.en.433ca8a50ea185f23561.js","https://cdn.shopify.com/shopifycloud/checkout-web/assets/806.baseline.en.d8f76a60de2eb4e89935.js","https://cdn.shopify.com/shopifycloud/checkout-web/assets/100.baseline.en.aaf5a5941b77953f0095.js","https://cdn.shopify.com/shopifycloud/checkout-web/assets/OnePage.baseline.en.069a4349d1b100f7e59b.js"];
      var styles = ["https://cdn.shopify.com/shopifycloud/checkout-web/assets/837.baseline.en.837d90acf4a2a4342358.css","https://cdn.shopify.com/shopifycloud/checkout-web/assets/app.baseline.en.f79e630f70b79519e81e.css","https://cdn.shopify.com/shopifycloud/checkout-web/assets/836.baseline.en.5c8be743b69bc96dbc9b.css","https://cdn.shopify.com/shopifycloud/checkout-web/assets/268.baseline.en.ad63daad97bd557389eb.css"];
      var fontPreconnectUrls = [];
      var fontPrefetchUrls = [];
      var imgPrefetchUrls = ["https://cdn.shopify.com/s/files/1/0632/2526/6422/files/Logo-V_00874dcc-5571-40ca-aa48-dbdc42dffe51_x320.png?v=1651133879"];

      function preconnect(url, callback) {
        var link = document.createElement('link');
        link.rel = 'dns-prefetch preconnect';
        link.href = url;
        link.crossOrigin = '';
        link.onload = link.onerror = callback;
        document.head.appendChild(link);
      }

      function preconnectAssets() {
        var resources = [baseURL].concat(fontPreconnectUrls);
        var index = 0;
        (function next() {
          var res = resources[index++];
          if (res) preconnect(res[0], next);
        })();
      }

      function prefetch(url, as, callback) {
        var link = document.createElement('link');
        if (link.relList.supports('prefetch')) {
          link.rel = 'prefetch';
          link.fetchPriority = 'low';
          link.as = as;
          if (as === 'font') link.type = 'font/woff2';
          link.href = url;
          link.crossOrigin = '';
          link.onload = link.onerror = callback;
          document.head.appendChild(link);
        } else {
          var xhr = new XMLHttpRequest();
          xhr.open('GET', url, true);
          xhr.onloadend = callback;
          xhr.send();
        }
      }

      function prefetchAssets() {
        var resources = [].concat(
          scripts.map(function(url) { return [url, 'script']; }),
          styles.map(function(url) { return [url, 'style']; }),
          fontPrefetchUrls.map(function(url) { return [url, 'font']; }),
          imgPrefetchUrls.map(function(url) { return [url, 'image']; })
        );
        var index = 0;
        (function next() {
          var res = resources[index++];
          if (res) prefetch(res[0], res[1], next);
        })();
      }

      function onLoaded() {
        preconnectAssets();
        prefetchAssets();
      }

      if (document.readyState === 'complete') {
        onLoaded();
      } else {
        addEventListener('load', onLoaded);
      }
    })();
  