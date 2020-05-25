<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Demo</title>
</head>
<body>

		

	<form action="{{ route('importar') }}" method="POST" enctype="multipart/form-data">
		
		<!--  
		<input type="hidden" name="_token" value="">-->

		@csrf

		<input type="file" name="archivo" required> <br>

		<button>Importar</button>


	</form>


	
</body>
</html>