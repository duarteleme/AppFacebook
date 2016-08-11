<?php
//session_start();
include("config.php");
// added in v4.0.0

  /* INCLUSION OF LIBRARY FILEs*/
  require_once( 'src/Facebook/FacebookSession.php');
  require_once( 'src/Facebook/FacebookRequest.php' );
  require_once( 'src/Facebook/FacebookResponse.php' );
  require_once( 'src/Facebook/FacebookSDKException.php' );
  require_once( 'src/Facebook/FacebookRequestException.php' );
  require_once( 'src/Facebook/FacebookRedirectLoginHelper.php');
  require_once( 'src/Facebook/FacebookAuthorizationException.php' );
  require_once( 'src/Facebook/GraphObject.php' );
  require_once( 'src/Facebook/GraphUser.php' );
  require_once( 'src/Facebook/GraphSessionInfo.php' );
  require_once( 'src/Facebook/Entities/AccessToken.php');
  require_once( 'src/Facebook/HttpClients/FacebookCurl.php' );
  require_once( 'src/Facebook/HttpClients/FacebookHttpable.php');
  require_once( 'src/Facebook/HttpClients/FacebookCurlHttpClient.php');

  use Facebook\FacebookSession;
  use Facebook\FacebookRedirectLoginHelper;
  use Facebook\FacebookRequest;
  use Facebook\FacebookResponse;
  use Facebook\FacebookSDKException;
  use Facebook\FacebookRequestException;
  use Facebook\FacebookAuthorizationException;
  use Facebook\GraphObject;
  use Facebook\GraphUser;
  use Facebook\GraphSessionInfo;
  use Facebook\FacebookHttpable;
  use Facebook\FacebookCurlHttpClient;
  use Facebook\FacebookCurl;

// init app with app id and secret
FacebookSession::setDefaultApplication( $app, $app_secret);
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper($url.'/fbconfig.php' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}

//check if facebook session exists
if(isset($_SESSION['fb_token'])){
  $sess = new FacebookSession($_SESSION['fb_token']);
}

// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  
  $_SESSION['fb_token']=$session->getToken();
  $request = new FacebookRequest( $session, 'GET', '/me?fields=id,first_name,last_name,name,email,gender,birthday,location,relationship_status' );
  $response = $request->execute();

$graph = $response->getGraphObject(GraphUser::classname());
      $fbid = $graph->getId();              // To Get Facebook ID
      $fbfullname = $graph->getName();
      $fblastname = $graph->getProperty('last_name');
      $femail = $graph->getProperty('email'); 
      $fBday = $graph->getBirthday();
      $fbio = $graph->getProperty('bio');  
      $fgender = $graph->getProperty('gender'); 
      $fLocale = $graph->getProperty('location');
      $fRelationship = $graph->getProperty('relationship_status');
      $fQuotes = $graph->getProperty('quotes');

  /* ---- Session Variables -----*/
      $_SESSION['FBID'] = $fbid;           
      $_SESSION['FULLNAME'] = $fbfullname;
      $_SESSION['EMAIL'] =  $femail;
      $_SESSION['LASTNAME'] = $fblastname;
      $_SESSION['BDAY'] = $fBday;
      $_SESSION['BIO'] = $fbio;
      $_SESSION['GENDER'] = $fgender;
      $_SESSION['LANGUAGE'] = $fLocale;
      $_SESSION['RELATIONSHIP'] = $fRelationship;
      $_SESSION['QUOTES'] = $fQuotes;

    /* ---- header location after session ----*/
  header("Location: index.php?carregando=s");
} else {
  $loginUrl = $helper->getLoginUrl(array('scope' => 'email, public_profile,user_friends'));
 header("Location: ".$loginUrl);
}
?>