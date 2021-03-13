<?php

namespace App\Entity;

use App\Repository\PalestraRepository;
use Doctrine\ORM\Mapping as ORM;

/**
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
     */
    private $titulo;

    /**
     * @ORM\Column(type="date")
     */
    private $data;

    /**
     * @ORM\Column(type="time")
     */
    private $hora_inicio;

    /**
     * @ORM\Column(type="time")
     */
    private $hora_fim;

    /**
     * @ORM\Column(type="text")
     */
    private $descricao;

    /**
     * @ORM\ManyToOne(targetEntity=Eventos::class, inversedBy="palestras")
     * @ORM\JoinColumn(nullable=false)
     */
    private $evento;

    /**
     * @ORM\OneToOne(targetEntity=Palestrante::class, cascade={"persist"})
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

    public function setData(\DateTimeInterface $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getHoraInicio(): ?\DateTimeInterface
    {
        return $this->hora_inicio;
    }

    public function setHoraInicio(\DateTimeInterface $hora_inicio): self
    {
        $this->hora_inicio = $hora_inicio;

        return $this;
    }

    public function getHoraFim(): ?\DateTimeInterface
    {
        return $this->hora_fim;
    }

    public function setHoraFim(\DateTimeInterface $hora_fim): self
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
