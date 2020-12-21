<?php 
session_start();
if(!isset($_SESSION['log_in']) || (!isset($_SESSION['quiz_name'])) || (!isset($_SESSION['quizInProgress'])))
{
	header("Location: index.php");
	exit();
}
if(isset($_POST['Finish']) || isset($_POST['Next']))
{
			if(isset($_POST['question']) && (!empty($_POST['question'])))
			{
				if( (isset($_POST['A']) && !empty($_POST['A'])) && (isset($_POST['B']) && !empty($_POST['B'])) && (!isset($_POST['C']) || empty($_POST['C'])) && (!isset($_POST['D']) || empty($_POST['D'])) )
				{
					if(isset($_POST['correctAnswer']))
					{
						$correct_Ans = $_POST['correctAnswer'];
						if($correct_Ans == "C" || $correct_Ans == "D" )
						{
							$_SESSION['bad_correct_order'] = "You must add which answer is correct";
							exit();
						}
					}
					if(!isset($_SESSION['quest_count']))
					{
						$_SESSION['questions'] = array();
						$_SESSION['answers'] = array();
						$_SESSION['quest_count'] = 0;
						$question = $_POST['question'];
						$a = $_POST['A'];
						$b = $_POST['B'];
						switch($correct_Ans)
						{
							case "A":
							{
								$a = $a.":";
								break;
							}
							case "B":
							{
								$b = $b.":";
								break;
							}
						}
						$help_tab[0] = $a;
						$help_tab[1] = $b;
						$_SESSION['questions'][$_SESSION['quest_count']] = $question;
						for($i=0; $i<2; $i++)
						{
							$_SESSION['answers'][$_SESSION['quest_count']][$i] = $help_tab[$i];
						}
						$_SESSION['quest_count']++;

					}
					else if($_SESSION['quest_count'] >=1)
					{
							if(isset($_POST['correctAnswer']))
							{
								$correct_Ans = $_POST['correctAnswer'];
								if($correct_Ans == "C" || $correct_Ans == "D" )
								{
									$_SESSION['bad_correct_order'] = "You must add which answer is correct";
									exit();
								}
							}
								$question = $_POST['question'];
								$a = $_POST['A'];
								$b = $_POST['B'];
								switch($correct_Ans)
								{
									case "A":
									{
										$a = $a.":";
										break;
									}
									case "B":
									{
										$b = $b.":";
										break;
									}
								}
								$help_tab[0] = $a;
								$help_tab[1] = $b;
								$_SESSION['questions'][$_SESSION['quest_count']] = $question;
								for($i=0; $i<2; $i++)
								{
									$_SESSION['answers'][$_SESSION['quest_count']][$i] = $help_tab[$i];
								}
								$_SESSION['quest_count']++;
							
					}
				}
				else if(  (isset($_POST['A']) && !empty($_POST['A']))  && (isset($_POST['B']) && !empty($_POST['B']))  && (isset($_POST['C']) || !empty($_POST['C']) ) && (!isset($_POST['D']) || empty($_POST['D']))  )
				{
					if(isset($_POST['correctAnswer']))
					{
						$correct_Ans = $_POST['correctAnswer'];
						if($correct_Ans == "D")
						{
							$_SESSION['bad_correct_order'] = "You must add which answer is correct";
							exit();
						}
					}
					if(!isset($_SESSION['quest_count']))
					{
						$_SESSION['questions'] = array();
						$_SESSION['answers'] = array();
						$_SESSION['quest_count'] = 0;
						$question = $_POST['question'];
						$a = $_POST['A'];
						$b = $_POST['B'];
						$c = $_POST['C'];
						switch($correct_Ans)
						{
							case "A":
							{
								$a = $a.":";
								break;
							}
							case "B":
							{
								$b = $b.":";
								break;
							}
							case "C":
							{
								$c = $c.":";
								break;
							}
						}
						$help_tab[0] = $a;
						$help_tab[1] = $b;
						$help_tab[2] = $c;
						$_SESSION['questions'][$_SESSION['quest_count']] = $question;
						for($i=0; $i<3; $i++)
						{
							$_SESSION['answers'][$_SESSION['quest_count']][$i] = $help_tab[$i];
						}
						$_SESSION['quest_count']++;

					}
					else if($_SESSION['quest_count'] >=1)
					{
								if(isset($_POST['correctAnswer']))
								{
									$correct_Ans = $_POST['correctAnswer'];
									if($correct_Ans == "D")
									{
										$_SESSION['bad_correct_order'] = "You must add which answer is correct";
										exit();
									}
								}
									$question = $_POST['question'];
									$a = $_POST['A'];
									$b = $_POST['B'];
									$c = $_POST['C'];
									switch($correct_Ans)
									{
										case "A":
										{
											$a = $a.":";
											break;
										}
										case "B":
										{
											$b = $b.":";
											break;
										}
										case "C":
										{
											$c = $c.":";
											break;
										}
									}
									$help_tab[0] = $a;
									$help_tab[1] = $b;
									$help_tab[2] = $c;
									$_SESSION['questions'][$_SESSION['quest_count']] = $question;
									for($i=0; $i<3; $i++)
									{
										$_SESSION['answers'][$_SESSION['quest_count']][$i] = $help_tab[$i];
									}
									$_SESSION['quest_count']++;
								
							
					}
				}
				else if( (isset($_POST['A']) && !empty($_POST['A'])) && (isset($_POST['B']) && !empty($_POST['B']) ) && (isset($_POST['C']) && !empty($_POST['C']) ) && (isset($_POST['D']) && !empty($_POST['D']) )  ) 
				{
									if(isset($_POST['correctAnswer']))
									{
										$correct_Ans = $_POST['correctAnswer'];
									}
									if(!isset($_SESSION['quest_count']))
									{
										$_SESSION['questions'] = array();
										$_SESSION['answers'] = array();
										$_SESSION['quest_count'] = 0;
										$question = $_POST['question'];
										$a = $_POST['A'];
										$b = $_POST['B'];
										$c = $_POST['C'];
										$d = $_POST['D'];
										switch($correct_Ans)
										{
											case "A":
											{
												$a = $a.":";
												break;
											}
											case "B":
											{
												$b = $b.":";
												break;
											}
											case "C":
											{
												$c = $c.":";
												break;
											}
											case "D":
											{
												$d = $d.":";
												break;
											}
										}
										$help_tab[0] = $a;
										$help_tab[1] = $b;
										$help_tab[2] = $c;
										$help_tab[3] = $d;
										$_SESSION['questions'][$_SESSION['quest_count']] = $question;
										for($i=0; $i<4; $i++)
										{
											$_SESSION['answers'][$_SESSION['quest_count']][$i] = $help_tab[$i];
										}
										$_SESSION['quest_count']++;

									}	
									else if($_SESSION['quest_count'] >=1)
									{
											if(isset($_POST['correctAnswer']))
											{
												$correct_Ans = $_POST['correctAnswer'];
											}
												$question = $_POST['question'];
												$a = $_POST['A'];
												$b = $_POST['B'];
												$c = $_POST['C'];
												$d = $_POST['D'];
												switch($correct_Ans)
												{
													case "A":
													{
														$a = $a.":";
														break;
													}
													case "B":
													{
														$b = $b.":";
														break;
													}
													case "C":
													{
														$c = $c.":";
														break;
													}
													case "D":
													{
														$d = $d.":";
														break;
													}
												}
												$help_tab[0] = $a;
												$help_tab[1] = $b;
												$help_tab[2] = $c;
												$help_tab[3] = $d;
												$_SESSION['questions'][$_SESSION['quest_count']] = $question;
												for($i=0; $i<4; $i++)
												{
													$_SESSION['answers'][$_SESSION['quest_count']][$i] = $help_tab[$i];
												}
												$_SESSION['quest_count']++;
									}
				}
				else
				{
					$_SESSION['bad_answers_order'] = "You must add answers in order A,B,C,D or You can't leave empty filed or You must add minimum two answers!";
					/*unset($_SESSION['questions']);
					unset($_SESSION['answers']);
					unset($_SESSION['quest_count']);*/
				}
				print_r($_SESSION['questions']);
				echo "<br>";
				print_r($_SESSION['answers']);
				$_SESSION['quest_add'] = "Question saved!";
				if(isset($_POST['Finish']))
				{
					header("Location: addQuiz.php");
					exit();
				}
			}
			else
			{
				$_SESSION['bad_quest'] = "You can't leave empty filed!";
				if(isset($_POST['Finish']))
				{
					header("Location: addQuiz.php");
					unset($_SESSION['bad_quest']);
					exit();
				}
			}
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Add a new question</title>
</head>
<body>
	<?php include 'header.php';?>
	
<script>

window.onbeforeunload = exitAlert() {
  return "Do you want to exit this page?";
};

function exitAlert(){
	
	
}

	let save = confirm("You have unsaved changes! You will lose your questions if you leave now! Are you sure you want to quit?");
	if(save){// true if OK is pressed - don't save and leave page
		 
	}
	else{// stay on this page
		alert("Add questions and click 'finish' when you're done");
	}
	

</script>
	
	<div class="container">
		<div class="card mt-3 mb-3">
		
			<h1><p class="text-primary text-center card-title card-header">Add a new question</p></h1>	
			<form action="" method="post">
				<div class="form-check">
					<div class="card-body">
						<div class="list-group list-group-flush">
							<div class="list-group-item">
								<div class="row">
									<label for="question" class="col-sm-2 col-form-label"><h4><p class="text-secondary">Question</p></h4></label>
								</div>
								<div class="row">
									<div class="col-sm-8">
										<textarea class="form-control" name="question" id="question" rows="3"></textarea>
									</div>
								</div>
								<?php if(isset($_SESSION['bad_answers_order'])): ?>
										<div class="alert alert-danger mt-3"><?=$_SESSION['bad_answers_order']?></div>
										<?php unset($_SESSION['bad_answers_order']);?>
								<?php endif; ?>
								<?php if(isset($_SESSION['quest_add'])): ?>
										<div class="alert alert-success mt-3"><?=$_SESSION['quest_add']?></div>
										<?php unset($_SESSION['quest_add']);?>
								<?php endif; ?>
								<?php if(isset($_SESSION['bad_quest'])): ?>
										<div class="alert alert-danger mt-3"><?=$_SESSION['bad_quest']?></div>
										<?php unset($_SESSION['bad_quest']);?>
								<?php endif; ?>
								
							</div>
						
							<div class="list-group-item">
								<div class="ml-3">
									<div class="row mt-3">
										<h4><p class="text-secondary">Answers</p></h4>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<div class="col-sm-10">
											<div class="row mb-3">
												<div class="col-1 mt-4">
													<label for="A" class="col-sm-2 col-form-label"><h5><p class="text-secondary">A</p></h5></label>
												</div>
												<div class="col-9 ml-1 ml-sm-2 ml-md-0 mt-2">
													<textarea name="A" class="form-control" id="A" rows="4"></textarea>
												</div>
												
												<div class="col-1 form-check mt-4">
													<input class="form-check-input" type="radio" name="correctAnswer" id="r1" value="A" checked>
													<label class="form-check-label" for="r1">
													  <p class="text-info">Correct answer</p>
													</label>
												</div>										
											</div>
											
											<div class="row mb-3">
											   <div class="col-1 mt-4">
													<label for="B" class="col-sm-2 col-form-label"><h5><p class="text-secondary">B</p></h5></label>
												</div>
												<div class="col-9 ml-1 ml-sm-2 ml-md-0 mt-2">
													<textarea name="B" class="form-control" id="B" rows="4"></textarea>
												</div>
												
												<div class="col-1 form-check mt-4">
													<input class="form-check-input" type="radio" name="correctAnswer" id="r2" value="B">
													<label class="form-check-label" for="r2">
													  <p class="text-info">Correct answer</p>
													</label>
												</div>
												
											</div>
											
											<div class="row mb-3">
											   <div class="col-1 mt-4">
													<label for="C" class="col-sm-2 col-form-label"><h5><p class="text-secondary">C</p></h5></label>
												</div>
												<div class="col-9 ml-1 ml-sm-2 ml-md-0 mt-2">
													<textarea name="C" class="form-control" id="C" rows="4"></textarea>
												</div>
												
												<div class="col-1 form-check mt-4">
													<input class="form-check-input" type="radio" name="correctAnswer" id="r3" value="C">
													<label class="form-check-label" for="r3">
													  <p class="text-info">Correct answer</p>
													</label>
												</div>
												
											</div>
											
											
											<div class="row mb-3">
												<div class="col-1 mt-4">
													<label for="D" class="col-sm-2 col-form-label"><h5><p class="text-secondary">D</p></h5></label>
												</div>
												<div class="col-9 ml-1 ml-sm-2 ml-md-0 mt-2">
													<textarea name="D" class="form-control" id="D" rows="4"></textarea>
												</div>
												
												<div class="col-1 form-check mt-4">
													<input class="form-check-input" type="radio" name="correctAnswer" id="r4" value="D">
													<label class="form-check-label" for="r4">
													  <p class="text-info">Correct answer</p>
													</label>
												</div>
												
											</div>
										</div>
									</div>	
								</div>
								<?php if(isset($_SESSION['bad_correct_order'])): ?>
										<div class="alert alert-danger mt-3"><?=$_SESSION['bad_correct_order']?></div>
										<?php unset($_SESSION['bad_correct_order']);?>
								<?php endif; ?>
							</div>	
								
							<div class="list-group-item">
								<div class="row mt-4"> 
									<div class="col-6">
										<button type="submit" class="btn btn-lg btn-block btn-success float-left" name="Finish">Finish</button>
									</div>
									<div class="col-6">
										<button type="submit" class="btn btn-lg btn-block btn-primary float-right" name="Next">Next</button>
									</div>								
								</div>
							</div>				  
						</div>
					</div>
				</div>
			</form>	
		</div>
	</div>
	
	
</body>
</html>