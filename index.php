<?php
date_default_timezone_set('UTC');
  include 'FootballData.php';
  include 'header.php';
?>
    <script src="assets/js/jssor.slider-23.1.6.min.js" type="text/javascript"></script>
	<script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_SlideoTransitions = [
              [{b:900,d:2000,x:-379,e:{x:7}}],
              [{b:900,d:2000,x:-379,e:{x:7}}],
              [{b:-1,d:1,o:-1,sX:2,sY:2},{b:0,d:900,x:-171,y:-341,o:1,sX:-2,sY:-2,e:{x:3,y:3,sX:3,sY:3}},{b:900,d:1600,x:-283,o:-1,e:{x:16}}]
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $SlideDuration: 800,
              $SlideEasing: $Jease$.$OutQuint,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*responsive code begin*/
            /*remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1920);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*responsive code end*/
        };
    </script>
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:550px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position:absolute;top:0px;left:0px;background:url('img/loading.gif') no-repeat 50% 50%;background-color:rgba(0, 0, 0, 0.7);"></div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:550px;overflow:hidden;">
            <div>
			 <img data-u="image" src="http://okeytechnologies.com/football-data.events/assets/images/slider-2.jpg"/>
                <div style="position:absolute;top:150px;left:30px;width:480px;height:120px;z-index:0;font-size:36px;color:#ffffff;line-height:52px;">Manchester United FC</div>
                <div style="position:absolute;top:300px;left:30px;width:480px;height:120px;z-index:0;font-size:30px;color:#ffffff;line-height:38px;">Manchester United FC fired 1,027th goal of this season, a further 40 in final matchweek would set new highest total</div>
                <div style="position:absolute;top:120px;left:650px;width:470px;height:220px;z-index:0;">
                    <img style="position:absolute;top:60px;left:0px;width:470px;height:220px;z-index:0;" src="http://okeytechnologies.com/football-data.events/assets/images/c-phone-horizontal.png" />
                    <div style="position:absolute;top:64px;left:45px;width:379px;height:213px;z-index:0; overflow:hidden;">
                        <img data-u="caption" data-t="0" style="position:absolute;top:0px;left:0px;width:379px;height:213px;z-index:0;" src="http://okeytechnologies.com/football-data.events/assets/images/slider-1.jpg" />
						<img data-u="caption" data-t="1" style="position:absolute;top:0px;left:379px;width:379px;height:213px;z-index:0;" src="http://okeytechnologies.com/football-data.events/assets/images/slider-2.jpg" />
                        <img data-u="caption" data-t="1" style="position:absolute;top:0px;left:379px;width:379px;height:213px;z-index:0;" src="http://okeytechnologies.com/football-data.events/assets/images/slider-3.jpg" />
                    </div>
                    <img style="position:absolute;top:64px;left:45px;width:379px;height:213px;z-index:0;" src="http://okeytechnologies.com/football-data.events/assets/images/c-navigator-horizontal.png" />
                    <img data-u="caption" data-t="2" style="position:absolute;top:476px;left:454px;width:63px;height:77px;z-index:0;" src="http://okeytechnologies.com/football-data.events/assets/images/hand.png" />
                </div>
            </div>
            <div>
                <img data-u="image" src="http://okeytechnologies.com/football-data.events/assets/images/slider-1.jpg" />
            </div>
            <div>
                <img data-u="image" src="http://okeytechnologies.com/football-data.events/assets/images/slider-3.jpg" />
            </div>
			<div>
                <img data-u="image" src="http://okeytechnologies.com/football-data.events/assets/images/slider-4.jpg" />
            </div>
			<div>
                <img data-u="image" src="http://okeytechnologies.com/football-data.events/assets/images/slider-5.jpg" />
            </div>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="width:16px;height:16px;"></div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora22l" style="top:0px;left:8px;width:40px;height:58px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora22r" style="top:0px;right:8px;width:40px;height:58px;" data-autocenter="2"></span>
    </div>
    <script type="text/javascript">jssor_1_slider_init();</script>
	<div class="container" style="margin-bottom:30px;">
</div>
<?php
  include 'footer.php';
?>
