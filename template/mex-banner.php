<?php
$get_field = get_field($a['get_field']);
?>
<script type="text/javascript">
    const $ = jQuery;
    $(document).ready(function() {
        $(".slideInner").slide({
            slideContainer: $('.slideInner a'),
            effect: 'swing',
            autoRunTime: 5000,
            slideSpeed: 1000,
            nav: true,
            autoRun: true,
            prevBtn: $('a.prevSlide'),
            nextBtn: $('a.nextSlide')
        });
    });

    var aTag = document.createElement("a");
    aTag.style.background = "url(" + <?php echo $item["background_image"]; ?> + ") no-repeat";
    aTag.style.backgroundSize = "cover";
    aTag.style.backgroundPosition = "center";
    aTag.style.width = "100%";

    // สร้าง element div และกำหนด class
    var divElem = document.createElement("div");
    divElem.className = "moveElem img1";
    divElem.setAttribute("rel", "0,easeInOutExpo");

    // สร้าง element img และกำหนด src
    var imgTag = document.createElement("img");
    imgTag.setAttribute("src", <?php echo $item["image_text"]; ?>);

    // เอา divElem เป็นลูกของ aTag และ imgTag เป็นลูกของ divElem
    divElem.appendChild(imgTag);
    aTag.appendChild(divElem);

    // เพิ่ม aTag เข้าไปใน container
    document.getElementById("container").appendChild(aTag);
    console.log(aTag,'ggg');
    var moveElem = document.querySelectorAll(".moveElem > img");
    setTimeout(function() {

        moveElem.style.opacity = "0.5";
}, 10000); 
    
</script>
<div class="slides">
    <div class="slideInner">
        <?php if ($get_field) : ?>
            <?php foreach ($get_field as $item) : ?>
                <?php if (!empty($item["video_banner"])) : ?>
                    <a>
                        <video autoplay muted loop preload="auto" poster="<?php echo $item['video_banner']; ?>" class="object-cover w-full h-screen">
                            <source src="<?php echo $item["video_banner"]; ?>" type="video/mp4">
                        </video>
                        <div class="moveElem img1" rel="0,easeInOutExpo">
                            <img src="<?php echo $item["image_text"]; ?>">
                        </div>
                    </a>

                <?php else : ?>
                    <a style="background: url(<?php echo $item["background_image"]; ?>) no-repeat; background-size:cover; background-position:center; width:100%;">
                        <div class="moveElem img1" rel="0,easeInOutExpo">
                            <img id="" src="<?php echo $item["image_text"]; ?>">
                        </div>
                    </a>

                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="nav">
        <a class="prevSlide group mex-banner-group__button-left bg-blue-600 w-60 h-24 float-left rounded-tr-full rounded-br-full">
            <div class="mex-banner-group__icon-button">
                < </div>
        </a>
        <a class="nextSlide group mex-banner-group__button-right bg-blue-600 w-60 h-24 float-right rounded-tl-full rounded-bl-full">
            <div class="mex-banner-group__icon-button">
                >
            </div>
        </a>
    </div>
</div>