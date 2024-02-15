<?php

namespace Controller;

use Base\Controller;

class DefautController extends Controller {
    public function index() {
        $facebookUrl = 'https://www.facebook.com';
        $instagramUrl = 'https://www.instagram.com';
        $twitterUrl = 'https://www.twitter.com';
        
        include("views/index.view.php");
    }
}