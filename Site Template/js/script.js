'use strict';

/*************************FONCTIONS******************************/




function countdown()
{
	if (cpt==listSize-1){
		cpt=0;
		blzImg.src=IMGPATH+listImage[cpt].file;
		imgLegend=listImage[cpt].legend;
		blzFigCaption.innerHTML=imgLegend;

	}else if(cpt<listSize-1){
		cpt++;
		blzImg.src=IMGPATH+listImage[cpt].file;
		imgLegend=listImage[cpt].legend;
		blzFigCaption.innerHTML=imgLegend;
	}
}	


function lastDiapo()
{
	if (cpt>0 && cpt<listSize){
		cpt--;
		blzImg.src=IMGPATH+listImage[cpt].file;
		imgLegend=listImage[cpt].legend;
		blzFigCaption.innerHTML=imgLegend;
	}else{
		cpt=4;
		blzImg.src=IMGPATH+listImage[cpt].file;
		imgLegend=listImage[cpt].legend;
		blzFigCaption.innerHTML=imgLegend;
	}
}



function nextDiapo()
{
	if (cpt<listSize-1){
		cpt++;
		blzImg.src=IMGPATH+listImage[cpt].file;
		imgLegend=listImage[cpt].legend;
		blzFigCaption.innerHTML=imgLegend;
	}else{
		cpt=0;
		blzImg.src=IMGPATH+listImage[cpt].file;
		imgLegend=listImage[cpt].legend;
		blzFigCaption.innerHTML=imgLegend;
	}	
}


/****************CONSTANTES & VARIABLES GLOBALES****************/



/***********************CODE PRINCIPAL***************************/
const IMGPATH="img/";

var lastButton;
var nextButton;

var listSize;
	var startValRandom;
	var imgLegend;

	var blzFigure;
	var blzImg;
	var blzFigCaption;


	//création du tableau d'objet
	var listImage=[ { file:"BaniereQP1.png",legend:"Quiz Panic" },
					{ file:"BaniereQR2.png",legend:"Quiz Rush" },
					{ file:"BaniereSC.png",legend:"Suber Buzzer" },
					{ file:"BaniereWS.png",legend:"Waza Sound" },
					{ file:"phone.png",legend:"Phone Screen" }

				];

	var cpt;
	var ms;

	ms=5000;

	cpt=parseInt(Math.random() * (3 - 0));

	listSize=listImage.length;

	
	

	blzImg=document.querySelector("#qp");
	blzImg.src=IMGPATH+listImage[cpt].file;

	blzFigure=document.querySelector("#baniere");

	/*blzFigCaption=document.createElement("figcaption");
	blzFigure.appendChild(blzFigCaption);
	imgLegend=listImage[cpt].legend;

	blzFigCaption.innerHTML=imgLegend;*/

	window.setInterval(countdown,ms);

lastButton=document.querySelector("button:nth-child(1)");
lastButton.addEventListener("click",lastDiapo);

nextButton=document.querySelector("button:nth-child(2)");
nextButton.addEventListener("click",nextDiapo);

