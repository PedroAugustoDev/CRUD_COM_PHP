<?php
require_once("../model/user.php");
include('../model/DAOUser.php');
include('../model/DAOAddress.php');
$dao = new DAOUser();
$dao_two = new DAOAddress();
$listAll = $dao->findAll();
$listAddress = $dao_two->findAll();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"><!-- icons font awesome lib -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
  <title>Crud em PHP</title>
</head>

<body>
  <main>
    <form action="../model/form.php" method="POST" name="main_form" id="main_form">
      <input name="Oage" class="form-control" type="number" placeholder="Idade" aria-label="default input example">
      <input name="Oname" class="form-control" type="text" placeholder="Nome" aria-label="default input example">
      <input name="Oemail" class="form-control" type="mail" placeholder="Email" aria-label="default input example">
      <input name="Ophone" class="form-control" type="text" placeholder="telefone" aria-label="default input example">
      <input name="Odocument" class="form-control cpf" type="text" placeholder="documento (CPF)" aria-label="default input example">
      <input name="Obirth_day" class="form-control" type="text" placeholder="data de aniversário " aria-label="default input example">
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </main>

  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Adicionar Locadidade</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../controller/addressController.php" method="POST" id="location_form">
            <input name="number" class="form-control" type="number" placeholder="Número" aria-label="default input example">
            <input name="address" class="form-control" type="text" placeholder="endereço" aria-label="default input example">
            <input name="complemento" class="form-control" type="mail" placeholder="complemento" aria-label="default input example">
            <input name="distrito" class="form-control " type="text" placeholder="distrito" aria-label="default input example">
            <input name="estado" class="form-control" type="text" placeholder="estado" aria-label="default input example">
            <input name="cidade" class="form-control" type="text" placeholder="cidade" aria-label="default input example">
            <input name="fk_id" hidden value="0" class="fk_user">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn save-btn btn-primary">Salvar</button>
        </div>
      </div>
    </div>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Idade</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Telefone</th>
        <th scope="col">CPF</th>
        <th scope="col">Data de nascimento</th>
        <th scope="col">Excluir</th>
        <th scope="col">Localização</th>
      </tr>
    </thead>
    <?php
    foreach ($listAll as $user) {
      echo "<tr>";
      echo "<th scope='row'>{$user->getId()}</th>";
      echo "<td>{$user->getOld()}</td>";
      echo "<td>{$user->getOname()}</td>";
      echo "<td>{$user->getOemail()}</td>";
      echo "<td>{$user->getOphone()}</td>";
      echo "<td>{$user->getOdocument()}</td>";
      echo "<td>{$user->getObirth_day()}</td>";
      echo "<td>
            <button class='btn btn-danger' onclick='deleteUser({$user->getId()})'>
              <i class='fa fa-trash' aria-hidden='true'></i>
            </button>
            </td>";
      echo "<td>
            <button type='button' class='btn btn-success'  data-toggle='modal' ata-target='#exampleModalCenter' 
            onclick=addLocation({$user->getId()})>
            <i class='fa fa-plus' aria-hidden='true'></i>
            </button>
            </td>";
      echo "</tr>";
    }
    ?>
  </table>
  <h1>Endereços</h2>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">ID do Usuário</th>
        <th scope="col">endereço</th>
        <th scope="col">cidade</th>
        <th scope="col">estado</th>
        <th scope="col">distrito</th>
        <th scope="col">número</th>
        <th scope="col">Complemento</th>
      </tr>
    </thead>
    <?php
    foreach ($listAddress as $address) {
      echo "<tr>";
      echo "<th scope='row'>{$address->id}</th>";
      echo "<td>{$address->pk}</td>";
      echo "<td>{$address->OAddress}</td>";
      echo "<td>{$address->Ocity}</td>";
      echo "<td>{$address->Ostate}</td>";
      echo "<td>{$address->Odistrict}</td>";
      echo "<td>{$address->Onumber}</td>";
      echo "<td>{$address->Ocomplement}</td>";
    }
    ?>
  </table>
  <script>

    function addLocation( id ){
      $('#exampleModalCenter').modal('show');
      const btnSave = document.querySelector(".save-btn");
      const inputFK = document.querySelector('.fk_user');
      inputFK.value = id;
      btnSave.addEventListener('click', ()=> {
        $("#location_form").submit();
      })
    }

    function closeModal() {
      $('#exampleModalCenter').modal('hide');
    }

    function deleteUser(id) {
      $(event.composedPath()[2]).fadeOut("slow", () => alert("excluindo"));
      $.ajax({
        url: `../controller/controller.php?id=${id}`,
        method: 'DELETE',
        type: "GET",
      })
    }
  </script>
</body>

</html>