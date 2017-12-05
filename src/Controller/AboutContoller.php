<?php
/**
 * Created by PhpStorm.
 * User: SkillUP Student
 * Date: 05.12.2017
 * Time: 20:03
 */

namespace App\Controller;




use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;


class AboutContoller extends Controller
{

    /**
     *
     * @Route("/about")
     */
    public function show()
    {
        $url = $this->generateUrl('category_show',
            ['slug'=>'notebooks',
                'param'=>'getparam'

                ], UrlGeneratorInterface::ABSOLUTE_URL);

        return $this->render('about/show.html.twig',
            ['notebooksUrl'=> $url,]);

    }

    /**
     * $Route("/to-about")
     */
    public function redirectToShow()
    {

        return $this->redirectToRoute('about_show');
    }

}