<?php
namespace App\Controller;
use App\Entity\Category;
use App\Service\Catalogue;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
class CategoryController extends Controller
{
    /**
     * @var Catalogue
     */
    private $catalogue;

    public function __construct(Catalogue $catalogue)
    {
        $this->catalogue = $catalogue;
    }


    /**
     * @Route("/category/{slug}/{page}",
     *     name="category_show",
     *     requirements={"page": "\d+"}
     *     )
     * @ParamConverter("slug", options={"mapping": {"slug": "slug"}})
     *
     * @param Category $category
     * @param $page
     * @param $session
     *
     * @return Response
     */
    public function show(Category $category, $page = 1, SessionInterface $session) {
        $session->set('lastVisitedCategory', $category->getId());
        return $this->render(
            'category/show.html.twig',
            ['category' => $category, 'page' => $page]
        );
    }

    /**
     * @Route("/categories", name="category_list")
     */
    public function listCategory()
    {

        $category = $this->catalogue->getCategory();

        if ( !$category ) {
            throw $this->createNotFoundException('Category not found');
        }
        return $this->render('category/list.html.twig', ['category' => $category]);
    }

    /**
     * @Route("message", name="category_message")
     */
    public function message(SessionInterface $session)
    {
        $this->addFlash('notice', 'Successfully added.');
        $lastCategory = $session->get('lastVisitedCategory');
        return $this->redirectToRoute('category_show', ['slug' => $lastCategory]);
    }

    /**
     * @Route("download", name="category_download")
     */
    public function fileDownload()
    {
        $response = new Response();
        $response->setContent('Test content');
        return $response;
    }
}