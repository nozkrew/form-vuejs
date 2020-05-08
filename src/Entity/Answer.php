<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Api\Controller\CreateAnswer;
use App\Api\Controller\GetResult;

/**
 * @ApiResource(
 *      itemOperations={
 *          "get",
 *          "get_result": {
 *              "method": "GET",
 *              "path": "/answers/{id}/result",
 *              "controller": GetResult::class
 *          }
 *      },
 *      collectionOperations={
 *          "get",
 *          "post_answer"={
 *              "method"="POST",
 *              "path"="/answers",
 *              "controller"=CreateAnswer::class,
 *          }
 *      }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\AnswerRepository")
 */
class Answer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Choice", inversedBy="answers")
     */
    private $answers;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Participant", inversedBy="answer", cascade={"persist", "remove"})
     */
    private $participant;

    public function __construct()
    {
        $this->answers = new ArrayCollection();
    }

    public function __toString():string
    {
        return "Réponse #".$this->id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection|Choice[]
     */
    public function getAnswers(): Collection
    {
        return $this->answers;
    }

    public function addAnswer(Choice $answer): self
    {
        if (!$this->answers->contains($answer)) {
            $this->answers[] = $answer;
        }

        return $this;
    }

    public function removeAnswer(Choice $answer): self
    {
        if ($this->answers->contains($answer)) {
            $this->answers->removeElement($answer);
        }

        return $this;
    }

    public function getParticipant(): ?Participant
    {
        return $this->participant;
    }

    public function setParticipant(?Participant $participant): self
    {
        $this->participant = $participant;

        return $this;
    }
}
