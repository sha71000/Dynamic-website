<?php
session_start();
	$thoughterror = false;
	$error_message = "";

	if (isset($_POST['submitThought'])) {
		$mindfeed_name = $_SESSION["logged_in_name"];
		$mindfeed_date = date("j F Y");
		$mindfeed_thought = validateData($_POST['thought']);

		if ($mindfeed_thought != "") {

			$sql = "INSERT INTO mindfeed (m_name, m_date, m_thought) VALUES ('{$mindfeed_name}', '{$mindfeed_date}', '{$mindfeed_thought}')";
			$submit_thought_result = $conn->query($sql);

			if ($submit_thought_result === true) {
				header("Location: index.php");
				die();
			}
			else {
				$error_message = "Sorry, there is an error submitting your thought: " . $sql . "<br>" . $conn->error;
			}
		}
		else {
			$thought_error = true;
			$error_message = "Your thought cannot be empty, 3PO! You know better.";
		}
	}

			//<!-- Comment form -->
			echo '<div class="py-5">';

			echo	'<form class="form-signin" action="'.basename($_SERVER["PHP_SELF"]).'" method="post">';
			echo		'<h3 class="h4 mb-3 font-weight-normal">Type and save. You know the drill.</h3>'; 

					
					if ($thought_error === true) {
							echo "<p class='text-danger'>$error_message</p>";
						}
					
					
					if($_SESSION['logged_in']){
						echo '<textarea class="form-control" id="c3polog" name="thought" rows="3" maxlength="254" placeholder="Do not enter more than 254 characters!" required></textarea>';
					    echo'<div class="mx-auto py-4">';
						echo'<button class="btn btn-lg btn-primary w-25 right" type="submit" name="submitThought">Save</button>';
						echo'<button class="btn btn-lg btn-warning w-25" type="reset">Clear</button>';
					}
					else{
						echo '<textarea class="form-control" id="c3polog" name="thought" rows="3" maxlength="254" placeholder="You must log in to comment!" required></textarea>';
					    echo'<div class="mx-auto py-4">';
						echo'<button class="btn btn-lg btn-primary w-25 right" type="submit" name="submitThought" disabled>Save</button>';
						echo'<button class="btn btn-lg btn-warning w-25" type="reset" disabled>Clear</button>';

					}
					echo'</div>';
				echo'</form>';
			echo'</div>';

?>