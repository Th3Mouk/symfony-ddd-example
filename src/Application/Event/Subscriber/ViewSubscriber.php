<?php

declare(strict_types=1);

namespace App\Event\Subscriber;

use App\View\UserCollectionView;
use App\View\UserView;
use Domain\Aggregates\User;
use Domain\Collection\UserCollection;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ViewSubscriber implements EventSubscriberInterface
{
    /**
     * @return array<string, array<array<string, int>>>
     */
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::VIEW => [
                ['handleSimpleUser', 65],
                ['handleUserCollection', 64],
            ],
        ];
    }

    public function handleUserCollection(ViewEvent $event): void
    {
        $user_collection = $event->getControllerResult();

        if (!$user_collection instanceof UserCollection) {
            return;
        }

        $view = new UserCollectionView();

        $event->setResponse(new JsonResponse(['users' => $view->normalize($user_collection)]));
    }

    public function handleSimpleUser(ViewEvent $event): void
    {
        $user = $event->getControllerResult();

        if (!$user instanceof User) {
            return;
        }

        $view = new UserView();

        $event->setResponse(new JsonResponse($view->normalize($user)));
    }
}
