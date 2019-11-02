<!-- Tela de passagens -->
<!DOCTYPE html>
<html>
<head>
    <meta> 
	<title>Passagens</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        
    </style>
</head>
<body>
    <!-- Header das páginas -->
	<div>
        <?php include("includes/header.php"); ?>  
    </div>

	<div class="container">      
        <h1 style="text-align: center;">Passagens</h1>
        
        <div class="">
            <form >
                <div>
                    <label for="">origem</label>
                    <select name="" id="" class="browser-default custom-select custom-select-lg mb-3">
                        <option value="" disabled selected>- Selecione Origem - </option>
                        <option value="campogrande ">Campo Grande</option>
                        <option value="maringa">Maringa</option>
                    </select>
                </div>

                <div>
                    <label for="">destino</label>
                    <select name="" id="" class="browser-default custom-select custom-select-lg mb-3">
                        <option value="">- Selecione Destino - </option>
                        <option value="campogrande ">Campo Grande</option>
                        <option value="maringa">Maringa</option>
                    </select>
                </div>

                <div>
                    <label for="">Data da passagem</label>
                    <input type="date">
                </div>

                <div>
                    <button type="submit">Procurar</button>
                </div>

                <!-- Material input -->
                
            </form>
        </div>
    </div>
    <!-- Footer -->
    <?php include("includes/footer.php") ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>