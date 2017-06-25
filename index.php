<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
<title>税率计算器</title>
<style type="text/css">

html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}
article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}
body{line-height:1.3}
ol,ul{list-style:none}
blockquote,q{quotes:none}
blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}
table{border-collapse:collapse;border-spacing:0}

.clear {height:0px; clear:both;}
body {
  margin:10px;
}
.form-wrapper {
  /*float:left;*/
  width:100%;
  max-width:90.000em;
  background:#FFFFFF;
  overflow:hidden;
}
.form-wrapper label, .form-wrapper .radio-check-label {
  width:100%;
  float:left;
  margin-bottom:1em;
}
.form-wrapper label span, .form-wrapper .notes, .form-wrapper .radio-check-label span.label {
  float:left;
  width: 25%;
  text-align:right;
}
div.input-wrapper {
  width:70%;
  float:right;
  padding:0 0.625em;
}
.form-wrapper input, .form-wrapper select, .form-wrapper textarea, form-wrapper .radio {
  width:100%;
  padding:0.625em 0;
}
.form-wrapper .text input, .form-wrapper textarea {
  width:98%;
  padding-left: 1%; /* % will not work in FF*/
  padding-right: 1%; /* % will not work in FF*/
}

.form-wrapper .radio, .form-wrapper .checkbox {
  position:relative;
}
.form-wrapper .radio span, .form-wrapper .checkbox span {
  width :90%;
  text-align:left;
  padding-left:1.5em;
}
.form-wrapper .radio input, .form-wrapper .checkbox input {
  position:absolute;
  left:0;
  top:0;
  width:1em;
  height:1em;
}

input[type=reset], input[type=submit] {
  width:auto;
  max-width:34%;
  float:right;
}
input[type=submit] {
  margin-left:2%
}
.form-wrapper .notes {
  margin-top:1em;
  width:100%;
  text-align:left;
}

/* DOWN HERE: Only theming */ 

/* Light Theme -----------------    */ 
html.light{
  background:#EEE;
}

.form-wrapper.light {
  background:#EEE;
  font-family:'PT Sans', Arial, sans-serif;
  font-weight:normal;
  font-size:1em;
  line-height:1em;
  color:#424242;
  padding:1em 0;
}
/* TEXT & TEXTAREA */
.light label.text input, .light label.text textarea {
  border: 1px solid #cccccc;
  border-bottom-color: #fff;
  border-right-color: #fff;
  border-radius: 3px;
  background: #e5e5e5;
  color: #555;
  transition:background .2s;
}

/* DROPDOWN & MULTIPLE*/
.light label.dropdown select, .light label.multiple select {
  background: #e5e5e5;
  border: 1px solid #cccccc;
  border-bottom-color: #fff;
  border-right-color: #fff;
  border-radius:3px;
  transition:background .2s;
}
.light label.multiple select {
  padding-bottom:1.875em;
}
.light label.dropdown select option, .light label.multiple select option  {
  background:#e5e5e5;
  margin-bottom:0.625em 1%;
  cursor:pointer;
  transition:background .2s;
}
.light label.dropdown select:focus, .light label.multiple select:focus, .light label.dropdown select:focus option, .light label.multiple select:focus option {
  background:#FFF;
}
/* RADIO & CHECKBOX */
.light .radio-check-label label {
  display:block;
  border: 1px solid #cccccc;
  border-top-color: #fff;
  border-right-color: #fff;
  border-radius: 3px;
  line-height:1em;
  background: #e5e5e5;
  cursor:pointer;
  overflow:hidden;
  margin-bottom:0.5em;
}
.light .radio-check-label label input {
  opacity:0.01
}
.light .radio-check-label label span {
  display:block;
  padding: 0.563em 15% 0.563em 1.875em;
  transition:background .2s;
  border-radius:3px;
}
.light .radio-check-label label span:before {
  content: "";
  display:block;
  width:12px;
  height:12px;
  background:#ffffff;
  position:absolute;
  left:8px;
  top:11px;
  border:1px solid #b9b9b9;
}
.light .radio-check-label label.radio span:before {
  border-radius:8px;
}
.light .radio-check-label label.checkbox span:before {
  border-radius:2px;
}
.light .radio-check-label input:checked ~ span:before {
  background-color:#424242;
  border-color:transparent;
}
.light .radio-check-label input:checked ~ span { 
  background:#FFF;
}
/* SUBMIT & RESET */
.light input[name=submit], .light input[name=reset] {
  margin-top:.60em;
  border: 1px solid #cccccc;
  border-radius: 3px;
  padding: 0.563em 2em;
  background: #e5e5e5;
  color:#424242;
  font-size:1em;
  cursor:pointer;
  transition:background 0.2s;
}
.light input[name=submit] {
  padding:0.563em 2em;
}
.light input[name="reset"]:hover, .light input[name="submit"]:hover {
  color:#FFF;
}
.light input[name="reset"]:hover {
  background:#8C1D04;
}
.light input[name="submit"]:hover {
  background:#70995C;
}

