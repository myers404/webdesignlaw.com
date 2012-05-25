<?php
  
    //New Slim Application
    require 'Slim/Slim.php';
	require 'Views/TwigView.php';
	
	// Configuration
	TwigView::$twigDirectory = dirname(__FILE__) . '/Twig';
    
    // Start Slim.
	$app = new Slim(array(
		'view' => new TwigView
	));
	
	    
    //Define Routes     
    $app->get('/', 'home');
    $app->get('/contracts', 'contracts');
    	$app->get('/contracts/what-and-why', 'contracts_what');
    	$app->get('/contracts/uniqueness', 'contracts_unique');
    	$app->get('/contracts/negotiation', 'contracts_negotiate');
    	$app->get('/contracts/signing', 'contracts_sign');
    	$app->get('/contracts/forms-introduction', 'contracts_forms_intro');
    	$app->get('/contracts/letter-of-agreement', 'contracts_letter');
    	$app->get('/contracts/project-proposal', 'contracts_proposal');
    	$app->get('/contracts/full-terms-and-conditions', 'contracts_full_tc');
    	$app->get('/contracts/condensed-terms-and-conditions', 'contracts_condensed_tc');
    	$app->get('/contracts/invoice', 'contracts_invoice');
    	$app->get('/contracts/past-due-reminder', 'contracts_pastdue');
    	$app->get('/contracts/collection-letter', 'contracts_collection');
    $app->get('/services', 'services');
    	$app->get('/services/web-design-contract-drafting', 'services_drafting');
    	$app->get('/services/web-design-contract-review', 'services_review');
    $app->get('/about', 'about');
    $app->get('/contact', 'contact');
    $app->post('/message', 'message');
    $app->post('/request', 'request');
    
    //Route Functions
    function home(){
    	$app = Slim::getInstance();
    	return $app->render('main_home.html', array('main_url' => 'home'));
    }
    
   	function contracts(){
    	$app = Slim::getInstance();
    	return $app->render('main_contracts.html', array('main_url' => 'contracts', 'sub_url' => 'home'));
    }
    
    function contracts_what(){
    	$app = Slim::getInstance();
    	return $app->render('contracts/what.html', array('main_url' => 'contracts', 'sub_url' => 'what'));
    }
    
    function contracts_unique(){
    	$app = Slim::getInstance();
    	return $app->render('contracts/unique.html', array('main_url' => 'contracts', 'sub_url' => 'unique'));
    }
    
    function contracts_negotiate(){
    	$app = Slim::getInstance();
    	return $app->render('contracts/negotiate.html', array('main_url' => 'contracts', 'sub_url' => 'negotiate'));
    }
    
    function contracts_sign(){
    	$app = Slim::getInstance();
    	return $app->render('contracts/sign.html', array('main_url' => 'contracts', 'sub_url' => 'sign'));
    }
    
    function contracts_forms_intro(){
    	$app = Slim::getInstance();
    	return $app->render('contracts/forms.html', array('main_url' => 'contracts', 'sub_url' => 'forms'));
    }
    
    function contracts_letter(){
    	$app = Slim::getInstance();
    	return $app->render('contracts/letter.html', array('main_url' => 'contracts', 'sub_url' => 'letter'));
    }
    
    function contracts_proposal(){
    	$app = Slim::getInstance();
    	return $app->render('contracts/proposal.html', array('main_url' => 'contracts', 'sub_url' => 'proposal'));
    }
    
    function contracts_full_tc(){
    	$app = Slim::getInstance();
    	return $app->render('contracts/fulltc.html', array('main_url' => 'contracts', 'sub_url' => 'fulltc'));
    }
    
    function contracts_condensed_tc(){
    	$app = Slim::getInstance();
    	return $app->render('contracts/condensedtc.html', array('main_url' => 'contracts', 'sub_url' => 'condensedtc'));
    }
    
    function contracts_invoice(){
    	$app = Slim::getInstance();
    	return $app->render('contracts/invoice.html', array('main_url' => 'contracts', 'sub_url' => 'invoice'));
    }
    
	function contracts_pastdue(){
    	$app = Slim::getInstance();
    	return $app->render('contracts/pastdue.html', array('main_url' => 'contracts', 'sub_url' => 'pastdue'));
    }
    
	function contracts_collection(){
    	$app = Slim::getInstance();
    	return $app->render('contracts/collection.html', array('main_url' => 'contracts', 'sub_url' => 'collection'));
    }
    
    function services(){
    	$app = Slim::getInstance();
    	return $app->render('main_services.html', array('main_url' => 'services'));
    }
    
    function services_drafting(){
    	$app = Slim::getInstance();
    	return $app->render('services/drafting.html', array('main_url' => 'services', 'sub_url' => 'drafting'));
    }
    
	function services_review(){
    	$app = Slim::getInstance();
    	return $app->render('services/review.html', array('main_url' => 'services', 'sub_url' => 'review'));
    }
    
    function about(){
    	$app = Slim::getInstance();
    	return $app->render('main_about.html', array('main_url' => 'about'));
    }
    
    function contact(){
    	$app = Slim::getInstance();
    	return $app->render('main_contact.html', array('main_url' => 'contact'));
    }
    
    function message(){
    	$app = Slim::getInstance();
    	$name = $app->request()->params('name');
    	$email = $app->request()->params('email');
    	$message = $app->request()->params('message');
    	
    	$emailMessage =  "Name: ".$name."\nEmail: ".$email."\nMessage:\n".$message;
    	$subject = "Message from webdesignlaw.com";
    	$to = "jmyers@webdesignlaw.com";
    	
    	$headers   = array();
		$headers[] = "MIME-Version: 1.0";
		$headers[] = "Content-type: text/plain; charset=iso-8859-1";
		$headers[] = "From: WebDesignLaw.com <".$email.">";
		$headers[] = "Reply-To: ".$name." <".$email.">";
		$headers[] = "X-Mailer: PHP/".phpversion();
    	
    	if((strlen($name) >= 2) && (strlen($message) >= 2) && (filter_var($email, FILTER_VALIDATE_EMAIL))){
			if(mail($to ,$subject, $emailMessage, implode("\r\n", $headers))){
				echo "true";
			}else{
				echo "false";
			}
		}else{
			echo "false";
		}
    }
    
    function request(){
    	$app = Slim::getInstance();
    	$name = $app->request()->params('name');
    	$email = $app->request()->params('email');
    	$message = $app->request()->params('message');
    	$phone = $app->request()->params('phone');
    	$company = $app->request()->params('company');
    	$state = $app->request()->params('state');
    	$request_type = $app->request()->params('request_type');
    	
    	$emailMessage =  "Name: ".$name."\nCompany: ".$company."\nEmail: ".$email."\nPhone: ".$phone."\nState: ".$state."\nRequest: ".$request_type."\nSpecial Requests:\n".$message;
    	$subject = "Request from webdesignlaw.com";
    	$to = "jmyers@webdesignlaw.com";
    	
    	$headers   = array();
		$headers[] = "MIME-Version: 1.0";
		$headers[] = "Content-type: text/plain; charset=iso-8859-1";
		$headers[] = "From: WebDesignLaw.com <".$email.">";
		$headers[] = "Reply-To: ".$name." <".$email.">";
		$headers[] = "X-Mailer: PHP/".phpversion();
    	
    	if((strlen($name) >= 2) && (strlen(preg_replace('/\D/', '', $phone)) == 10) && (filter_var($email, FILTER_VALIDATE_EMAIL))){
			if(mail($to ,$subject, $emailMessage, implode("\r\n", $headers))){
				echo "true";
			}else{
				echo "false";
			}
		}else{
			echo "false";
		}
    }
    
    //Start the Application
    $app->run();
?>