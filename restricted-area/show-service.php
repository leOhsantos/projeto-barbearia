<?php include_once("validate-sentinel.php");
include_once("partials/head.php");
include_once("partials/nav.php");
require_once("../class/Service.php");

$service = new Service();
$stmt = $service->list();
?>

<section id="containerColumn" class="container-fluid">

    <div class="column-1">
        <h3 class="restricted-title-section">Registrar serviços</h3>
        <form id="form" class="form" method="post" action="crud-service.php" enctype="multipart/form-data">
            <input type="hidden" name="serviceId" value="<?php echo @$_GET['serviceId'] ?>">
            <label for="nameInput">Digite o nome do serviço:</label>
            <input autofocus type="text" id="nameInput" class="rt-text-input select-disable" name="serviceName" maxlength="40" placeholder="Nome do serviço">
            <p class="error-text">Informe o nome do serviço.</p>
            <label for="descInput">Digite a descrição do serviço:</label>
            <input type="text" id="descInput" class="rt-text-input select-disable" name="serviceDesc" maxlength="80" placeholder="Descrição do serviço">
            <p class="error-text">Informe a descrição do serviço.</p>
            <label for="imgInput" style="display: block;">Envie uma imagem do serviço:</label>
            <div class="send-img-container">
                <label for="imgInput" id="imgLabel" class="img-input select-disable">
                    <h6 id="textLabel">Clique aqui para enviar a imagem</h6><img id="img" src="" onerror="this.style.display='none'">
                </label>
                <input hidden type="file" accept=".jpg, .png" id="imgInput" class="rt-text-input" name="serviceImg">
            </div>
            <p class="error-text">Envie uma imagem do serviço.</p>
            <div class="btn-container">
                <input id="resetBtn" class="white-submit-btn" type="reset" value="Limpar">
                <input id="submitBtn" class="white-submit-btn" type="button" value="Salvar">
            </div>
        </form>
    </div>

    <div class="column-2 container">
        <h3 class="restricted-title-section">Serviços registrados</h3>
        <div class="img-col">
            <?php foreach ($stmt as $row) { ?>
                <div class="restricted-img-container">
                    <img src="img/service-img/<?php echo $row[3] ?>" alt="Imagem do serviço" class="img select-disable">
                    <p class="img-name"><?php echo $row[2] ?></p>
                    <p class="desc-text"><?php echo $row[1] ?></p>
                    <div class="btn-container">
                        <a type="button" class="btn btn-delete" data-bs-toggle="modal" data-bs-target="#deleteServiceModal" data-bs-id="<?php echo $row[0] ?>">Excluir</a>
                        <div id="deleteServiceModal" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 id="exampleModalLabel" class="modal-title">Excluir serviço</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Tem certeza de que deseja excluir esse serviço?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancelar</button>
                                        <a class="btn btn-delete delete-btn" href="">Excluir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a type="button" class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#editServiceModal" data-bs-id="<?php echo $row[0] ?>" data-bs-name="<?php echo $row[2] ?>" data-bs-desc="<?php echo $row[1] ?>">Editar</a>
                        <div id="editServiceModal" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 id="exampleModalLabel" class="modal-title">Editar serviço</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form id="formModal" method="post" action="crud-service.php" enctype="multipart/form-data">
                                        <div class="modal-body modal-body-edit">
                                            <input type="hidden" id="serviceId" class="id-input" name="serviceId">
                                            <label for="nameInput" class="col-form-label">Nome:</label>
                                            <input type="text" id="nameInput" class="text-input-modal name-input select-disable" name="serviceName" maxlength="40">
                                            <label for="descInput" class="col-form-label">Descrição:</label>
                                            <input type="text" id="descInput" class="text-input-modal desc-input select-disable" name="serviceDesc" maxlength="80">
                                            <label for="imgInput2" class="col-form-label" style="display: block;">Envie uma imagem do serviço:</label>
                                            <div class="send-img-container">
                                                <label for="imgInput2" class="img-input select-disable">
                                                    <h6 id="textLabel" class="text-label">Clique aqui para enviar a imagem</h6><img id="img" class="img" src="" onerror="this.style.display='none'">
                                                </label>
                                                <input hidden type="file" accept=".jpg, .png" id="imgInput2" class="service-img-input" name="serviceImg">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-edit submit-btn">Editar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

</section>

</main>

<footer class="footer">
    <h6>Modo Administrador - Serviços</h6>
    <h6>© 2021 Copyright - Na Régua Barbershop</h6>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="../assets/js/service.js"></script>
</body>

</html>