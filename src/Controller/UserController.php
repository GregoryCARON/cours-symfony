<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/user", name: "user_")]
class UserController extends AbstractController
{
    /**
     * Cette méthode retourne la liste des utilisateur de l'application
     * @return Response
     */
    #[Route("/", name: "list")]
    public function list(): Response
    {
        $message = '
            <table>
                <tr>
                    <td>John</td>
                    <td>Doe</td>
                </tr>
                <tr>
                    <td>Super</td>
                    <td>Admin</td>
                </tr>
            </table>
        ';
		//return new Response($message);
	    return $this->render("user/user.html.twig", [
			"message" => $message,
	    ]);
    }


    /**
     * Cette méthode édite un utilisateur en particulier, elle devra prendre un paramètre supplémentaire pour accéder à l'utilisateur en question.
     * @param int $userID
     * @return Response
     */
	#[Route("/edit/{userID<\d+>}", name: "edit")]
    public function edit(int $userID): Response
    {
        $html = '
            <div class="success">L\'utilisateur ' . $userID . ' a été modifié avec succès</div>
        ';
		
		//return new Response($html);
	    
	    return $this->render("user/user.html.twig", [
			"html" => $html,
	    ]);
    }


    /**
     * Cette méthode supprime un utilisateur, elle prend un paramètre supplémentaire qui doit ABSOLUMENT être un entier, j'attend une regex pour celui ci !!!!!
     * @param int $userId
     * @return Response
     */
	#[Route("/delete/{userId<\d+>}", name: "delete")]
    public function delete(int $userId): Response
    {
        $html = '
            <div class="success">L\'utilisateur ' . $userId . ' a été supprimé avec succès</div>
        ';
		
		//return new Response($html);
	    
	    return $this->render("user/user.html.twig", [
			"html" => $html,
	    ]);
    }

}
