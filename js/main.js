'use strict';

/*****************************************************************
 *                           FONCTIONS
 *****************************************************************/

/* **********************FONCTIONS***************************/


function addCountdown()
{
	var cpt;
	var eltcountdownList;
	var idTimer;
	var ms;
	var sec;

	sec=10;
	ms=1000;

	var liCreated;
	
	//récupération de l'id tota

	liCreated=document.createElement('li');

	//récupération de l'id countdown
	eltcountdown=document.querySelector("#countdown-list");

	eltcountdown.appendChild(liCreated);

	idTimer=window.setInterval(showCountdown,1000);

	function showCountdown()
	{
		
		
		if (sec<0) {
			

			liCreated.innerHTML="terminé";
			window.clearInterval(idTimer);
			eltcountdown.removeChild(liCreated);
		}else{
			
			liCreated.innerHTML=sec;
			sec--;
		}		
	}
}

/* **********************CONSTANTES & VARIABLES GLOBALES***************************/
var button;
var eltcountdown;

/* ******************************** CODE PRINCIPAL **********************************/

//installation de l'ecouteur d'evenement
button=document.querySelector("button");
button.addEventListener('click',addCountdown);



//  le $(function(){ } permet de verrifier que jquerry est bien chargé avant son utilisation
$(function()
{
	//zone de ville par rapport au code postal
    $('#zipcode').on('blur', onBlurCP);
    $('#selectCity').hide();

    //zone de jeu
    initThemes();
    $('#themes').on('change', onChangeTheme);

    var theme=localStorage.getItem('theme');
    if (theme == null) {
    	$('#themes').trigger('change');

    }else{
    	$(document.body).attr('class',theme);
    }
});

////////////// code pour zone de ville par rapport au code postal////////////// 

//on cache lelement qui liste les ville au départ pour les afficher uniquement apres l'entré de 3 caractere dans la barre de code postal


//avec  ' imput ' on demande de surveiller les entrée faite dans l'element et avec l'ajout d'un .length on peux 
//faire une action dés lors que la chaine de caractere ateind une certaine taille
$('#zipcode').on('input',function(){
	var cp;
	var tailleCp;

	//.val car on souhaite récuperer les value des imput car ce que l'on rentre en tant qu'utilisateur est la value du champ rempli
	cp= $('#zipcode').val(); 

	tailleCp=cp.length;

	if (tailleCp>2) {

		//do something
	}


});


// avec blur on demande de surveiller la perte de focus du champ ciblé 
$('#zipcode').on('blur',);


function onBlurCP(){

	var cp;
	//.val car on souhaite récuperer les value des imput car ce que l'on rentre en tant qu'utilisateur est la value du champ rempli
	cp= $(this).val(); 

	console.log(cp);
	if ((isNaN(cp)== false && cp.length>2)&&(cp.length<6)) {

		$.getJSON('ajax_communes.php',{cp:cp},onAjaxGetCommunes);

		$('#selectCity').fadeIn();
	}

}


function onAjaxGetCommunes(villes){

	var $option;
	var $select=$('#ville');
	

	$select.empty();
	for (var index =0; index < villes.length; index++) {

		//obj.propriété ( la proprieté viens de la base de donnée)
		$option= $('<option>').text(villes[index].ville_nom_reel);
		$select.append($option.val(villes[index].ville_id));


	}

}


////////////// code pour zone de jeu          ////////////// 


var themes=[
	{ id : 1,
	  name : 'Dark Moon',
	  cssClass : 'dark-moon'
	},
	{ id :2,
	  name : 'Purple Bitch',
	  cssClass : 'purple-bitch'

	}];



// avec blur on demande de surveiller la perte de focus du champ ciblé 
function initThemes()
{
	//.val car on souhaite récuperer les value des imput car ce que l'on rentre en tant qu'utilisateur est la value du champ rempli
    themes.forEach(function(theme)
    {
        $('<option>').text(theme.name).val(theme.cssClass).appendTo($('#themes'));
    });
}


function onChangeTheme()
{
    var theme = $(this).val();

    $(document.body).attr('class', theme);
    //fonction localStorage sert pour le stockage des donné de l'utilisateur en local sur le navigateur 
    localStorage.setItem('theme',theme);

}

