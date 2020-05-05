<?php   

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Participant;
use App\Message\ParticipantMessage;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Messenger\MessageBusInterface;

class ParticipantSubscriber implements EventSubscriberInterface{

    private $bus;

    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;
    }

    public static function getSubscribedEvents()
    {
        return[
            KernelEvents::VIEW => ['sendMessengerMessage', EventPriorities::POST_WRITE]
        ];
    }

    public function sendMessengerMessage(ViewEvent $event){
        $participant = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if(!$participant instanceof Participant || Request::METHOD_POST !== $method){
            return;
        }

        $message = new ParticipantMessage($participant->getFirstname(), $participant->getEmail());
        $this->bus->dispatch($message);


        //envoyé sendinblue
    }
}