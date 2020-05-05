<?php 

namespace App\Api\Controller;

use App\Entity\Answer;
use App\Repository\ChoiceValueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GetResult extends AbstractController{

    private $choiceValueRepository;

    public function __construct(ChoiceValueRepository $choiceValueRepository)
    {
        $this->choiceValueRepository = $choiceValueRepository;
    }

    public function __invoke(Answer $data)
    {
        
        $choiceValue = $this->choiceValueRepository->findByAnswer($data);

        return $choiceValue;
        //dump($data);die;
        //$this->answerHandler->handle($data);

        //return $data;
    }
}