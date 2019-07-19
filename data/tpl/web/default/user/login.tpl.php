<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>

<html lang="zh-CN">
<head>
    <meta charset=UTF-8>
    <meta http-equiv=X-UA-Compatible content="IE=edge">
    <meta name=viewport content="width=device-width,initial-scale=1,user-scalable=0">
    <meta http-equiv=content-type content="text/html;charset=utf-8"/>
    <meta name="keywords" content="<?php  echo $setting['keywords'];?>"/>
    <meta name="description" content="<?php  echo $setting['description'];?>"/>
    <title><?php  if(isset($title)) $_W['page']['title'] = $title?><?php  if(!empty($_W['page']['title'])) { ?><?php  echo $_W['page']['title'];?><?php  } ?><?php  if(empty($_W['page']['copyright']['sitename'])) { ?><?php  if(IMS_FAMILY != 'x') { ?><?php  if(!empty($_W['page']['title'])) { ?> - <?php  } ?>微擎 - 公众平台自助引擎 -  Powered by WE7.CC<?php  } ?><?php  } else { ?><?php  if(!empty($_W['page']['title'])) { ?> - <?php  } ?><?php  echo $_W['page']['copyright']['sitename'];?><?php  } ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php  echo $setting['favicon'];?>"/>
    <link rel="stylesheet" href="/web/resource/css/main.min.css">
    <link rel="stylesheet" href="/web/resource/css/style1.css">
    <link rel="stylesheet" href="/web/resource/css/overlay.css">
    <style type="text/css">
        .copyright span,.copyright a,.copyright p,.copyright p a,.copyright p span{
            color: #fff !important;
        }
        .login-container {
            position: absolute;
            width: 100%;
            min-width: 1200px;
            height: 100%;
            background: url("<?php  echo $_W['siteroot'];?>/web/resource/images/login-bg-3.jpg") no-repeat 50%;
            background-size: 100% 100%;
            overflow-x: hidden;
            overflow-y: scroll
        }

        .login-header {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 99;
            width: 100%;
            height: 71px
        }

        .login-header .login-logo {
            float: left;
            width: 130px;
            height: 51px;
            background: url("images/login-logo.png") no-repeat 50%;
            background-size: 100% 100%;
            margin: 15px 0 0 31px
        }

        .main-content-wrapper {
            width: 873px;
            position: absolute;
            left: 50%;
            height: auto;
            top: 18%;
            margin-left: -437px;
            z-index: 9999
        }

        .login-mainbox {
            width: 873px;
            height: 482px;
            background-color: rgba(0, 0, 0, .5)
        }

        .login-left {
            float: left;
            width: 507px;
            height: 482px
        }

        .login-left img {
            margin-left: 32px;
            margin-top: 45px
        }

        .login-wrap {
            float: right;
            padding: 20px 0;
            width: 366px;
            height: 482px;
            z-index: 9;
            background-color: rgba(0, 0, 0, .5)
        }

        .login-wrap .login-header-text {
            margin-top: 13px;
            margin-bottom: 18px
        }

        .login-wrap .login-logo {
            width: 165px;
            height: 44px;
            margin-left: 104px;
            background: url("images/login-applet.png") no-repeat 50%;
            background-size: 100% 100%
        }

        .login-wrap .input-box {
            padding: 0 40px 0 42px
        }

        .login-wrap .input-box-1 {
            padding: 0 40px 0 42px;
            margin-bottom: 10px
        }

        .login-wrap .login-input {
            background-color: #fff;
            border-radius: 2px
        }

        .login-wrap .captcha-img {
            width: 88px;
            margin: -6px -7px;
            height: 40px;
            border: none;
            border-radius: 0 0 2px 2px
        }

        .login-wrap .login-auto {
            color: #fff
        }

        .login-wrap .login-btn {
            padding: 10px 15px;
            font-size: 14px;
            font-weight: 700;
            border-radius: 2px;
            background-color: #f14c47;
            border-color: #f14c47
        }

        .login-wrap .login-btn:hover {
            background-color: #ff6d22;
            border-color: #ff6d22
        }

        .login-footer {
            position: absolute;
            width: 100%;
            bottom: 0;
            left: 0;
            z-index: 99;
            height: 60px;
            line-height: 60px;
            font-size: 14px;
            color: #fff;
            text-align: center;
            padding-bottom: 14px
        }

        .link-groups {
            width: 873px;
            height: 50px;
            margin-top: 10px;
        }

        .link-groups .other {
            width: 311px;
            height: 50px;
            background: rgba(239, 238, 235, 0.9);
            line-height: 50px;
            float: right;
        }

        .link-groups .other a {
            width: 98px;
            display: inline-block;
            text-align: center;
            font-size: 16px;
            color: #373232;
        }

        .nc-container .nc_scale span {
            height: 34px !important;
        }
    </style>
