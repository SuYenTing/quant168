<?php
include("navbar.html");



?>
        <div class="slideshow">
            <div class="wrap_inner">
                <section>
                    <div id="slideshow">
                        <script>
                        jssor_1_slider_init = function() {

                            var jssor_1_SlideshowTransitions = [


                                {
                                    $Duration: 2000,
                                    $Zoom: 11,
                                    $SlideOut: true,
                                    $Easing: {
                                        $Zoom: $JssorEasing$.$EaseInExpo,
                                        $Opacity: $JssorEasing$.$EaseLinear
                                    },
                                    $Opacity: 2
                                }

                            ];


                            var jssor_1_SlideoTransitions = [
                                [{
                                    b: 0,
                                    d: 600,
                                    x: 410,
                                    e: {
                                        x: 27
                                    }
                                }],
                                [{
                                    b: -1,
                                    d: 1,
                                    o: -1
                                }, {
                                    b: 0,
                                    d: 600,
                                    o: 1,
                                    e: {
                                        o: 5
                                    }
                                }],
                                [{
                                    b: -1,
                                    d: 1,
                                    c: {
                                        x: 175.0,
                                        t: -175.0
                                    }
                                }, {
                                    b: 0,
                                    d: 800,
                                    c: {
                                        x: -175.0,
                                        t: 175.0
                                    },
                                    e: {
                                        c: {
                                            x: 7,
                                            t: 7
                                        }
                                    }
                                }],
                                [{
                                    b: -1,
                                    d: 1,
                                    o: -1
                                }, {
                                    b: 0,
                                    d: 600,
                                    x: -570,
                                    o: 1,
                                    e: {
                                        x: 6
                                    }
                                }],
                                [{
                                    b: 0,
                                    d: 1000,
                                    y: 80,
                                    e: {
                                        y: 24
                                    }
                                }, {
                                    b: 1000,
                                    d: 1100,
                                    x: 570,
                                    y: 170,
                                    o: -1,
                                    r: 30,
                                    sX: 9,
                                    sY: 9,
                                    e: {
                                        x: 2,
                                        y: 6,
                                        r: 1,
                                        sX: 5,
                                        sY: 5
                                    }
                                }],
                                [{
                                    b: 0,
                                    d: 1000,
                                    o: -0.4,
                                    rX: 2,
                                    rY: 1
                                }, {
                                    b: 1000,
                                    d: 1000,
                                    rY: 1
                                }, {
                                    b: 2000,
                                    d: 1000,
                                    rX: -1
                                }, {
                                    b: 3000,
                                    d: 1000,
                                    rY: -1
                                }, {
                                    b: 4000,
                                    d: 1000,
                                    o: 0.4,
                                    rX: -1,
                                    rY: -1
                                }]
                            ];

                            var jssor_1_options = {
                                $Idle: 3000,
                                $SlideDuration: 2000,
                                $PauseOnHover: 3, //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1
                                $AutoPlay: true,
                                $SlideshowOptions: {
                                    $Class: $JssorSlideshowRunner$,
                                    $Transitions: jssor_1_SlideshowTransitions,
                                    $TransitionsOrder: 1
                                },

                                $CaptionSliderOptions: {
                                    $Class: $JssorCaptionSlideo$,
                                    $Transitions: jssor_1_SlideoTransitions,
                                    $Breaks: [
                                        [{
                                            d: 2000,
                                            b: 1000
                                        }]
                                    ]
                                },

                                $ArrowNavigatorOptions: {
                                    $Class: $JssorArrowNavigator$,
                                    $ChanceToShow: 1
                                },
                                $ThumbnailNavigatorOptions: {
                                    $Class: $JssorThumbnailNavigator$,
                                    $Cols: 0,
                                    $SpacingX: 4,
                                    $SpacingY: 4,
                                    $Orientation: 2,
                                    $Align: 0
                                }
                            };

                            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

                            //responsive code begin
                            //you can remove responsive code if you don't want the slider scales while window resizing
                            function ScaleSlider() {
                                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                                if (refSize) {
                                    refSize = Math.min(refSize, 4000);
                                    jssor_1_slider.$ScaleWidth(refSize);
                                } else {
                                    window.setTimeout(ScaleSlider, 30);
                                }
                            }
                            ScaleSlider();
                            $Jssor$.$AddEvent(window, "load", ScaleSlider);
                            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
                            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
                            //responsive code end
                        };
                        </script>
                        <!-- START REGION JSSOR SLIDER -->
                        <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1000px; height: 630px; overflow: hidden; visibility: hidden; background-color: transparent;">
                            <!-- Loading Screen shortcut var (call php var load url) -->
                            <!-- Loading Screen add var -->
                            <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                                <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                                <div style="position:absolute;display:block;background:url(/templates/at_taisu/includes/layouts/slideshow/img/loading.gif) no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
                            </div>
                            <!-- START SLIDES -->
                            <div id="hide_slideshow_load" class="wow bounceInDown" data-wow-duration="4s">
                                <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1000px; height: 630px; overflow: hidden;">
                                    <!-- /////////////////////////////////////////////////////// SLIDE 1 /////////////////////////////////////////////////////// -->
                                    <div data-p="112.50" style="display: none;">
                                        <img data-u="image" src="/images/slide/header1.jpg" />
                                        <!-- image1 caption1 -->
                                        <div class="caption_img_wrap" data-u="caption" data-t="2" style="position: absolute; bottom: 4%; left: 9%; width: 250px; height: auto;">
                                            <div style="margin: 15px;">
                                                <div class="caption_img">
                                                    <div class="t">量化基本分析策略-量化選股</div>
                                                    <div class="c">
                                                        <p>蒐集大量的財務報表數據資料並利用電腦系統進行篩選符合資格的股票，將可能影響個股漲跌的基本面(與公司的財務、內部運作及產業市場狀況相關)因子、參數放入模型中，並透過最佳化(控制一定風險下實現最大化報酬)其風險及報酬，建構其股票組合。</p>
                                                        <p> </p>
                                                    </div><a href="/index.php?option=com_content&view=article&id=10"><span class="btn btn-mini">&raquo; Read More</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- image1 caption2 -->
                                        <div class="caption_img_wrap" data-u="caption" data-t="2" style="position: absolute; bottom: 4%; left: 37.5%; width: 250px; height: auto;">
                                            <div style="margin: 15px;">
                                                <div class="caption_img">
                                                    <div class="t">量化基本分析策略-量化選股</div>
                                                    <div class="c">
                                                        <p>蒐集大量的財務報表數據資料並利用電腦系統進行篩選符合資格的股票，將可能影響個股漲跌的基本面(與公司的財務、內部運作及產業市場狀況相關)因子、參數放入模型中，並透過最佳化(控制一定風險下實現最大化報酬)其風險及報酬，建構其股票組合。</p>
                                                        <p> </p>
                                                    </div><a href="/index.php?option=com_content&view=article&id=10"><span class="btn btn-mini">&raquo; Read More</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- image1 caption3 -->
                                        <div class="caption_img_wrap" data-u="caption" data-t="2" style="position: absolute; bottom: 4%; right: 9%; width: 250px; height: auto;">
                                            <div style="margin: 15px;">
                                                <div class="caption_img">
                                                    <div class="t">量化基本分析策略-量化選股</div>
                                                    <div class="c">
                                                        <p>蒐集大量的財務報表數據資料並利用電腦系統進行篩選符合資格的股票，將可能影響個股漲跌的基本面(與公司的財務、內部運作及產業市場狀況相關)因子、參數放入模型中，並透過最佳化(控制一定風險下實現最大化報酬)其風險及報酬，建構其股票組合。</p>
                                                        <p> </p>
                                                    </div><a href="/index.php?option=com_content&view=article&id=10"><span class="btn btn-mini">&raquo; Read More</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- slide1 text -->
                                        <!--
