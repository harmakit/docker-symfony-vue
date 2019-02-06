<?php
/**
 * Created by PhpStorm.
 * User: harmakit
 * Date: 2019-02-05
 * Time: 22:24
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('base.html.twig', []);
    }
}

