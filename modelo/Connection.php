<?php
require("../../modelo/Movie.php");
require("../../modelo/User.php");
require("../../modelo/Comment.php");
require("../../modelo/UserCommentsMovie.php");
require("../../modelo/UserRatesMovie.php");
require("../../modelo/Userfavs.php");
class Connection{
    //atributos de conexion
	private $hostname;
	private $schema;
	private $user;
	private $password;

	private $PDOConnection;

	public function __construct($hostname="localhost", $schema="myfilmaffinity", $user="root", $password="") {
        $this->hostname=$hostname;
		$this->schema=$schema;
        $this->user=$user;
		$this->password=$password;		
    }

	//conectar
	public function connect(){

		$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

		#Connection string
		$connectionString = 'mysql:host='.$this->hostname.';dbname='.$this->schema;

		#Connection object
		$this->PDOConnection = new PDO($connectionString, $this->user, $this->password, $options);
		
	}

	//desconexion
	public function disconnect(){

		#Connection object
		$this->PDOConnection = null;
		
	}








	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/*TODOS LOS MÉTODOS DEL USUARIO*/
	//método para tranformar datos de la tabla userFavs a objeto userv¡favs(vista de la tabla favmovies y user)
	public function dataToUserfavs($dataArray){
		$userid = $dataArray['userid'];
		$favMovies = $dataArray['favMovies'];
		$id = $dataArray['id'];
		$nick = $dataArray['nick'];
		$avatarurl = $dataArray['avatarURL'];
		$email = $dataArray['email'];

		$userFavs = new Userfavs($userid, $favMovies, $id, $nick, $avatarurl, $email);

		return $userFavs;
	}

	//tranforma el array de datos de usuario a lista de usuarios
	public function arrayDataToArrayUserfavs($dataArrayList){
		$userfavList = array();

		while($dataArray = $dataArrayList->fetch() ){

			$userFavs = $this->dataToUserfav($dataArray);

			array_push($userfavList, $userFavs);
		}
		return $userfavList;
	}


	//método para tranformatar los datos a usuario
	public function dataToUser($dataArray){
		$id = $dataArray['id'];
		$nick = $dataArray['nick'];
		$avatarurl = $dataArray['avatarURL'];
		$email = $dataArray['email'];

		$user = new User($id, $nick, $avatarurl, $email);

		return $user;
	}

	//generar lista de usuarios
	public function arrayDataToArrayUser($dataArrayList){
		$userList = array();

		while($dataArray = $dataArrayList->fetch() ){

			$user = $this->dataToUser($dataArray);

			array_push($userList, $user);
		}
		return $userList;
	}

	/////////////////////////////////////////////
	public function dataToUserFav($dataArray){
		$name = $dataArray['name'];
		$posterurl = $dataArray['posterurl'];
		$rating = $dataArray['rating'];

		$favMovie = new Movie(null, null, $name, null, null, null, $posterurl, $rating);

		return $favMovie;
	}

	public function arrayDataToArrayUserFav($dataArrayList){
		$userFavList = array();
		while($dataArray = $dataArrayList->fetch() ){

			$favMovie = $this->dataToUserFav($dataArray);

			array_push($userFavList, $favMovie);
		}
		return $userFavList;
	}

	//método para obtener todos los usuarios de la bd
	public function selectAllUsers(){
		$this->connect();
		$dataArrayList = $this->PDOConnection->query("SELECT * FROM user");
        $this->disconnect();

		//cojo la lista de datos y lo convierto en lista de usuarios
        $userList = $this->arrayDataToArrayUser($dataArrayList);

		return $userList;
	}

	//user by nick
	public function selectUserByNick($nick){
		$this->connect();
		$selectUserByNick = $this->PDOConnection->prepare("SELECT * FROM userfavs WHERE nick = ?");
		$selectUserByNick->bindParam(1, $nick);
		$selectUserByNick->execute();
		$this->disconnect();

		$dataArray = $selectUserByNick->fetch();
		$user = $this->dataToUserfavs($dataArray);

		return $user;
	}


