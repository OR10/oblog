<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class BlogController extends Controller
{
	protected $postRepository;
	protected $categoryRepository;

	public function __construct(EntityManagerInterface $entityManager)
	{
		$this->postRepository = $entityManager->getRepository('AppBundle:Post');
		$this->categoryRepository = $entityManager->getRepository('AppBundle:Category');
	}

	/**
	 * @Route("/blog", name="blog_all")
	 */
	public function indexAction(Request $request)
	{
		$posts = $this->getAllPosts();

		return $this->render('default/blog.html.twig', [
			'posts' => $posts,
			'page_title' => 'Все публикации']);
	}

	/**
	 * @Route("/blog/psychology", name="blog_psychology")
	 */
	public function psychologyAction(Request $request)
	{
		$posts = $this->getPostsByCategorySlug('psychology');

		return $this->render('default/blog.html.twig', [
			'posts' => $posts,
			'page_title' => 'Публикации на тему психологии']);
	}

	/**
	 * @Route("/blog/phylosophy", name="blog_phylosophy")
	 */
	public function phylosophyAction(Request $request)
	{
		$posts = $this->getPostsByCategorySlug('phylosophy');

		return $this->render('default/blog.html.twig', [
			'posts' => $posts,
			'page_title' => 'Публикации о философии']);
	}

	/**
	 * @Route("/blog/growth", name="blog_growth")
	 */
	public function growthAction(Request $request)
	{
		$posts = $this->getPostsByCategorySlug('growth');

		return $this->render('default/blog.html.twig', [
			'posts' => $posts,
			'page_title' => 'Статьи о саморазвитии']);
	}

	/**
	 * @Route("/blog/life", name="blog_life")
	 */
	public function lifeAction(Request $request)
	{
		$posts = $this->getPostsByCategorySlug('life');

		return $this->render('default/blog.html.twig', [
			'posts' => $posts,
			'page_title' => 'Заметки о жизни']);
	}

	/**
	 * @Route("blog/{categorySlug}/{postSlug}", name="post_page")
	 */
	public function postPageAction($categorySlug, $postSlug)
	{
		$post = $this->getPostBySlug($postSlug);

		return $this->render('default/post_page.html.twig', [
			'post' => $post]);
	}

	public function getAllPosts()
	{
        $posts = $this->postRepository->findAll();

        return $posts;
	}

	public function getPostsByCategorySlug($categorySlug)
	{		
        $categoryId = $this->categoryRepository->findOneBySlug($categorySlug);

        $posts = $this->postRepository->findBy(
        	['categoryId' => $categoryId->getId()]
        );

        return $posts;
	}

	public function getPostBySlug($postSlug)
	{
        $post = $this->postRepository->findOneBySlug($postSlug);

        return $post;
	}
}