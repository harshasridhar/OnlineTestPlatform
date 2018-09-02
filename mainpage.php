<?php
$c="#include<stdio.h>\nvoid main(){\n\t//Enter your code here\n}";
$cpp="include<iostream>\nusing namespace std;\nint main(){\n\t//Enter your code here\n}";
$java="import java.io.*;\npublic class Main{\n\tpublic static void main(String[] args){\n\t//Enter your code here\n\t}\n}";
$co=$c;
$selected="c";
$input="";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Coding Test Platform</title>
	<?php $printVal=""; ?>
</head>
<body >
	<div class="Image"  >
	<img src="Images/PESLogo.png" style="float: right">
	<img src="Images/CSELogo.png" style="float: left">
	<h1 style="float: clear">&nbsp;Online Coding Test</h1>
	<h3 style="float: right">Time Left: 00:00:00</h3>
	<br>
	</div>
	<div class="question" style="width:35%; float:left;" >
		<p style="padding:10px;" ><strong>Question</strong><br>
			Write a function that prints Hello world <br>
			<strong>Explanation:</strong><br>
			<em>
				Complete the given code to print 'Hello world' on the console<br>
				You can choose any language<br>
			</em>
			<strong>Input</strong><br>
			<em>No Input</em><br>
			<strong>Output</strong><br>
			Hello world<br>
		</p>
	</div>
	<div class="code" style="width:65%; float:right;" >
	<script src="tab.js"></script>
	<script type="text/javascript">
		function loading(){
			document.getElementById('output').value="Loading...";
		}
		function changeLang() {
			<?php 
				//This part isn't funtioning properly
				if ($selected=="c") {
					include('LanguageSupport/cProcess.php');
				}
				elseif ($selected=="java") {
					include('LanguageSupport/javaProcess.php');
				}
			?>
		    var lang = document.getElementById("langop");
		    if (lang.value == "c"){
		    	if(confirm('You are changing the language, all the code will be lost.Do you want to proceed?')){
		    	<?php 
		    	echo 'var content = ' . json_encode($c) . ';';
				?>
				document.getElementById('codeEditor').innerHTML=content;
		    	}
		    }
		    else if (lang.value == "cpp"){
		    	if(confirm('You are changing the language, all the code will be lost.Do you want to proceed?')){
			    	<?php
			    	echo 'var content = ' . json_encode($cpp) . ';';
					?>
					document.getElementById('codeEditor').innerHTML=content;
				}
    		}
    		else if(lang.value=="java"){
    			if(confirm('You are changing the language, all the code will be lost.Do you want to proceed?')){
			    	<?php 
			    	echo 'var content = ' . json_encode($java) . ';';
					?>
					document.getElementById('codeEditor').innerHTML=content;
				}
    		}
    		
    		//document.getElementById("langop").value="c";	
		}

	</script>
	<form action="#" method="POST" target="_self">
		Choose the language:<select onChange="changeLang();" id="langop" name="langOp">
			<option value="c" <?php if($selected=="c") echo "selected"; ?>>C</option>
			<option value="cpp" <?php if($selected=="cpp") echo "selected"; ?>>C++</option>
			<option value="java" <?php if($selected=="java") echo "selected"; ?>>Java</option>
		</select><br>
		Enter your Code here<br>
		<textarea rows="15" cols="60" id="codeEditor" name="code" ><?php echo "$co";?></textarea><br>
		<script type="text/javascript">enableTab('codeEditor');</script>

		Enter your input here<br>
		<textarea rows="5" cols="60" name="input"><?php echo $input; ?></textarea><br>
		<input type="submit" name="submit" onclick="loading();"><br>
		Output<br>
		<textarea rows="5" cols="60" id="output" readonly><?php echo "$printVal"; ?></textarea>
	</form>
</div>
<div id="lang">

</div>
</body>
</html>