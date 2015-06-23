<html>
<script type="text/javascript">
	$(document).ready(function(){
		var __closeAcount = JSON.stringify(<?php echo $_GET["ca"];?>);
		var __usuario = JSON.stringify(<?php echo json_encode($usuario);?>);
		guardarUsuario(__usuario);
		if(__closeAcount === "true"){
			logOut();
		}
		buildBar();
		__usuario = obtenerUsuario();
		if(__usuario !== null && __usuario !== "null"){
			if(__usuario.isLoggedIn){
				if(document.forms.length > 0){ 
					for(var i = 0; i < document.forms.length; i++){
						var form = document.forms[i];
						var usuario = document.createElement("input");
						usuario.value = localStorage["__usuario"];
						usuario.name = "__usuario";
						usuario.hidden = "hidden";
						$(form).append(usuario);
					}
				}else{
					var hrefs = $("a");
					for(var i = 0; i < hrefs.length; i++){
						var href = hrefs[i].href;
						if(href.contains("?")){
							href = href + "&__uid_=" + __usuario.id;
						}else{
							href = href + "?__uid_=" + __usuario.id;
						}
						hrefs[i].href = href;
					}
				}
			}
		}			
	});
</script>
</html>