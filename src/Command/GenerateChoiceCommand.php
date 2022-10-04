<?php

namespace App\Command;

use App\Entity\Choice;
use App\Repository\ChoiceRepository;
use App\Repository\QuestionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class GenerateChoiceCommand extends Command
{
    protected static $defaultName = 'app:generate-choice';
    protected static $defaultDescription = 'Genère les réponses';

    private $questionRepository;
    private $entityManager;

    public function __construct(QuestionRepository $questionRepository, EntityManagerInterface $entityManager)
    {
        $this->questionRepository = $questionRepository;
        $this->entityManager = $entityManager;

        return parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setDescription(self::$defaultDescription)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $questions = $this->questionRepository->findAll();
        foreach ($questions as $question){
            $choice1 = new Choice();
            $choice1->setChoice('Oui');
            $choice1->setGoodAnswer(true);
            $choice1->setQuestion($question);
            $this->entityManager->persist($choice1);

            $choice2 = new Choice();
            $choice2->setChoice('Non');
            $choice2->setGoodAnswer(false);
            $choice2->setQuestion($question);
            $this->entityManager->persist($choice2);

        }

        $this->entityManager->flush();


        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return 0;
    }
}
