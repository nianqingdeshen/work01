<?php require_once('../../../Connections/connjxkh.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>4.本单位正职评副职</title> 
<link rel="stylesheet" href="../../../lib/layui245/css/layui.css"  media="all">
<script src="../../../lib/layui245/layui.js" charset="utf-8"></script>

<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_POST['title'])) {
  $t = $_POST['title'];
}
header("Content-type:text/html;charset=utf-8");
mysql_query('SET NAMES UTF8');
if (!function_exists("GetSQLValueString")) {
    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
    {
        if (PHP_VERSION < 6) {
            $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
        }

        $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

        switch ($theType) {
            case "text":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "long":
            case "int":
                $theValue = ($theValue != "") ? intval($theValue) : "NULL";
                break;
            case "double":
                $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
                break;
            case "date":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "defined":
                $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
                break;
        }
        return $theValue;
    }
}

	
?>
</head>

<body class="layui-main ">
注：分项评价意见〔A〕〔B〕〔C〕〔D〕分别为好、较好、一般、差，总体评价意见〔A〕〔B〕〔C〕〔D〕分别为优秀、称职、基本称职、不称职；
<form class="layui-form">
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
  <legend align="center">本单位正职评本单位副职</legend>
</fieldset>
<div class="layui-form">
<div class="layui-container">
<table class="layui-table">
     <colgroup>
      <col width="50">
      <col width="300">
      <col width="300">
      <col width="300">
      <col width="300">
      <col width="300">
      <col width="300">
      <col width="300">
    </colgroup>
    <thead align="center">
     <tr>
       <td colspan=8 align="center">2018年度综合考核校领导评价-中层领导干部评价意见(计算机数据与科学学院)</td>
      </tr> 
       <tr align="center">
            <td rowspan="2" >姓名</td>
            <td rowspan="2">总体评价</td>
            <td>德</td>
            <td>能</td>
            <td>勤</td>
            <td>绩</td>
            <td>廉</td>
            <td>学</td>
       </tr>
       <tr>
            <td>政治态度思想品质</td>
            <td>工作思路组织协调业务能力</td>
            <td>精神状态努力程度工作作风</td>
            <td>履职成效解决复杂问题遵守法律依法办事</td>
            <td>廉洁自律履行廉政职责</td>	
            <td>参加“两学一做”学习教育</td>
      </tr>  
    </thead><tbody align="center">
<?php
$title=array("A","B","C","D");
mysql_select_db($database_connjxkh, $connjxkh);
//$sql1="SELECT DeptID FROM deptinfo WHERE DeptName LIKE '%".$title."%' ";
$sql1="SELECT DeptID FROM deptinfo WHERE DeptName LIKE '%".$t."%' ";
$rs = mysql_fetch_assoc(mysql_query($sql1, $connjxkh));

$sql = "SELECT UserName DeptID FROM userinfo where DeptID=".$rs['DeptID']." and Rank=3";
$result =mysql_query($sql, $connjxkh);
 while($row=mysql_fetch_row($result)){          //While()的作用是将指针向后移动，将下一行的数据交给$row
    foreach ($row as $UserName){
		echo "<tr><td>".$UserName."</td>";
		$n1=rand(0,1000000);
		echo "<td>";
		for($m=0;$m<4;$m++){echo " <input name='".$n1."' type='radio'title='".$title[$m]."' value='0'>";}
		echo "</td>";
		$n1=rand(0,1000000);
		echo "<td>";
		for($m=0;$m<4;$m++){echo " <input name='".$n1."' type='radio'title='".$title[$m]."' value='0'>";}
		echo "</td>";
		$n1=rand(0,1000000);
		echo "<td>";
		for($m=0;$m<4;$m++){echo " <input name='".$n1."' type='radio'title='".$title[$m]."' value='0'>";}
		echo "</td>";
		$n1=rand(0,1000000);
		echo "<td>";
		for($m=0;$m<4;$m++){echo " <input name='".$n1."' type='radio'title='".$title[$m]."' value='0'>";}
		echo "</td>";
		$n1=rand(0,1000000);
		echo "<td>";
		for($m=0;$m<4;$m++){echo " <input name='".$n1."' type='radio'title='".$title[$m]."' value='0'>";}
		echo "</td>";
		$n1=rand(0,1000000);
		echo "<td>";
		for($m=0;$m<4;$m++){echo " <input name='".$n1."' type='radio'title='".$title[$m]."' value='0'>";}
		echo "</td>";
		$n1=rand(0,1000000);
		echo "<td>";
		for($m=0;$m<4;$m++){echo " <input name='".$n1."' type='radio'title='".$title[$m]."' value='0'>";}
		echo "</td></tr>";
	}
}
mysql_close($connjxkh);
?></tbody></table></div>
<br>
	<div class="layui-form-item layui-col-xs-offset6"><a href="addquestion.php" class="layui-btn" ">立即提交</a></div>
</div>
</form>
</body>
<script>
layui.use('form', function(){
  var form = layui.form;
  
  //各种基于事件的操作，下面会有进一步介绍
});
</script>
</html>
