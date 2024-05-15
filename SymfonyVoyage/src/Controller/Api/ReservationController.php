<?php

namespace App\Controller\Api;

use App\Controller\UserController;
use App\Entity\Reservation;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\ReservationRepository;
use App\Repository\StatutRepository;
use App\Repository\VoyageRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/api/reservation', name: 'api_reservation_')]
class ReservationController extends AbstractController
{
    #[Route('s', name: 'index')]
    public function index(ReservationRepository $fr): JsonResponse
    {
        $reservations = $fr->findAll();
        return $this->json($reservations, context: ['groups' => 'api_reservation_index']);
    }

    #[Route('/new', name: 'new', methods: ['POST'])]
    public function new(
        Request $request,
        UserRepository $userRepository,
        VoyageRepository $advVoyageRepository,
        StatutRepository $advStatutRepository,
        ValidatorInterface $validatorInterface,
        EntityManagerInterface
        $em
    ) {
        $content = $request->getContent();
        $reservationUser = json_decode($content, true);



        if ($userRepository->findOneBy(["email" => $reservationUser['email'], "nom" => $reservationUser['nom']])) {
            // ici l'utilisateur existe déjà
            $user = $userRepository->findOneBy(["email" => $reservationUser['email'], "nom" => $reservationUser['nom']]);
        } else {
            // ici l'uilisateur n'existe pas, alors on le créer
            $user = new User;
            $user->setEmail($reservationUser['email']);
            $user->setNom($reservationUser['nom']);
            $user->setPrenom($reservationUser['prenom']);
            // $user->setTelephoneUtilisateur($reservationUser['telephone']);


            $errors = $validatorInterface->validate($user);

            if ($errors->count()) {
                $messages = [];
                foreach ($errors as $error) {
                    $messages[] = $error->getMessage();
                }

                return $this->json($messages, Response::HTTP_UNPROCESSABLE_ENTITY);
            } else {
                $em->persist($user);
                $em->flush();

                $user = $userRepository->findOneBy(["email" => $reservationUser['email'], "nom" => $reservationUser['nom']]);
            }
        };
        // dd($reservationUser);
        $voyage = $advVoyageRepository->findOneBy(["id" => $reservationUser['id']]);
        $statut = $advStatutRepository->findOneBy(["id" => 1]);

        $reservation = new Reservation;
        $reservation->setUser($user);
        $reservation->setVoyage($voyage);
        $reservation->setMessageReservation($reservationUser['message_reservation']);
        $reservation->setStatut($statut);


        $errors = $validatorInterface->validate($reservation);

        if ($errors->count()) {
            $messages = [];
            foreach ($errors as $error) {
                $messages[] = $error->getMessage();
            }
            return $this->json($messages, Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            $em->persist($reservation);
            $em->flush();

            return $this->json('Votre message a été envoyé.', Response::HTTP_CREATED);
        }
    }
}