/* FOCUS */
.light label.text input:focus, .light label.text textarea:focus {
  background:#fff;
}

/* Dark Theme -----------------    */
html.dark {
  background:#373431;
}
.form-wrapper.dark {
  background:#373431;
  font-family:'PT Sans', Arial, sans-serif;
  font-weight:normal;
  font-size:1em;
  line-height:1em;
  color:#A8A7A8;
  padding:1em 0;
}
/* TEXT & TEXTAREA */
.dark label.text input, .dark label.text textarea {
  background:#000;
  background:rgba(0,0,0,0.16);
  box-shadow:0 1px 4px rgba(0, 0, 0, 0.3) inset, 0 1px rgba(255, 255, 255, 0.06);
  border: 0 none;
  border-radius: 3px;
  color: #BBBBBB;
  transition:background .2s;
}
/* DROPDOWN & MULTIPLE*/
.dark label.dropdown select, .dark label.multiple select {
  background:#000;
  background:rgba(0,0,0,0.16);
  box-shadow:0 1px 4px rgba(0, 0, 0, 0.3) inset, 0 1px rgba(255, 255, 255, 0.06);
  color: #BBBBBB;
  border: 0 none;
  border-radius:3px;
  transition:background .2s;
}
.dark label.multiple select {
  padding-bottom:1.875em;
}
.dark label.dropdown select option, .dark label.multiple select option  {
  margin-bottom:0.625em 1%;
  cursor:pointer;
  transition:all .2s;
}
.dark label.dropdown select:focus, .dark label.multiple select:focus, .dark label.dropdown select:focus option, .dark label.multiple select:focus option {

}
/* RADIO & CHECKBOX */
.dark .radio-check-label label {
  background:#000;
  background:rgba(0,0,0,0.16);
  box-shadow:0 1px rgba(255, 255, 255, 0.06);
  display:block;
  border: 0 none;
  border-radius: 3px;
  line-height:1em;
  cursor:pointer;
  overflow:hidden;
  margin-bottom:0.5em;

}
.dark .radio-check-label label input {
  opacity:0.01
}
.dark .radio-check-label label span {
  display:block;
  padding: 0.563em 15% 0.563em 1.875em;
  transition:all .2s;
  border-radius:3px;
}
.dark .radio-check-label label span:before {
  content: "";
  display:block;
  width:12px;
  height:12px;
  background:#000;
  background:rgba(0,0,0,0.2);
  position:absolute;
  left:8px;
  top:11px;
  border:1px solid #373431;
}
.dark .radio-check-label label.radio span:before {
  border-radius:8px;
}
.dark .radio-check-label label.checkbox span:before {
  border-radius:2px;
}
.dark .radio-check-label input:checked ~ span:before {
  background:#FFF;
  border-width:0px;

}
.dark .radio-check-label input:checked ~ span { 
    box-shadow:0 1px 4px rgba(0, 0, 0, 0.3) inset, 0 1px rgba(255, 255, 255, 0.06);
  background:#000;
  background:rgba(0,0,0,0.1);
  color:#FFF;

}
/* SUBMIT & RESET */
.dark input[name=submit], .dark input[name=reset] {
  margin-right:0.563em;
  margin-top:2.50em;
  font-size:1em;
  border: 0 none;
    background:#000;
  background:rgba(0,0,0,0.2);
  color: #BBBBBB;
  border-radius: 3px;
  padding: 0.563em 4em;
  cursor:pointer;
  box-shadow: 0 1px rgba(255, 255, 255, 0.06);
  transition:background 0.2s
}
.dark input[name=submit] {
  padding:0.563em 2em;
}
.dark input[name=submit]:hover, .dark input[name=reset]:hover {
  box-shadow:0 1px 4px rgba(0, 0, 0, 0.3) inset, 0 1px rgba(255, 255, 255, 0.06);
  color:#FFF;
}
.dark input[name="reset"]:hover {
  background:rgba(140,29,4,0.3);
}
.dark input[name="submit"]:hover {
  background:rgba(51,102,77,0.3);
}

