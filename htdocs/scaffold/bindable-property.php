<?php

?>
<!DOCTYPE html>
<html>
	<title>Scaffold :: Xamarin Bindable Property</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/css/w3.css">
	<style type="text/css" media="screen">
		pre#resultContainer {
			padding: 10px 15px;
			overflow: auto;
			height: 500px;
		}
	</style>
	<body class="w3-light-grey">
		<div class="w3-content w3-margin-top">
			<div class="w3-row-padding">
				<div class="w3-third">
					<div class="w3-white w3-card-2">
						<div class="w3-container">
							<h4>
								Property Data
							</h4>
						</div>
						<div class="w3-container">
							<label>
								<strong>Name</strong>
							</label>
							<input id="dataName" class="w3-input" type="text" placeholder="e.g. text color"></input>
							<label>
								<strong>Type</strong>
							</label>
							<input id="dataType" class="w3-input" type="text" placeholder="e.g. Color, string, float"></input>
							<label>
								<strong>Declaring Type</strong>
							</label>
							<input id="dataDeclarationType" class="w3-input" type="text" placeholder="e.g. MyButton"></input>
							<br><br>
							<button class="w3-button w3-green" onclick="generateCode();">
								Generate code
							</button>
							<br><br>
						</div>
					</div>
				</div>
				<div class="w3-twothird">
					<div class="w3-white w3-card-2">
						<div class="w3-container">
							<h4>
								C# Code Result
							</h4>
						</div>
						<div class="w3-container">
							<pre id="resultContainer" class="w3-card"></pre>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
<script type="text/javascript">
function generateCode() {
	var dataName = document.getElementById('dataName');
	var dataType = document.getElementById('dataType');
	var dataDeclarationType = document.getElementById('dataDeclarationType');
	var resultContainer = document.getElementById('resultContainer');
	var propertyName = dataName.value.trim();
	var propertyType = dataType.value.trim();
	var declaringType = dataDeclarationType.value.trim();
	var nameParts = propertyName.split(/\s+/);
	var part;
	for (var i = 0; i < nameParts.length; i++) {
		part = nameParts[i];
		nameParts[i] = part[0].toUpperCase() + part.slice(1);
	}
	var nameTitle = nameParts.join("");
	var result = '// '+ nameTitle +'Property\n'+
		'\n'+
		'public '+ propertyType +' '+ nameTitle +' {get; set;}\n'+
		'\n'+
		'public static readonly BindableProperty '+ nameTitle +'Property = BindableProperty.Create(\n'+
		'\tpropertyName: "'+ nameTitle +'",\n'+
		'\treturnType: typeof('+ propertyType +'),\n'+
		'\tdeclaringType: typeof('+ declaringType +'),\n'+
		'\tdefaultValue: null,\n'+
		'\tdefaultBindingMode: BindingMode.TwoWay,\n'+
		'\tpropertyChanged: '+ nameTitle +'PropertyChanged\n'+
		');\n'+
		'\n'+
		'private static void '+ nameTitle +'PropertyChanged(BindableObject bindable, object oldValue, object newValue)\n'+
		'{\n'+
		'\tvar control = bindable as '+ declaringType +';\n'+
		'\t// set the property using newValue\n'+
		'}';
	// display result
	resultContainer.innerText = result;
}
</script>
</html>
