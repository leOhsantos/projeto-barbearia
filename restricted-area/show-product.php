<?php include_once("validate-sentinel.php");
include_once("partials/head.php");
include_once("partials/nav.php");
require_once("../class/Product.php");

$product = new Product();
$stmt = $product->list();
?>

<section id="containerColumn" class="container-fluid">

    <div class="column-1">
        <h3>Registrar produtos</h3>
        <div class="form-hr"></div>
        <form id="form" class="form" method="post" action="crud-product.php" enctype="multipart/form-data">
            <input type="hidden" name="productId" value="<?php echo @$_GET['productId'] ?>">
            <label for="nameInput">Digite o nome do produto:</label>
            <input type="text" id="nameInput" class="rt-text-input select-disable" name="productName" maxlength="40" placeholder="Nome do produto">
            <label for="descInput">Digite a descrição do produto:</label>
            <input type="text" id="descInput" class="rt-text-input select-disable" name="productDesc" maxlength="80" placeholder="Descrição do produto">
            <label for="imgInput" style="display: block;">Envie uma imagem do produto:</label>
            <div class="send-img-container">
                <label for="imgInput" id="imgLabel" class="img-input select-disable">
                    <h6 id="textLabel">Clique aqui para enviar a imagem</h6><img id="img" src="" onerror="this.style.display='none'">
                </label>
                <input hidden type="file" accept=".jpg, .png" id="imgInput" class="rt-text-input" name="productImg">
            </div>
            <p id="errorText">.</p>
            <div class="btn-container">
                <input id="submitBtn" class="white-submit-btn" type="button" value="Salvar">
                <input id="resetBtn" class="white-submit-btn" type="reset" value="Limpar">
            </div>
        </form>
    </div>

    <div class="column-2 container">
        <h3>Produtos registrados</h3>
        <div class="form-hr"></div>
        <div class="img-col">
            <?php foreach ($stmt as $row) { ?>
                <div class="restricted-img-container">
                    <img src="img/product-img/<?php echo $row[3] ?>" alt="Imagem do produto" class="img select-disable">
                    <p class="img-name"><?php echo $row[2] ?></p>
                    <p><?php echo $row[1] ?></p>
                    <div class="btn-container">
                        <p><a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProductModal" data-bs-id="<?php echo $row[0] ?>">Excluir</a>
                        <div id="deleteProductModal" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 id="exampleModalLabel" class="modal-title">Excluir produto</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Tem certeza de que deseja excluir esse produto?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <a class="btn btn-danger delete-btn" href="">Excluir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>
                            <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProductModal" data-bs-id="<?php echo $row[0] ?>" data-bs-name="<?php echo $row[2] ?>" data-bs-desc="<?php echo $row[1] ?>">Editar</a>
                        <div id="editProductModal" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 id="exampleModalLabel" class="modal-title">Editar produto</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form id="form" method="post" action="crud-product.php" enctype="multipart/form-data">
                                        <div class="modal-body modal-body-edit">
                                            <input type="hidden" class="form-control id-input" name="productId">
                                            <label for="nameInput" class="col-form-label">Nome:</label>
                                            <input type="text" id="nameInput" class="form-control name-input select-disable" name="productName" maxlength="40">
                                            <label for="descInput" class="col-form-label">Descrição:</label>
                                            <input type="text" id="descInput" class="form-control desc-input select-disable" name="productDesc" maxlength="80">
                                            <label for="imgInput2" class="col-form-label" style="display: block;">Envie uma imagem do produto:</label>
                                            <div class="send-img-container">
                                                <label for="imgInput2" class="img-input select-disable">
                                                    <h6 id="textLabel" class="text-label">Clique aqui para enviar a imagem</h6><img id="imgLabel" class="img" src="" onerror="this.style.display='none'">
                                                </label>
                                                <input hidden type="file" accept=".jpg, .png" id="imgInput2" class="product-img-input" name="productImg">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-primary submit-btn">Editar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </p>
                </div>
            <?php } ?>
        </div>
    </div>

</section>

</main>

<footer>
    <h6>Modo Administrador - Produtos</h6>
    <h6>© 2021 Copyright - Na Régua Barbershop</h6>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="../assets/js/product.js"></script>

</body>

</html>