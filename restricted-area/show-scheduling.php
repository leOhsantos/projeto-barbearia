<?php include_once("validate-sentinel.php");
include_once("partials/head.php");
include_once("partials/nav.php");
require_once("../class/Scheduling.php");
require_once("../class/Client.php");
require_once("../class/Service.php");

$scheduling = new Scheduling();
$stmt = $scheduling->list();

$client = new Client();
$stmt2 = $client->list();
$stmt3 = $client->list();

$service = new Service();
$stmt4 = $service->list();
$stmt5 = $service->list();
?>

<section id="containerColumn" class="container-fluid">

    <div class="column-1">
        <h3>Agendar cliente</h3>
        <div class="form-hr"></div>
        <form id="form" class="form" method="post" action="crud-scheduling.php">
            <input type="hidden" name="scheduleId" value="<?php echo @$_GET['scheduleId'] ?>">
            <label for="clientInput">Selecione o cliente:</label>
            <select id="clientInput" class="rt-text-input select-disable" name="clientId">
                <option value="0">Selecionar</option>

                <?php foreach ($stmt2 as $row) {
                    echo "<option value='$row[0]'> $row[1] </option>";
                }
                ?>

            </select>
            <label for="dateInput">Agende a data:</label>
            <input type="date" id="dateInput" class="rt-text-input select-disable" name="scheduleDate">
            <label for="hourInput">Agende a hora:</label>
            <input type="time" id="hourInput" class="rt-text-input select-disable" name="scheduleHour">
            <label for="serviceInput">Selecione o serviço:</label>
            <select id="serviceInput" class="rt-text-input select-disable" name="serviceId">
                <option value="0">Selecionar</option>

                <?php foreach ($stmt4 as $row) {
                    echo "<option value='$row[0]'> $row[2] </option>";
                }
                ?>

            </select>
            <p id="errorText">.</p>
            <div class="btn-container">
                <input id="submitBtn" class="white-submit-btn" type="button" value="Salvar">
                <input id="resetBtn" class="white-submit-btn" type="reset" value="Limpar">
            </div>
        </form>
    </div>

    <div class="column-2">
        <h3>Agendamentos</h3>
        <div class="form-hr"></div>
        <table>
            <thead>
                <tr>
                    <th scope="col">Cliente</th>
                    <th scope="col">Data</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Serviço</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stmt as $row) { ?>
                    <tr>
                        <td><?php echo $row[3] ?></td>
                        <td><?php echo $row[1] ?></td>
                        <td><?php echo $row[2] ?></td>
                        <td><?php echo $row[4] ?></td>
                        <td class="btnTd">
                            <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSchedulingModal" data-bs-id="<?php echo $row[0] ?>">Excluir</a>
                            <div id="deleteSchedulingModal" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 id="exampleModalLabel" class="modal-title">Excluir agendamento</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Tem certeza de que deseja excluir esse agendamento?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <a class="btn btn-danger delete-btn" href="">Excluir</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <td class="btnTd">
                            <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editSchedulingModal" data-bs-id="<?php echo $row[0] ?>" data-bs-client="<?php echo $row[5] ?>" data-bs-service="<?php echo $row[6] ?>">Editar</a>
                            <div id="editSchedulingModal" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 id="exampleModalLabel" class="modal-title">Editar agendamento</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form id="form" method="post" action="crud-scheduling.php">
                                            <div class="modal-body modal-body-edit">
                                                <input type="hidden" class="form-control id-input" name="scheduleId">
                                                <label for="clientInput" class="col-form-label">Selecione o cliente:</label>
                                                <select id="clientInput" class="form-control client-input select-disable" name="clientId">
                                                    <option value="0">Selecionar</option>

                                                    <?php foreach ($stmt3 as $row) {
                                                        echo "<option value='$row[0]'> $row[1] </option>";
                                                    }
                                                    ?>

                                                </select>
                                                <label for="dateInput" class="col-form-label">Agende a data:</label>
                                                <input type="date" id="dateInput" class="form-control date-input select-disable" name="scheduleDate">
                                                <label for="hourInput" class="col-form-label">Agende a hora:</label>
                                                <input type="time" id="hourInput" class="form-control hour-input select-disable" name="scheduleHour">
                                                <label for="serviceInput" class="col-form-label">Selecione o serviço:</label>
                                                <select id="serviceInput" class="form-control service-input select-disable" name="serviceId">
                                                    <option value="0">Selecionar</option>

                                                    <?php
                                                    foreach ($stmt5 as $row) {
                                                        echo "<option value='$row[0]'> $row[2] </option>";
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="button" class="btn btn-primary submitBtn">Editar</button>
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
    </div>

</section>

</main>

<footer>
    <h6>Modo Administrador - Agendamentos</h6>
    <h6>© 2021 Copyright - Na Régua Barbershop</h6>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="../assets/js/scheduling.js"></script>

</body>

</html>