	///////////////////////////////////////////////////////////////////////////////
	//todos los usarios por nick
	public function selectUserFavMovieByUserNick($nick){
		
		$this->connect();
		//consulta para obtener las pelis fav del usuario por id
		$dataArrayList = $this->PDOConnection->prepare("SELECT * FROM usuario1 WHERE nick=?");
		//averagemovierating --> para que te saque la media de la película tbn
		$dataArrayList->bindParam(1, $nick);
		$dataArrayList->execute();
		$this->disconnect();

		$favMovieList = $this->arrayDataToArrayUserFav($dataArrayList);

		return $favMovieList;
		
	}



	//insertamos un usuario
	public function insertUser($user){
		
		$this->connect();
		
		//el mismo orden que en l controlador y la bd, comprobar id y categoria con su orden
		$insertQuery = $this->PDOConnection->prepare('INSERT INTO user (nick, avatarURL, email) VALUES (?, ?, ?)');

		$insertQuery->bindParam(1, $user->getNick());
		$insertQuery->bindParam(2, $user->getAvatarUrl());
		$insertQuery->bindParam(3, $user->getEmail());

		$insertQuery->execute();

		$this->disconnect();

	}


/*
	//método para sacar el id del usuario pasandle el nick
	public function selectUserIdByNick($nick){
		$this->connect();
		$selectId = $this->PDOConnection->prepare("SELECT id FROM user WHERE nick = ?");
		$selectId->bindParam(1, $nick);
		$selectId->execute();
		$this->disconnect();

		$userid = $selectId->fetch();
		//print_r($userid);
		//$user = $this->dataToUser($dataArray);

		return $userid;
	}

	//consulta para sacar las pelis fav del usuario por id y además la nota que le ha puesto a la pelicula ese usuario.
	public function select(){
		$this->connect();
		$selectFavMovieByUserIdAndRating = $this->PDOConnection->prepare("");
	}

*/










	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/*TODOS LOS MÉTODOS DE LA PELÍCULA*/
	//método para tranformar los datos y convertilo en un objeto (pelicula)
	public function dataToMovie($dataArray){
		$id = $dataArray['id'];
		$publicid = $dataArray['publicid'];
		$name = $dataArray['name'];
		$synopsis = $dataArray['synopsis'];
		$releaseyear = $dataArray['releaseyear'];
		$directorname = $dataArray['directorname'];
		$posterurl = $dataArray['posterurl'];
		$averagerating = $dataArray['averagerating'];

		$movie = new Movie($id, $publicid, $name, $synopsis, $releaseyear, $directorname, $posterurl, $averagerating);

		return $movie;
	}

	//método para tranformar array de datos array de objetos(pelis)
	public function arrayDataToArrayMovie($dataArrayList){
		//lista vacía para almacenar las películas
		$movieList = array();

		//por cada array de datos de la lista de arryas de datos, sacamos el producto y lo metemos en el array (generando un array de objetos películas)
		while($dataArray = $dataArrayList->fetch() ){
			$movie = $this->dataToMovie($dataArray);
			array_push($movieList, $movie);
		}

		//lista de películas
		return $movieList;

	}

	//recoger datos de la tabla comentarios de la peli
	public function dataToComment($dataArray){
		$nick = $dataArray['nick'];
		$avatarurl = $dataArray['avatarURL'];
		$id = $dataArray['id'];
		$comment = $dataArray['comment'];
		$commentdate = $dataArray['commentdate'];
		$publicid = $dataArray['publicid'];

		$userComment = new UserCommentsMovie( $nick, $avatarurl, $id, $comment, $commentdate, $publicid);

		return $userComment;
	}

	public function arrayDataToArrayComment($dataArrayList){
		$userCommentList = array();
		while($dataArray = $dataArrayList->fetch() ){
			$userComment = $this->dataToComment($dataArray);
			
			array_push($userCommentList, $userComment);
		}

		return $userCommentList;
	}
	
	//obtenemos todas las películas
	public function selectAllMovies(){
		$this->connect();
		$dataArrayList = $this->PDOConnection->query("SELECT * FROM averagemovierating");
        $this->disconnect();

		//cojo la lista de datos y lo convierto en lista de peliculas
        $movieList = $this->arrayDataToArrayMovie($dataArrayList);

		return $movieList;
	}

