<!-- Tela de passagens -->
<!DOCTYPE html>
<html>
<head>
    <meta> 
	<title>Passagens</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .container {
            min-height: 92vh;
            margin-top: 77px;
        }

        .form-div{
			margin-bottom: 300px;
		}

        .passagens {
			border-top: 1px solid black;
			border-bottom: 1px solid black;
			background-color: rgba(230, 255, 255, 0.3);
		}

        .btnn {
            margin-top: 15px;
        }


    </style>
</head>
<body>
    <!-- Header das páginas -->
	<div>
        <?php include("includes/header.php"); ?>  
    </div>
    <!-- justify-content-center align-items-center -->
	<div class="container d-flex flex-column justify-content-between align-items-center">      
        <div class="passagens">
            <h6 class="display-4">Passagens</h6>
        </div>
        <?php 
            if (!isset($_POST['procurar'])) {
                ?>
                <div class="p-2">
                    <form method="POST" class="form-div">
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

                        <div class="d-flex flex-column">
                            <label for="">Data da passagem</label>
                            <input type="date">
                        </div>

                        <div class="btnn d-flex flex-column">
                            <button type="submit" class="btn btn-primary" name="procurar">Submit</button>
                        </div>
                    </form>
                </div> 
            <?php
            } else {
                echo 'entrei 2';
            }
            ?> 
    </div>
    <!-- Footer -->
    <?php include("includes/footer.php") ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>