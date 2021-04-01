<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShiftController extends AbstractController
{
    /**
     * @Route("/shift", name="shift")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $user = $this->getUser();

        $form = $this->createFormBuilder($user)
            ->add('shiftStart', TimeType::class, ['with_minutes'=>false])
            ->add('shiftEnd', TimeType::class, ['with_minutes'=>false])
            ->add('submit', SubmitType::class)
            ->getForm();

//       TODO , 'hours'=>['default'=>'10']

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('homepage');
        }

        return $this->render('shift/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
