<html><head>
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
<meta charset="utf-8">
<meta content="all" name="robots">
<title>登录点点贷 &ndash; 点点贷</title>
<meta content="登录,点点贷" name="keywords">
<meta content="点点贷用户登录。" name="description">
<meta content="index,follow" name="Robots">

<meta content="点点贷(www.dddai.com)" name="Owner">
<meta content="no-cache" http-equiv="pragma">
<meta content="no-cache" http-equiv="cache-control">
<meta content="0" http-equiv="expires">


<link type="text/css" rel="stylesheet" href="/css/loginNew.css">


<link rel="stylesheet" href="/css/style_https.css">
</head>

<body>

<!--head-->
<div class="clearfix simpleHead01">
	<div class="fl">
    	<a href="#">
			<img width="173" height="57" src="/image/logo_all.png" alt="点点贷">
		</a><span>登录</span>
    </div>
</div>
<!--head end-->
<!--login-->
<div style="background:none;box-shadow:none" class="w1000 page_login shadow page152">
	<div class="content clearfix">
    	<div class="fl w310 jcarousel-box">
            <div class="jcarousel-clip">
                <ul class="imgLists" style="left: -580px;">
                    <li>
                        <i class="pos1"></i>
                        <em class="fs_18 fc_blue block txcenter mt_20">高收益灵活投资</em>
                        <em class="txcenter block mt_10">50元起投</em>
                        <em class="txcenter block">预期12%年化收益率</em>
                        <em class="txcenter block">投资90天后即可债权转让</em>
                       <!-- <a href="#" class="more blue block mt_10 txcenter fs_12" title="了解更多>">了解更多></a>-->
                    </li>
                    <li>
                        <i class="pos2"></i>
                        <em class="fs_18 fc_blue block txcenter mt_20">全方位安全保障</em>
                        <em class="txcenter block mt_10">5道安全防线</em>
                        <em class="txcenter block">100%本金保障计划</em>
                        <em class="txcenter block">账户资金安全由银行和PICC共同保障</em>
                        <!--<a href="#" class="more blue block mt_10 txcenter fs_12" title="了解更多>">了解更多></a>-->
                    </li>
                    <li>
                        <i class="pos3"></i>
                        <em class="fs_18 fc_blue block txcenter mt_20">一站式借款服务</em>
                        <em class="txcenter block mt_10">无抵押信用借款 </em>
                        <em class="txcenter block">24小时放款</em>
                        <em class="txcenter block">提前还款可减免服务费</em>
                        <!--<a href="#" class="more blue block mt_10 txcenter fs_12" title="了解更多>">了解更多></a>-->
                    </li>


                <li>
                        <i class="pos1"></i>
                        <em class="fs_18 fc_blue block txcenter mt_20">高收益灵活投资</em>
                        <em class="txcenter block mt_10">50元起投</em>
                        <em class="txcenter block">预期12%年化收益率</em>
                        <em class="txcenter block">投资90天后即可债权转让</em>
                       <!-- <a href="#" class="more blue block mt_10 txcenter fs_12" title="了解更多>">了解更多></a>-->
                    </li><li>
                        <i class="pos1"></i>
                        <em class="fs_18 fc_blue block txcenter mt_20">高收益灵活投资</em>
                        <em class="txcenter block mt_10">50元起投</em>
                        <em class="txcenter block">预期12%年化收益率</em>
                        <em class="txcenter block">投资90天后即可债权转让</em>
                       <!-- <a href="#" class="more blue block mt_10 txcenter fs_12" title="了解更多>">了解更多></a>-->
                    </li></ul>
            </div>
            <div class="jcarousel-prev"></div>
            <div class="jcarousel-next"></div>
        </div>
        <div class="fr righ">
        	<div class="module">
					<div class="tab_u">
                    	<span class="active">密码登录</span>
                    </div>
                    <div class="clearfix tab_content">
                    	<!--1-->
                        <div class="clearfix nr form" style="display: block;">
                        <form id="loginForm" method="post" class="nwd-formUi" action="{{url('auth/login')}}">
                            {!! csrf_field() !!}
           	  				<input type="hidden" id="codeType" value="0" name="codeType">
           	  				<input type="hidden" value="geetest" name="geetestCode">
                        	<table width="280" cellspacing="0" cellpadding="0" border="0" align="center" class="mt_10">
              
                                <tbody><tr>
                                    <td style="padding-bottom:0; height:24px; position:relative;">
                                        <div style="display:none" id="errorMsg" class="error fs_12 load_bc">
                                        </div>
                                    </td>
                                </tr>
                              <tr>
                                <td class="pad">
                                    <label class="touzi01 long">
                                        <input type="text" class="input_1 pos_u gray_border" placeholder="用户名" id="username" name="name">
                                    </label>
                                </td>
                            </tr>
                              <tr>
                                <td class="pad">
                                    <label class="touzi01 long">
                                        <input type="password" class="input_1 pos_p gray_border" placeholder="密码" id="pwd" name="password">
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                  <div class="user clearfix fs_14 fc_3">
                                    <p class="fl"><input type="checkbox" class="mr_5" id="rem" checked="checked"><label class="fc_9" for="rem">记住用户名</label></p>
                                    <a style="padding-right:10px;" class="fr fc_blue" href="#">忘记密码？</a>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                 <input type="submit" id="userLoginBtn" value="登录" class="submit">
                                </td>
                            </tr>
                            <tr>
                                <td class="txcenter fc_9">
                                    没有帐号？<a title="立即免费注册" class="blue ml_15" href="#">免费注册</a>
                                </td>
                              
                            </tr>
                            <tr>
                                <td>
                                    <!--div class="boder-bt w258">
                                        <span id="qqLogin" class="bt-left"><i class="qq com"></i><a class="fc_9" title="QQ登录" href="javascript:void(0);"><i style="font-family:Arial">QQ</i>登录</a></span>
                                        <span id="weiboLogin"><i class="sina com"></i><a class="fc_9" title="微博登录" href="javascript:void(0);">微博登录</a></span>
                                    </div-->
                                    
                                </td>
                            </tr>
                          </tbody></table>
                          
                        </form>
                        
                        </div>
                        <!--1 end-->
                    </div>
                </div> 
		</div>
		<!--right end-->
    </div>
