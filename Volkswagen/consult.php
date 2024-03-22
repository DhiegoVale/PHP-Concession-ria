<?php
include('carroModel.php');
include('import/header.php');
include('import/table.php');

$action = isset($_POST['action']) ? $_POST['action'] : '';
$id = isset($_POST['id']) ? $_POST['id'] : '';
$carroModel = new Carro();
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();

if ($action == 'excluir') {
  $_SESSION['exclusao_realizada'] = true;
  if ($carroModel->delete($id)) {
    $_SESSION['success'] = true;
    $_SESSION['message'] = 'Excluído com sucesso';
  } else {
    $_SESSION['message'] = 'Erro ao excluir';
    $_SESSION['success'] = false;
  }

  header("Location: " . $_SERVER['PHP_SELF']);
  exit();
}

//Consulta
$result = $carroModel->get();

if (isset($_SESSION['exclusao_realizada'])) {
  echo "
  <script>
    Swal.fire(
      '" . $_SESSION['message'] . "',
      '',
      '" . ($_SESSION['success'] ? 'success' : 'error') . "'
    )
  </script>";
  $_SESSION = [];
}

?>

<form method='POST' id='formExcluir' action='./consult.php'>
  <input hidden name='action' value='excluir' />
  <input hidden name='id' id='idCarro' value=''>
</form>

<?php
foreach ($result as $value) {
?>
  <tr>
    <td> <?= $value['id_carro'] ?> </td>
    <td> <?= $value['modelo_carro'] ?> </td>
    <td> <?= $value['cor_carro'] ?> </td>
    <td> <?= $value['valor'] ?> </td>
    <td> <?= $value['ano'] ?> </td>
    <td>
      <a href="formCarro.php?id_carro=<?= $value['id_carro'] ?>">
        <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-pen text-light-emphasis' viewBox='0 0 16 16'>
          <path d='m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z' />
        </svg>
      </a>
    </td>
    <td>
      <i onclick="excluirCarro('<?= $value['id_carro'] ?>')" role="button">
        <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-trash3-fill text-light-emphasis' viewBox='0 0 16 16'>
          <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z' />
        </svg>
      </i>
    </td>
  </tr>
<?php } ?>
<script src="js/script.js"></script>

<!-- onclick='return confirma()'  -->