<?php

namespace App\MessageHandler;

use App\Message\ParticipantMessage;
use GuzzleHttp\Client;
use SendinBlue\Client\Configuration;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use SendinBlue\Client\Api\ContactsApi;
use SendinBlue\Client\Model\CreateContact;

class ParticipantMessageHandler implements MessageHandlerInterface{

    public function __invoke(ParticipantMessage $message){
        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', $_ENV['SENDINBLUE_API_KEY']);
        
        $apiInstance = new ContactsApi(
            new Client(),
            $config
        );

         $createContact = new CreateContact([
             'email' => $message->getEmail(),
             'attributes' => ['PRENOM' => $message->getName()],
             'listIds' => [(int) $_ENV['SENDINBLUE_LIST_ID']],
             'updateEnabled' => true,
         ]);

        try {
            $apiInstance->createContact($createContact);
        } catch (\Exception $e) {
            dd($e);
            echo 'Exception when calling AccountApi->getAccount: ', $e->getMessage(), PHP_EOL;
        }
    }
}