<?php
/**
* IndexController
* home index controller
* 
* prime numbers project
* August 2016
* Purdy
* 
* contains calls to all views under the index
*/
class IndexController extends \Phalcon\Mvc\Controller
{

    /**
    * controller for index view
    */
    public function indexAction()
    {
	$clPrime = new Prime();

	$arrPrimes = $clPrime->atkins();

	$this->assets->addJs("js/indexpg.js");

	$this->view->setVar("arrPrimes", $arrPrimes);
    }

    /**
    * ajax controller for counting through
    */
    public function ajaxcountAction()
    {
	if ($this->request->isPost() == true) {
            if ($this->request->isAjax() == true) {
		$intCur = $this->request->getPost('primenum');
		$intCur++;

		if ($intCur >= 1000) {
		    echo false;
		}
		$clPrime = new Prime();
	        $arrPrimes = $clPrime->atkins($intCur,1000);
		echo reset($arrPrimes);
	    } else {
		echo false;
	    }
	} else {
	    echo false;
        }
	$this->view->disable();
    }
}

