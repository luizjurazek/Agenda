<?php include("config/config.php"); ?>
<?php include(DIRREQ."lib/html/header.php"); ?>


<div class="contas">
    <h2>Escolha o modo de usuário: </h2>
    <div class="botoes">
        <a href="<?php echo DIRPAGE.'views/user'; ?>">Calendário do Usuário</a><br>
        <a href="<?php echo DIRPAGE.'views/manager'; ?>">Calendário do Gerente</a><br>
    </div> 
</div>
   

<?php include(DIRREQ."lib/html/footer.php"); ?>    