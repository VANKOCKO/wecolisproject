<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// src/Controller/LuckyController.php
namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LuckyController extends AbstractController
{
    /**
     * 
     * @Route("/lucky/number")
     */
    public function number(): Response
    {
        $number = random_int(0, 100);
        return $this->render('lucky/number.html.twig',
                [
                  'number'  => $number
                ]        
        );
    }
    /**
     * 
     * @Route("/colis")
     */
    public function Colis(): Response
    {
        $noomColis = "colis1";
        return new Response(
                
            '<html><body>'.
                      $noomColis
                .'</body></html>'
        );
    }
}
