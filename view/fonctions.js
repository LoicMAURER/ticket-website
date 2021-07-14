$(document).ready(function(){
	$('#search').keyup(function(){
		var search = $(this).val();
		search = $.trim(search);
		if(search !== ""){
			$.post('send.php',function(){
				$('#resultat').html(data);
			});
		}
	});
});


function testMDPIdentique(){
	
	if(document.getElementById('inputPassword').value==document.getElementById('inputPassword2').value){
		   document.getElementById('inputPassword2').style.background= '#99c2ff';
		   document.getElementById('txtErreurIdentique').innerHTML="";
		   document.getElementById('btnCreateAccount').style.display='initial'; 
	}
	else{
		document.getElementById('inputPassword2').style.background= '#ff8080';
		document.getElementById('txtErreurIdentique').display="initial";
		document.getElementById('txtErreurIdentique').innerHTML="Attention les mots de passe doivent être identique";
		$('#txtErreurIdentique').css('color : #ff8080');
		document.getElementById('btnCreateAccount').style.display ='none'; 
	}
}

function testMDPCaracteristiques(){

var mdp = document.getElementById('inputPassword').value;
var longueur = mdp.length;

	if(longueur >= 8){
		document.getElementById('inputPassword').style.background='#99c2ff';
		document.getElementById('txtErreurLongueur').innerHTML="";
		document.getElementById('btnCreateAccount').style.display='initial'; 
	}
	else{
		document.getElementById('inputPassword').style.background='#ff8080';
		document.getElementById('txtErreurLongueur').innerHTML="Attention le mot de passe doit contenir au minimum 8 caractères";
		document.getElementById('txtErreurLongueur').style.color="#ff8080";
		document.getElementById('btnCreateAccount').style.display='initial'; 
	}	
}

