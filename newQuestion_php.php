<?php 
session_start();
require_once "functions_PHP.php";
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
                            header('Location: newQuestion.php');
                            exit();
						}
					}
					if(!isset($_SESSION['quest_count']))
					{
						$a = $_POST['A'];
						$b = $_POST['B'];
						if(check_char($a) || check_char($b)) 
						{
							$_SESSION['bad_char'] = "You can't use this '|' character in anserws section!";
							header("Location: newQuestion.php");
							exit();	
						}
						$_SESSION['questions'] = array();
						$_SESSION['answers'] = array();
						$_SESSION['quest_count'] = 0;
						$question = $_POST['question'];
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
								}
							}
								$question = $_POST['question'];
								$a = $_POST['A'];
								$b = $_POST['B'];
								if(check_char($a) || check_char($b))
								{
									$_SESSION['bad_char'] = "You can't use this '|' character in anserws section!";
									header("Location: newQuestion.php");
									exit();	
								}
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
                            header('Location: newQuestion.php');
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
						if(check_char($a) || check_char($b) || check_char($c) )
						{
							$_SESSION['bad_char'] = "You can't use this '|' character in anserws section!";
							header("Location: newQuestion.php");
							exit();	
						}
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
										header('Location: newQuestion.php');
                                        exit();
									}
								}
									$question = $_POST['question'];
									$a = $_POST['A'];
									$b = $_POST['B'];
									$c = $_POST['C'];
									if(check_char($a) || check_char($b) || check_char($c) ) 
									{
										$_SESSION['bad_char'] = "You can't use this '|' character in anserws section!";
										header("Location: newQuestion.php");
										exit();	
									}
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
										if(check_char($a) || check_char($b) || check_char($c) || check_char($d) ) 
										{
											$_SESSION['bad_char'] = "You can't use this '|' character in anserws section!";
											header("Location: newQuestion.php");
											exit();	
										}
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
												if(check_char($a) || check_char($b) || check_char($c) || check_char($d) ) 
												{
													$_SESSION['bad_char'] = "You can't use this '|' character in anserws section!";
													header("Location: newQuestion.php");
													exit();	
												}
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
                    header('Location: newQuestion.php');
                    exit();
				}
				/*print_r($_SESSION['questions']);
				echo "<br>";
				print_r($_SESSION['answers']);*/
                $_SESSION['quest_add'] = "Question saved!";
                if(isset($_POST['Next']))
				{
					header("Location: newQuestion.php");
					exit();
				}
				if(isset($_POST['Finish']) && count($_SESSION['questions']) >0 )
				{
                    /*echo "jestem23";
                    echo "<br>";
                    print_r($_SESSION['questions']);
				    echo "<br>";
				    print_r($_SESSION['answers']);*/
					header("Location: addQuiz.php");
					exit();
				}
				else
				{
					$_SESSION['zero_quest_err'] = "You can't saved quiz without questions!";
					header("Location: newQuestion.php");
					exit();
				}
			}
			else
			{
				$_SESSION['bad_quest'] = "You can't leave empty filed!";
				if(isset($_POST['Finish'])  && count($_SESSION['questions']) >0 && isset($_SESSION['questions']) )
				{
                   /* echo "jestem22";
                    echo "<br>";
                    print_r($_SESSION['questions']);
				    echo "<br>";
				    print_r($_SESSION['answers']);*/
					header("Location: addQuiz.php");
					unset($_SESSION['bad_quest']);
					exit();
				}
				else
				{
					$_SESSION['zero_quest_err'] = "You can't saved quiz without questions!";
					header("Location: newQuestion.php");
					exit();
				}
			}
}

?>