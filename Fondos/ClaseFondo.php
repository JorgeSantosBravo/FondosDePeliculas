<style type="text/css">
	img{
		vertical-align: middle;
	}
	a{
		color:black;
		font-family: Arial;
		text-decoration:none;
	}
	a:hover{
		text-decoration: underline;
	}
</style>
<?php
class Fondo{

	
    public function htmltojson($url)
    {
		//@ para que no se vea el token
        $json2 = @file_get_contents($url);
        $array2 = json_decode($json2, true);
        
        return $array2;
    }

    public function fondodepelicula($idpelicula)
    {
        $backdrops = $this->htmltojson("https://api.themoviedb.org/3/movie/" . $idpelicula . "/images?api_key=3f533c5423eaf11962eb53403fccff33")["backdrops"];
        
        for ($i=0;$i<count($backdrops);$i++){
			$imagen=$backdrops[$i];
			if (($imagen["height"]==1080&&$imagen["width"]==1920)||($imagen["height"]>1080&&$imagen["width"]>1920)){
				echo "<a target=_blank href=https://image.tmdb.org/t/p/original".$imagen["file_path"]."><img width=384 height=216 src=https://image.tmdb.org/t/p/original".$imagen["file_path"]."></a> ";
				
			}
			
		}
    }
	
	public function busqueda($nombre){
		$peliculas=$this->htmltojson("https://api.themoviedb.org/3/search/movie?api_key=3f533c5423eaf11962eb53403fccff33&query=".urlencode($nombre)."&language=en_US")["results"];
		
		for ($i=0;$i<count($peliculas);$i++){
			$pelicula=$peliculas[$i];
			$año=explode("-",$pelicula["release_date"])[0];
			echo "<a href=fondos.php?id=".$pelicula["id"]."><img width=162 height=240 src=https://image.tmdb.org/t/p/original".$pelicula["poster_path"]."></a><a href=fondos.php?id=".$pelicula["id"].">".$pelicula["title"]." (".$año.")</a><br><br>";
			
		}
		
	}
	
}

?>