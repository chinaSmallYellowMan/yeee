<html>
<head>
    <title>学生信息管理系统</title>
    <style>
*{padding:0px;margin:0px;}

#bigframe{  width:1700px;
            height:850px;
            margin:20px auto;
            border:3px silver solid;
            border-radius:20px;
            box-shadow:  5px 6px 2px #ccc;
            position:relative;
}
#up_nav{
        width:1700px;
        height:100px;
        margin:auto;
        border-bottom:3px #aaa solid;
        box-shadow:  3px 3px 2px #ccc;
        font-size:70px;
        text-align:center;
        line-height:100px;
        color:#777;
        position:relative; 
        letter-spacing:10px;  
}
/*红点*/.dot1{
        width:30px;
        height:30px;
        border-radius:15px;
        background:red; 
        position:absolute;
        top:20px;left:20px;}
/*黄点*/.dot2{
        width:30px;
        height:30px;
        border-radius:15px;
        background:yellow; 
        position:absolute;
        top:20px;
        left:60px;}
/*绿点*/.dot3{  width:30px;
                height:30px;
                border-radius:15px;
                background:green; 
                position:absolute;
                top:20px;
                left:100px;}

#small_frame{ /*标题下面区域 */width:1700px;height:750px;margin:0 auto;   }

#left_nav{  /*左边导航区域 */
            width:200px;
            height:750px;
            margin:left;
            float:left;
            border-right:2px #ccc solid;    }

.all_table{   /*每个表按钮*/
            width:198px; 
            height:50px;
            background-color:#fff;/**/
            border:2px #ddd solid;
            border-radius:20px;
            margin:10 auto;
            text-align:center; 
            font-size:18px;
			}
.all_table:hover{background-color:#ddd;}
input:focus{outline:0;}   

#settingsubmit{ background-color:#fff;
                margin:410px auto 0px;
                color:#000;
              } /*设置按钮*/
#settingsubmit:hover{background-color:#ddd;}

#main{  /*工作区*/
        width:1448px;
        height:700px;
        float:left; 
        margin:20px 20px 20px 30px;
        overflow:scroll;
    }
#mainTable{  /*工作表*/
            width:1425px;    
            height:700px;           
            line-height:30px;
            color:#000;      
            border:1px #eee solid;   
            text-align:center; 
            font-size:20px;     }

tr{height:40px;}
td{width:225px;}

/*请假迟到缺席 */
.qj_cd_qx{  width:50px;
            font-size:20px;
            text-align:center;
            line-height:40px;
            height:40px;
            border:none;
            background:transparent;}