</div>
<!--login-->

<!--confirm Start-->


<!--confirm End-->

<!--foot-->
<!--foot-->
<div class="login_foot w1000 txcenter">
	<p class="fc_9 fs_12">Copyright &copy; 2016 点点贷（www.dddai.com）&#12288;版权所有；市场有风险，投资需谨慎，营造合法、诚信借贷环境。</p>
    <div class="line3 mt_10">
        <a href="#" target="_blank" class="img1" rel="nofollow"><img width="70" height="32" src="/px.gif"></a>
            <a href="#" target="_blank" class="img2" rel="nofollow"><img width="70" height="32" src="/px.gif"></a>
            <a href="#" target="_blank" class="img3" rel="nofollow"><img width="70" height="32" src="/px.gif"></a>
            <a href="#" target="_blank" class="img4" rel="nofollow"><img width="70" height="32" src="/px_002.gif"></a>
            <a href="#" target="_blank" class="img5" rel="nofollow"><img width="70" height="32" src="/px_002.gif"></a>
    		<a href="#" target="_blank" class="img6" rel="nofollow"><img width="70" height="32" src="/px.gif"></a>
        	<a href="#" target="_blank" class="img7" rel="nofollow"><img width="70" height="32" src="/px.gif"></a>
        	<a href="#" target="_blank" class="img8" rel="nofollow"><img width="70" height="32" src="/px_002.gif"></a>
        	<a href="#" target="_blank" class="img9" rel="nofollow"><img width="70" height="32" src="/px_002.gif"></a>
    </div>
</div>
<!--foot end-->
<div style="color:#f1f1f1" id="ser_num">751</div>
<!--foot end-->
 
 

 



</body></html>