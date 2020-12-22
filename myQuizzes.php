<?php 
session_start();
if(!isset($_SESSION['log_in']))
{
    header('Location: index.php');
    exit();
}
try
{
    require_once "db_connect.php";
    $conn  = new mysqli($host,$db_user,$db_password,$db_name);
    if($conn->connect_errno!=0)
    {
        throw new exception(mysqli_connect_errno());
    }
    $id_u = $_SESSION['user_id'];
    $sql = "SELECT number_quiz FROM quiz_user WHERE id_user=?";
    $st_num = $conn->prepare($sql);
    $st_num->bind_param("i",$id_u);
    if(!$st_num->execute())
    {
        throw new Exception("st_num");
    }
    
    $r = $st_num->get_result();
    $w = $r->fetch_assoc();
    $number_quiz = $w['number_quiz'];
    $st_num->close();

    $tab_name = "namequiz_".$id_u;
    $sql_name = "SELECT * FROM $tab_name";
    $r = $conn->query($sql_name);
}
catch(Exception $e)
{

}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>My Quizzes</title>
</head>
<body>
<?php include 'header.php';?>
	
	
	
<div class="container mt-5" >
	<div class="row">
		<div class="col-12 text-center">
			<div class="card">
				<h1 class="text-primary">My Quizzes</h1>				
			</div>						
			<?php if(isset($_SESSION['change_saved'])) :?>
						<div class="alert alert-success mt-4"><?=$_SESSION['change_saved']?></div>
						<?php unset($_SESSION['change_saved'])?>
			<?php endif;?>
			<div class="card mt-2 mb-5 ">
			<form action="quizView.php"	method="POST">								
				<div class="card-body ">
					<div class="row row-cols-2 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 mx-auto col-md-8">	
					<?php while($w = $r->fetch_assoc()) : ?>
							
								<button type="submit" class="btn btn-fix text-left mx-auto" id="quiz<?=$w['id_quiz']?>" name="quiz<?=$w['id_quiz']?>">
									<div class="card text-white bg-success mb-3 float-center">
										<div class="card-body">
											<h5 class="card-title text-center"><?=$w['name_quiz']?></h5>
										</div>
										<h6 class="text-center"><?php if($w['is_public'] == true) : ?>public<?php else :?>private<?php endif ;?></h6>
										
									</div>
								</button>
					<?php endwhile ; ?>
						
				</div>	
			</div>
			</form>			
		</div>		
	</div>
</div>
<!--<script type="text/javascript">
	$(function() {
		$("#quiz1").click(function() {
			window.location.href = "/TI_Projekt_Quiz/";
		});
	});
</script>-->
	
	
<?php $conn->close()?>
</body>
</html>