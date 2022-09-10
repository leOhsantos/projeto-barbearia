<?php include_once("validate-sentinel.php");
include_once("partials/head.php");
include_once("partials/nav.php");
require_once("../class/Client.php");

$client = new Client();
$stmt = $client->list();
?>

<section id="containerColumn" class="container-fluid">

    <div class="column-1">
        <h3 class="restricted-title-section">Registrar clientes</h3>
        <form id="form" class="form" method="post" action="crud-client.php">
            <input type="hidden" name="clientId" value="<?php echo @$_GET['clientId'] ?>">
            <label for="nameInput">Digite o nome do cliente:</label>
            <input autofocus type="text" id="nameInput" class="rt-text-input select-disable" name="clientName" maxlength="60" placeholder="ex.: Ednaldo Pereira">
            <label for="emailInput">Digite o endereço de e-mail do cliente:</label>
            <input type="text" id="emailInput" class="rt-text-input select-disable" name="clientEmail" maxlength="60" placeholder="exemplo123@gmail.com">
            <label for="phoneInput">Digite o número de contato do cliente:</label>
            <input type="text" id="phoneInput" class="rt-text-input select-disable" name="clientPhone" maxlength="15" placeholder="(xx) xxxxx-xxxx">
            <p id="errorText">.</p>
            <div class="btn-container">
                <input id="resetBtn" class="white-submit-btn" type="reset" value="Limpar">
                <input id="submitBtn" class="white-submit-btn" type="button" value="Salvar">
            </div>
        </form>
    </div>

    <div class="column-2 clientTable">
        <h3 class="restricted-title-section">Clientes registrados</h3>
        <table>
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Endereço de e-mail</th>
                    <th scope="col">Número de contato</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stmt as $row) { ?>
                    <tr>
                        <td><?php echo $row[1] ?></td>
                        <td><?php echo $row[2] ?></td>
                        <td><?php echo $row[3] ?></td>
                        <td class="btnTd">
                            <a type="button" class="btn btn-delete" data-bs-toggle="modal" data-bs-target="#deleteClientModal" data-bs-id="<?php echo $row[0] ?>">Excluir</a>
                            <div id="deleteClientModal" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 id="exampleModalLabel" class="modal-title">Excluir cliente</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Tem certeza de que deseja excluir esse cliente?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancelar</button>
                                            <a class="btn btn-delete delete-btn" href="">Excluir</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="btnTd">
                            <a type="button" class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#editClientModal" data-bs-id="<?php echo $row[0] ?>" data-bs-name="<?php echo $row[1] ?>" data-bs-email="<?php echo $row[2] ?>" data-bs-phone="<?php echo $row[3] ?>">Editar</a>
                            <div id="editClientModal" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 id="exampleModalLabel" class="modal-title">Editar cliente</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form id="form" method="post" action="crud-client.php">
                                            <div class="modal-body modal-body-edit">
                                                <input type="hidden" class="form-control id-input" name="clientId">
                                                <label for="inputName" class="col-form-label">Nome:</label>
                                                <input type="text" id="inputName" class="form-control name-input select-disable" name="clientName" maxlength="60">
                                                <label for="emailInput" class="col-form-label">Endereço de e-mail:</label>
                                                <input type="text" id="emailInput" class="form-control email-input select-disable" name="clientEmail" maxlength="60">
                                                <label for="phoneInput" class="col-form-label">Número de contato:</label>
                                                <input type="text" id="phoneInput" class="form-control phone-input select-disable" name="clientPhone" maxlength="15">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="button" class="btn btn-edit submitBtn">Editar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

</section>

</main>

<footer>
    <h6>Modo Administrador - Clientes</h6>
    <h6>© 2021 Copyright - Na Régua Barbershop</h6>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="../assets/js/client.js"></script>
</body>

</html>