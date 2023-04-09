<?php

namespace App\Controller;

use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function index(TaskRepository $taskRepository): Response
    {
        return $this->render('app/homepage/homepage.html.twig', [
            'tasks' => $taskRepository->findBy(["author" => $this->getUser()]),
        ]);
    }
}
