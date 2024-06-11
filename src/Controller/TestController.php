<?php
namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/log-test', name: 'log_test')]
    public function index(LoggerInterface $logger): Response
    {
        $logger->info('Log test endpoint was called.');

        return new Response('Log test');
    }
}