</head>
<body cz-shortcut-listen="true">
<div style="height: 100%; width: 100%;">
    <div class="login-container">

        <div class="main-content-wrapper" style="margin-top: -271px;top: 50%;">
            <div class="login-mainbox">
                <div class="login-left">
                    <img src="<?php  echo $_W['siteroot'];?>/web/resource/picture/login-img-1.png" alt="">
                </div>
                <div class="login-wrap">
                    <div class="login-header-text">
                        <h1 style="color: #fff;text-align: center">帐号登录</h1>
                    </div>
                    <form class="ivu-form ivu-form-label-right">
                        <div class="input-box ivu-form-item ivu-form-item-required">
                            <div class="ivu-form-item-content">
                                <div class="login-input ivu-input-wrapper ivu-input-type">
                                    <i class="ivu-icon ivu-icon-load-c ivu-load-loop ivu-input-icon ivu-input-icon-validate"></i>
                                    <input autocomplete="off" type="text" placeholder="用户名/手机号" class="ivu-input"
                                           name="username">
                                </div>
                                <div class="ivu-form-item-error-tip"></div>
                            </div>
                        </div>
                        <div class="input-box ivu-form-item ivu-form-item-required">
                            <div class="ivu-form-item-content">
                                <div class="login-input ivu-input-wrapper ivu-input-type">
                                    <i class="ivu-icon ivu-icon-load-c ivu-load-loop ivu-input-icon ivu-input-icon-validate"></i>
                                    <input autocomplete="off" type="password" placeholder="密码" class="ivu-input"
                                           name="password">
                                </div>
                                <div class="ivu-form-item-error-tip"></div>
                            </div>
                        </div>
						
                        <div class="input-box ivu-form-item" style="margin-top: 20px">
                            <?php  if(!empty($_W['setting']['copyright']['verifycode'])) { ?>
                            <div class="form-group verify_wrap">
                                <input type="text" class="form-control ivu-input" name="verify" placeholder="验证码">
                                <img style="height: 100%;margin-top: -2px;" class="verify" src="<?php  echo url('utility/code')?>"/>
                            </div>
                            <?php  } ?>
                        </div>
                        <div class="input-box ivu-form-item">
                            <div class="ivu-form-item-content">
                                <button type="button" class="login-btn ivu-btn ivu-btn-primary ivu-btn-long btn-login">
                                    <span>登 录</span></button>
                                <input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
                            </div>
                        </div>
                        <div class="input-box ivu-form-item">
                            <div class="ivu-form-item-content" style="line-height: 26px;">
                                <div class="text-right">
					<?php  if(!$_W['siteclose'] && $setting['register']['open']) { ?>
						<?php  if(empty($_GPC['login_type']) || $_GPC['login_type'] == 'system') { ?>
						<a href="<?php  echo url('user/register');?>" class="color-default">立即注册</a>
						<?php  } ?>
						<?php  if(!empty($setting['thirdlogin']['wechat']['authstate'])) { ?><a href="<?php  echo url('user/find-password')?>" style="color: #fff;float:right;">忘记密码</a><?php  } ?>
					<?php  } ?>
				</div>
                            </div>
                            <?php  if(!empty($setting['thirdlogin']['qq']['authstate']) || !empty($setting['thirdlogin']['wechat']['authstate'])) { ?>
                            <div class="text-center p-t-12" style="display: block;width: 120px;margin: 0 auto;">
                                <span style="display: inline-block;padding-bottom: 5px;width: 200px;font-size: 14px;color: #fff;" >使用第三方账号登录</span>
                                <div class="form-control-static">
                                    <?php  if(!empty($setting['thirdlogin']['qq']['authstate'])) { ?><a href="<?php  echo $login_urls['qq'];?>"><img src="./resource/images/qqlogin.png" width="35px"></a>&nbsp;&nbsp;<?php  } ?>
                                   <?php  if(!empty($setting['thirdlogin']['wechat']['authstate'])) { ?><a href="<?php  echo $login_urls['wechat'];?>"><img src="./resource/images/wxlogin.png" width="35px"></a><?php  } ?>
                                </div>
                            </div>
                            <?php  } ?>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div style="display: block;width: 100%;margin: 0 auto;position:absolute;bottom: 20px;">
            <div style="color: #fff;text-align: center" class="copyright"><?php  echo htmlspecialchars_decode($setting['copyright'])?></div>
        </div>

    </div>