<div data-u="thumb">
<img class="i" src="/images/slide/header1.jpg" />
<div class="t">Tab Slider1</div>
<div class="c">Tab slider1 with auto play options</div>
</div>
-->
                                    </div>
                                    <!-- /////////////////////////////////////////////////////// //SLIDE 1 /////////////////////////////////////////////////////// -->
                                    <!-- /////////////////////////////////////////////////////// SLIDE 2 /////////////////////////////////////////////////////// -->
                                    <div data-p="112.50" style="display: none;">
                                        <img data-u="image" src="/images/slide/header3.jpg" />
                                        <!-- image2 caption1 -->
                                        <div class="caption_img_wrap" data-u="caption" data-t="2" style="position: absolute; bottom: 4%; left: 9%; width: 250px; height: auto;">
                                            <div style="margin: 15px;">
                                                <div class="caption_img">
                                                    <div class="t">量化技術分析-量化擇時</div>
                                                    <div class="c">
                                                        <p>藉由大量的個股歷史股價數據，建立K線圖及各種型態分析，並依此預測個股的趨勢及買賣點；通常會將量化基本面分析和量化技術分析搭配使用，因為股票本身體質固然重要，但會買會賣才是獲利的關鍵。</p>
                                                        <p> </p>
                                                    </div><a href="/index.php?option=com_content&view=article&id=11"><span class="btn btn-mini">&raquo; Read More</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- image2 caption2 -->
                                        <div class="caption_img_wrap" data-u="caption" data-t="2" style="position: absolute; bottom: 4%; left: 37.5%; width: 250px; height: auto;">
                                            <div style="margin: 15px;">
                                                <div class="caption_img">
                                                    <div class="t">量化技術分析-量化擇時</div>
                                                    <div class="c">
                                                        <p>藉由大量的個股歷史股價數據，建立K線圖及各種型態分析，並依此預測個股的趨勢及買賣點；通常會將量化基本面分析和量化技術分析搭配使用，因為股票本身體質固然重要，但會買會賣才是獲利的關鍵。</p>
                                                        <p> </p>
                                                    </div><a href="/index.php?option=com_content&view=article&id=11"><span class="btn btn-mini">&raquo; Read More</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- image2 caption3 -->
                                        <div class="caption_img_wrap" data-u="caption" data-t="2" style="position: absolute; bottom: 4%; right: 9%; width: 250px; height: auto;">
                                            <div style="margin: 15px;">
                                                <div class="caption_img">
                                                    <div class="t">量化技術分析-量化擇時</div>
                                                    <div class="c">
                                                        <p>藉由大量的個股歷史股價數據，建立K線圖及各種型態分析，並依此預測個股的趨勢及買賣點；通常會將量化基本面分析和量化技術分析搭配使用，因為股票本身體質固然重要，但會買會賣才是獲利的關鍵。</p>
                                                        <p> </p>
                                                    </div><a href="/index.php?option=com_content&view=article&id=11"><span class="btn btn-mini">&raquo; Read More</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- slide2 text -->
                                        <!--
