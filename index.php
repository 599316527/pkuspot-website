<?php
    $ua = $_SERVER['HTTP_USER_AGENT'];
    // echo $ua;
    if (
        stripos($ua, 'Googlebot')   !== false ||
        stripos($ua, 'Baiduspider') !== false ||
        stripos($ua, 'bingbot')     !== false ||
        stripos($ua, 'Yahoo!')      !== false ||
        stripos($ua, 'YodaoBot')    !== false
    ) {
        $isSpider = true;
        $podcasts = array();
        define('PODCASTS_CACHE', 'api/cache/podcasts.json');
        if (file_exists(PODCASTS_CACHE)) {
            $podcasts = json_decode(file_get_contents(PODCASTS_CACHE), true);
        }
    }
    else {
        $isSpider = false;
    }
    // echo $isSpider?'is spider':'not spider';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta name="description" content="北大三个非典型学生正经地吐槽北大的生活，以及搞笑的、没节操的、伪学术的、和这个花花世界有关的一切">
    <meta name="keywords" content="在北大不吐槽会死,pkuspot,播客,Podcast,90后,官方网站,官网,扯淡刘,呆逼侯,碧池周,北大,学生">
    <meta name="author" content="Kyle He (hk1229.cn)">
    <title>《在北大不吐槽会死》播客 官方网站 | Podcast »Pkuspot« Offical Website</title>
    <link rel="stylesheet" type="text/css" href="style/index.css">
    <link rel="stylesheet" type="text/css" href="//cdn.staticfile.org/fancybox/2.1.5/jquery.fancybox.min.css">
    <script type="text/javascript" src="//cdn.staticfile.org/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.staticfile.org/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="//cdn.staticfile.org/mustache.js/0.8.1/mustache.min.js"></script>
    <script type="text/javascript" src="//cdn.staticfile.org/mousetrap/1.4.6/mousetrap.min.js"></script>
    <script type="text/javascript" src="//cdn.staticfile.org/jquery-hashchange/v1.3/jquery.ba-hashchange.min.js"></script>
    <script type="text/javascript" src="//hm.baidu.com/hm.js?8cf39abd8ea97f2155653fa999bb6d7d" defer></script>
    <!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css" href="style/killie6.css">
    <script type="text/javascript" src="script/killie6.js"></script>
    <![endif]-->
