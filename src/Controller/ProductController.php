<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
class ProductController extends AbstractController
{
    
    
    /**
     *@Route("/produit",name="creer_produit") 
     */
    public function creerProduit(){
       // Recevoir entity manager
        $entitymanager = $this->getDoctrine()->getManager();
        // recevoir produit 
        $produit = new Product();
        $produit->setName("Pianno");
        $produit->setPrice(1999);
        $produit->setDescription("Ergonomique et bien adequat");
        // appel de doctrine pour sauvegarder la requete 
        $entitymanager->persist($produit);
        // execute la requette 
        $entitymanager->flush();
        
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
    /**
     * @Route("/product", name="product")
     */
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
    
    /**
     *   Listes des produit
     *  @Route("/produit/{id}", name="liste_des_produits")
     */
    public function listedesproduits(int $id) : Response {
          
        //appel entity manager 
        $produit = $this->getDoctrine()->getRepository(Product::class)->find($id);
        if(!$produit){
            throw $this->createNotFoundException(
                     "Aucun produit pour cette ".$id
                    );
        }
        return new Response('Verifier ce produit: '.$produit->getName());
    }
}
