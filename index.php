<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title>税率计算器</title>
<style type="text/css">
body{
	font-size:12pt;
}
</style>
</head>
<body>

<h1>税率计算器</h1>
<form action="index.php" method="post">
房数:<select name="fs">
<option value="1">首套</option>
<option value="2">二套</option>
<option value="3">三套</option>
</select>
证件:<select name="zheng">
<option value="0">合同房</option>
<option value="1">新证</option>
<option value="2">证两年</option>
<option value="5">证五年</option>
</select>
上楼方式:<select name="slfs">
<option value="0">楼梯</option>
<option value="1">电梯</option>
</select><br />
楼层:<input type="text" name="lc" placeholder="请输入楼层数" /><br />
面积:<input type="text" name="mian" placeholder="请输入房屋面积" /><br />
评估单价:<input type="text" name="pd" placeholder="请输入评估单价" /><br />
合同总价:<input type="text" name="hd" placeholder="请输入合同总价" />
<input type="submit" name="sub" value="计算" /><br /><br />
</form>

</body>
</html>
<?php
if(!empty($_POST["sub"])){
    $mian=$_POST["mian"];
    $pd=$_POST["pd"];
	$hd=$_POST["hd"];
    $zheng=$_POST["zheng"];
	$slfs=$_POST["slfs"];
	$lc=$_POST["lc"];
	$fs=$_POST["fs"];
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
	echo "<b>证件：$zheng_l ，楼层：$lc 楼，面积：$mian ㎡，评估总价: $pgzj 元,合同总价: $hd 元</b><br /><br />";
	
	if($zheng<=0)
	{
		#合同房
		#办证
		
		#小于90平米办证契税
		if($mian<=90)
		{
			$bzqs=$hd*0.01;
			echo "小于90平米(0.01)，$bzqs <br />";
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
	
	$xj=$bzqs+$wj+$ghqs+$ghyys+$gggs+$ggzs;
	echo "小计：$xj";
	
	#贷款
	#大于144平方米，贷款三层
	if($mian>144)
	{
		$dk=$pd*$mian*0.3;
		echo "贷款三层(0.3)： $dk <br />";
	}
	else if($mian<=144)
	{
		if($fs<=1)
		{
			$dk=$pd*$mian*0.7;
			echo "贷款金额(0.7)： $dk <br />";
		}
		else if($fs>=2)
		{
			$dk=$pd*$mian*0.5;
			echo "贷款金额(0.5)： $dk <br />";
		}
	}
	
	#抵押评估费
	$dypg=$pd*$mian*0.005;
	echo "抵押评估费(0.005)： $dypg <br />";
	
	#担保费
	$dbf=$dk*0.01;
	$db= $dbf>=2000 ? $dbf : 2000;
	echo "担保费(0.01)：$db <br />";
	
	#服务费
	$fwf=1395;
	echo "服务费： $fwf <br />";
	
	#中介费
	$zjf=$hd*0.02;
	echo "中介费(0.02)：$zjf <br /><br />";
	
	//$wxjj=($wj!=0)?$wj:0;
	//$bzqs_l=($bzqs!=0)?$bzqs:0;
	
    $con=$wj+$bzqs+$ghqs+$ghyys+$gggs+$ggzs+$dypg+$db+$fwf+($hd-$dk)+$zjf;
    echo "总计： <b>$con</b><br /><br />";
}
	echo "<b>This site is under development!</b><br />";
	echo "Contact QQ:383804638";

?>

