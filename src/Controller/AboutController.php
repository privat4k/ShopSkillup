<?php
/**
 * Created by PhpStorm.
 * User: Resonans
 * Date: 12/4/2017
 * Time: 8:13 PM
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AboutController extends Controller
{

    /**
     * @Route("/about")
     *
     * @return Response
     */
    public function number() {


        return $this->render('about.html.twig', array());


    }

}