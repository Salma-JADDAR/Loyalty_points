<?php
namespace App\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class HomeController {

    public function index() {
        $loader = new FilesystemLoader(__DIR__ . '/../../templates');
        $twig = new Environment($loader);

        echo $twig->render('home.twig', [
            'title' => 'Accueil ShopEasy'
        ]);
    }
}
