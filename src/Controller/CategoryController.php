<?php
/**
 * Created by PhpStorm.
 * User: SkillUP Student
 * Date: 05.12.2017
 * Time: 19:33
 */

namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{

    /**
     * @Route("/category/{slug}/{page}", name="category_show",
     *     requirements={

*     "page": "\d+"})
     *
     * @param $slug
     * @param $page
     *
     * @return Response
     */
    public function show($slug, $page = 1)
    {
        return $this->render('category/show.html.twig',
            ['slug'=>$slug, 'page'=>$page]
        );
    }

}