	//peli por id pública
	public function selectMovieByPublicid($id){
		$this->connect();

		$selectMovieByPublicid=$this->PDOConnection->prepare("SELECT * FROM averagemovierating WHERE publicid= ?");
		
		$selectMovieByPublicid->bindParam(1, $id);

		$selectMovieByPublicid->execute();
        $this->disconnect();
		
		$dataArray = $selectMovieByPublicid->fetch();

		$movie = $this->dataToMovie($dataArray);
		
		return $movie;
	}


	//buscar peli por nombre para el buscador:
	public function selectMovieByName($movieName){
		$this->connect();
		$dataArrayList = $this->PDOConnection->prepare("SELECT * FROM myfilmaffinity.averagemovierating WHERE name like ?");
		$searchedName = "%".trim($movieName)."%";
		$dataArrayList->bindParam(1, $searchedName);

		$dataArrayList->execute();
		$this->disconnect();

		$movieList = $this->arrayDataToArrayMovie($dataArrayList);

		return $movieList;
	}


	//funcion para sacar los comentarios de la película
	public function selectUserCommentsByPublicid($publicid){
		$this->connect();
		$dataArrayList = $this->PDOConnection->prepare("SELECT * FROM moviecomments WHERE publicid=?");

		$dataArrayList->bindParam(1, $publicid);
		$dataArrayList->execute();
		$this->disconnect();

		$userCommentList = $this->arrayDataToArrayComment($dataArrayList);
		return $userCommentList;
	}

	//insertamos una peli
	public function insertMovie($movie){
		
		$this->connect();
		
		//el mismo orden que en l controlador y la bd, comprobar id y categoria con su orden
		$insertQuery = $this->PDOConnection->prepare('INSERT INTO movie (publicid, name, synopsis, releaseyear, directorname, posterurl) VALUES (?, ?, ?, ?, ?, ?)');
		$insertQuery->bindParam(1, $movie->getPublicid());
		$insertQuery->bindParam(2, $movie->getName());
		$insertQuery->bindParam(3, $movie->getSynopsis());
		$insertQuery->bindParam(4, $movie->getReleaseyear());
		$insertQuery->bindParam(5, $movie->getDirectorname());
		$insertQuery->bindParam(6, $movie->getPosterurl());
		

		$insertQuery->execute();

		$this->disconnect();

	}
	//método para obtenr el id de la peli pasabdole la id pública
	public function selectIdByPublicid($publicid){
		$this->connect();
		$getMovieIdById= $this->PDOConnection->prepare('SELECT id FROM movie WHERE publicid=?');
		$getMovieIdById->bindParam(1, $publicid);
		$getMovieIdById->execute();

		$this->disconnect();
		
		$dataArray = $getMovieIdById->fetch();
		$id = $dataArray['id'];

		return $id;
	}
	//puntuar peli
	public function insertRating($movieRating){
		$this->connect();
		$insertQuery = $this->PDOConnection->prepare('INSERT INTO userratesmovie (userid, movieid, rating) VALUES (?, ?, ?)');
			//$insertQuery->bindParam(1, $userComment->getId());
			$insertQuery->bindParam(1, $movieRating->getUserid());
			$insertQuery->bindParam(2, $movieRating->getMovieid());
			$insertQuery->bindParam(3, $movieRating->getRating());
	
			$insertQuery->execute();
	
			$this->disconnect();
	}

	//obtener puntuación media
	public function selectRating($movieid){
		$this->connect();
		$selectMovieRating = $this->PDOConnection->prepare('SELECT rating FROM userratesmovie WHERE movieid=?');
		$selectMovieRating->bindParam(1, $movieid);
		$selectMovieRating->execute();
		$this->disconnect();
		$dataArray = $selectMovieRating->fetch();
		$rating = $dataArray['rating'];

		return $rating;
	}

