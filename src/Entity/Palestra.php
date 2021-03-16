<?php

namespace App\Entity;

use App\Repository\PalestraRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PalestraRepository::class)
 */
class Palestra
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="Informe o título da palestra")
     */
    private $titulo;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank(message="Informe a data da palestra")
     * @Assert\GreaterThanOrEqual(value="today", message="Data tem que ser hoje ou posterior a hoje")
     */
    private $data;

    /**
     * @ORM\Column(type="time")
     * @Assert\NotBlank(message="Informe o hora que inícia a palestra")
     */
    private $hora_inicio;

    /**
     * @ORM\Column(type="time")
     * @Assert\NotBlank(message="Informe o hora que termina a palestra")
     * @Assert\GreaterThanOrEqual(propertyPath="hora_inicio", message="Hora final tem que ser maior que hora de início")
     */
    private $hora_fim;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descricao;

    /**
     * @ORM\ManyToOne(targetEntity=Eventos::class, inversedBy="palestras")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank(message="Informe o evento que a palestra será realizada")
     */
    private $evento;

    /**
     * @ORM\ManyToOne(targetEntity=Palestrante::class, inversedBy="palestras")
     * @Assert\NotBlank(message="Informe quem vai palestrar essa palestra")
     */
    private $palestrante;

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(?\DateTimeInterface $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getHoraInicio(): ?\DateTimeInterface
    {
        return $this->hora_inicio;
    }

    public function setHoraInicio(?\DateTimeInterface $hora_inicio): self
    {
        $this->hora_inicio = $hora_inicio;

        return $this;
    }

    public function getHoraFim(): ?\DateTimeInterface
    {
        return $this->hora_fim;
    }

    public function setHoraFim(?\DateTimeInterface $hora_fim): self
    {
        $this->hora_fim = $hora_fim;

        return $this;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getEvento(): ?Eventos
    {
        return $this->evento;
    }

    public function setEvento(?Eventos $eventos): self
    {
        $this->evento = $eventos;

        return $this;
    }

    public function getPalestrante(): ?Palestrante
    {
        return $this->palestrante;
    }

    public function setPalestrante(?Palestrante $palestrante): self
    {
        $this->palestrante = $palestrante;

        return $this;
    }
}