/* FOCUS */
.dark label.text input:focus, .dark label.text textarea:focus {
  background:#000;
  background:rgba(0,0,0,0.25);
  color:#FFF;
}
/* Dark Theme END ----------------- */

/* Options */
#options {
  margin:0 0 2em 0;
}

/* Media Queries */ 
@media screen and (max-width: 480px)  {
  .form-wrapper .text span, .form-wrapper .dropdown span, .form-wrapper .multiple span, .form-wrapper .radio-check-label span.label {
  float:none;
  width:100%;
}
  .form-wrapper .input-wrapper {
    float:none;
    margin-top:0.625em;
    width:90%
  }

  .form-wrapper .input-wrapper label.radio span, .form-wrapper .input-wrapper label.checkbox span {
    width:80%;
    padding-right:20%;
  }
  .form-wrapper input[name="reset"] {
    margin-top:0.563em;
    padding:0.563em 2em;
  }
}

</style>

</head>
<body>

<h1 style="font-size:2em; padding:5px 0px;">税率计算器</h1>
<form action="index.php" method="post">


<div id="form" class="form-wrapper light">

	<label class="dropdown">
	<span>物业类型</span>
	<div class="input-wrapper">
	  <select size="1" name="wylx">
		<!--<option>-- 请选择物业类型 --</option>-->
		<option value="1">普通住宅</option>
		<option value="2">非普通住宅</option>
		<option value="3">经济适用房</option>  
	  </select>
	</div>
	</label>
	
	<label class="dropdown">
	<span>房数</span>
	<div class="input-wrapper">
	  <select size="1" name="fs">
		<!--<option>-- 请选择物业类型 --</option>-->
		<option value="1">首套</option>
		<option value="2">二套</option>
		<option value="3">三套</option>
	  </select>
	</div>
	</label>
	
	<label class="dropdown">
	<span>房产购置年限</span>
	<div class="input-wrapper">
	  <select size="1" name="zheng">
		<!--<option>-- 请选择物业类型 --</option>-->
		<option value="0">合同房</option>
		<option value="1">新证</option>
		<option value="2">证两年</option>
		<option value="5">证五年</option>
	  </select>
	</div>
	</label>
	
	<label class="dropdown">
	<span>上楼方式</span>
	<div class="input-wrapper">
	  <select size="1" name="slfs">
		<!--<option>-- 请选择物业类型 --</option>-->
		<option value="1">电梯</option>
		<option value="0">楼梯</option>
	  </select>
	</div>
	</label>
	
	<label class="text">
	<span>楼层</span>
		<div class="input-wrapper">
			<input type="text" name="lc" placeholder="请输入楼层数" /> 
		</div>
	</label>
	
	<label class="text">
	<span>建筑面积</span>
		<div class="input-wrapper">
			<input type="text" name="mian" placeholder="请输入房屋面积" /> 
		</div>
	</label>
	
	<label class="text">
	<span>评估单价</span>
		<div class="input-wrapper">
			<input type="text" name="pd" placeholder="请输入评估单价" /> 
		</div>
	</label>
	
	<label class="text">
	<span>合同总价</span>
		<div class="input-wrapper">
			<input type="text" name="hd" placeholder="请输入合同总价" /> 
		</div>
	</label>
	
	<label class="text">
	<span>成交总价</span>
		<div class="input-wrapper">
			<input type="text" name="cj" placeholder="请输入成交总价" /> 
		</div>
	</label>

<div style="text-align:center;clear:both">

</div>
    <input type="submit" name="submit" value="提交"/>
    <input type="reset" name="reset" value="重置"/>

<div class="clear"></div>
</div>






