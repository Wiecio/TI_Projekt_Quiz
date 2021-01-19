<?php
session_start();
if(!isset($_SESSION['log_in']))
{
    header('Location: index.php');
    exit();
}
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$_SESSION['flash'] = key($_POST);
	$check = mb_substr($_SESSION['flash'], 0, 1, 'UTF-8');
	if($check == "s")
	{
		header("Location: flashcard.php");
		exit();
	}
	else if($check == "d")
	{
		$_SESSION['id_delete'] = key($_POST);
		header("Location: deleteFlash.php");
		exit();
	}
	elseif($check =="A")
	{
		$_SESSION['codef'] = true;
		header("Location: createCodeF.php");
		exit();
	}
	else if($check == "f")
	{
		try
		{
			require_once "db_connect.php";
			$conn  = new mysqli($host,$db_user,$db_password,$db_name);
			if($conn->connect_errno!=0)
			{
				throw new exception(mysqli_connect_errno());
			}
			$id_flash = substr($_SESSION['flash'],5,strlen($_SESSION['flash']));
			$tab_name2 = "nameflash_".$_SESSION['user_id'];
			$sql = "SELECT name_flash FROM $tab_name2 WHERE id_flash=$id_flash";
			$r = $conn->query($sql);
			$w = $r->fetch_assoc();
			$name = $w['name_flash'];


			$tab_name = $_SESSION['flash']."_".$_SESSION['user_id'];
			$sql = "SELECT * FROM $tab_name";
			$r = $conn->query($sql);
			$tab = array(" ","A","B","C","D");

		}
		catch(Exception $e)
		{

		}
	}
	
}
else
{
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Quiz View</title>
</head>
<body>
<?php include 'header.php';?>
	
	
	
<div class="container mt-5" >
<form action="saveStatFlash.php" method="post">

		
			
	<div class="text-center">
		<h1 class="text-dark col ">View your "<?=$name?>" flashcards</h1>	
		<div class="mb-3 mx-auto custom-control custom-checkbox">
			<input type="checkbox" class="custom-control-input" id="is_public" name="is_public" checked>
			<label class="custom-control-label" for="is_public">This flashcards are public</label>
		</div>
	</div>		
							
		<div class="mt-4 mb-1 col-xl-11 mx-auto ">								
							
			<table class="table table-bordered table-striped">
				<thead class="thead-dark">
					<tr>
						<th scope="col">#</th>
						<th scope="col">Front</th>
						<th scope="col">Back</th>
					</tr>
				</thead>
				<tbody>
					<?php $counter = 0; ?>
					<?php while($w = $r->fetch_assoc()) :?>									
						<tr>
							<th scope="row"><?=++$counter?></th>
							<td><?=$w['first_p']?></td>
							<td><?=$w['second_p']?></td>
						</tr>			
					<?php endwhile ;?>
			 
				</tbody>
			</table>		
		</div>
			
				
	
	<div class="row mt-1 mb-5 mx-auto">
		<button type="submit" class="btn btn-lg btn-primary col-6 col-sm-2 mx-auto" name="save_stat">Save</button>
	</div>
</form>
</div>
	
	
	
<?php $conn->close() ?>
</body>
</html>

									<!--<h2 class="list-group-item text-primary mt-3">Pytanie 2</h2>
									<h3 class="text-secondary mx-auto">A. Treść odpowiedzi A</h3>
									<h3 class="text-secondary mx-auto">B. Treść odpowiedzi B</h3>
									<h3 class="text-success mx-auto">C. Treść odpowiedzi C</h3>
									<h3 class="text-secondary mx-auto">D. Treść odpowiedzi D</h3>
									
									
									<h2 class="list-group-item text-primary mt-3">Pytanie 3</h2>
									<h3 class="text-secondary mx-auto">A. Treść odpowiedzi A</h3>
									<h3 class="text-secondary mx-auto">B. Treść odpowiedzi B</h3>
									<h3 class="text-secondary mx-auto">C. Treść odpowiedzi C</h3>
									<h3 class="text-success mx-auto">D. Treść odpowiedzi D</h3>
									
									
									<h2 class="list-group-item text-primary mt-3">Pytanie 4</h2>
									<h3 class="text-success mx-auto">A. Treść odpowiedzi A</h3>
									<h3 class="text-secondary mx-auto">B. Treść odpowiedzi B</h3>
									<h3 class="text-secondary mx-auto">C. Treść odpowiedzi C</h3>
									<h3 class="text-secondary mx-auto">D. Treść odpowiedzi D</h3>-->
								  