</div>
<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>/web/resource/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript">

    //iosOverlay
    var iosOverlay=function(params){var overlayDOM;var overlayBg;var noop=function(){};var defaults={onbeforeshow:noop,onshow:noop,onbeforehide:noop,onhide:noop,text:"",icon:null,spinner:null,duration:null,id:null,parentEl:null};var merge=function(obj1,obj2){var obj3={};for(var attrOne in obj1){obj3[attrOne]=obj1[attrOne]}for(var attrTwo in obj2){obj3[attrTwo]=obj2[attrTwo]}return obj3};var doesTransitions=(function(){var b=document.body||document.documentElement;var s=b.style;var p='transition';if(typeof s[p]==='string'){return true}var v=['Moz','Webkit','Khtml','O','ms'];p=p.charAt(0).toUpperCase()+p.substr(1);for(var i=0;i<v.length;i++){if(typeof s[v[i]+p]==='string'){return true}}return false}());var settings=merge(defaults,params);var handleAnim=function(anim){if(anim.animationName==="ios-overlay-show"){settings.onshow()}if(anim.animationName==="ios-overlay-hide"){destroy();settings.onhide()}};var create=(function(){overlayBg=document.createElement("div");overlayBg.className="ui-ios-bg";overlayDOM=document.createElement("div");overlayDOM.className="ui-ios-overlay";overlayDOM.innerHTML+='<span class="title">'+settings.text+'</span';if(params.icon){overlayDOM.innerHTML+='<img src="'+params.icon+'">'}else if(params.spinner){overlayDOM.appendChild(params.spinner.el)}if(doesTransitions){overlayBg.addEventListener("webkitAnimationEnd",handleAnim,false);overlayBg.addEventListener("msAnimationEnd",handleAnim,false);overlayBg.addEventListener("oAnimationEnd",handleAnim,false);overlayBg.addEventListener("animationend",handleAnim,false)}if(params.parentEl){document.getElementById(params.parentEl).appendChild(overlayDOM)}else{overlayBg.appendChild(overlayDOM);overlayBg.style.height=Math.max(document.body.scrollHeight,document.documentElement.scrollHeight)+'px';document.body.appendChild(overlayBg)}settings.onbeforeshow();if(doesTransitions){overlayBg.className+=" ios-overlay-show"}else if(typeof $==="function"){$(overlayBg).fadeIn({duration:200},function(){settings.onshow()})}if(settings.duration){window.setTimeout(function(){hide()},settings.duration)}}());var hide=function(){settings.onbeforehide();if(doesTransitions){overlayBg.className=overlayBg.className.replace("show","hide")}else if(typeof $==="function"){$(overlayDOM).fadeOut({duration:200},function(){destroy();settings.onhide()})}};var destroy=function(){if(params.parentEl){document.getElementById(params.parentEl).removeChild(overlayDOM)}else{document.body.removeChild(overlayBg)}};var update=function(params){if(params.text){overlayDOM.getElementsByTagName("span")[0].innerHTML=params.text}if(params.icon){if(settings.spinner){settings.spinner.el.parentNode.removeChild(settings.spinner.el);settings.spinner=null}overlayDOM.innerHTML+='<img src="'+params.icon+'">'}};return{hide:hide,destroy:destroy,update:update}};

    //fgnass.github.com/spin.js#v1.2.7
    !function(e,t,n){function o(e,n){var r=t.createElement(e||"div"),i;for(i in n)r[i]=n[i];return r}function u(e){for(var t=1,n=arguments.length;t<n;t++)e.appendChild(arguments[t]);return e}function f(e,t,n,r){var o=["opacity",t,~~(e*100),n,r].join("-"),u=.01+n/r*100,f=Math.max(1-(1-e)/t*(100-u),e),l=s.substring(0,s.indexOf("Animation")).toLowerCase(),c=l&&"-"+l+"-"||"";return i[o]||(a.insertRule("@"+c+"keyframes "+o+"{"+"0%{opacity:"+f+"}"+u+"%{opacity:"+e+"}"+(u+.01)+"%{opacity:1}"+(u+t)%100+"%{opacity:"+e+"}"+"100%{opacity:"+f+"}"+"}",a.cssRules.length),i[o]=1),o}function l(e,t){var i=e.style,s,o;if(i[t]!==n)return t;t=t.charAt(0).toUpperCase()+t.slice(1);for(o=0;o<r.length;o++){s=r[o]+t;if(i[s]!==n)return s}}function c(e,t){for(var n in t)e.style[l(e,n)||n]=t[n];return e}function h(e){for(var t=1;t<arguments.length;t++){var r=arguments[t];for(var i in r)e[i]===n&&(e[i]=r[i])}return e}function p(e){var t={x:e.offsetLeft,y:e.offsetTop};while(e=e.offsetParent)t.x+=e.offsetLeft,t.y+=e.offsetTop;return t}var r=["webkit","Moz","ms","O"],i={},s,a=function(){var e=o("style",{type:"text/css"});return u(t.getElementsByTagName("head")[0],e),e.sheet||e.styleSheet}(),d={lines:12,length:7,width:5,radius:10,rotate:0,corners:1,color:"#fff",speed:1,trail:100,opacity:.25,fps:20,zIndex:2e9,className:"spinner",top:"auto",left:"auto",position:"relative"},v=function m(e){if(!this.spin)return new m(e);this.opts=h(e||{},m.defaults,d)};v.defaults={},h(v.prototype,{spin:function(e){this.stop();var t=this,n=t.opts,r=t.el=c(o(0,{className:n.className}),{position:n.position,width:0,zIndex:n.zIndex}),i=n.radius+n.length+n.width,u,a;e&&(e.insertBefore(r,e.firstChild||null),a=p(e),u=p(r),c(r,{left:(n.left=="auto"?a.x-u.x+(e.offsetWidth>>1):parseInt(n.left,10)+i)+"px",top:(n.top=="auto"?a.y-u.y+(e.offsetHeight>>1):parseInt(n.top,10)+i)+"px"})),r.setAttribute("aria-role","progressbar"),t.lines(r,t.opts);if(!s){var f=0,l=n.fps,h=l/n.speed,d=(1-n.opacity)/(h*n.trail/100),v=h/n.lines;(function m(){f++;for(var e=n.lines;e;e--){var i=Math.max(1-(f+e*v)%h*d,n.opacity);t.opacity(r,n.lines-e,i,n)}t.timeout=t.el&&setTimeout(m,~~(1e3/l))})()}return t},stop:function(){var e=this.el;return e&&(clearTimeout(this.timeout),e.parentNode&&e.parentNode.removeChild(e),this.el=n),this},lines:function(e,t){function i(e,r){return c(o(),{position:"absolute",width:t.length+t.width+"px",height:t.width+"px",background:e,boxShadow:r,transformOrigin:"left",transform:"rotate("+~~(360/t.lines*n+t.rotate)+"deg) translate("+t.radius+"px"+",0)",borderRadius:(t.corners*t.width>>1)+"px"})}var n=0,r;for(;n<t.lines;n++)r=c(o(),{position:"absolute",top:1+~(t.width/2)+"px",transform:t.hwaccel?"translate3d(0,0,0)":"",opacity:t.opacity,animation:s&&f(t.opacity,t.trail,n,t.lines)+" "+1/t.speed+"s linear infinite"}),t.shadow&&u(r,c(i("#000","0 0 4px #000"),{top:"2px"})),u(e,u(r,i(t.color,"0 0 1px rgba(0,0,0,.1)")));return e},opacity:function(e,t,n){t<e.childNodes.length&&(e.childNodes[t].style.opacity=n)}}),function(){function e(e,t){return o("<"+e+' xmlns="urn:schemas-microsoft.com:vml" class="spin-vml">',t)}var t=c(o("group"),{behavior:"url(#default#VML)"});!l(t,"transform")&&t.adj?(a.addRule(".spin-vml","behavior:url(#default#VML)"),v.prototype.lines=function(t,n){function s(){return c(e("group",{coordsize:i+" "+i,coordorigin:-r+" "+ -r}),{width:i,height:i})}function l(t,i,o){u(a,u(c(s(),{rotation:360/n.lines*t+"deg",left:~~i}),u(c(e("roundrect",{arcsize:n.corners}),{width:r,height:n.width,left:n.radius,top:-n.width>>1,filter:o}),e("fill",{color:n.color,opacity:n.opacity}),e("stroke",{opacity:0}))))}var r=n.length+n.width,i=2*r,o=-(n.width+n.length)*2+"px",a=c(s(),{position:"absolute",top:o,left:o}),f;if(n.shadow)for(f=1;f<=n.lines;f++)l(f,-2,"progid:DXImageTransform.Microsoft.Blur(pixelradius=2,makeshadow=1,shadowopacity=.3)");for(f=1;f<=n.lines;f++)l(f);return u(t,a)},v.prototype.opacity=function(e,t,n,r){var i=e.firstChild;r=r.shadow&&r.lines||0,i&&t+r<i.childNodes.length&&(i=i.childNodes[t+r],i=i&&i.firstChild,i=i&&i.firstChild,i&&(i.opacity=n))}):s=l(t,"animation")}(),e.Spinner=v}(window,document);

    $.extend({
        alert: function (text = '') {
            $('.modal-body').html(text);
            var modal = $('.modal');
            modal.modal('toggle');
        },
        toast: function (text = '', icon = '', duration = 2000, extraClass = 'ui-toast') {
            var opt = {
                text: text,
                duration: duration,
            };
            if (icon == 'success') {
                opt.icon = '<?php  echo $_W["siteroot"];?>/web/resource/picture/check.png';
            } else if (icon == 'fail' || icon == 'error') {
                opt.icon = '<?php  echo $_W["siteroot"];?>/web/resource/picture/cross.png';
            }
            setTimeout(function () {
                iosOverlay(opt);
                $('.ui-ios-bg').addClass(extraClass);
                $('.ui-ios-overlay').css({
                    'margin-left': -$('.ui-ios-overlay').width()/2,
                    'margin-top': -$('.ui-ios-overlay').height()/2,
                });
            }, 10);
        },
        showLoading: function (text = '加载中...') {
            if ($('.ios-overlay-show')[0]) return;
            var opt = {
                text: text,
                spinner: new Spinner().spin(document.createElement('div'))
            };
            iosOverlay(opt);
        },
        hideLoading: function () {
            $('.ios-overlay-show').remove();
        }
    });
    (function () {
        $('input[name=username]').focus();
        $('input').unbind('keyup').keyup(function (e) {
            //enter key
            if (e && e.keyCode == 13) {
                $('.btn-login').trigger('click');
            }
        });
        $('img.verify').click(function() {
            $(this).prop('src', '<?php  echo url("utility/code")?>r='+Math.round(new Date().getTime()));
            return false;
        });
        $('.btn-login').click(function () {
            var username = $('input[name=username]');
            if (username.val() == '') {
                $.toast('请输入用户名！');
                username.focus();
                return;
            }
            var password = $('input[name=password]');
            if (password.val() == '') {
                $.toast('请输入密码！');
                password.focus();
                return;
            }
            var login_type = 'system';
            if (username.val().search(/^([0-9]{11})?$/) != -1) {
                login_type = 'mobile';
            }
            var data = 'username='+username.val();
            data += '&password='+encodeURIComponent(password.val());
            var verify = $('input[name=verify]');
            if (verify.length) {
                if (verify.val() == '') {
                    $.toast('请输入验证码！');
                    verify.focus();
                    return;
                }
                data += '&verify='+verify.val();
            }
            var token = $('input[name=token]').val();
            data += '&login_type='+login_type+'&submit=yes&token='+token;
            $.ajax({
                url: '<?php  echo url("user/login")?>',
                type: 'post',
                data: data,
                dataType: 'json',
                beforeSend: function () {
                    $.showLoading();
                },
                complete: function () {
                    $.hideLoading();
                },
                success: function (resp) {
                    if (resp.message.indexOf('欢迎回来') != -1) {
                        $.toast('登录成功，请稍后...');
                        setTimeout(function () {
                            var url = './index.php?c=home&a=welcome&do=system';
                            if (typeof resp.redirect != 'undefined') {
                                url = resp.redirect
                            }
                            window.location.href = url;
                        }, 2000);
                    } else {
                        $.toast(resp.message);
                        $('img.verify').trigger('click');
                    }
                }
            });
        });
    })();
</script>
<script>$(function(){$('img').attr('onerror', '').on('error', function(){if (!$(this).data('check-src') && (this.src.indexOf('http://') > -1 || this.src.indexOf('https://') > -1)) {this.src = this.src.indexOf('http://www.test.com/attachment/') == -1 ? this.src.replace('http://renren-ningchao.oss-cn-shanghai.aliyuncs.com/', 'http://www.test.com/attachment/') : this.src.replace('http://www.test.com/attachment/', 'http://renren-ningchao.oss-cn-shanghai.aliyuncs.com/');$(this).data('check-src', true);}});});</script></body>
</html>