<?php

namespace App\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class ArticleController extends AbstractController
{
	/**
	*@Route("/", name="app_homepage")
	*/
	public function homepage(){
//		return new Response('OMG? My first page.... WOW');
        return $this->render('article/homepage.html.twig');
	}

	/**
	*@Route("/news/{slug}", name="article_show")
	*/
	public function show($slug){
		/*return new Response(sprintf('Future page to show space article:"%s"', $slug));
	}*/
	$comments = [
            'I ate a normal rock once. It did NOT taste like bacon!',
            'Woohoo! I\'m going on an all-asteroid diet!',
            'I like bacon too! Buy some from my site! bakinsomebacon.com',
		];
	    dump($slug, $this);
	return $this->render('article/show.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)),'slug'=>$slug,'comments'=>$comments,
		]);

	}

    /**
     * @Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
     */
	public function toggleArticleHeart($slug){
        //todo

        return new JsonResponse(['hearts'=>rand(5,100)]);
    }
} 