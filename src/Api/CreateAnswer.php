<?php

namespace App\Api\Controller;

use App\Entity\Answer;

class CreateAnswer{



    public function __invoke(Answer $data)
    {
        
        //$this->answerHandler->handle($data);

        return $data;
    }
}