	//insertammos comentario
	public function insertComment($userComment){
		$this->connect();
		$insertQuery = $this->PDOConnection->prepare('INSERT INTO usercommentsmovie (userid, movieid, comment) VALUES (?, ?, ?)');

		//$insertQuery->bindParam(1, $userComment->getId());
		$insertQuery->bindParam(1, $userComment->getUserid());
		$insertQuery->bindParam(2, $userComment->getMovieid());
		$insertQuery->bindParam(3, $userComment->getComment());
		//$insertQuery->bindParam(5, $userComment->getCommentdate());

		$insertQuery->execute();

		$this->disconnect();

	}

	//eliminamos peli por public id
	public function deleteMovieBypublicid($publicid){
		$this->connect();
		$deleteQuery = $this->PDOConnection->prepare('DELETE FROM movie WHERE publicid = ?');
		$deleteQuery->bindParam(1, $publicid);
		$deleteQuery->execute();
		$this->disconnect();
	}












	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/**TODOS LOS MÉTODOS DE COMETARIOS */
	//de datos a objetos UserCommentsMovie (comment)
	public function dataToUserCommentsMovie($dataArray){
		$id = $dataArray['id'];
		$userid = $dataArray['userid'];
		$movieid = $dataArray['movieid'];
		$comment = $dataArray['comment'];
		$commentdate = $dataArray['commentdate'];

		//creamos le objeto comentario de usuario
		$userComment = new UserCommentsMovie($id, $userid, $movieid, $comment, $commentdate);
	}

	public function arrayDataToArrayUserCommentsMovie($dataArrayList){
		$userCommentList = array();
		while($dataArray = $dataArrayList->fetch() ){
			$userComment = $this->dataToUserCommentsMovie($dataArray);
			
			array_push($userCommentList, $userComment);
		}

		return $userCommentList;

	}

	public function selectAllUserComments(){
		$this->connect();
		$dataArrayList = $this->PDOConnection->query("SELECT * FROM usercommentsmovie");
        $this->disconnect();

		//cojo la lista de datos y lo convierto en lista de peliculas
        $userCommentList = $this->arrayDataToArrayUserCommentsMovie($dataArrayList);

		return $userCommentList;
	}










	/////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////
	/**TODOS LOS MÉTODOS DE LA PUNTUACIÓN */
	public function dataToUserRatesMovie($dataArray){
		$userid = $dataArray['userid'];
		$movieid =  $dataArray['movieid'];
		$rating =  $dataArray['rating'];

		$userRate = new UserRatesMovie($userid, $movieid, $rating);

		return $userRate;
	}

	public function arrayDataToArrayUserRatesMovie($dataArrayList){
		$userRateList = array();
		while($dataArray = $dataArrayList->fetch() ){
			$userRate = $this->dataToUserRatesMovie($dataArray);
			
			array_push($userRateList, $userRate);
		}

		return $userRateList;

	}

	public function selectAllUserRates(){
		$this->connect();
		$dataArrayList = $this->PDOConnection->query("SELECT * FROM userratesmovie");
        $this->disconnect();

		//cojo la lista de datos y lo convierto en lista de peliculas
        $userRateList = $this->arrayDataToArrayUserRatesMovie($dataArrayList);

		return $userRateList;
	}





	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////
	/**TODOS LOS MÉTODOS DE LOS FAVORITOS */
	//data to UserFavMovie
	public function dataToUserFavMovie($dataArray){
		$userid = $dataArray['userid'];
    	$movieid =  $dataArray['movieid'];

		$userFavMovie = new UserFavMovie($userid, $movieid);

		return $userFavMovie;
	}


	public function arrayDataToArrayUserFavMovie($dataArrayList){
		$userFavMovieList = array();
		while($dataArray = $dataArrayList->fetch() ){
			$userFavMovie = $this->dataToUserFavMovie($dataArray);
			
			array_push($userFavMovieList, $userFavMovie);
		}

		return $userFavMovieList;
	}


	public function selectAllUserFavMovies(){
		$this->connect();
		$dataArrayList = $this->PDOConnection->query("SELECT * FROM userfavmovie");
        $this->disconnect();

		//cojo la lista de datos y lo convierto en lista de peliculas
        $userFavMovieList = $this->arrayDataToArrayUserFavMovie($dataArrayList);

		return $userFavMovieList;
	}

	

	
	

}
?>