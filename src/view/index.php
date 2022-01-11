<?php
require_once("../model/user.php");
include('../model/DAOUser.php');
$dao = new DAOUser();
$listAll = $dao->findAll();
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
    <form action="./form.php" method="POST" name="main_form" id="main_form">
      <input name="Oage" class="form-control" type="number" placeholder="Idade" aria-label="default input example">
      <input name="Oname" class="form-control" type="text" placeholder="Nome" aria-label="default input example">
      <input name="Oemail" class="form-control" type="mail" placeholder="Email" aria-label="default input example">
      <input name="Ophone" class="form-control" type="text" placeholder="telefone" aria-label="default input example">
      <input name="Odocument" class="form-control cpf" type="text" placeholder="documento (CPF)" aria-label="default input example">
      <input name="Obirth_day" class="form-control" type="text" placeholder="data de aniversário " aria-label="default input example">
      <button type="button" class="btn btn-primary" onclick="submit()">Enviar</button>
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
       <form action="./locate.php" method="POST">
       <input name="number" class="form-control" type="number" placeholder="Número" aria-label="default input example">
      <input name="address" class="form-control" type="text" placeholder="endereço" aria-label="default input example">
      <input name="complemento" class="form-control" type="mail" placeholder="complemento" aria-label="default input example">
      <input name="distrito" class="form-control cpf" type="text" placeholder="distrito" aria-label="default input example">
      <input name="estado" class="form-control" type="text" placeholder="estado" aria-label="default input example">
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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
  foreach($listAll as $user ){
    echo "<tr>";
      echo "<th scope='row'>{$user[0]}</th>";
      echo "<td>{$user[1]}</td>";
      echo "<td>{$user[2]}</td>";
      echo "<td>{$user[3]}</td>";
      echo "<td>{$user[4]}</td>";
      echo "<td>{$user[5]}</td>";
      echo "<td>{$user[6]}</td>";
      echo "<td>
            <button class='btn btn-danger' onclick='deleteUser({$user[0]})'>
              <i class='fa fa-trash' aria-hidden='true'></i>
            </button>
            </td>";
            echo "<td>
            <button type='button' class='btn btn-success'  data-toggle='modal' ata-target='#exampleModalCenter' 
            onclick=addLocation({$user[0]})>
            <i class='fa fa-plus' aria-hidden='true'></i>
            </button>
            </td>";
    echo "</tr>";
  }
  ?>
  </table>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
  <script>

    function closeModal(){ $('#exampleModalCenter').modal('hide'); }
    function addLocation(id){ $('#exampleModalCenter').modal('show'); }

    $(function(){
      var $formRegister = document.forms.main_form;
      if($formRegister.length){
        $formRegister.validate({
          rules: {
            'Oage': {
              require: true
            },
            'Oname': {
              require: true
            },
            'Oemail': {
              require: true
            },
            'Ophone': {
              require: true
            },
            'Odocument': {
              require: true
            },
            'Obirth_day': {
              require: true
            }
          }
        })
      }
    })
     
   
    function submit(e) {
      e.preventDefault();
      $.ajax({
          url: `./form.php`,
          method: 'POST',
          data: $("#main_form").serialize(),
          type: "GET",
      })
    }

    function deleteUser(id){
      $(event.composedPath()[2]).fadeOut("slow", ()=> alert("excluindo"));
      $.ajax({
          url: `../controller/controller.php?id=${id}`,
          method: 'DELETE',
          type: "GET",
        })
    }
   
   
  </script>
</body>

</html>