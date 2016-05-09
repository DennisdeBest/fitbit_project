<?php
namespace Fitbit\FitappBundle\Controller;

use Fitbit\UserBundle\Entity\Objectives;
use Fitbit\UserBundle\Form\ObjectivesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FitbitFitappBundle:Default:index.html.twig');
    }

    public function objectivesAction(Request $request) {

        $user = $this->getUser();
        $userManager = $this->get('fos_user.user_manager');
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('FitbitUserBundle:User');

        if($user->getObjectives() !== null){
            $objectives = $repo->findOneBy(array('username'=>$user->getUsername()))->getObjectives();
        }
        else {
            $objectives = new Objectives();
        }
        $form = $this->get('form.factory')->create(ObjectivesType::class, $objectives);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            $em = $this->getDoctrine()->getManager();

            if($objectives->getSteps() == null)
                $objectives->setSteps(0);
            if($objectives->getActive() == null)
                $objectives->setActive(0);
            if($objectives->getFloors()==null)
                $objectives->setFloors(0);

            $em->persist($objectives);

            $user->setObjectives($objectives);

            $userManager->updateUser($user);


            $em->flush();

            return $this->redirectToRoute('fitbit_fitapp_homepage');
        }



        return $this->render('FitbitFitappBundle:Default:objectives.html.twig', array('form'=>$form->createView()));

    }
}
