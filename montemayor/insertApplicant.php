<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Insert Applicant</title>
	<link rel="stylesheet" href="styles.css">
	<style>
		body {
		    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		    background-color: #eaf8f8;
		    display: flex;
		    justify-content: center;
		    align-items: center;
		    min-height: 100vh;
		    margin: 0;
		    color: #333;
		}

		.container {
		    background-color: #ffffff;
		    border-radius: 10px;
		    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
		    padding: 25px 40px;
		    max-width: 600px;
		    width: 100%;
		    margin: 20px;
		}

		h1 {
		    color: #00897b;
		    text-align: center;
		    font-size: 2rem;
		    margin-bottom: 20px;
		}

		.message {
		    text-align: center;
		    font-size: 1.2rem;
		    margin-bottom: 20px;
		}

		.success-message {
		    color: #2e7d32;
		    background-color: #e8f5e9;
		    padding: 10px;
		    border-radius: 8px;
		}

		.error-message {
		    color: #c62828;
		    background-color: #ffebee;
		    padding: 10px;
		    border-radius: 8px;
		}

		form p {
		    margin-bottom: 15px;
		}

		label {
		    display: block;
		    font-weight: bold;
		    margin-bottom: 5px;
		    color: #555;
		}

		input[type="text"],
		input[type="number"] {
		    width: 100%;
		    padding: 12px;
		    border: 1px solid #ddd;
		    border-radius: 8px;
		    font-size: 1rem;
		    box-sizing: border-box;
		}

		input[type="submit"] {
		    background-color: #00897b;
		    color: #ffffff;
		    border: none;
		    padding: 12px 20px;
		    font-size: 1rem;
		    border-radius: 8px;
		    cursor: pointer;
		    font-weight: bold;
		    width: 100%;
		    transition: background-color 0.3s ease, transform 0.2s ease;
		}

		input[type="submit"]:hover {
		    background-color: #00695c;
		    transform: scale(1.05);
		}

		input:focus {
		    outline: none;
		    border-color: #00897b;
		    box-shadow: 0 0 8px rgba(0, 137, 123, 0.3);
		}
	</style>
</head>
<body>
	<div class="container">
		<?php  
			if (isset($_SESSION['message']) && isset($_SESSION['status'])) {
				$class = $_SESSION['status'] == "200" ? "success-message" : "error-message";
				echo "<div class='message $class'>{$_SESSION['message']}</div>";
			}
			unset($_SESSION['message']);
			unset($_SESSION['status']);
		?>

		<h1>Insert Applicant</h1>
		<form action="core/handleForms.php" method="POST">
			<p>
				<label for="firstName">First Name</label> 
				<input type="text" name="first_name">
			</p>
			<p>
				<label for="lastName">Last Name</label> 
				<input type="text" name="last_name">
			</p>
			<p>
				<label for="email">Email</label> 
				<input type="text" name="email">
			</p>
			<p>
				<label for="yearsOfExperience">Years of Experience</label> 
				<input type="number" name="years_of_experience">
			</p>
			<p>
				<label for="specialization">Specialization</label> 
				<input type="text" name="specialization">
			</p>
			<p>
				<label for="favoriteProgrammingLanguage">Favorite Programming Language</label> 
				<input type="text" name="favorite_programming_language">
			</p>
			<p>
				<input type="submit" value="Save" name="insertUserBtn">
			</p>
		</form>
	</div>
</body>
</html>