<!--物业类型：<select name="wylx">
<option value="1">普通住宅</option>
<option value="2">非普通住宅</option>
<option value="3">经济适用房</option>
</select><br />
房数:<select name="fs">
<option value="1">首套</option>
<option value="2">二套</option>
<option value="3">三套</option>
</select><br />
房产购置年限:<select name="zheng">
<option value="0">合同房</option>
<option value="1">新证</option>
<option value="2">证两年</option>
<option value="5">证五年</option>
</select><br />
上楼方式:<select name="slfs">
<option value="1">电梯</option>
<option value="0">楼梯</option>
</select><br />
楼层:<input type="text" name="lc" placeholder="请输入楼层数" /><br />
建筑面积:<input type="text" name="mian" placeholder="请输入房屋面积" /><br />
评估单价:<input type="text" name="pd" placeholder="请输入评估单价" /><br />
合同总价:<input type="text" name="hd" placeholder="请输入合同总价" /><br />
成交总价:<input type="text" name="cj" placeholder="请输入成交总价" /><br />
<input type="submit" name="sub" value="开始计算" /><br /><br />-->

</form>

</body>

</html>
<?php
if(!empty($_POST["submit"])){
    $wylx=$_POST["wylx"];
	$fs=$_POST["fs"];
	$zheng=$_POST["zheng"];
	$slfs=$_POST["slfs"];
	$lc=$_POST["lc"];
	$mian=$_POST["mian"];
	$pd=$_POST["pd"];
	$hd=$_POST["hd"];
	$cj=$_POST["cj"];
	
	$pgzj=$pd*$mian;

	switch($zheng)
	{
		case 0:
			$zheng_l="合同房";
			break;
		case 1:
			$zheng_l="新证";
			break;
		case 2:
			$zheng_l="证两年";
			break;
		case 5:
			$zheng_l="证五年";
			break;
		default:
			echo "无法辨认证件";
	}
	
	switch($fs)
	{
		case 1:
			$fs_l="首套";
			break;
		case 2:
			$fs_l="二套";
			break;
		case 3:
			$fs_l="三套";
			break;
		default:
			echo "无法辨认几套房";
	}
	
	echo "<b>房数： $fs_l ，证件：$zheng_l ，楼层：$lc 楼，面积：$mian ㎡，评估总价: ".(($pgzj!=NULL)?number_format($pgzj):0)." 元,合同总价: ".(($hd!=NULL)?number_format($hd):0)." 元</b><br /><br />";
	
	if($zheng<=0)
	{
		#合同房
		#办证
		
		#小于90平米办证契税
		if($mian<=90)
		{
			$bzqs=$hd*0.01;
			echo "办证契税(90㎡以下)(0.01)，$bzqs <br />";
		}
		
		#大于90平米办证契税
		if($mian>90)
		{
			if($fs==1)
			{
				$bzqs=$hd*0.015;
				echo "首套房办证契税(0.015)： $bzqs <br />";
			}
			if($fs==2)
			{
				$bzqs=$hd*0.02;
				echo "二套房办证契税(0.02)： $bzqs <br />";
			}
			if($fs==3)
			{
				$bzqs=$hd*0.03;
				echo "三套房办证契税(0.03)： $bzqs <br />";
			}
		}
		
		#楼梯维修基金
		if($slfs==0)
		{
			$wj=$mian*55;
			echo "楼梯维修基金(55)： $wj <br ><br />";
		}
		
		#电梯维修基金
		if($slfs==1)
		{
			if($lc<=11)
			{
				$wj=$mian*73;#62
				echo "电梯低层维修基金(73)： $wj <br /><br />";
			}
			else
			{
				$wj=$mian*73;
				echo "电梯高层维修基金(73)： $wj <br /><br />";
			}
		}
	}
	else
	{
		$bzqs=0;
		$wj=0;
		echo "办证契税： $bzqs <br />维修基金： $wj <br /><br />";
	}

	
	#过户
	#首套契税
	if($fs==1)
	{
		if($mian<=90)
		{
			$ghqs=$pd*$mian*0.01;
			echo "首套房过户契税(0.01)： $ghqs <br />";
		}
		if($mian>90)
		{
			$ghqs=$pd*$mian*0.015;
			echo "首套房过户契税(0.015)： $ghqs <br />";
		}
	}
	
	#二套契税
	if($fs==2)
	{
		$ghqs=$pd*$mian*0.02;
		echo "二套房过户契税(0.02)： $ghqs <br />";
	}
	
	#三套契税
	if($fs==3)
	{
		$ghqs=$pd*$mian*0.03;
		echo "三套房过户契税(0.03)： $ghqs <br />";
	}
	
	#营业税
	if($zheng<2)
	{
		$ghyys=$pd*$mian*0.056;
		echo "营业税(0.056)：$ghyys <br />";
	}
	else if($zheng>=2)
	{
		$ghyys=0;
		echo "营业税：$ghyys <br />";
	}
	
	#个税
	if($fs<=1 && $zheng>=5)
	{
		$gggs=0;
		echo "过户个税： $gggs <br />";
	}
	else if($fs>1 || $zheng<5)
	{
		$gggs=$pd*$mian*0.01;
		echo "过户个税(0.01)： $gggs <br />";
	}
	
	#杂税
	$ggzs=$pd*$mian*0.001;
	echo "过户杂税(0.001)： $ggzs <br /><br />";
	
	
	#万转换
	function floor_num($num)
	{
		$num=floor($num/10000)*10000;
		return $num;
	}
	
	#贷款
	#大于144平方米，贷款三层
	if($fs==1)
	{
		$dk_c=$pd*$mian*0.7;
		$dk=floor_num($dk_c);
		echo "贷款金额(0.7)： <b>".number_format($dk)." </b><br /><br />";
	}
	else if($fs>1)
	{
		#二套面积小于144平米，贷款五层，大于144平方米，贷款三层
		if($mian>144)
		{
			$dk_c=$pd*$mian*0.3;
			$dk=floor_num($dk_c);
			echo "贷款三层(0.3)： <b>".number_format($dk)." </b><br /><br />";
		}
		else
		{
			$dk_c=$pd*$mian*0.5;
			$dk=floor_num($dk_c);
			echo "贷款金额(0.5)： <b>".number_format($dk)." </b><br /><br />";
		}
	}
	
	// if($mian>144)
	// {
		// $dk_c=$pd*$mian*0.3;
		// $dk=floor_num($dk_c);
		// echo "贷款三层(0.3)： <b>".number_format($dk)." </b><br /><br />";
	// }
	// else if($mian<=144)
	// {
		// if($fs<=1)
		// {
			// $dk_c=$pd*$mian*0.7;
			// $dk=floor_num($dk_c);
			// echo "贷款金额(0.7)： <b>".number_format($dk)." </b><br />";
		// }
		// else if($fs>=2)
		// {
			// $dk_c=$pd*$mian*0.5;
			// $dk=floor_num($dk_c);
			// echo "贷款金额(0.5)： <b>".number_format($dk)." </b><br />";
		// }
	// }
	
	#抵押评估费
	$dypg=$pd*$mian*0.005;
	echo "抵押评估费(0.005)： $dypg <br />";
	
	#担保费
	$dbf=$dk*0.01;
	$db= $dbf>=2000 ? $dbf : 2000;
	echo "担保费(0.01)：$db <br />";
	
	#服务费
	$fwf=1395;
	echo "服务费： $fwf <br /><br />";
	
	#中介费
	$zjf=$cj*0.02;
	echo "中介费(0.02)：<b> $zjf </b> <br />";
	
	#办证
	$bzxj=$bzqs+$wj;
	echo "办证：<b> $bzxj </b> <br />";
	
	#过户
	$ghxj=$ghqs+$ghyys+$gggs+$ggzs;
	echo "过户：<b> $ghxj </b> <br />";
	
	
	
	
	#贷款小计
	$dkxj=$dypg+$dbf+$fwf;
	echo "贷款费用：<b> $dkxj </b> <br /><br />";
	
	$xj=$bzxj+$ghxj+$zjf+$dkxj;
	echo "后期费用小计：<b> $xj </b><br />";
	
	//$wxjj=($wj!=0)?$wj:0;
	//$bzqs_l=($bzqs!=0)?$bzqs:0;
	
    $con=$wj+$bzqs+$ghqs+$ghyys+$gggs+$ggzs+$dypg+$db+$fwf+($hd-$dk)+$zjf;
    echo "首付总计： $hd+$xj-$dk=<b>".number_format($con)."</b><br /><br />";
}
	echo "<span style='color:#ccc; font-size:0.8em; text-align:conter;'>开发者：唐俊龙&nbsp;&nbsp;联系 QQ:383804638&nbsp;&nbsp;备案号：鄂ICP备12010780号-5</span>";

?>