<div data-u="thumb">
<img class="i" src="/images/slide/header3.jpg" />
<div class="t">Tab Slider2</div>
<div class="c">Tab slider2 with auto play options</div>
</div>
-->
                                        <!-- /////////////////////////////////////////////////////// //SLIDE 2 /////////////////////////////////////////////////////// -->
                                    </div>
                                    <!-- /////////////////////////////////////////////////////// SLIDE 3 /////////////////////////////////////////////////////// -->
                                    <div data-p="112.50" style="display: none;">
                                        <img data-u="image" src="/images/slide/header2.jpg" />
                                        <!-- image3 caption1 -->
                                        <div class="caption_img_wrap" data-u="caption" data-t="2" style="position: absolute; bottom: 4%; left: 9%; width: 250px; height: auto;">
                                            <div style="margin: 15px;">
                                                <div class="caption_img">
                                                    <div class="t">smart beta 教育策略</div>
                                                    <div class="c">
                                                        <p>最簡單的解釋就是投資組合的計算方法不同於傳統市值加權計法。Smart Beta可以包括一些簡單的方法，例如相同權重策略，或著重關注個別市場因素，如高股息或低波動型的投資策略。Smart Beta策略有不同的投資風險及收益特質，可以滿足投資者不同的投資目標，同時還可以追蹤大市回報(Beta)。</p>
                                                    </div><a href="/index.php?option=com_content&view=article&id=13"><span class="btn btn-mini">&raquo; Read More</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- image3 caption2 -->
                                        <div class="caption_img_wrap" data-u="caption" data-t="2" style="position: absolute; bottom: 4%; left: 37.5%; width: 250px; height: auto;">
                                            <div style="margin: 15px;">
                                                <div class="caption_img">
                                                    <div class="t">smart beta 教育策略</div>
                                                    <div class="c">
                                                        <p>最簡單的解釋就是投資組合的計算方法不同於傳統市值加權計法。Smart Beta可以包括一些簡單的方法，例如相同權重策略，或著重關注個別市場因素，如高股息或低波動型的投資策略。Smart Beta策略有不同的投資風險及收益特質，可以滿足投資者不同的投資目標，同時還可以追蹤大市回報(Beta)。</p>
                                                    </div><a href="/index.php?option=com_content&view=article&id=13"><span class="btn btn-mini">&raquo; Read More</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- image3 caption3 -->
                                        <div class="caption_img_wrap" data-u="caption" data-t="2" style="position: absolute; bottom: 4%; right: 9%; width: 250px; height: auto;">
                                            <div style="margin: 15px;">
                                                <div class="caption_img">
                                                    <div class="t">smart beta 教育策略</div>
                                                    <div class="c">
                                                        <p>最簡單的解釋就是投資組合的計算方法不同於傳統市值加權計法。Smart Beta可以包括一些簡單的方法，例如相同權重策略，或著重關注個別市場因素，如高股息或低波動型的投資策略。Smart Beta策略有不同的投資風險及收益特質，可以滿足投資者不同的投資目標，同時還可以追蹤大市回報(Beta)。</p>
                                                    </div><a href="/index.php?option=com_content&view=article&id=13"><span class="btn btn-mini">&raquo; Read More</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--