</head>
<body>

    <div class="container-wrapper">
        <div class="container">
            <div class="row">
                <div class="col col-left">
                    <div class="fixed-box">
                        <div class="big-logo">
                            <img class="wechat-qrcode" src="assets/pkuspot-wechat-qrcode.png" />
                            <img class="pkuspot-logo" src="assets/pkuspot-logo.png" alt="在北大不吐槽会死-logo" />
                        </div>
                        <div class="dianfm-entry">
                            <a class="dianfm-open-btn" href="http://www.dian.fm/616" target="_blank">北槽直播间</a>
                        </div>
                    </div>
                </div>
                <div class="col col-right">

                    <div class="row latest-podcast">
                        <div class="title"><span>最新一期</span></div>
                        <a href="all-podcasts.html" class="more-btn" id="js-podcast-more-btn">往期节目</a>
                        <div id="js-latest-podcast"></div>
                    </div>

                    <div class="row">
                        <div class="title"><span>收听方式</span></div>
                        <div class="icons">
                            <div class="icon podcast">
                                <a href="https://itunes.apple.com/cn/podcast/zai-bei-da-bu-tu-cao-hui-si/id730325478" target="_blank">
                                    <img src="assets/podcast-logo.png" />
                                    <div class="caption">Podcast</div>
                                </a>
                            </div>
                            <div class="icon ximalaya">
                                <a href="http://www.ximalaya.com/#/3789024/" target="_blank">
                                    <img src="assets/ximalaya-logo.png" />
                                    <div class="caption">喜马拉雅</div>
                                </a>
                            </div>
                            <div class="icon lizhi">
                                <a href="http://www.lizhi.fm/#/30118" target="_blank">
                                    <img src="assets/lizhifm-logo.png" />
                                    <div class="caption">荔枝FM</div>
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="title"><span>勾搭方式</span></div>
                        <div class="icons">
                            <div class="icon weibo">
                                <a href="http://weibo.com/u/3849491849" target="_blank">
                                    <img src="assets/sina-logo.png" />
                                    <div class="caption">新浪微博</div>
                                </a>
                            </div>
                            <div class="icon weixin">
                                <div class="image">
                                    <img src="assets/wechat-logo.png" />
                                    <div class="hidden-text"><span>微信号<br/><strong>pkuspot</strong></span></div>
                                </div>
                                <div class="caption">微信</div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="title"><span>主播们</span></div>
                        <div class="icons">
                            <div class="icon">
                                <a href="http://weibo.com/mrface723" target="_blank">
                                    <img src="https://tva4.sinaimg.cn/crop.0.1.400.400.180/8540809djw1eg4n8vijw7j20b70b7gmb.jpg" />
                                    <div class="caption">碧池周</div>
                                </a>
                            </div>
                            <div class="icon">
                                <a href="http://weibo.com/u/2230919704" target="_blank">
                                    <img src="https://tva3.sinaimg.cn/crop.0.0.800.800.180/84f92218jw8eol1yi9gfbj20m80m8wfl.jpg" />
                                    <div class="caption">呆逼侯</div>
                                </a>
                            </div>
                            <div class="icon">
                                <a href="http://weibo.com/u/2357936555" target="_blank">
                                    <img src="https://tva1.sinaimg.cn/crop.0.0.511.511.180/8c8b41abjw8f9m784ubcsj20e70e83yy.jpg" />
                                    <div class="caption">扯淡刘</div>
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="title"><span>投喂渠道</span></div>
                        <div class="icons">
                            <div class="icon alipay">
                                <a href="donate-alipay.html" target="_blank">
                                    <img src="assets/alipay-logo.png" />
                                    <div class="caption">支付宝</div>
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="title"><span>相关链接</span></div>
                        <div class="links">
                            <div class="link link-weibo">
                                <a href="http://weibo.com/3849491849/Brehr08Hh" target="_blank">招兵买马，搜刮银两——和北槽谈钱，谈感情</a>
                            </div>
                            <div class="link link-zhihu">
                                <a href="http://www.zhihu.com/question/24145180/answer/26851910" target="_blank">「在北大不吐槽会死」是一个怎样的播客节目？</a>
                            </div>
                        </div>
                    </div>

                </div> <!-- /.col-right -->
                <div class="clearfix"></div>
            </div>

            <div class="row footer">
                <div class="copyright">
                    <div>
                        <span>Copyright &copy; 2014 Pkuspot. All rights reserved.</span>
                    </div>
                    <div>
                        <span>Developed by <a href="https://hk1229.cn/" target="_blank">Kyle He</a>. </span>
                        <span>Fork me on <a href="https://github.com/599316527/pkuspot-website" target="blank">Github</a>.</span>
                    </div>
                </div>
            </div>
        </div> <!-- /.container -->
        <a class="right-banner-toggle-switch-btn" href="###" title="更多"></a>
        <div class="dianfm-live-panel" id="js-dianfm-live-panel">
            <a class="dianfm-close-btn" href="###" title="关闭">✕</a>
        </div>
    </div> <!-- /.container-wrapper -->

    <div class="right-vertical-banner show-podcast-list">
        <div class="right-banner-navi">
            <a class="banner-navi-btn banner-navi-podcast-btn" href="###">往期节目</a>
            <a class="banner-navi-btn banner-navi-help-btn" href="###">帮助</a>
        </div>
        <div class="right-banner-content-wrapper">
            <div class="right-banner-content">
                <div class="all-podcasts" id="js-all-podcasts">
                    <?php if ($isSpider): ?>
                        <ul class="podcast-list">
                            <?php foreach ($podcasts as $podcast): ?>
                                <li>
                                    <a class="podcast-list-play-btn" href="<?php echo $podcast['guid']; ?>" data-id="<?php echo $podcast['id']; ?>" title="播放">&nbsp;</a>
                                    <span class="podcast-title" title="<?php echo $podcast['title']; ?>"><?php echo $podcast['title']; ?></span>
                                    <span class="podcast-pubdate"><?php echo $podcast['pubdate']; ?></span>
                                    <span class="podcast-description"><?php echo $podcast['description']; ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <div class="loading">
                            <img src="assets/loading.gif">
                        </div>
                        <!-- Podcast List Placeholder -->
                    <?php endif; ?>
                </div>
                <div class="help-info">
                    <h2>快捷键</h2>
                    <dl>
                        <dt>通用</dt>
                        <dd>
                            <ul>
                                <li>
                                    <span class="key">I</span>
                                    <span class="func">打开/关闭右侧边栏</span>
                                </li>
                            </ul>
                        </dd>
                    </dl>
                    <dl>
                        <dt>播放器</dt>
                        <dd>
                            <ul>
                                <li>
                                    <span class="key">P</span>
                                    <span class="func">播放/暂停</span>
                                </li>
                                <li>
                                    <span class="key">M</span>
                                    <span class="func">打开/关闭静音</span>
                                </li>
                                <li>
                                    <span class="key">[</span>
                                    <span class="func">后退5秒</span>
                                </li>
                                <li>
                                    <span class="key">]</span>
                                    <span class="func">快进5秒</span>
                                </li>
                                <li>
                                    <span class="key">{</span>
                                    <span class="func">后退30秒</span>
                                </li>
                                <li>
                                    <span class="key">}</span>
                                    <span class="func">快进30秒</span>
                                </li>
                                <li>
                                    <span class="key">+</span>
                                    <span class="func">加快播放速度</span>
                                </li>
                                <li>
                                    <span class="key">-</span>
                                    <span class="func">减慢播放速度</span>
                                </li>
                                <li>
                                    <span class="key">0</span>
                                    <span class="func">重置播放速度</span>
                                </li>
                            </ul>
                        </dd>
                    </dl>
                </div> <!-- /.help-info -->
                <div class="clearfix"></div>
            </div>
        </div> <!-- /.right-banner-content-wrapper -->
    </div> <!-- /.right-vertical-banner -->

    <canvas id="canvas-background"></canvas>

    <?php
        // if ($isSpider) {
            include('about-from-zhihu.html');
        // }
    ?>

</body>

<!-- 最新一集 Podcast 模版 -->
<script type="text/x-jquery-tmpl" id="js-latest-podcast-tpl">
    <div class="podcast-title">{{title}}<span class="podcast-pubdate">{{pubdate}}</span></div>
    <div class="podcast-description">{{description}}</div>
    <div class="podcast-player">
        <audio src="{{{guid}}}" controls {{#autoplay}}autoplay{{/autoplay}}>
            啊呀呀，你的浏览器不支持HTML5播放器的喵～
        </audio>
    </div>
</script>

<!-- Podcast 列表模版 -->
<script type="text/x-jquery-tmpl" id="js-all-podcasts-tpl">
    <ul class="podcast-list">
        {{#podcasts}}
        <li>
            <a class="podcast-list-play-btn" href="###" data-id="{{id}}" title="播放">&nbsp;</a>
            <span class="podcast-title" title="{{title}}">{{title}}</span>
            <span class="podcast-pubdate">{{pubdate}}</span>
        </li>
        {{/podcasts}}
    </ul>
</script>

<script type="text/javascript" src="script/index.js"></script>
<script type="text/javascript" src="script/background-canvas.js"></script>

</html>

<!-- Developed by Kyle He (admin@hk1229.cn) -->
