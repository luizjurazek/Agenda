<?php include("../../config/config.php"); ?>
<?php include(DIRREQ."lib/html/header.php"); ?>

<?php 
$objEvents = new \Classes\ClassEvents();
$events = $objEvents->getEventsById($_GET['id']);
$date = new \DateTime($events['start']);
?>
<div>
        <h2>Editar consulta</h2>
        <hr>
        <a class="voltar" href="/agenda/views/manager"><i class="fas fa-backward"> Calendario Manager</i></a><br>
    <div class="form">
        <form method="post" name="formEdit" id="formEdit" action="<?php echo DIRPAGE.'controllers/ControllerEdit.php'; ?>">
            <div>
                <label for="time">Data</label><br>
                <input type="date" name="date" id="date" value="<?php echo $date->format("Y-m-d"); ?>"><br> 
            </div>
            <div>
                <label for="time">Tempo</label><br>
                <input type="time" name="time" id="time" value="<?php echo $date->format("H:i"); ?>"><br>
            </div>
            <div>
                <label for="title">Titulo</label><br>
                <input type="text" name="title" id="title" value="<?php echo $events['title']; ?>"><br>
            </div>
            <div>
                <label for="description">Descrição</label><br>
                <input type="text" name="description" id="description" value="<?php echo $events['description']; ?>"><br><br>
            </div>
            <input type="submit" value="Confirmar consulta"><br>
            <button class="deletarConsulta" id="delete" href="<?php echo DIRPAGE.'controllers/ControllerDelete.php?id='.$_GET['id'];?>"><i class="fas fa-trash"> Excluir Consulta</i></i></button>
        </form>
    </div>
</div>
<?php include(DIRREQ."lib/html/footer.php"); ?> 