<div data-u="thumb">
<img class="i" src="/images/slide/header2.jpg" />
<div class="t">Tab Slider1</div>
<div class="c">Tab slider1 with auto play options</div>
</div>
-->
                                    </div>
                                    <!-- /////////////////////////////////////////////////////// //SLIDE 3 /////////////////////////////////////////////////////// -->
                                    <!-- /////////////////////////////////////////////////////// SLIDE 4 /////////////////////////////////////////////////////// -->
                                    <div data-p="112.50" style="display: none;">
                                        <img data-u="image" src="/images/slide/header4.jpg" />
                                        <!-- image4 caption1 -->
                                        <div class="caption_img_wrap" data-u="caption" data-t="2" style="position: absolute; bottom: 4%; left: 9%; width: 250px; height: auto;">
                                            <div style="margin: 15px;">
                                                <div class="caption_img">
                                                    <div class="t">量化基本分析策略-量化選股</div>
                                                    <div class="c">
                                                        <p>蒐集大量的財務報表數據資料並利用電腦系統進行篩選符合資格的股票，將可能影響個股漲跌的基本面(與公司的財務、內部運作及產業市場狀況相關)因子、參數放入模型中，並透過最佳化(控制一定風險下實現最大化報酬)其風險及報酬，建構其股票組合。</p>
                                                        <p> </p>
                                                    </div><a href="/index.php?option=com_content&view=article&id=10"><span class="btn btn-mini">&raquo; Read More</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- image4 caption2 -->
                                        <div class="caption_img_wrap" data-u="caption" data-t="2" style="position: absolute; bottom: 4%; left: 37.5%; width: 250px; height: auto;">
                                            <div style="margin: 15px;">
                                                <div class="caption_img">
                                                    <div class="t">量化基本分析策略-量化選股</div>
                                                    <div class="c">
                                                        <p>蒐集大量的財務報表數據資料並利用電腦系統進行篩選符合資格的股票，將可能影響個股漲跌的基本面(與公司的財務、內部運作及產業市場狀況相關)因子、參數放入模型中，並透過最佳化(控制一定風險下實現最大化報酬)其風險及報酬，建構其股票組合。</p>
                                                        <p> </p>
                                                    </div><a href="/index.php?option=com_content&view=article&id=10"><span class="btn btn-mini">&raquo; Read More</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- image4 caption3 -->
                                        <div class="caption_img_wrap" data-u="caption" data-t="2" style="position: absolute; bottom: 4%; right: 9%; width: 250px; height: auto;">
                                            <div style="margin: 15px;">
                                                <div class="caption_img">
                                                    <div class="t">量化基本分析策略-量化選股</div>
                                                    <div class="c">
                                                        <p>蒐集大量的財務報表數據資料並利用電腦系統進行篩選符合資格的股票，將可能影響個股漲跌的基本面(與公司的財務、內部運作及產業市場狀況相關)因子、參數放入模型中，並透過最佳化(控制一定風險下實現最大化報酬)其風險及報酬，建構其股票組合。</p>
                                                        <p> </p>
                                                    </div><a href="/index.php?option=com_content&view=article&id=10"><span class="btn btn-mini">&raquo; Read More</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- slide4 text -->
                                        <!--
<div data-u="thumb">
<img class="i" src="/images/slide/header4.jpg" />
<div class="t">Tab Slider1</div>
<div class="c">Tab slider1 with auto play options</div>
</div>
-->
                                    </div>
                                    <!-- /////////////////////////////////////////////////////// //SLIDE 4 /////////////////////////////////////////////////////// -->
                                    <!--  //safari - IE - tablet - mobile  -->
                                </div>
                            </div>
                            <!-- // END SLIDE -->
                            <!-- Thumbnail Navigator
