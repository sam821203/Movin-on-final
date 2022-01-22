<?php require_once 'db.inc.php'; ?>
<?php session_start() ?>
<?php require_once './tpl/head.php' ?>

<style>
    <?php require_once './css/member-center-page.css' ?>
</style>
<body>
    <button class="button" style="padding:20px;">Open popup</button>


    <?php require_once './tpl/foot.php' ?>
        
    </script>
    <script>
        $('.button').magnificPopup({
            items: {
                src: 'https://www.youtube.com/watch?v=1Y8jIMjTP3Y'
            },
            type: 'iframe',
            iframe: {
                markup: '<div class="mfp-iframe-scaler">' +
                    '<div class="mfp-close"></div>' +
                    '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                    '</div>',
                patterns: {
                    youtube: {
                        index: 'youtube.com/',
                        id: 'v=',
                        src: '//www.youtube.com/embed/%id%?autoplay=1'
                    }
                },
                srcAction: 'iframe_src',
            }
        });
    </script>
</body>

</html>