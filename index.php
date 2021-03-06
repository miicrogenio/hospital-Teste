

<!DOCTYPE html>

<html lang="en-us">
<meta charset="utf-8" />
<head>
<title>DIGGITUS SAÚDE ERP</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" type="image/png" href="./img/log_.png" />
<style>
@import url("http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css");
@import url("http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700");
*{margin:0; padding:0}
body{background:#294072; font-family: 'Source Sans Pro', sans-serif}
.sucesso{
color: #3a87ad;
background-color: #d9edf7;
border-color: #bce8f1;
    border-top-color: rgb(188, 232, 241);
    border-right-color: rgb(188, 232, 241);
    border-bottom-color: rgb(188, 232, 241);
    border-left-color: rgb(188, 232, 241);
}
.conexao{
	color: #b94a48;
background-color: #f2dede;
border-color: #eed3d7;
    border-top-color: rgb(238, 211, 215);
    border-right-color: rgb(238, 211, 215);
    border-bottom-color: rgb(238, 211, 215);
    border-left-color: rgb(238, 211, 215);
}
.falha{
color: #c09853;
text-shadow: 0 1px 0 rgba(255,255,255,0.5);
background-color: #fcf8e3;
border-color: #eed3d7;
    border-top-color: rgb(238, 211, 215);
    border-right-color: rgb(238, 211, 215);
    border-bottom-color: rgb(238, 211, 215);
    border-left-color: rgb(238, 211, 215);
}
.form{width:400px; margin:0 auto; background:#1C2B4A; margin-top:150px}
.header{height:44px; background:#17233B}
.header h2{height:44px; line-height:44px; color:#fff; text-align:center}
.login{padding:0 20px}
.login span.un{width:10%; text-align:center; color:#0C6; border-radius:3px 0 0 3px}
.text{background:#12192C; width:90%; border-radius:0 3px 3px 0; border:none; outline:none; color:#999; font-family: 'Source Sans Pro', sans-serif} 
.text,.login span.un{display:inline-block; vertical-align:top; height:40px; line-height:40px; background:#12192C;}

.btn{height:40px; border:none; background:#0C6; width:100%; outline:none; font-family: 'Source Sans Pro', sans-serif; font-size:20px; font-weight:bold; color:#eee; border-bottom:solid 3px #093; border-radius:3px; cursor:pointer}
ul li{height:40px; margin:15px 0; list-style:none}
.span{display:table; width:100%; font-size:14px;}
.ch{display:inline-block; width:50%; color:#CCC}
.ch a{color:#CCC; text-decoration:none}
.ch:nth-child(2){text-align:right}
/*social*/
.social{height:30px; line-height:30px; display:table; width:100%}
.social div{display:inline-block; width:42%; color:#eee; font-size:12px; text-align:center; border-radius:3px}
.social div i.fa{font-size:16px; line-height:30px}
.fb{background:#3B5A9A; border-bottom:solid 3px #036} .tw{background:#2CA8D2; margin-left:16%; border-bottom:solid 3px #3399CC}
/*bottom*/
.sign{width:90%; padding:0 5%; height:50px; display:table; background:#17233B}
.sign div{display:inline-block; width:50%; line-height:50px; color:#ccc; font-size:14px}
.up{text-align:right}
.up a{display:block; background:#096; text-align:center; height:35px; line-height:35px; width:50%; font-size:16px; text-decoration:none; color:#eee; border-bottom:solid 3px #006633; border-radius:3px; font-weight:bold; margin-left:50%}
@media(max-width:480px){ .form{width:100%}}
</style>

</head>
<body>
<div class="form">
<div class="header">
<h2>Diggitus Saúde ERP</h2></div>
<div class="login">
    <form action="" method="POST" id="formulario">
<ul>
<div id="msg"></div>
<li>
    <span class="un"><i class="fa fa-user"></i></span><input type="text" required class="text" placeholder="Digite o teu utilizador" name="nome" id="nome" /></li>
<li>
    <span class="un"><i class="fa fa-lock"></i></span><input type="password" required class="text" placeholder="Digite a sua senha" name="senha" id="senha" /></li>
<li>
<input type="submit" id="login" name="login" value="Entrar" class="btn">
</li>
<li><div class="span"><span class="ch"><input type="checkbox" id="r"> <label for="r">Lembrar-me</label> </span> <span class="ch"><a href="#">Esqueceu a senha?</a></span></div></li>
</ul>
</form>
</div><br/>
</div>
<script src="js/jquery-1.8.2.min.js"></script>

<script type="text/javascript">
        $('#login').click(function(e) {
    
        e.preventDefault();
        
        var nome = jQuery('#nome').val();
        var senha = jQuery('#senha').val();
        // var foto = jQuery('#foto').val();
       // $('#tabsleft').find("a[href*='tabsleft-tab1']").trigger('click');

        $.ajax({
            type: "POST",
            url: "./Classes/Fazer_login.php",
            data: {senha:senha, nome:nome},
            //beforeSend: function(dado){
            //jQuery('.user-profile').append('Processando.....<span class=" fa fa-angle-down"> Processando</span>');
            //},
            success: function (data) {
                if($("#formulario input").val() != ""){


                if (data.toString() == 'sucesso') {
                    jQuery('#msg').html('<div class="sucesso"><strong>Êxito!</strong> Login efectuado.</div>').show(300).delay(5000).hide(300);
                    $("#formulario input").val(""); //limpa todos inputs do formulário
                   location.href="Pagina_Inicial.php";

return false;
                } else {
                	if(data.toString() == 'erro'){
                		jQuery('#msg').html('<div class="falha"><strong>Irregularidade!</strong> Dados incorretos.</div>').show(300).delay(5000).hide(300);
                    
                    return false;
                	}else{
                		jQuery('#msg').html('<div class="conexao"><strong>Problema!</strong> Ocorreu um erro na conexão com a BD.</div>').show(300).delay(5000);
                    
                    return false;
                	}
                    
                }
            }
            else{
                jQuery('#msg').html('<div class="falha"><strong>Irregularidade!</strong> Porfavor verifique se os campos estão todos preenchidos.</div>').show(300).delay(5000).hide(300);
            }
            }


        });
    });

</script>



</body>



</html>