<div data-u="thumbnavigator" class="jssort11" style="position:absolute;right:5px;top:0px;font-family:Arial, Helvetica, sans-serif;-moz-user-select:none;-webkit-user-select:none;-ms-user-select:none;user-select:none;width:200px;height:350px;" data-autocenter="2">
<!-- Thumbnail Item Skin Begin
<div data-u="slides" style="cursor: default;">
<div data-u="prototype" class="p">
<div data-u="thumbnailtemplate" class="tp"></div>
</div>
</div>
<!-- Thumbnail Item Skin End
</div>
-->
                            <!-- Arrow Navigator default center left right -->
                            <!--
<span data-u="arrowleft" class="jssora02l" style="top:48%;left:70px;width:55px;height:55px;" data-autocenter="2"></span>
<span data-u="arrowright" class="jssora02r" style="top:48%;right:70px;width:55px;height:55px;" data-autocenter="2"></span>
-->
                            <!-- //Arrow Navigator default center left right -->
                            <!-- Arrow Navigator -->
                            <span data-u="arrowleft" class="jssora02l" style="top:0px;left:15px;width:55px;height:55px;" data-autocenter="2"></span>
                            <span data-u="arrowright" class="jssora02r" style="top:0px;right:15px;width:55px;height:55px;" data-autocenter="2"></span>
                            <!-- //Arrow Navigator -->
                        </div>
                        <!-- //END REGION JSSOR SLIDER -->
                        <script>
                        jssor_1_slider_init();
                        </script>
                    </div>
                </section>
            </div>
        </div>
        <!-- II -->
        <section>
            <div class="top">
                <div class="wrap_inner">
                    <div id="top" class="wow bounceInDown" data-wow-duration="4s">
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="crate moduletable">
                                    <h3>主題專區</h3>
                                    <section id="nebox96">
                                        <div class="newsbox_item center">
                                            <div class="newsbox_sett96">
                                                <div class="newsbox_foto">
                                                    <img src="/images/article/ba.jpg" />
                                                </div>
                                                <div class="newsbox_descr" style="color: ; background-color: #9ECFCF;">
                                                    <div class="newsbox_name">基本分析</div>
                                                    <div class="newsbox_post">基本分析</div>
                                                    <div class="newsbox_sep"></div>
                                                    <div class="newsbox_social">
                                                    </div>
                                                    <div class="newsbox_about" style="color: ; background-color: #9ECFCF;">基本分析</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="newsbox_item center">
                                            <div class="newsbox_sett96">
                                                <div class="newsbox_foto">
                                                    <img src="/images/article/ta.jpg" />
                                                </div>
                                                <div class="newsbox_descr" style="color: ; background-color: #9ECFCF;">
                                                    <div class="newsbox_name">技術分析</div>
                                                    <div class="newsbox_post">技術分析</div>
                                                    <div class="newsbox_sep"></div>
                                                    <div class="newsbox_social">
                                                    </div>
                                                    <div class="newsbox_about" style="color: ; background-color: #9ECFCF;">技術分析</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="newsbox_item center">
                                            <div class="newsbox_sett96">
                                                <div class="newsbox_foto">
                                                    <img src="/images/article/query.jpg" />
                                                </div>
                                                <div class="newsbox_descr" style="color: ; background-color: #9ECFCF;">
                                                    <div class="newsbox_name">篩選條件與回測</div>
                                                    <div class="newsbox_post">篩選條件與回測</div>
                                                    <div class="newsbox_sep"></div>
                                                    <div class="newsbox_social">
                                                    </div>
                                                    <div class="newsbox_about" style="color: ; background-color: #9ECFCF;">篩選條件與回測</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="newsbox_item center">
                                            <div class="newsbox_sett96">
                                                <div class="newsbox_foto">
                                                    <img src="/images/article/analysis.jpg" />
                                                </div>
                                                <div class="newsbox_descr" style="color: ; background-color: #9ECFCF;">
                                                    <div class="newsbox_name">個股分析</div>
                                                    <div class="newsbox_post">個股分析</div>
                                                    <div class="newsbox_sep"></div>
                                                    <div class="newsbox_social">
                                                    </div>
                                                    <div class="newsbox_about" style="color: ; background-color: #9ECFCF;">個股分析</div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- End Flex Slider code -->
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- 3 -->
        <!-- MAIN -->
        <main role="main">
            <div class="main">
                <div class="content_main">
                    <div class="wrap_inner">
                        <!-- II -->
                        <section>
                            <div id="content">
                                <div class="row-fluid">
                                    <div class="span12">
                                        <div class="wow fadeIn" data-wow-duration="4s">
                                            <div class="crate_mainbody">
                                                <div id="system-message-container">
                                                </div>
                                                <div class="item-page" itemscope itemtype="https://schema.org/Article">
                                                    <meta itemprop="inLanguage" content="zh-TW" />
                                                    <div class="page-header">
                                                        <h2 itemprop="name">
				關於快樂退休理財網			</h2>
                                                    </div>
                                                    <div itemprop="articleBody">
                                                        <p>大數據時代，如何從大量的財務資訊中，精準的找尋獲利的機會，是每位投資人最關心的議題。</p>
                                                        <p>量化投資，以大量財務數據為架構，並以數量化模型作為其核心，利用電腦理性的系統化行為取代人腦感性的主觀情緒，嚴守交易規則，在最小風險下創造最大報酬。</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </section>
                        <!-- III -->
                    </div>
                </div>
            </div>
        </main>
        <!-- //MAIN -->
        <!-- II -->
        <section>
            <div class="shifting">
                <div class="wrap_inner">
                    <div id="shifting" class="wow slideInRight" data-wow-duration="4s">
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="crate moduletable">
                                    <h3>名詞解釋</h3>
                                    <div id="plcontentslider101" style="display:none;width:auto" class="pl-cs">
                                        <a class="prev" href="#">Prev</a><a class="next" href="#">Next</a>
                                        <div class="slides_container" style="width:auto;">
                                            <div class="slide" style="width:auto">
                                                <div class="pl-row pl-row-first" style="width:33.3333333333%">
                                                    <div class="pl-inner">
                                                        <a target="_parent" class="pl-image-link" title="基本分析" href="/index.php/2016-07-26-13-45-09">
                                                            <img class="hovereffect" src="http://www.quant168.nccu.edu.tw/cache/mod_pl_contentslider/b9a8f55c35c52614f6a282d7c2d55cad-ba.jpg" alt="基本分析" style="width:300px; float:left;margin-right:5px" title="基本分析" />
                                                        </a>
                                                        <a class="pl-title" target="_parent" title="基本分析" href="/index.php/2016-07-26-13-45-09"> 基本分析 </a>
                                                        <br />
                                                        <div class="pl-introtext">
                                                            基本面分析是一種證券或股票估價的方法，利用財務分析和經濟學上的研究來評估企業價值或預測證券(如股票或債券等)價值的走勢。這些被分析的基本資料可以包含一家公司的財務報表和非財務上的資訊，如商品需求成長性的預測、企業比較、新制度的影響分析或人口的改變。它通常和所謂的技術分析相對，技術分析在研究證券價值的趨勢時，並不使用到市場本身以外的因素來做預測。 投資者使用基本分析來檢驗一家公司的財務狀況、其內部運... </div>
                                                        <p class="btn btn-mini">
                                                            <a target="_parent" title="基本分析" href="/index.php/2016-07-26-13-45-09">&raquo; Read more						</a>
                                                        </p>
                                                    </div>
                                                    <!--end pl-inner -->
                                                </div>
                                                <!--end pl-row -->
                                                <div class="pl-row " style="width:33.3333333333%">
                                                    <div class="pl-inner">
                                                        <a target="_parent" class="pl-image-link" title="smart beta 教育策略" href="/index.php/2016-07-26-13-45-09/smart-beta">
                                                            <img class="hovereffect" src="http://www.quant168.nccu.edu.tw/cache/mod_pl_contentslider/6e2cc2f69fbaac3e8b207430957bf817-sb.jpg" alt="smart beta 教育策略" style="width:300px; float:left;margin-right:5px" title="smart beta 教育策略" />
                                                        </a>
                                                        <a class="pl-title" target="_parent" title="smart beta 教育策略" href="/index.php/2016-07-26-13-45-09/smart-beta"> smart beta 教育策略 </a>
                                                        <br />
                                                        <div class="pl-introtext">
                                                            其實業界並没有對Smart Beta有正式的定義。最簡單的解釋就是投資組合的計算方法不同於傳統市值加權計法。Smart Beta可以包括一些簡單的方法，例如相同權重策略，或著重關注個別市場因素，如高股息或低波動型的投資策略。Smart Beta策略有不同的投資風險及收益特質，可以滿足投資者不同的投資目標，同時還可以追蹤大市回報(Beta)。 </div>
                                                        <p class="btn btn-mini">
                                                            <a target="_parent" title="smart beta 教育策略" href="/index.php/2016-07-26-13-45-09/smart-beta">&raquo; Read more						</a>
                                                        </p>
                                                    </div>
                                                    <!--end pl-inner -->
                                                </div>
                                                <!--end pl-row -->
                                                <div class="pl-row pl-row-last" style="width:33.3333333333%">
                                                    <div class="pl-inner">
                                                        <a target="_parent" class="pl-image-link" title="條件篩選及回測" href="/index.php/4-2016-07-26-14-35-35">
                                                            <img class="hovereffect" src="http://www.quant168.nccu.edu.tw/cache/mod_pl_contentslider/5f14294f39d70373745d0ca29b68c21e-query.jpg" alt="條件篩選及回測" style="width:300px; float:left;margin-right:5px" title="條件篩選及回測" />
                                                        </a>
                                                        <a class="pl-title" target="_parent" title="條件篩選及回測" href="/index.php/4-2016-07-26-14-35-35"> 條件篩選及回測 </a>
                                                        <br />
                                                        <div class="pl-introtext">
                                                            選股及回測 可自行創建符合投資人自身期待的投資策略，在選股條件的選擇上區分為基本面指標及技術面指標，其中高達5000種投資組合的策略選擇；除此之外，更提供法人機構測試創建策略的最佳工具-回測系統，可讓投資人了解自行創建策略績效回朔過去至今的表現。 </div>
                                                        <p class="btn btn-mini">
                                                            <a target="_parent" title="條件篩選及回測" href="/index.php/4-2016-07-26-14-35-35">&raquo; Read more						</a>
                                                        </p>
                                                    </div>
                                                    <!--end pl-inner -->
                                                </div>
                                                <!--end pl-row -->
                                                <div style="clear: both;"></div>
                                            </div>
                                            <!--end pl-main-item page	-->
                                            <div class="slide" style="width:auto">
                                                <div class="pl-row pl-row-first" style="width:33.3333333333%">
                                                    <div class="pl-inner">
                                                        <a target="_parent" class="pl-image-link" title="個股診斷" href="/index.php/2016-07-26-13-46-06">
                                                            <img class="hovereffect" src="http://www.quant168.nccu.edu.tw/cache/mod_pl_contentslider/217dd593ebd237260feff4bb79c37ad3-analysis.jpg" alt="個股診斷" style="width:300px; float:left;margin-right:5px" title="個股診斷" />
                                                        </a>
                                                        <a class="pl-title" target="_parent" title="個股診斷" href="/index.php/2016-07-26-13-46-06"> 個股診斷 </a>
                                                        <br />
                                                        <div class="pl-introtext">
                                                            除提供量化投資策略外，並針對個股進行全方位性(ex.財務評分、信用評分、獲利性評分等等…)的評分，讓投資人能一眼望穿個股的體質好壞。 </div>
                                                        <p class="btn btn-mini">
                                                            <a target="_parent" title="個股診斷" href="/index.php/2016-07-26-13-46-06">&raquo; Read more						</a>
                                                        </p>
                                                    </div>
                                                    <!--end pl-inner -->
                                                </div>
                                                <!--end pl-row -->
                                                <div class="pl-row " style="width:33.3333333333%">
                                                    <div class="pl-inner">
                                                        <a target="_parent" class="pl-image-link" title="Smart Beta (SB)分數" href="/index.php/2016-07-26-13-46-06/2016-11-21-05-39-17/sb">
                                                            <img class="hovereffect" src="http://www.quant168.nccu.edu.tw/cache/mod_pl_contentslider/19f3718ba9dd52194771a7f055785fa4-no-image.jpg" alt="Smart Beta (SB)分數" style="width:300px; float:left;margin-right:5px" title="Smart Beta (SB)分數" />
                                                        </a>
                                                        <a class="pl-title" target="_parent" title="Smart Beta (SB)分數" href="/index.php/2016-07-26-13-46-06/2016-11-21-05-39-17/sb"> Smart Beta (SB)分數 </a>
                                                        <br />
                                                        <div class="pl-introtext">
                                                            {loadmodule mod_advanced_responsive_iframe_embeded,財務診斷}
                                                        </div>
                                                        <p class="btn btn-mini">
                                                            <a target="_parent" title="Smart Beta (SB)分數" href="/index.php/2016-07-26-13-46-06/2016-11-21-05-39-17/sb">&raquo; Read more						</a>
                                                        </p>
                                                    </div>
                                                    <!--end pl-inner -->
                                                </div>
                                                <!--end pl-row -->
                                                <div class="pl-row pl-row-last" style="width:33.3333333333%">
                                                    <div class="pl-inner">
                                                        <a target="_parent" class="pl-image-link" title="GSR 分數" href="/index.php/36-gsr">
                                                            <img class="hovereffect" src="http://www.quant168.nccu.edu.tw/cache/mod_pl_contentslider/19f3718ba9dd52194771a7f055785fa4-no-image.jpg" alt="GSR 分數" style="width:300px; float:left;margin-right:5px" title="GSR 分數" />
                                                        </a>
                                                        <a class="pl-title" target="_parent" title="GSR 分數" href="/index.php/36-gsr"> GSR 分數 </a>
                                                        <br />
                                                        <div class="pl-introtext">
                                                        </div>
                                                        <p class="btn btn-mini">
                                                            <a target="_parent" title="GSR 分數" href="/index.php/36-gsr">&raquo; Read more						</a>
                                                        </p>
                                                    </div>
                                                    <!--end pl-inner -->
                                                </div>
                                                <!--end pl-row -->
                                                <div style="clear: both;"></div>
                                            </div>
                                            <!--end pl-main-item page	-->
                                        </div>
                                    </div>
                                    <!--end pl-container -->
                                    <div style="clear: both;"></div>
                                    <script type="text/javascript">
                                    if (typeof(plcModuleIds) == 'undefined') {
                                        var plcModuleIds = new Array();
                                        var plcModuleOpts = new Array();
                                    }
                                    plcModuleIds.push(101);
                                    plcModuleOpts.push({
                                        slideEasing: 'easeInQuad',
                                        fadeEasing: 'easeInQuad',
                                        effect: 'slide,slide',
                                        preloadImage: 'http://www.quant168.nccu.edu.tw//modules/mod_pl_contentslider/tmpl/images/loading.gif',
                                        generatePagination: false,
                                        play: 5000,
                                        hoverPause: true,
                                        slideSpeed: 500,
                                        autoHeight: true,
                                        fadeSpeed: 500,
                                        equalHeight: false,
                                        width: 'auto',
                                        height: 'auto',
                                        pause: 100,
                                        preload: true,
                                        paginationClass: 'pl_handles_num',
                                        generateNextPrev: false,
                                        prependPagination: true,
                                        touchScreen: 0
                                    });
                                    </script>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- 3 -->
        <!-- II -->
        <!-- 3 -->
        <section>
            <div id="breadcrumbs" class="wow fadeIn" data-wow-duration="4s">
                <div class="wrap_inner">
                    <div class="breadcrumbs_search_nav">
                        <ul itemscope itemtype="https://schema.org/BreadcrumbList" class="breadcrumb">
                            <li>
                                您目前位置：&#160;
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="active">
                                <span itemprop="name">
					首頁				</span>
                                <meta itemprop="position" content="1">
                            </li>
                        </ul>
                    </div>
                    <div class="search_nav"></div>
                    <div class="clear"></div>
                </div>
            </div>
        </section>
        <!-- FOOTER -->
        <footer role="contentinfo">
            <div class="foot">
                <div class="wrap_inner">
                    <!-- II -->
                    <section>
                        <div id="footer" class="wow none" data-wow-duration="4s">
                            <div class="row-fluid">
                                <div class="footer">
                                    <div id="toTop"></div>
                                    <div id="footer-copyright">
                                        <p style="text-align: center;">本站最佳瀏覽解析度為1024X768
                                            <br /> Copyright © 2016 website setup and mantain by Stacy Chuang
                                            <br /> 聯絡地址:臺北市文山區指南路二段64號 (02)2939-3091 分機 81126</p>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </section>
                    <!-- 3 -->
                </div>
            </div>
        </footer>
        <!-- //FOOTER -->
    </div>
    <!-- wrap all -->
    <!-- VIDEO BG -->
    <!-- //VIDEO BG -->
    <script src="/templates/at_taisu/includes/layouts/slidepanel/js/classie.js"></script>
    <script src="/templates/at_taisu/includes/layouts/slidepanel/js/demo1.js"></script>
    <script type="text/javascript">
    (function(backtop) {
        backtop(window).scroll(function() {
            if (jQuery(this).scrollTop() != 0) {
                backtop('#toTop').fadeIn();
            } else {
                backtop('#toTop').fadeOut();
            }
        });
        backtop('#toTop').click(function() {
            backtop('body,html').animate({
                scrollTop: 0
            }, 800);
        });

    })(jQuery);
    </script>
</body>

</html>

