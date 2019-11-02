<!-- Tela de passagens -->
<!DOCTYPE html>
<html>
<head>
	<title>Passagens</title>
</head>
<body>
    <!-- Header das páginas -->
	<div>
        <?php include("includes/header.php"); ?>  
    </div>

	<div class="container">      
        <h1>Passagens</h1>
        <div>
            <form style="height: 700px;" class="align-items-center">
                <div>
                    
                </div>
                <div class="form-check-inline mt-3">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="opcao1" checked>
                    <label class="form-check-label" for="inlineRadio1">Ida e Volta</label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="opcao2">
                    <label class="form-check-label" for="inlineRadio2">Só Ida</label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="opcao3">
                    <label class="form-check-label" for="inlineRadio2">Multidestino</label>
                </div>
                <div class="form-row">
                    <div class="form-group mr-1 mb-2 mt-4">
                        <label for="staticEmail2">Origem</label>
                        <input type="text" class="form-control" id="staticEmail2" >
                    </div>
                    <div class="form-group mb-2 mt-4">
                        <label for="staticEmail2">Destino</label>
                        <input type="text" class="form-control" id="staticEmail2" >
                    </div>
                    <div class="form-group col-1 ml-3 mb-2 mt-4">
                        <label for="staticEmail2">Datas</label>
                        <input type="date" class="form-control" id="staticEmail2" >
                    </div>
                    <div class="form-group col-1 mb-2 mt-auto">
                        <input type="date" class="form-control" id="staticEmail2" >
                    </div>
                    <div class="form-group ml-3 mb-2 mt-auto">
                        <label for="inputEstado">Passageiros e Classe</label>
                        <select id="inputEstado" class="form-control">
                            <option selected>Escolher...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group ml-3 mb-2 mt-auto">
                        <button type="submit" class="btn btn-primary">Procurar</button>
                    </div>
                </div>
                <div class="form-group form-row">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Não defini as datas
                        </label>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Footer -->
    <?php include("includes/footer.php") ?>
</body>
</html>