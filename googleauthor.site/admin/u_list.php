<?php
include('conn.php');
session_start();
?>
<nav>
    <div>
    <div>
        <a>Temperature</a>
    </div>
    <div>
        <ul class="nav navbar-nav">
          <form method="get">
     	

     	<input type="text" name="cont" placeholder="Title" class="layui-input" style="width:30%;float: left">
     	<input type="submit" value="Search" ="" class="layui-btn">
     </form>    
           
<div>
	<div>
		
		<table class="layui-table layui-form">
			<thead>
			<tr>
			
			</tr>
				<tr>
					<th align="center" bgcolor="#FFFFFF" height="27">ID</th>
					<th align="center" bgcolor="#FFFFFF">Max</th>
					<th align="center" bgcolor="#FFFFFF">Min</th>
					<th align="center" bgcolor="#FFFFFF">Clothing</th>
					<th align="center" bgcolor="#FFFFFF">flag</th>
					<th align="center" bgcolor="#FFFFFF">Weather</th>
					<th align="center" bgcolor="#FFFFFF">detail</th>
					<th align="center" bgcolor="#FFFFFF">Img</th>
				
					
				
					
					
				
				
					<th align="center" bgcolor="#FFFFFF">操作</th>
			
				</tr>
			</thead>
		<tbody>
			<?php
				$p=isset($_GET['p'])?$_GET['p']:1;
				
			    if(!empty($_GET['cont'])){
				$sql="select * from datas  where Max like '%{$_GET['cont']}%' order by id desc ";
			
			}else{
				$sql="select * from datas   order by id desc ";
			}
				$rs=mysqli_query($conn,$sql);
				$tiao=mysqli_num_rows($rs);
				$ye=ceil($tiao/10);
				$n=($p-1)*10;
				 if(empty($_GET['cont'])){
			    	$sql2="select * from datas order by id desc limit $n,10";
			    }else{
			    	$sql2="select * from datas where Max like '%{$_GET['cont']}%' order by id desc limit $n,10";
			    }
				$rs2=mysqli_query($conn,$sql2);
				
				
				$rs=mysqli_query($conn,$sql);

				while($row=mysqli_fetch_assoc($rs2)){
					echo '<tr>';
					echo '<td align="center" bgcolor="#FFFFFF">'.$row['id'].'</td>';
					echo '<td align="center" bgcolor="#FFFFFF">'.$row['Max'].'</td>';
					echo '<td align="center" bgcolor="#FFFFFF">'.$row['Min'].'</td>';
					echo '<td align="center" bgcolor="#FFFFFF">'.$row['Clothing'].'</td>';
					echo '<td align="center" bgcolor="#FFFFFF">'.$row['flag'].'</td>';
					echo '<td align="center" bgcolor="#FFFFFF">'.$row['Weather'].'</td>';
					echo '<td align="center" bgcolor="#FFFFFF">'.$row['detail'].'</td>';
					echo '<td align="center" bgcolor="#FFFFFF">'.$row['img'].'</td>';
					echo '<td align="center" bgcolor="#FFFFFF">';
					echo '<a href="u_update.php?id='.$row['id'].'">Edit</a> /';
					echo '<a href="u_delete.php?id='.$row['id'].'" onclick="return
					confirm(\'delete\')">Delete</a>';
					echo '</td>';


					echo '</tr>';
				}
				?>
		<tbody>
		</table>
		<div class="layui-card-body ">
                            <div class="page">
                                <div>
<?php for($i=1;$i<=$ye;$i++):?>
	<?php if($p==$i){?>
		 <span class="current"><?php echo $i?></span>
	<?php }else{?>
                                
                                  <a class="num " href="<?php if(empty($id)){?>
				u_list?p=<?php echo $i?>
			<?php }else{?>
				u_list?id=<?php echo $id?>&p=<?php echo $i?>
			<?php }?>"><?php echo $i?></a>
		<?php }?>
                                 <?php endfor?>
                                </div>
                            </div>
                        </div>
			
			</div>
			</div>