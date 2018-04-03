<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends Controller
{
    /**
     * @Route("/category", name="category")
     */
    public function show($id)
    {
        $repo = $this->getDoctrine()->getRepository(Category::class);
        //$categories = $repo->findBy(['parent' => null]);

        $qb = $repo->CreateQueryBuilder('cat');
        $qb
            ->select('cat')
            ->where('cat.parent IS NULL');

        $categories = $qb->getQuery()->execute();

        return $this->render('category/index.html.twig', [
            'categories' => $categories
        ]);
    }

    /**
     * @Route("/category/{id}", name="category_show")
     */
    public function showAction(Category $category)
    {


        return $this->render($id);
    }
}