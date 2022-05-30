<?php //TODO s'occuper du contenu de la page, les fonctions js et json rajouter avec sql


// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
// Pas de soucis de bufferisation, puisque c'est dans le cas où on appelle directement la page sans son contexte
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=accueil");
	die("");
}
?>
<div id="page">
		<a href="index.php?view=creationplaylist" ><img id="new" title="Nouvelle Playlist"src="ressources/plus.png"/></a>
		<div id="lesplay"></div>
	</div>
	
	
	
	<style>#page{
	border: 3px solid black;
	border-radius:10px;
	margin: 50px 200px 50px 200px;
	padding: 10px;
	background-color: cornsilk;
	height:500px;
	

}

.playlist{

	display: flex;
	flex-direction: row;
	border: 1px solid black;
	border-top-right-radius: 10px;
	border-bottom-right-radius: 10px;
	justify-content: space-between;
	background-color: whitesmoke;

}

.playlist:hover{
	background-color: lightblue;

}

.contenu
{ line-height:auto;
margin-top:auto;
margin-bottom: auto;

padding: auto;}

.Pmage{
max-width:20% ;
max-height: 33%;

}

.interaction{max-height: 50px;
			max-width: 50px;
			margin-top:2.5%;
}

.interaction img{
	widths: 60%;
	height: 60%;
	margin: 6%;
		
	}

#new{
	max-height: 50px;
			max-width: 50px;
}</style>

<script>

var refpage=null;
var refplaylists=null;
/***************************************************/
//les playlists de l'utilisateur et celles likées//
/*************************************************/
//TODO:
//rajouter un lien sur la playlist
//rajouter des liens sur les interactions
var playlistjson='{"playlists":[{"titre":"ma playlist","auteur":"Folschette","contenu":[{"titre":"les copains d\'abord","auteur":"brassens","lien":"https://www.youtube.com/watch?v=L9oEcWFjF3M","durée":"3.22"}],"commentaires":[{"auteur":"Bourdeau","contenu":"waow trop cool la musique"}],"image":"https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fimages.rtl.fr%2Frtl%2Fwww%2F1214843-georges-brassens.jpg&f=1&nofb=1"}]}';
					
/***************************************/
/**************************************/
/**************************************/
function chargement(){
refpage=document.getElementById("lesplay");
refplaylists=JSON.parse(playlistjson);
console.log(refplaylists)
afficherplaylist();
}




function afficherplaylist(){
	var i;
	refpage.innerHTML=null;
	//refplaylists.playlists.length;
	
	for(i=0;i<refplaylists.playlists.length;i++){
		if(refplaylists.playlists[i].image!=null)
			refpage.innerHTML+="<div class='playlist'>"+"<img class='Pmage' src='"+refplaylists.playlists[i].image+"' />"+"<div class='contenu'>"+"<h4>"+refplaylists.playlists[i].titre+"</h4>"+"<p>"+refplaylists.playlists[i].auteur+"</p>"+"<p>Nombre de musiques: "+refplaylists.playlists[i].contenu.length+"</p>"+"</div>"+"<div class='interaction'><img src='ressources/play.png' /><img src='ressources/like.png' /><img src='ressources/comment.png' /></div></div>";
		
		else
			refpage.innerHTML+="<div class='playlist'>"+"<img class='Pmage' src='default.png' />"+"<div class='contenu'>"+"<h4>"+refplaylists.playlists[i].titre+"</h4>"+"<p>"+refplaylists.playlists[i].auteur+"</p>"+"<p>Nombre de musiques: "+refplaylists.playlists[i].contenu.length+"</p>"+"</div>"+"<div class='interaction'><img src='play.png'/><img src='like.png'/><img src='comment.png'/></div></div>";
	}



}

</script>
