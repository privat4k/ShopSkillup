<?php
/**
 * Created by PhpStorm.
 * User: SkillUP Student
 * Date: 05.12.2017
 * Time: 19:33
 */

namespace App\Controller;


use App\Entity\Category;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class CategoryController extends Controller
{
    /**
     * @Route("/category/{id}", name="category_show")
     */
    public function show(Category $category)
    {
        return $this->render('category/show.html.twig', ['category' => $category]);
    }
    /**
     * @Route("/category/{name}", name="$category_list")
     */
    public function listCategory($name = '')
    {
        $repo = $this->getDoctrine()->getRepository(Category::class);
        if($name){
            $category = $repo->findBy(['name' => $name]);
        } else {
            $category = $repo->findAll();
        }
        if(!$category){
            throw $this->createNotFoundException('Category not found!');
        }
        return $this->render('category/list.html.twig', ['category' => $category]);
    }
}