.kqf{background:#9f9;}/*考勤分 栏颜色*/
.kqf2{background:#ff5;}/*考勤分 栏颜色*/
.kqf3{background:#f55;}/*考勤分 栏颜色*/

table tr:nth-child(odd){background: #eee;}/*表格单行颜色*/
table tr:nth-child(1){  background:#bbb;
                        color:#fff;
                        font-size:27px;}  /*表格第一行颜色*/

/*设置功能表格 */
#settingtable{  width:600px;
                height:480px;
                margin:15px 15px;} /*设置表格样式*/

#settingtable>tr:nth-child(1){
                                background:#fff;
                                color:#fff;
                                font-size:27px;}  /*表格第一行颜色*/

#settingtable>tr,th{background-color:#fff;}

#settingheadfort{
                 font-size:50px;
                 background-color:#fff;
                 color:#444;
                 text-align:center;}/*标题样式*/

.settingbodyfort{
                font-size:20px;
                background-color:#fff;
                color:#999;
                text-align:center;}/*各项目名字样式*/

.powernum{border:none;
          font-size:20px;
          width:43px;
          color:#444;
          text-align:left;
          background-color:#fff;}/*权值数字样式*/

#setting_save_submit{
          width:70px;
          height:30px;
          border-radius:20px;
}

</style>
</head>
<body>
<script>

</script>
<!--------------------------------------------------------------------->
    <div id="bigframe">
        <div id="up_nav">学生信息管理系统
            <span class="dot1" onclick='dot();'></span>
            <span class="dot2" onclick='dot();'></span>
            <span class="dot3" onclick='dot();'></span>
        </div>
        <div id="small_frame">  <!-- 标题下面区域 -->
            <div id="left_nav">
                <form method=post>
                    <input  class="all_table" type="submit" name="xx" value="全班信息" id="ta1">
                    <input  class="all_table" type="submit" name="kq" value="考勤登记" id="ta2">
                    <input  class="all_table" type="submit" name="p" value="成绩记录" id="ta3">
                </form> 
                <form method="post" action="dianming.php"><input class="all_table" type="submit" name="dm" value="顺序点名"></form>
                <form method=post><input   class="all_table" id="settingsubmit" type="submit" name="setting_submit" value="设置" >
            </div>
            
            <div id="main">
            &nbsp;
            
            <?php
            
            if(isset($_POST['xx'])) //按全班信息时
            {
                
                echo "<script>var a1=document.getElementById('ta1');a1.style.backgroundColor='#ff0';</script>";
                $conn=mysqli_connect('localhost','root','');    //连接服务器
                if(mysqli_select_db($conn,"cs181"))             //连接数据库
                    
                $sql="select * from 学生信息";          
                $result=mysqli_query($conn,$sql);   //执行查询
               
                echo "<table id='mainTable'>";
                echo "<tr><td>序号</td><td>学号</td><td>姓名 </td><td>性别</td></tr>";
                for($i=1;$i<59;$i++)  
                {
                    if($row=mysqli_fetch_row($result))//获取一行
                        list($xh,$xm,$xb)=$row;
                    
                    echo "<tr><td>$i</td><td>$xh</td><td>$xm</td><td>$xb</td></tr>";
                }
                echo "</table>";
               
            }
            if(isset($_POST['kq']))     //按考勤表时
            {
                
                
                //表名变黄色 
                echo "<script>var a1=document.getElementById('ta2');a1.style.backgroundColor='#ff0';</script>";
                $conn=mysqli_connect('localhost','root','');    //连接服务器
                if(mysqli_select_db($conn,"cs181"))             //连接数据库
                    
                    $sql="select * from 考勤表";
                    $result=mysqli_query($conn,$sql);   //执行查询
                    
                    echo "<table id='mainTable'>";
                    echo "<tr>
                            <td>序号</td><td>学号</td><td>姓名 </td>
                            <td >迟到（次）</td>
                            <td >缺席（次）</td>
                            <td >请假（次）</td>
                            <td>考勤分</td>
                          </tr>";
                    for($i=1;$i<59;$i++)
                    {
                        if($row=mysqli_fetch_row($result))//获取一行
                            list($xh,$xm,$cd,$qx,$qj,$kqf)=$row;
                      
                        echo "<tr class='m_tr'>
                            <td>$i</td>
                            <td>$xh</td>
                            <td>$xm</td>
                            <td>
                                <form method=post name='n1'><input type='number' min='0' max='999' name='qjf' 
                                    value='$cd' class='qj_cd_qx' onchange='ch(this,$xh,1,2,0)'>
                            </td>
                            <td>
                                <form method=post><input type='number' min='0' max='999' name='cdf' 
                                    value='$qx' class='qj_cd_qx' onchange='ch(this,$xh,2,2,0)'>
                            </td>
                            <td>
                                <form method=post><input type='number' min='0' max='999' name='qxf' 
                                    value='$qj' class='qj_cd_qx' onchange='ch(this,$xh,3,2,0)'>
                            </td>";
                        if($kqf==100) echo "<td class='kqf'>$kqf</td></tr>";  //考勤分不同将有不同的颜色
                        else if($kqf>=60) echo "<td class='kqf2'>$kqf</td></tr>";
                        else echo "<td class='kqf3'>$kqf</td></tr>";
                    }
                    echo "</table>";
                    
            }
            if(isset($_POST['p']))  //按成绩表时
            {   
                
                echo "<script>
                var a1=document.getElementById('ta3');a1.style.backgroundColor='#ff0';</script>";//表名变黄色 

                $conn=mysqli_connect('localhost','root','');    //连接服务器
                if(mysqli_select_db($conn,"cs181"))             //连接数据库
                    
                    $sql="select * from 成绩表";
                    $result=mysqli_query($conn,$sql);   //执行查询
                    
                    echo "<table id='mainTable'>";
                    echo "<tr><td>序号</td><td>学号</td><td>姓名 </td><td>平时分</td><td>考试分</td><td>总分</td></tr>";
                    for($i=1;$i<59;$i++)
                    {
                        if($row=mysqli_fetch_row($result))//获取一行
                            list($xh,$xm,$ps,$ks,$zf)=$row;
                        
                        echo "<tr>
                                <td>$i</td>
                                <td>$xh</td>
                                <td>$xm</td>
                                <td><form method=post><input type='number' min='0' max='100' name='psf' value='$ps' class='qj_cd_qx' onchange='ch(this,$xh,4,3,0)'></td>
                                <td><form method=post><input type='number' min='0' max='100' name='ksf' value='$ks' class='qj_cd_qx' onchange='ch(this,$xh,5,3,0)'> </td>";
                        if($zf==100) echo" <td class='kqf' >$zf</td></tr>";
                        else if($zf>=60)echo" <td class='kqf2' >$zf</td></tr>";
                        else echo "<td class='kqf3' >$zf</td> </tr>";
                    }
                    echo "</table>";
                     
            }
    if(isset($_POST['setting_submit'])) //按设置键时
    {
        echo "<script>var a1=document.getElementById('settingsubmit');a1.style.backgroundColor='#ff0';</script>";
        $conn=mysqli_connect('localhost','root',''); //连接服务器
        mysqli_select_db($conn,"cs181");             //连接数据库
        $sql="select * from 权值表";                  //设置查询语句
        $result=mysqli_query($conn,$sql);            //执行查询
        $row=mysqli_fetch_row($result);              //获取一行
        list($cd,$qx,$qj,$ps,$ks)=$row;              //将表中的一行赋予各变量
        
        echo "<table id='settingtable'>
            <tr>
                <th id='settingheadfort' colspan='1'></th>
                <th></th>
                <th></th>
            </tr>
            <tr class='settingbodyfort'>
                <th rowspan='3' style='font-size:30px;text-align:center; border-right:2px #aaa solid;'>考勤</th>
                <th>迟到扣分</th>
                <th><input type='number' min='1' max='100' name='power' value='$cd' class='powernum' required='true' onchange='ch(this,0,0,0,91)'></th>
                
            </tr> 
            <tr class='settingbodyfort'>
                
                <th>缺席扣分</th>
                <th><input type='number' min='1' max='100' name='power' value='$qx' class='powernum' required='true' onchange='ch(this,0,0,0,92)'></th>
                
            </tr>
            <tr class='settingbodyfort'  >
                
                <th>请假扣分</th>
                <th><input type='number' min='1' max='100' name='power' value='$qj' class='powernum' required='true' onchange='ch(this,0,0,0,93)'></th>
                
            </tr>
            <tr></tr>
            <tr class='settingbodyfort' >
                <th rowspan='2' style='text-align:center;font-size:30px;border-right:2px #aaa solid;'>成绩</th>
                <th >平时分权值</th>
                <th><input type='number' min='0.1' max='1' name='power' value='$ps' class='powernum' step='0.1' required='true' onchange='ch(this,0,0,0,94)'></th>
                
            </tr>
            <tr class='settingbodyfort'>
                <th>考试分权值</th>
                <th><input type='number' min='0.1' max='1' name='power' value='$ks' class='powernum' step='0.1' required='true' onchange='ch(this,0,0,0,95)'></th>
                
            </tr>
            <tr></tr>
            
            </table>";
    }
    
    ?>
            </div>  <!-- 右边区域 -->
        </div>      <!-- 标题下区域 -->
    </div>          <!-- 最大框架  -->
    
</body>
<script>

    function ch(a,b,c,d,e){
        var xhr=new XMLHttpRequest();       
        
        //请求行  （请求方式和地址与传过去的值）
        xhr.open('get','temp.php?va='+a.value+'&xh='+b+'&tt='+c+'&kk='+d+'&set='+e);  
        
         //请求头 (get请求可以省略，post不发送数据也可以省略)
        xhr.setRequestHeader('hi','good');    

         //请求主体 （发送给浏览器的数据，内容）
        xhr.send(null);  
        
        //注册回调函数,请求回来后触发
        xhr.onload=function(){
            var kkk=xhr.responseText.substr(-10,1);
            var bzd=xhr.responseText;
            console.log("**********"+kkk+"******"+bzd);
            if(kkk==2)document.getElementById('ta2').click();
            if(kkk==3)document.getElementById('ta3').click();
        }
    }
    function dot(){
        alert('暂不支持此功能！');
    }
</script>
</html>