<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     * @param UserRepository $userRepository
     * @param User $user
     * @return Response
     */
    public function index(UserRepository $userRepository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $user = $this->getUser();


        $users = $userRepository->findActiveUsers();

        if($user->getShiftStart() !== null)
            return $this->render('homepage/index.html.twig', [
                'users' => $users,
            ]);

        else
            return $this->redirectToRoute('shift');
    }

    /**
     * @Route("/ajax/", name="ticket_ajax")
     */
    public function handleAjax(Request $request, UserRepository $userRepository): Response
    {
//        $request->isXmlHttpRequest();
        $userID = $request->request->get('id');
//        $user = $userRepository->findOneBy(['id'=>$userID]);

        return new JsonResponse(['test' => 123]);
//        return new JsonResponse(['test'=>$user->getId()]);
//        return new JsonResponse(true);
    }
}
